<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;

use app\gjcf\model\User as UserModel;
use app\gjcf\model\Refereeone as RefereeoneModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;

class Signup extends Controller{
    public function Index(){
        return $this->fetch();
    }

    public function Signup(Request $request){

        //先验证验证码
        if(!captcha_check($request->param('capcha'))) {
            $this->error('验证码错误', 'gjcf/signup/index', 0, 1);
        }
        $username = $request->param('username');
        $password = $request->param('password');
        $tel = $request->param('tel');
        $referee = $request->param('referee');

        if(!empty(UserModel::where('username', $username)->find())){
            $this->error('用户名已存在', 'gjcf/signup/index', 0, 1);
        }

        if(!empty($referee)) {
            if(empty(UserModel::where('id', $referee)->find())) {
                $this->error('推荐码有误', 'gjcf/signup/index', 0, 1);
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
        $user->hasinvest = 0;
        $result = $this->validate($user, 'User');
        if(true !== $result){
            return $result;
        }
        $user->allowField(true)->save();

        //ydcrecord
        YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $user->freezenydc, 8);


        $this->success('注册成功', 'gjcf/login/index', 0, 1);
    }
}