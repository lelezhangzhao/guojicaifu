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
        HelperApi::TestLoginAndStatus($this);
        HelperApi::TestAccountInfo($this);

        return $this->fetch();
    }

    public function Charge(Request $request){
        HelperApi::TestLoginAndStatus($this);
        HelperApi::TestAccountInfo($this);

        $ydc = $request->param('ydc');
        if(!is_numeric($ydc)){
            $this->error('输入错误',  'gjcf/charge/index', 0, 1);
        }
        if($ydc < 10){
            $this->error('最低10元起充', 'gjcf/charge/index', 0, 1);
        }

        //chargerecord
        $chargerecord = new ChargerecordModel();
        $chargerecord -> ydc = $ydc;
        $chargerecord -> status = 0;
        $chargerecord -> userid = Session::get('userid');
        $chargerecord->allowField(true)->save();
        $this->success('提交成功，等待后台确认', 'gjcf/index/index', 0, 1);

        YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), Session::get('userid'), $ydc, 0);

    }
}