<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\api\Helper as HelperApi;

class Logout extends Controller{
    public function Logout(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }


        Session::delete('userid');
        $json_arr = ['code' => 0, 'msg' => '已退出'];
        return json_encode($json_arr);
//        $this->success('已退出', 'gjcf/login/index', 0, 1);
    }
}

