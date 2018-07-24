<?php
namespace app\gjcf\model;

use think\Model;

class Signrecord extends Model{
    static public function AddSignRecord($date, $userid){
        //ydcrecord
        $signrecord = new Signrecord();
        $signrecord->signtime = $date;
        $signrecord->userid = $userid;
        $signrecord->allowField(true)->save();
    }

}