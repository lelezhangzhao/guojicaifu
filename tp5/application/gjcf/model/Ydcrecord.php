<?php
namespace app\gjcf\model;

use think\Model;

class Ydcrecord extends Model{

    protected function getTypeAttr($value){
        $types = [0 => '充值', 1 => '提现', 2 => '正常收益', 3 => '签到', 4 => '一级推荐奖', 5 => '二级推荐奖', 6 => '三级推荐奖', 7 => '分红'];
        return $types[$value];
    }

}