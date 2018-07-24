<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;
use think\Db;
use think\Request;


use app\gjcf\model\User as UserModel;
use app\gjcf\model\Withdrawrecord as WithdrawrecordModel;
use app\gjcf\api\Helper as HelperApi;



class Withdrawconfirm extends Controller{
    public function Index(){
        if (!HelperApi::IsAdmin()) {
            HelperApi::SetUserDisabled(Session::get('userid'), '违规访问chargeconfirm');
            return $this->error('违规访问，已封号', 'gjcf/signup/index', 0, 1);
        }
        $result = Db::view('withdrawrecord')
            ->view('user', ['name', 'alipaynum'], 'user.id = withdrawrecord.userid')
            ->where('withdrawrecord.status', 0)
            ->select();

        $this->assign('withdrawlist', $result);

        return $this->fetch();
    }

    public function WithdrawConfirmSuccess(Request $request){
        //withdraw
        if (!HelperApi::IsAdmin()) {
            HelperApi::SetUserDisabled(Session::get('userid'), '违规访问chargeconfirm');
            return $this->error('违规访问，已封号', 'gjcf/signup/index', 0, 1);
        }

        $withdrawid = $request->param('withdrawid');
        $withdrawrecord = WithdrawRecordModel::get($withdrawid);
        $withdrawrecord->status = 1;
        $withdrawrecord->allowField(true)->save();

        //ydcrecord
        YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $withdrawrecord->userid, $withdrawrecord->ydc, 1);

    }

    public function WithdrawConfirmFailed(Request $request){
        //user
        //withdraw
        if (!HelperApi::IsAdmin()) {
            HelperApi::SetUserDisabled(Session::get('userid'), '违规访问chargeconfirm');
            return $this->error('违规访问，已封号', 'gjcf/signup/index', 0, 1);
        }

        $withdrawid = $request->param('withdrawid');
        $withdrawrecord = WithdrawRecordModel::get($withdrawid);
        $withdrawrecord->status = 2;
        $withdrawrecord->statusinfo = '管理员处理';
        $withdrawrecord->allowField(true)->save();

        $user = UserModel::get($withdrawrecord->userid);
        $user->usableydc += $withdrawrecord->ydc;
        $user->allowField(true)->save();
    }
}
