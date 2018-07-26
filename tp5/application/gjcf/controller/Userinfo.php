<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\model\User as UserModel;

use app\gjcf\api\Helper as HelperApi;

class Userinfo extends Controller{
    public function GetHeaderUserInfo(){
        $status = HelperApi::TestLoginAndStatus($this);
        if($status !== true){
            return $status;
        }

        $user = UserModel::get(Session::get('userid'));
        $json_arr = ['code' => 0, 'username' => $user->username, 'userid' => $user->id, 'usableydc' => $user->usableydc, 'freezenydc' => $user->freezenydc];
        return json_encode($json_arr);
    }
}
