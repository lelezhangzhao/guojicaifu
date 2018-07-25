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
        $user = UserModel::where('id', Session::get('userid'))->find();
        if(empty($user)){
            return false;
        }else{
            if($user->role !== 1){
                return false;
            }else{
                return true;
            }
        }
    }

    static public function IsLoginUp(){
        return Session::has('userid');
    }

    static public function LoginFirst($controller){
        $controller->error('先登录', 'gjcf/login/index', 0, 1);
    }

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
            self::LoginFirst($controller);
        }
        if(!self::IsCurUserEnable()){
            $controller->error('用户状态错误，请联系管理员');
        }
        return true;
    }


    static public function TestAccountInfo($controller){
        self::TestLoginAndStatus($controller);

        $user = UserModel::get(Session::get('userid'));
        if(empty($user->name)){
            $controller->error('完善账户信息', 'gjcf/accountinfo/index', 0, 1);
        }
        return true;
    }

    static public function IsOpenCapcha(){
        return false;
    }
    static public function IsOpenTelIdentify(){
        return false;
    }


}