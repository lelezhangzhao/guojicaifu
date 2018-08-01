<?php
namespace app\gjcf\controller;



use think\Session;
use think\Controller;
use think\Request;

use app\gjcf\model\Refereeone as RefereeoneModel;
use app\gjcf\model\Dayprofit as DayprofitModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\model\Bonusrecord as BonusrecordModel;
use app\gjcf\model\User as UserModel;
use app\gjcf\model\Bonusydc as BonusydcModel;

use app\gjcf\api\Helper as HelperApi;

class Bonus extends Controller{
    public function Index(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        return $this->fetch();

    }

    public function GetBonus(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        $dayprofit = DayprofitModel::whereTime('dayprofittoday', '>=', 'today')->find();
        if(empty($dayprofit)){
            $bonusprofit = 0;
        }else{
            $bonusprofit = $dayprofit->ydc;
        }

        $threeprofit = $bonusprofit * 0.2;
        $sixprofit = $bonusprofit * 0.3;
        $nineprofit = $bonusprofit * 0.5;


        $threecount = $this->GetBonusThree();
        $sixcount = $this->GetBonusSix();
        $ninecount = $this->GetBonusNine();

        $onethreeprofit = 0;
        $onesixprofit = 0;
        $onenineprofit = 0;

        if($threecount !== 0){
            $onethreeprofit = $threeprofit / $threecount;
        }
        if($sixcount !== 0){
            $onesixprofit = $sixprofit / $sixcount;
        }
        if($ninecount !== 0){
            $onenineprofit = $nineprofit / $ninecount;
        }



        $json_arr = array(
            ['count' => 3, 'profit' => $threeprofit, 'profitcount' => $threecount, 'oneprofit' => $onethreeprofit],
            ['count' => 6, 'profit' => $sixprofit, 'profitcount' => $sixcount, 'oneprofit' => $onesixprofit],
            ['count' => 9, 'profit' => $nineprofit, 'profitcount' => $ninecount, 'oneprofit' => $onenineprofit]
        );
        $list["msg"]="";
        $list["code"]=0;
        $list["count"]=3;
        $list["data"]=$json_arr;

        return json($list);
    }

    private function GetBonusThree(){
    $refereethree = RefereeoneModel::whereTime('refereeonetoday', 'today')
        ->where('refereecount', 'between', [3, 5])
        ->select();

    return count($refereethree);
//    if(!empty($refereethree)){
//        $threeprofit = $threeprofittotal / count($refereethree);
//
//        foreach ($refereethree as $onerefereethree) {
//            //user
//            $user = UserModel::where('id', $onerefereethree->userid)->find();
//            $user->usableydc += $threeprofit;
//            $user->allowField(true)->save();
//
//            //bonusrecord
//            BonusrecordModel::AddBonusrecord($datetime, $user->id, $threeprofit, 0);
//
//            //ydcrecord
//            YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $threeprofit, 7);
//        }
//    }
}

    private function GetBonusSix(){
        $refereesix = RefereeoneModel::whereTime('refereeonetoday', 'today')
        ->where('refereecount', 'between', [6, 8])
        ->select();

        return count($refereesix);
//        if(!empty($refereesix)){
//            $sixprofit = $sixprofittotal / count($refereesix);
//
//            foreach ($refereesix as $onerefereesix) {
//                //user
//                $user = UserModel::where('id', $onerefereesix->userid)->find();
//                $user->usableydc += $sixprofit;
//                $user->allowField(true)->save();
//
//                //bonusrecord
//                BonusrecordModel::AddBonusrecord($datetime, $user->id, $sixprofit, 0);
//
//                //ydcrecord
//                YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $sixprofit, 7);
//            }
//        }
    }

    private function GetBonusNine(){
        $refereenine = RefereeoneModel::whereTime('refereeonetoday', 'today')
        ->where('refereecount', '>=', 9)
        ->select();

        return count($refereenine);
//        if(!empty($refereenine)){
//            $nineprofit = $nineprofittotal / count($refereenine);
//
//            foreach ($refereenine as $onerefereenine) {
//                //user
//                $user = UserModel::where('id', $onerefereenine->userid)->find();
//                $user->usableydc += $nineprofit;
//                $user->allowField(true)->save();
//
//                //bonusrecord
//                BonusrecordModel::AddBonusrecord($datetime, $user->id, $nineprofit, 0);
//
//                //ydcrecord
//                YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $nineprofit, 7);
//            }
//        }
    }

}