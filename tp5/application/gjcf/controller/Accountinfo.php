<?php

namespace app\gjcf\controller;

use think\console\command\Help;
use think\Controller;
use think\Request;
use think\Session;

use app\gjcf\model\User as UserModel;

use app\gjcf\api\Helper as HelperApi;


class Accountinfo extends Controller{
    public function Index(){
        HelperApi::TestLoginAndStatus($this);

        $user = UserModel::get(Session::get('userid'));

        $this->assign('accountinfoname', $user->name);
        $this->assign('accountinfoalipaynum', $user->alipaynum);

        return $this->fetch();
    }

    public function GetTelIdentify(){
        HelperApi::TestLoginAndStatus($this);

        $user = UserModel::get(Session::get('userid'));
        $tel = $user->tel;
        Telidentify::GetTelIdentify($tel);
    }

    public function SaveAccountInfo(Request $request){
        HelperApi::TestLoginAndStatus($this);

        $name = $request->param('name');
        $alipaynum = $request->param('alipaynum');
        $telidentify = $request->param('telidentify');

        if(HelperApi::IsOpenTelIdentify()){
            if(!Telidentify::TelIdentifyOk($telidentify)){
                return '验证码错误';
            }
        }
        $user = UserModel::get(Session::get('userid'));
        $user->name = $name;
        $user->alipaynum = $alipaynum;
        $user->allowField(true)->save();
        return '保存成功';

    }
}