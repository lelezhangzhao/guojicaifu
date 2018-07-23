<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\gjcf\api\Helper as HelperApi;
use app\gjcf\model\User as UserModel;
use app\gjcf\model\Withdrawrecord as WithdrawrecordModel;

class Withdraw extends Controller{
    public function Index(){
        HelperApi::TestAccountInfo($this);
        HelperApi::TestAccountInfo($this);

        return $this->fetch();
    }

    public function GetWithdrawYdc(){
        HelperApi::TestAccountInfo($this);
        HelperApi::TestAccountInfo($this);

        $user = UserModel::get(Session::get('userid'));

        return $user->usableydc;
    }

    public function Withdraw(Request $request){
        HelperApi::TestAccountInfo($this);
        HelperApi::TestAccountInfo($this);

        $withdrawydc = $request->param('withdraw');
        if(!is_numeric($withdrawydc)){
            $this->error('输入错误', 'gjcf/withdraw/index', 0, 1);
        }

        if($withdrawydc < 5){
            $this->error('5元起提', 'gjcf/withdraw/index', 0, 1);
        }

        $user = UserModel::get(Session::get('userid'));
        if($withdrawydc > $user->usableydc){
            $this->error('可用额度不足', 'gjcf/withdraw/index', 0, 1);
        }

        //user
        $user->usableydc -= $withdrawydc;
        $user->allowField(true)->save();
        //withdrawrecord
        WithdrawrecordModel::AddWithdrawrecord($user->id, $withdrawydc, 0);

        $this->success('操作成功，等待后台处理', 'gjcf/withdraw/index', 0, 1);

  }


}