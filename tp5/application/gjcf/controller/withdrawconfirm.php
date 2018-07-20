<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;
use think\Db;
use think\Request;


use app\gjcf\model\User as UserModel;
use app\gjcf\model\Withdrawrecord as WithdrawrecordModel;



class Withdrawconfirm extends Controller{
    public function Index(){
        if (!HelperApi::IsAdmin()) {
            HelperApi::SetUserDisabled(Session::get('user_id'), '违规访问chargeconfirm');
            return $this->error('违规访问，已封号', 'index.php/gjcf/signup/index', 0, 1);
        }
        $result = Db::view('withdrawrecord')
            ->view('user', false, 'user.id = withdrawrecord.user_id')
            ->where('withdrawrecord', 0)
            ->select();

        $this->assign('withdrawlist', count($result));

        return $this->fetch();
    }

    public function WithdrawConfirmSuccess(Request $request){
        //withdraw
        if (!HelperApi::IsAdmin()) {
            HelperApi::SetUserDisabled(Session::get('user_id'), '违规访问chargeconfirm');
            return $this->error('违规访问，已封号', 'index.php/gjcf/signup/index', 0, 1);
        }

        $withdrawid = $request->param('withdrawid');
        $withdrawrecord = WithdrawRecordModel::get($withdrawid);
        $withdrawrecord->status = 1;
        $withdrawrecord->allowField(true)->save();
    }

    public function WithdrawConfirmFailed(Request $request){
        //user
        //withdraw
        if (!HelperApi::IsAdmin()) {
            HelperApi::SetUserDisabled(Session::get('user_id'), '违规访问chargeconfirm');
            return $this->error('违规访问，已封号', 'index.php/gjcf/signup/index', 0, 1);
        }

        $withdrawid = $request->param('withdrawid');
        $withdrawrecord = WithdrawRecordModel::get($withdrawid);
        $withdrawrecord->status = 2;
        $withdrawrecord->satausinfo = '管理员处理';
        $withdrawrecord->allowField(true)->save();

        $user = UserModel::get($withdrawrecord->user_id);
        $user->usableydc += $withdrawrecord->ydc;
        $user->allowField(true)->save();
    }
}
