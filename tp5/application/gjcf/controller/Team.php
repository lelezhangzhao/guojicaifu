<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\model\User as UserModel;
use app\gjcf\model\Refereeone as RefereeoneModel;

use app\gjcf\api\Helper as HelperApi;

class Team extends Controller
{

    public function Index()
    {
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
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

        $refereetwocount = 0;
        $refereethreecount = 0;

        echo '<?xml version="1.0" encoding="gb2312"?> ';
        echo '<myteam id="' . $user->id . '" referee="-1" username="' . $user->username . '">';

        $refereeone = UserModel::where('referee', Session::get('userid'))
            ->select();

        $refereeonecount = count($refereeone);

        foreach ($refereeone as $oneitem) {
            echo '<firstitem id="' . $oneitem->id . '" referee="' . $oneitem->referee . '" username="' . $oneitem->username . '" hasinvest="' . $oneitem->hasinvest . '">';


            //二级代理
            $refereetwo = UserModel::where('referee', $oneitem->id)
                ->select();
            $refereetwocount += count($refereetwo);

            foreach ($refereetwo as $twoitem) {
                echo '<seconditem id="' . $twoitem->id . '" referee="' . $twoitem->referee . '" username="' . $twoitem->username . '" hasinvest="' . $twoitem->hasinvest . '">';



                //三级代理
                $refereethree = UserModel::where('referee', $twoitem->id)
                    ->select();
                $refereethreecount += count($refereethree);

                foreach ($refereethree as $threeitem) {
                    echo '<thirditem id="' . $threeitem->id . '" referee="' . $threeitem->referee . '" username="' . $threeitem->username . '" hasinvest="' . $threeitem->hasinvest . '"/>';
                }
                echo '</seconditem>';
            }
            echo '</firstitem>';
        }


        //今日激活人数
        $refereeone = RefereeoneModel::where('userid', $user->id)
            ->whereTime('refereeonetoday', '>=', 'today')
            ->find();
        if(empty($refereeone)){
            $todayrefereeonecount = 0;
        }else{
            $todayrefereeonecount = $refereeone->refereecount;
        }

        echo '<referee referee="' . $user->referee . '" onecount="' . $refereeonecount . '" twocount="' . $refereetwocount . '" threecount="' . $refereethreecount . '" todayonecount="' . $todayrefereeonecount . '" />';


        echo '</myteam>';


    }

}

