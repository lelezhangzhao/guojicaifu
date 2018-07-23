<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\model\User as UserModel;

use app\gjcf\api\Helper as HelperApi;

class Team extends Controller{
    public function Index(){
        HelperApi::TestLoginAndStatus($this);

        $refereeone = UserModel::where('referee', Session::get('userid'))->select();

        $this->assign('refereeonecount', count($refereeone));


        $refereetwocount = 0;
        $refereethreecount = 0;
        foreach($refereeone as $oneitem){
            $refereetwo = UserModel::where('referee', $oneitem->id)->select();
            $refereetwocount += count($refereetwo);

            foreach($refereetwo as $twoitem){
                $refereethree = UserModel::where('referee', $twoitem->id)->select();
                $refereethreecount += count($refereethree);
            }
        }
        $this->assign('refereetwocount', $refereetwocount);
        $this->assign('refereethreecount', $refereethreecount);

        return $this->fetch();
    }
}