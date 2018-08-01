<?php

namespace app\gjcf\model;

use think\Model;

class Bonusydc extends Model{

    static public function AddBonusYdc($ydc){
        $bonusydc = new Bonusydc();
        $bonusydc->bonustime = date('Y-m-d');
        $bonusydc->ydc = $ydc;
        $bonusydc->allowField(true)->save();
    }
}