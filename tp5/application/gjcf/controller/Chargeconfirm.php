<?php

namespace app\gjcf\controller;

use think\console\command\Help;
use think\Controller;
use think\Session;
use think\Db;
use think\Request;


use app\gjcf\model\User as UserModel;
use app\gjcf\model\Chargerecord as ChargerecordModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\api\Helper as HelperApi;


class Chargeconfirm extends Controller{
    public function Index(){
        HelperApi::TestLoginAndStatus($this);
        HelperApi::TestIsAdmin($this);

        return $this->fetch();
    }

    public function GetChargeRecord(Request $request){
        HelperApi::TestLoginAndStatus($this);
        HelperApi::TestIsAdmin($this);

        $page = $request->param('page');
        $limit = $request->param('limit');
        $tol = ($page - 1) * $limit;

        $chargeconfirmcount = Db::view('chargerecord')
            ->view('user',['name', 'alipaynum'] ,'user.id = chargerecord.userid')
            ->where('chargerecord.status', 0)
            ->count();

        $chargeconfirm = Db::view('chargerecord')
            ->view('user',['name', 'alipaynum'] ,'user.id = chargerecord.userid')
            ->where('chargerecord.status', 0)
            ->limit($tol, $limit)
            ->select();


        $list["msg"]="";
        $list["code"]=0;
        $list["count"]=$chargeconfirmcount;
        $list["data"]=$chargeconfirm;
        if(empty($chargeconfirm)){
            $list["msg"]="暂无数据";
        }
        return json($list);
    }

    public function ChargeConfirmSuccess(Request $request){
        if (!HelperApi::IsAdmin()) {
            HelperApi::SetUserDisabled(Session::get('userid'), '违规访问chargeconfirm');
            return $this->error('违规访问，已封号', 'gjcf/login/index', 0, 1);
        }
        //更新数据库
        //chargerecord
        $chargeid = $request->param('chargeid');
        $chargerecord = ChargeRecordModel::get($chargeid);
        $chargerecord->status = 1;
        $chargerecord->allowField(true)->save();

        //user
        $user = UserModel::get($chargerecord->userid);
        $user->usableydc += $chargerecord->ydc;
        $user->allowField(true)->save();

        //ydcrecord
        YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $chargerecord->userid, $chargerecord->ydc, 0);

    }

    public function ChargeConfirmFailed(Request $request){
        if (!HelperApi::IsAdmin()) {
            HelperApi::SetUserDisabled(Session::get('userid'), '违规访问chargeconfirm');
            return $this->error('违规访问，已封号', 'gjcf/login/index', 0, 1);
        }
        //更新数据库
        //chargerecord
        $chargeid = $request->param('chargeid');
        $chargerecord = ChargeRecordModel::get($chargeid);
        $chargerecord->status = 2;
        $chargerecord->statusinfo = '管理员处理';
        $chargerecord->allowField(true)->save();

    }

}
