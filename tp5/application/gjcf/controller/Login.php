<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\gjcf\model\User as UserModel;

class Login extends Controller{
    public function Index(){
        return $this->fetch();
    }

    public function Login(Request $request){
        //先验证验证码
        if(!captcha_check($request->param('capcha'))){
            $this->error('验证码错误');
        }
        $username = $request->param('username');
        $password = $request->param('password');
        $user = UserModel::where(['username' => $username, 'password' => $password])->find();
        if(empty($user)){
            $this->error('用户名或密码错误');
        }
        Session::set('user_id', $user->id);
        $this->success('登录成功', 'gjcf/index/index');
    }

    public function ForgetPassword(){
        $this->success('正在跳转', 'gjcf/forgetpassword/index', 0, 1);
    }

    public function Signup(){
        $this->success('正在跳转', 'gjcf/signup/index', 0, 1);
    }

}