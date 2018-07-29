<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\gjcf\model\Chargerecord as ChargerecordModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;

use app\gjcf\api\Helper as HelperApi;

class Charge extends Controller{
    public function Index(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $accountinfo = HelperApi::TestAccountInfo($this);
        if(true !== $accountinfo){
            return $accountinfo;
        }

        return HelperApi::ReturnCodeMsg(0, "ok");
//        return $this->fetch();
    }


    public function Charge(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $accountinfo = HelperApi::TestAccountInfo($this);
        if(true !== $accountinfo){
            return $accountinfo;
        }


        $ydc = $request->param('ydc');
        if(!is_numeric($ydc)){
            $json_arr = ['code' => 305, 'msg' => '充值数值错误'];
            return json_encode($json_arr);
//            $this->error('输入错误',  'gjcf/charge/index', 0, 1);
        }
        if($ydc < 10){
            $json_arr = ['code' => 306, 'msg' => '最低10元起充'];
            return json_encode($json_arr);
//            $this->error('最低10元起充', 'gjcf/charge/index', 0, 1);
        }

        //chargerecord
        ChargerecordModel::AddChargeRecord(Session::get('userid'), $ydc, 0);
        $json_arr = ['code' => 0, 'msg' => '提交成功，等待后台确认'];
        return json_encode($json_arr);
//        $this->success('提交成功，等待后台确认', 'gjcf/index/index', 0, 1);


    }
}