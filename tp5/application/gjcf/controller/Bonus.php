<?php
namespace app\gjcf\controller;



use think\Session;
use think\Controller;

use app\gjcf\model\Refereeone as RefereeoneModel;
use app\gjcf\model\Dayprofit as DayprofitModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\model\Bonusrecord as BonusrecordModel;
use app\gjcf\model\User as UserModel;

use app\gjcf\api\Helper as HelperApi;

class Bonus extends Controller{
    public function Index(){
        HelperApi::TestLoginAndStatus($this);
        if(!HelperApi::IsAdmin()){
            HelperApi::SetUserDisabled(Session::get('userid'), $this);
        }

        $todayprofit = DayprofitModel::where('today' >= 'today')->select();

        $threeprofit = $todayprofit * 0.2;
        $sixprofit = $todayprofit * 0.3;
        $nineprofit = $todayprofit * 0.5;

        $this->BonusThree($threeprofit);
        $this->BonusSix($sixprofit);
        $this->BonusNine($nineprofit);
    }

    private function BonusThree($threeprofittotal){
    $refereethree = RefereeoneModel::where('today', '>=', 'today')
        ->where('refereecount', 'between', [3, 5])
        ->select();

    $threeprofit = $threeprofittotal / count($refereethree);

    foreach ($refereethree as $onerefereethree) {
        //user
        $user = UserModel::where('id', $onerefereethree->userid)->find();
        $user->usableydc += $threeprofit;
        $user->allowField(true)->save();

        //bonusrecord
        $bonusrecord = new BonusrecordModel();
        $bonusrecord->bonustime = date('Y-m-d H:i:s');
        $bonusrecord->userid = $user->id;
        $bonusrecord->type = 0;
        $bonusrecord->ydc = $threeprofit;
        $bonusrecord->allowField(true)->save();

        //ydcrecord
        $ydcrecord = new YdcrecordModel();
        $ydcrecord->createtime = date('Y-m-d H:i:s');
        $ydcrecord->userid = $user->id;
        $ydcrecord->ydc = $threeprofit;
        $ydcrecord->type = 7;
        $ydcrecord->allowField(true)->save();
    }
}

    private function BonusSix($sixprofittotal){
        $refereesix = RefereeoneModel::where('today', '>=', 'today')
        ->where('refereecount', 'between', [6, 8])
        ->select();

        $sixprofit = $sixprofittotal / count($refereesix);

        foreach ($refereesix as $onerefereesix) {
            //user
            $user = UserModel::where('id', $onerefereesix->userid)->find();
            $user->usableydc += $sixprofit;
            $user->allowField(true)->save();

            //bonusrecord
            $bonusrecord = new BonusrecordModel();
            $bonusrecord->bonustime = date('Y-m-d H:i:s');
            $bonusrecord->userid = $user->id;
            $bonusrecord->type = 0;
            $bonusrecord->ydc = $sixprofit;
            $bonusrecord->allowField(true)->save();

            //ydcrecord
            $ydcrecord = new YdcrecordModel();
            $ydcrecord->createtime = date('Y-m-d H:i:s');
            $ydcrecord->userid = $user->id;
            $ydcrecord->ydc = $sixprofit;
            $ydcrecord->type = 7;
            $ydcrecord->allowField(true)->save();
        }
    }

    private function BonusNine($nineprofittotal){
        $refereenine = RefereeoneModel::where('today', '>=', 'today')
        ->where('refereecount', '>=', 9)
        ->select();

        $nineprofit = $nineprofittotal / count($refereenine);

        foreach ($refereenine as $onerefereenine) {
            //user
            $user = UserModel::where('id', $onerefereenine->userid)->find();
            $user->usableydc += $nineprofit;
            $user->allowField(true)->save();

            //bonusrecord
            $bonusrecord = new BonusrecordModel();
            $bonusrecord->bonustime = date('Y-m-d H:i:s');
            $bonusrecord->userid = $user->id;
            $bonusrecord->type = 0;
            $bonusrecord->ydc = $nineprofit;
            $bonusrecord->allowField(true)->save();

            //ydcrecord
            $ydcrecord = new YdcrecordModel();
            $ydcrecord->createtime = date('Y-m-d H:i:s');
            $ydcrecord->userid = $user->id;
            $ydcrecord->ydc = $nineprofit;
            $ydcrecord->type = 7;
            $ydcrecord->allowField(true)->save();
        }
    }
}