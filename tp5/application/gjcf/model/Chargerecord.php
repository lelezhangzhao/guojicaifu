<?php
namespace app\gjcf\model;

use think\Model;

class Chargerecord extends Model{

    static public function AddChargeRecord($userid, $ydc, $status){
        $chargerecord = new Chargerecord();
        $chargerecord -> ydc = $ydc;
        $chargerecord -> status = $status;
        $chargerecord -> userid = $userid;
        $chargerecord->allowField(true)->save();
    }
}