<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;

use app\gjcf\model\User as UserModel;

class Signup extends Controller{
    public function Index(){
        return $this->fetch();
    }

    public function Signup(Request $request){
        //先验证验证码
        if(!captcha_check($request->param('capcha'))) {
            $this->error('验证码错误');
        }
        $username = $request->param('username');
        $password = $request->param('password');
        $tel = $request->param('tel');
        $referee = $request->param('referee');
        if(!empty($referee)) {
            if(empty(UserModel::where('username', $referee)->find())) {
                $this->error('推荐码有误');
            }
        }

        $user = new UserModel;
        $user->username = $username;
        $user->password = $password;
        $user->tel = $tel;
        $user->referee = $referee;
        $user->status = 0;
        $user->role = 0;
        $user->usableydc = 0;
        $user->freezenydc = 100;
        $user->singnuptime = date('Y-m-d H:i:s');
        $user->latestlogintime = date('Y-m-d H:i:s');
        $result = $this->validate($user, 'User');
        if(true !== $result){
            return $result;
        }
        $user->allowField(true)->save();
        $this->success('注册成功', 'gjcf/login/index');
    }
}