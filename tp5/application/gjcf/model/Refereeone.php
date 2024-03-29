<?php
namespace app\gjcf\model;

use think\Model;

class Refereeone extends Model{
    static public function AddRefereeone($userid){
        $refereeone = Refereeone::where('userid', $userid)
            ->whereTime('refereeonetoday', 'today')
            ->find();

        if(empty($refereeone)){
            $refereeone = new Refereeone();
            $refereeone->refereecount = 1;
            $refereeone->refereeonetoday = date('Y-m-d');
            $refereeone->userid = $userid;
            $refereeone->allowField(true)->save();
        }else{
            $refereeone->refereecount += 1;
            $refereeone->allowField(true)->save();
        }
    }


}