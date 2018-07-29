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
        HelperApi::TestLoginAndStatus($this);
        HelperApi::TestAccountInfo($this);

        return $this->fetch();
    }

    public function GetWithdrawYdc(){
        HelperApi::TestLoginAndStatus($this);
        HelperApi::TestAccountInfo($this);

        $user = UserModel::get(Session::get('userid'));


        return $user->usableydc;
    }

    public function Withdraw(Request $request){
        HelperApi::TestLoginAndStatus($this);
        HelperApi::TestAccountInfo($this);

        $withdrawydc = $request->param('ydc');
        if(!is_numeric($withdrawydc)){
            $json_arr = ['code' => 305, 'msg' => '提现数值错误'];
            return json_encode($json_arr);

//            $this->error('输入错误', 'gjcf/withdraw/index', 0, 1);
        }

        if($withdrawydc < 5){
            $json_arr = ['code' => 306, 'msg' => '5元起提'];
            return json_encode($json_arr);

//            $this->error('5元起提', 'gjcf/withdraw/index', 0, 1);
        }

        $user = UserModel::get(Session::get('userid'));
        if($withdrawydc > $user->usableydc){
            $json_arr = ['code' => 200, 'msg' => '可用余额不足'];
            return json_encode($json_arr);
//            $this->error('可用额度不足', 'gjcf/withdraw/index', 0, 1);
        }

//        if($user->hasinvest === 0){
//            $this->error('用户未投资，不可提现', 'gjcf/invest/index', 0, 1);
//        }
        //user
        $user->usableydc -= $withdrawydc;
        $user->allowField(true)->save();
        //withdrawrecord
        WithdrawrecordModel::AddWithdrawrecord($user->id, $withdrawydc, 0);

        $json_arr = ['code' => 0, 'msg' => '操作成功，等待后台处理'];
        return json_encode($json_arr);
//        $this->success('操作成功，等待后台处理', 'gjcf/withdraw/index', 0, 1);

  }


}