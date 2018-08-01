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

use app\gjcf\api\Helper as HelperApi;

class Bonusconfirm extends Controller{
    public function Index(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $isadmin = HelperApi::TestIsAdmin($this);
        if(true !== $isadmin){
            return $isadmin;
        }

        //从dayprofitmodel中获取今日分红
//        $bonusprofit = $request->param('bonusprofit');
//        DayprofitModel::AddDayProfit($bonusprofit);
        $dayprofit = DayprofitModel::whereTime('dayprofittoday', '>=', 'today')->find();
        if(empty($dayprofit)){
            $bonusprofit = 0;
        }else{
            $bonusprofit = $dayprofit->ydc;
        }


        $threeprofit = $bonusprofit * 0.2;
        $sixprofit = $bonusprofit * 0.3;
        $nineprofit = $bonusprofit * 0.5;

        $datetime = date('Y-m-d H:i:s');

        $this->BonusThree($datetime, $threeprofit);
        $this->BonusSix($datetime, $sixprofit);
        $this->BonusNine($datetime, $nineprofit);

        $this->success('分红完成', 'gjcf/admin/index', 0, 1);
    }

    private function BonusThree($datetime, $threeprofittotal){
    $refereethree = RefereeoneModel::whereTime('refereeonetoday', 'today')
        ->where('refereecount', 'between', [3, 5])
        ->select();

    if(!empty($refereethree)){
        $threeprofit = $threeprofittotal / count($refereethree);

        foreach ($refereethree as $onerefereethree) {
            //user
            $user = UserModel::where('id', $onerefereethree->userid)->find();
            $user->usableydc += $threeprofit;
            $user->allowField(true)->save();

            //bonusrecord
            BonusrecordModel::AddBonusrecord($datetime, $user->id, $threeprofit, 0);

            //ydcrecord
            YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $threeprofit, 7);
        }
    }
}

    private function BonusSix($datetime, $sixprofittotal){
        $refereesix = RefereeoneModel::whereTime('refereeonetoday', 'today')
        ->where('refereecount', 'between', [6, 8])
        ->select();

        if(!empty($refereesix)){
            $sixprofit = $sixprofittotal / count($refereesix);

            foreach ($refereesix as $onerefereesix) {
                //user
                $user = UserModel::where('id', $onerefereesix->userid)->find();
                $user->usableydc += $sixprofit;
                $user->allowField(true)->save();

                //bonusrecord
                BonusrecordModel::AddBonusrecord($datetime, $user->id, $sixprofit, 0);

                //ydcrecord
                YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $sixprofit, 7);
            }
        }
    }

    private function BonusNine($datetime, $nineprofittotal){
        $refereenine = RefereeoneModel::whereTime('refereeonetoday', 'today')
        ->where('refereecount', '>=', 9)
        ->select();

        if(!empty($refereenine)){
            $nineprofit = $nineprofittotal / count($refereenine);

            foreach ($refereenine as $onerefereenine) {
                //user
                $user = UserModel::where('id', $onerefereenine->userid)->find();
                $user->usableydc += $nineprofit;
                $user->allowField(true)->save();

                //bonusrecord
                BonusrecordModel::AddBonusrecord($datetime, $user->id, $nineprofit, 0);

                //ydcrecord
                YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $nineprofit, 7);
            }
        }
    }

    public function SetBonus(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        $isadmin = HelperApi::TestIsAdmin($this);
        if(true !== $isadmin){
            return $isadmin;
        }

        $bonusprofit = $request->param('bonusprofit');
        $dayprofit = DayprofitModel::whereTime('dayprofittoday', '>=', 'today')->find();
        if(empty($dayprofit)){
            DayprofitModel::AddDayProfit($bonusprofit);
        }else{
            $dayprofit->ydc = $bonusprofit;
            $dayprofit->allowField(true)->save();
        }
        $this->success('设置成功', 'gjcf/admin/index', 0, 1);
    }

}