<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Request;

use app\gjcf\model\User as UserModel;

class Forgetpassword extends Controller{
    public function Index(){
        return $this->fetch();
    }

    public function GetTelIdentify(Request $request){
        $username = $request->param('username');
        $tel = $request->param('tel');

        //username匹配tel
        $result = UserModel::where(['username' => $username, 'tel' => $tel])->find();
        if(empty($result)) {
            return '用户名和手机号不匹配';
        }
        $url = 'http://tp5.com/index.php/gjcf/post/index?mobile='.$tel;
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
        curl_setopt ( $ch, CURLOPT_POST, 1 ); //启用POST提交
        $file_contents = curl_exec ( $ch );
        Session::set('telidentify', $file_contents);
        Session::set('fixedusername', $username);
        curl_close ( $ch );
//        return Session::get('telidentify');

        //发送验证码


    }

    public function NewPasswordOk(Request $request){
        $identify = $request->param('telidentify');


        if((int)$identify !== (int)Session::get('identify')) {
            $this->error('验证码错误');
        }
        Session::delete('identify');

        $newpassword = $request->param('newpassword');
        $username = Session::get('fixedusername');

        $user = UserModel::where('username', $username)->find();
        $user->password = $newpassword;
        $result = $this->validate($user, 'User');
        if(true !== $result) {
            return $result;
        } else {
            $user->allowField(true)->save();
        }
        Session::delete('fixedusername');
        $this->success('密码更新成功', 'gjcf/login/index');
    }
}