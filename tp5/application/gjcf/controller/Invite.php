<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\api\Helper as HelperApi;

class Invite extends Controller{
    public function Index(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        return $this->fetch();
    }

    public function GetInviteUrl(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        $inviteurl = url('gjcf/signup/index').'?referee='.Session::get('userid');

        $json_arr = ['code' => 0, 'msg' => '', 'inviteurl' => $inviteurl];
        return json_encode($json_arr);

    }
}
