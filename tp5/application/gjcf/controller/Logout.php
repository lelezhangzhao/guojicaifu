<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\api\Helper as HelperApi;

class Logout extends Controller{
    public function Logout(){
        HelperApi::TestLoginAndStatus($this);


        Session::delete('userid');
        $this->success('已退出', 'gjcf/login/index', 0, 1);
    }
}

