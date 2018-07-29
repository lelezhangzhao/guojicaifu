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
            $json_arr = ['code' => 302, 'msg' => '用户名和手机号不匹配'];
//            return '用户名和手机号不匹配';
        }else{
            Session::set('fixedusername', $username);
            Telidentify::GetTelIdentify($tel);
            $json_arr = ['code' => 0, 'msg' => '验证码已发送'];
        }
        return json_encode($json_arr);

//        $url = 'http://tp5.com/index.php/gjcf/post/index?mobile='.$tel;
//        $ch = curl_init ();
//        curl_setopt ( $ch, CURLOPT_URL, $url );
//        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
//        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
//        curl_setopt ( $ch, CURLOPT_POST, 1 ); //启用POST提交
//        $file_contents = curl_exec ( $ch );
//        Session::set('telidentify', $file_contents);
//        Session::set('fixedusername', $username);
//        curl_close ( $ch );
//        return Session::get('telidentify');

        //发送验证码


    }

    public function NewPasswordOk(Request $request){
        $telidentify = $request->param('telidentify');
        $newpassword = $request->param('newpassword');

        if(!Telidentify::TelIdentifyOk($telidentify)){
            $json_arr = ['code' => 303, 'msg' => '手机验证码错误'];
        }else{
            $username = Session::get('fixedusername');
            $user = UserModel::where('username', $username)->find();
            $user->password = $newpassword;
            $result = $this->validate($user, 'User');
            if(true !== $result) {
                $json_arr = ['code' => 400, 'msg' => $result];
            } else {
                $user->allowField(true)->save();
            }
            Session::delete('fixedusername');
            $json_arr = ['code' => 0, 'msg' => '密码更新成功'];
        }
        return json_encode($json_arr);
    }
}