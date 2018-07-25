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
        if(HelperApi::IsOpenCapcha()){
            if(!captcha_check($request->param('capcha'))){
                return "验证码错误";
//                $this->error('验证码错误');
            }
        }

//        $username = 'zhangzhao';
//        $password = 'zhangzhao';
        $username = $request->param('username');
        $password = $request->param('password');


        $user = UserModel::where(['username' => $username, 'password' => $password])->find();
        if(empty($user)) {
            return "用户名或密码错误";
//            $this->error('用户名或密码错误');
        }

        if($user->status != 0){
            return "用户状态错误，请联系管理员";
//            $this->error('用户状态错误，请联系管理员', 'gjcf/login/index', 0, 1);
        }

        $user->latestlogintime = date('Y-m-d H:i:s');
        $user->allowField(true)->save();
        Session::set('userid', $user->id);
        if(HelperApi::IsAdmin()){
            $this->success('登录成功', 'gjcf/admin/index', 0, 1);
        }else{
            $result  = array();
            $result['code'] = 1;
            $result['msg'] = "登录成功";
            $result['username'] = $username;
            $result['userid'] = $user->id;
            $result['usableydc'] = $user->usableydc;
            $result['freezenydc'] = $user->freezenydc;
            return json_encode($result);
//            return 'result:{info;"登录成功"}';

//            $this->success('登录成功', 'gjcf/index/index', 0, 1);
        }
    }

    public function ForgetPassword(){
        $this->success('正在跳转', 'gjcf/forgetpassword/index', 0, 1);
    }

    public function Signup(){
        $this->success('正在跳转', 'gjcf/signup/index', 0, 1);
    }

}