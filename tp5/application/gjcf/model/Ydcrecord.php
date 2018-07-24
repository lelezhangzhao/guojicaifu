<?php
namespace app\gjcf\model;

use think\Model;

class Ydcrecord extends Model{

    protected function getYdcrecordtypeAttr($value){
        $types = [0 => '充值', 1 => '提现', 2 => '正常收益', 3 => '签到', 4 => '一级推荐奖', 5 => '二级推荐奖', 6 => '三级推荐奖', 7 => '分红', 8 => '注册'];
        return $types[$value];
    }

    static public function AddYdcRecord($date, $userid, $ydc, $ydcrecordtype){
        //ydcrecord
        $ydcrecord = new Ydcrecord();
        $ydcrecord->createtime = $date;
        $ydcrecord->userid = $userid;
        $ydcrecord->ydc = $ydc;
        $ydcrecord->ydcrecordtype = $ydcrecordtype;
        $ydcrecord->allowField(true)->save();
    }

}