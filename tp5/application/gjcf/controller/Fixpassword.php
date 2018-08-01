<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\gjcf\api\Helper as HelperApi;
use app\gjcf\model\User as UserModel;

class Fixpassword extends Controller{
    public function Index(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        return $this->fetch();
    }

    public function FixPassword(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        $userid = Session::get('userid');
        $oldpassword = $request->param('oldpassword');
        $newpassword = $request->param('newpassword');

        //验证原密码
        $user = UserModel::where('id', $userid)->find();

        if($user->password !== $oldpassword){
            return HelperApi::ReturnCodeMsg(308, '原密码错误');

//            $this->error('原密码错误', 'gjcf/fixpassword/index', 0, 1);
        }

        //新旧密码不能相同
        if($oldpassword === $newpassword){
            return HelperApi::ReturnCodeMsg(307, '新旧密码不能相同');
//            $this->error('新旧密码不能相同', 'gjcf/fixpassword/index', 0, 1);
        }
        $user->password = $newpassword;
        $result = $this->validate($user, 'User');
        if(true !== $result){
            return $result;
        }
        $user->allowField(true)->save();
        Session::delete("userid");
        return HelperApi::ReturnCodeMsg(0, '密码更新成功，请重新登录');
//        $this->success('更新成功', 'gjcf/index/index', 0, 1);
    }

}