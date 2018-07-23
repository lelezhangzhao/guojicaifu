<?php
namespace app\gjcf\model;

use think\Model;

class Withdrawrecord extends Model{

    static public function AddWithdrawrecord($userid, $ydc, $status){
        $withdrawrecord = new Withdrawrecord();
        $withdrawrecord -> status = $status;
        $withdrawrecord -> ydc = $ydc;
        $withdrawrecord -> userid = $userid;
        $withdrawrecord->allowField(true)->save();

    }

}