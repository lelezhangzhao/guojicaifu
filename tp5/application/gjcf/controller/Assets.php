<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\model\User as UserModel;

use app\gjcf\api\Helper as HelperApi;

//资产
class Assets extends Controller{

    public function Index(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        return $this->fetch();
    }

    public function GetMyAssets(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }


        $user = UserModel::get(Session::get('userid'));
        if(empty($user)){
            $json_arr = ['code' => 105, 'msg' => '用户不存在'];
            return json_encode($json_arr);
        }

        $json_arr = ['code' => 0, 'msg' => '', 'usableydc' => $user->usableydc, 'freezenydc' => $user->freezenydc, 'tasteydc' => $user->tasteydc];
        return json_encode($json_arr);
    }
}