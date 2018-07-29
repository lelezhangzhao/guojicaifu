<?php

namespace app\gjcf\api;

use app\gjcf\model\WithdrawRecord;
use think\Session;
use think\Controller;

use app\gjcf\model\User as UserModel;
use app\gjcf\model\Investrecord as InvestrecordModel;
use app\gjcf\model\Chargerecord as ChargerecordModel;
use app\gjcf\model\Withdrawrecord as WithdrawrecordModel;



class Helper extends Controller{
    static public function IsAdmin(){
        $user = UserModel::where('id', Session::get('userid'))->find();{
            if ($user->role !== 1) {
                return false;
            } else {
                return true;
            }
        }
    }

    static public function IsLoginUp(){
        return Session::has('userid');
    }

//    static public function LoginFirst($controller){
//        $controller->error('先登录', 'gjcf/login/index', 0, 1);
//    }

    static public function SetUserDisabled($userid, $info){
        //user
        $user = UserModel::get($userid);
        $user->status = 1;
        $user->statusinfo = $info;
        $user->allowField(true)->save();

        //investrecord
        $invest = InvestrecordModel::where('userid', $userid)->select();
        foreach($invest as $oneinvest){
            $oneinvest->status = 2;
            $oneinvest->allowField(true)->save();
        }
        //withdrawrecord
        $withdrawrecord = WithdrawrecordModel::where('userid', $userid)->select();
        foreach($withdrawrecord as $onewithdrawrecord){
            $onewithdrawrecord->status = 2;
            $onewithdrawrecord->allowField(true)->save();
        }
        //chargerecord
        $chargerecord = ChargerecordModel::where('userid', $userid)->select();
        foreach($chargerecord as $onechargerecord){
            $onechargerecord->sattus = 2;
            $onechargerecord->allowField(true)->save();
        }

    }

    static public function IsCurUserEnable(){
        $userid = Session::get('userid');
        $user = UserModel::get($userid);
        if((int)$user->status === 0){
            return true;
        }
        return false;
    }

    static public function TestLoginAndStatus($controller){
        if(!self::IsLoginUp()){
//            self::LoginFirst($controller);
            $json_arr = ['code' => 102, 'msg' => '用户未登录'];
            return json_encode($json_arr);
        }
        if(!self::IsCurUserEnable()){
            $json_arr = ['code' => 100, 'msg' => '用户状态错误，请联系管理员'];
            return json_encode($json_arr);
        }
        return true;
    }


    static public function TestAccountInfo($controller){

        $user = UserModel::get(Session::get('userid'));
        if(empty($user->name)){
//            ReturnCodeMsg(103, '账户信息未完善');
            $json_arr = ['code' => 103, 'msg' => '账户信息未完善'];
            return json_encode($json_arr);
//            $controller->error('完善账户信息', 'gjcf/accountinfo/index', 0, 1);
        }
        return true;
    }

    static public function TestIsAdmin($controller){
        if(true !== self::IsAdmin()){
            self::SetUserDisabled(Session::get('userid'), '非管理员访问管理员页面');
            self::ReturnCodeMsg(501, '非管理员访问管理员页面');
        }
        return true;
    }

    static public function ReturnCodeMsg($code, $msg){
        $json_arr = ['code' => $code, 'msg' => $msg];
        return json_encode($json_arr);
    }

    static public function IsOpenCapcha(){
        return false;
    }
    static public function IsOpenTelIdentify(){
        return false;
    }


}