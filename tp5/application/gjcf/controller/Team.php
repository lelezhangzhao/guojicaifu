<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\model\User as UserModel;

use app\gjcf\api\Helper as HelperApi;

class Team extends Controller{
    public function Index(){
        HelperApi::TestLoginAndStatus($this);

        //上级
        $user = UserModel::where('id', Session::get('userid'))->find();
        $this->assign('refereepre', $user->referee);

        $refereeonecount = 0;
        $refereetwocount = 0;
        $refereethreecount = 0;

        //一级代理
        $refereeone = UserModel::where('referee', Session::get('userid'))->select();
        $refereeonecount = count($refereeone);

        $this->assign('refereeonecount', $refereeonecount);
        foreach($refereeone as $oneitem){
            //二级代理
            $refereetwo = UserModel::where('referee', $oneitem->id)->select();
            $refereetwocount += count($refereetwo);

            foreach($refereetwo as $twoitem){
                //三级代理
                $refereethree = UserModel::where('referee', $twoitem->id)->select();
                $refereethreecount += count($refereethree);
            }
        }
        $this->assign('refereetwocount', $refereetwocount);
        $this->assign('refereethreecount', $refereethreecount);

        return $this->fetch();
    }
}