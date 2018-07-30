<?php

namespace app\gjcf\controller;

use app\gjcf\validate\WithdrawRecord;
use think\Controller;
use think\Session;
use think\Db;
use think\Request;


use app\gjcf\model\User as UserModel;
use app\gjcf\model\Withdrawrecord as WithdrawrecordModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\api\Helper as HelperApi;


class Withdrawconfirm extends Controller{
    public function Index(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $isadmin = HelperApi::TestIsAdmin($this);
        if(true !== $isadmin){
            return $isadmin;
        }

        return $this->fetch();
    }

    public function GetWithdrawRecord(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $isadmin = HelperApi::TestIsAdmin($this);
        if(true !== $isadmin){
            return $isadmin;
        }

        $page = $request->param('page');
        $limit = $request->param('limit');
        $tol = ($page - 1) * $limit;

        $withdrawconfirmcount = Db::view('withdrawrecord')
            ->view('user',['name', 'alipaynum'] ,'user.id = withdrawrecord.userid')
            ->where('withdrawrecord.status', 0)
            ->count();

        $withdrawconfirm = Db::view('withdrawrecord')
            ->view('user',['name', 'alipaynum'] ,'user.id = withdrawrecord.userid')
            ->where('withdrawrecord.status', 0)
            ->limit($tol, $limit)
            ->select();


        $list["msg"]="";
        $list["code"]=0;
        $list["count"]=$withdrawconfirmcount;
        $list["data"]=$withdrawconfirm;
        if(empty($withdrawconfirm)){
            $list["msg"]="暂无数据";
        }
        return json($list);
    }

    public function WithdrawConfirmSuccess(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $isadmin = HelperApi::TestIsAdmin($this);
        if(true !== $isadmin){
            return $isadmin;
        }
        //更新数据库
        //withdrawrecord
        $withdrawid = $request->param('withdrawid');
        $withdrawrecord = WithdrawrecordModel::get($withdrawid);
        $withdrawrecord->status = 1;
        $withdrawrecord->allowField(true)->save();

        //ydcrecord
        YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $withdrawrecord->userid, $withdrawrecord->ydc, 1);

        $json_arr = ['code' => 0, 'msg' => '操作成功'];
        return json_encode($json_arr);

    }

    public function WithdrawConfirmFailed(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $isadmin = HelperApi::TestIsAdmin($this);
        if(true !== $isadmin){
            return $isadmin;
        }
        //更新数据库
        //withdrawrecord
        $withdrawid = $request->param('withdrawid');
        $withdrawrecord = WithdrawrecordModel::get($withdrawid);
        $withdrawrecord->status = 2;
        $withdrawrecord->statusinfo = '管理员处理';
        $withdrawrecord->allowField(true)->save();

        //user
        $user = UserModel::get($withdrawrecord->userid);
        $user->usableydc += $withdrawrecord->ydc;
        $user->allowField(true)->save();

        $json_arr = ['code' => 0, 'msg' => '操作成功'];
        return json_encode($json_arr);

    }
}
