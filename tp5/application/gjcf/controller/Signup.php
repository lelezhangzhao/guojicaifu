<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;

use app\gjcf\model\User as UserModel;
use app\gjcf\model\Refereeone as RefereeoneModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\api\Helper as HelperApi;

class Signup extends Controller{
    public function Index(){
        return $this->fetch();
    }

    public function GetTelIdentify(Request $request){
        $tel = $request->param('tel');

        Telidentify::GetTelIdentify($tel);
        $json_arr = ['code' => 0, 'msg' => '验证码已发送'];
        return json_encode($json_arr);
    }


    public function Signup(Request $request){
        //先验证验证码
        if(!captcha_check($request->param('capcha'))) {
            $json_arr = ['code' => 300, 'msg' => '验证码错误'];
            return json_encode($json_arr);
        }

        //验证手机验证码
        $telidentify = $request->param('telidentify');
        if(!Telidentify::TelIdentifyOk($telidentify)){
            $json_arr = ['code' => 303, 'msg' => '手机验证码错误'];
            return json_encode($json_arr);
        }

        $username = $request->param('username');
        $password = $request->param('password');
        $tel = $request->param('tel');
        $referee = $request->param('referee');

        if(!empty(UserModel::where('username', $username)->find())){
            $json_arr = ['code' => 101, 'msg' => '用户名已存在'];
            return json_encode($json_arr);
        }
        if(empty(UserModel::where('id', $referee)->find())) {
            $json_arr = ['code' => 304, 'msg' => '推荐码有误'];
            return json_encode($json_arr);
        }

        $user = new UserModel;
        $user->username = $username;
        $user->password = $password;
        $user->tel = $tel;
        $user->referee = $referee;
        $user->status = 0;
        $user->role = 0;
        $user->usableydc = 0;
        $user->tasteydc = 1000;
        $user->freezenydc = 0;
        $user->singnuptime = date('Y-m-d H:i:s');
        $user->latestlogintime = date('Y-m-d H:i:s');
        $user->hasinvest = 0;
        $result = $this->validate($user, 'User');
        if(true !== $result){
            $json_arr = ['code' => 400, 'msg' => $result];
            return json_encode($json_arr);
        }

        $user->allowField(true)->save();

        //ydcrecord
        YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $user->tasteydc, 8);
        $json_arr = ['code' => 0, 'msg' => '注册成功'];
        return json_encode($json_arr);

    }
}