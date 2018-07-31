<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\model\User as UserModel;

use app\gjcf\api\Helper as HelperApi;

class Team extends Controller
{
    public function Index()
    {
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

//        //上级
//        $user = UserModel::where('id', Session::get('userid'))->find();
//        $this->assign('refereepre', $user->referee);
//
//        $refereeonecount = 0;
//        $refereetwocount = 0;
//        $refereethreecount = 0;
//
//        //一级代理
//        $refereeone = UserModel::where('referee', Session::get('userid'))
//            ->where('hasinvest', 1)
//            ->select();
//        $refereeonecount = count($refereeone);
//
//        $this->assign('refereeonecount', $refereeonecount);
//        foreach ($refereeone as $oneitem) {
//            //二级代理
//            $refereetwo = UserModel::where('referee', $oneitem->id)
//                ->where('hasinvest', 1)
//                ->select();
//            $refereetwocount += count($refereetwo);
//
//            foreach ($refereetwo as $twoitem) {
//                //三级代理
//                $refereethree = UserModel::where('referee', $twoitem->id)
//                    ->where('hasinvest', 1)
//                    ->select();
//                $refereethreecount += count($refereethree);
//            }
//        }
//        $this->assign('refereetwocount', $refereetwocount);
//        $this->assign('refereethreecount', $refereethreecount);

        return $this->fetch();
    }

    public function GetTeam()
    {
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        //上级
        $user = UserModel::where('id', Session::get('userid'))->find();
        $this->assign('refereepre', $user->referee);

        $refereetwocount = 0;
        $refereethreecount = 0;

        echo '<?xml version="1.0" encoding="gb2312"?>';
        echo '<myteam id=' . $user->id . ' referee=-1 username="' . $user->username . '">';

        $refereeone = UserModel::where('referee', Session::get('userid'))
            ->where('hasinvest', 1)
            ->select();

        $refereeonecount = count($refereeone);

        foreach ($refereeone as $oneitem) {
            echo '<firstitem id=' . $oneitem->id . ' referee=' . $oneitem->referee . ' username="' . $oneitem->username . '">';

            //二级代理
            $refereetwo = UserModel::where('referee', $oneitem->id)
                ->where('hasinvest', 1)
                ->select();
            $refereetwocount += count($refereetwo);

            foreach ($refereetwo as $twoitem) {
                echo '<seconditem id=' . $twoitem->id . ' referee=' . $twoitem->referee . ' username="' . $twoitem->username . '">';

                //三级代理
                $refereethree = UserModel::where('referee', $twoitem->id)
                    ->where('hasinvest', 1)
                    ->select();
                $refereethreecount += count($refereethree);

                foreach ($refereethree as $threeitem) {
                    echo '<thirditem id=' . $threeitem->id . ' referee=' . $threeitem->referee . ' username="' . $threeitem->username . '"/>';
                }
                echo '</seconditem>';
            }
            echo '</firstitem>';
        }
        echo '</myteam>';

        $this->assign('refereeonecount', $refereeonecount);
        $this->assign('refereetwocount', $refereetwocount);
        $this->assign('refereethreecount', $refereethreecount);

    }
    public function GetTeam1()
    {


        $str = '<my>1</my>';

//        echo '<myteam id=1>';
//
//        echo '</myteam>';
        dump($str);
        echo '<my>1</my>';
    }

}

