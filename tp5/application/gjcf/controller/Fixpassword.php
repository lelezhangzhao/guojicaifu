<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\gjcf\api\Helper as HelperApi;
use app\gjcf\model\User as UserModel;

class Fixpassword extends Controller{
    public function Index(){
        HelperApi::TestLoginAndStatus($this);

        return $this->fetch();
    }

    public function FixPassword(Request $request){
        HelperApi::TestLoginAndStatus($this);

        $userid = Session::get('userid');
        $oldpassword = $request->param('oldpassword');
        $newpassword = $request->param('newpassword');

        //验证原密码
        $user = UserModel::where('id', $userid)->find();

        if($user->password !== $oldpassword){
            ReturnCodeMsg(103, '账户信息未完善');

//            $this->error('原密码错误', 'gjcf/fixpassword/index', 0, 1);
        }

        //新旧密码不能相同
        if($oldpassword === $newpassword){
            ReturnCodeMsg(307, '新旧密码不能相同');
//            $this->error('新旧密码不能相同', 'gjcf/fixpassword/index', 0, 1);
        }
        $user->password = $newpassword;
        $result = $this->validate($user, 'User');
        if(true !== $result){
            return $result;
        }
        $user->allowField(true)->save();
        Session::delete("userid");
        ReturnCodeMsg(0, '密码更新成功，请重新登录');
//        $this->success('更新成功', 'gjcf/index/index', 0, 1);
    }

}