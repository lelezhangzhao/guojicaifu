<?php
namespace app\gjcf\model;

use think\Model;

class Bonusrecord extends Model{

    static public function AddBonusrecord($datetime, $userid, $ydc, $type){
        $bonusrecord = new Bonusrecord();
        $bonusrecord->bonustime = $datetime;
        $bonusrecord->userid = $userid;
        $bonusrecord->type = $type;
        $bonusrecord->ydc = $ydc;
        $bonusrecord->allowField(true)->save();

    }
}