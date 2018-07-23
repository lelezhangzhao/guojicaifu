<?php
namespace app\gjcf\model;

use think\Model;

class Dayprofit extends Model{

    static public function AddDayProfit($ydc){
        $dayprofit = new Dayprofit();
        $dayprofit->today = date('Y-m-d');
        $dayprofit->ydc = $ydc;
        $dayprofit->allowField(true)->save();

    }

}