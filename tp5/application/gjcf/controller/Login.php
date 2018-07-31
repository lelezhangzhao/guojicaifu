<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\gjcf\model\User as UserModel;
use app\gjcf\api\Helper as HelperApi;

class Login extends Controller{
    public function Index(){

        return $this->fetch();
    }

    public function Login(Request $request){
        //先验证验证码
        if(!captcha_check($request->param('capcha'))){
            $json_arr = ['code' => 300, 'msg' => "验证码错误"];
            return json_encode($json_arr);
        }

        $username = $request->param('username');
        $password = $request->param('password');
        $user = UserModel::where(['username' => $username, 'password' => $password])->find();
        if(empty($user)) {
            return HelperApi::ReturnCodeMsg(301, '用户名或密码错误');
        }
        if($user->status === 1){
            return HelperApi::ReturnCodeMsg(100, '用户状态错误，请联系管理员');
        }

        $user->latestlogintime = date('Y-m-d H:i:s');
        $user->allowField(true)->save();
        Session::set('userid', $user->id);
        if(HelperApi::IsAdmin()){
            return HelperApi::ReturnCodeMsg(1, '登录成功');
        }
        $json_arr = ['code' => 0, 'msg' => '登录成功', 'username' => $username, 'userid' => $user->id, 'usableydc' => $user->usableydc, 'freezenydc' => $user->freezenydc];
        return json_encode($json_arr);
    }

    public function ForgetPassword(){
        $this->success('正在跳转', 'gjcf/forgetpassword/index', 0, 1);
    }

    public function Signup(){
        $this->success('正在跳转', 'gjcf/signup/index', 0, 1);
    }

}