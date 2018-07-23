<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\api\Helper as HelperApi;

class Admin extends Controller{
    public function Index(){
        if(!HelperApi::IsAdmin()){
            HelperApi::SetUserDisabled(Session::get('userid'));
        }
        //充值确认
        //提现确认
        //结算
        //分红
        return $this->fetch();
    }
}