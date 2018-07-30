<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\api\Helper as HelperApi;

class Utility extends Controller{
    public function IsAccountInfoSet(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $accountinfo = HelperApi::TestAccountInfo($this);
        if(true !== $accountinfo){
            return $accountinfo;
        }else{
            $json_arr = ['code' => 0, 'msg' => '账户信息已完善'];
            return json_encode($json_arr);
        }
    }

    public function IsLogin(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }else{
            $json_arr = ['code' => 0, 'msg' => '已登录'];
            return json_encode($json_arr);
        }

    }
}