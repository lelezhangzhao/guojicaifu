<?php
namespace app\gjcf\model;

use think\Model;

class Refereerecord extends Model{

    static public function AddRefereerecord($userid, $status, $anotherid, $projectid, $ydc){
    $refereerecord = new Refereerecord();
    $refereerecord->userid = $userid;
    $refereerecord->status = $status;
    $refereerecord->anotherid = $anotherid;
    $refereerecord->projectid = $projectid;
    $refereerecord->ydc = $ydc;
    $refereerecord->allowField(true)->save();
}
}