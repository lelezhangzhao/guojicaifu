<?php

namespace app\gjcf\api;

use think\Session;

use app\gjcf\model\User as UserModel;


class Helper{
    static public function IsCurAdmin(){
        $user = UserModel::where('id', Session::get('id'))->find();
        if(empty($user)){
            return false;
        }else{
            if($user->role <> 1){
                return false;
            }else{
                return true;
            }
        }
    }

    static public function IsLoginUp(){
        return Session::has('id');
    }

    static public function LoginFirst($controller){
        $controller->error('先登录', '/index.php/gjcf/login/index');
    }

    static public function SetCurUserDisabled($info){
        $user = UserModel::get(Session::get('user_id'));
        $user->status = 1;
        $user->statusinfo = $info;
        $user->allowField(true)->save();
    }

    static public function IsCurUserEnable(){
        $user_id = Session::get('user_id');
        $user = UserModel::get($user_id);
        if((int)$user->status === 0){
            return true;
        }
        return false;
    }

    static public function TestLoginAndStatus($controller){
        if(!self::IsLoginUp()){
            self::LoginUpFirst($controller);
        }
        if(!self::IsCurUserEnable()){
            $controller->error('用户状态错误，请联系管理员');
        }
        return true;
    }


    static public function TestAccountInfo($controller){
        self::TestLoginAndStatus($controller);

        $user = UserModel::get(Session::get('id'));
        if(empty($user->name)){
            $controller->error('完善账户信息', '/index.php/gjcf/accountinfo/index');
        }
        return true;
    }

}