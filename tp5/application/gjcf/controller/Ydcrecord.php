<?php

namespace app\gjcf\controller;


use think\Controller;
use think\Session;
use think\Request;
use think\Db;

use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\api\Helper as HelperApi;

class Ydcrecord extends Controller{
    public function Index(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        return $this->fetch();
    }

    public function GetYdcRecord(Request $request){
        //充值
        //提现
        //正常收益
        //签到
        //推荐收益
        //分红
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        $page = $request->param('page');
        $limit = $request->param('limit');

        $tol = ($page - 1) * $limit;

        $ydcrecordcount = Db::name('ydcrecord')
            ->where('userid', Session::get('userid'))
            ->count();

        $ydcrecords = Db::name('ydcrecord')
            ->where('userid', Session::get('userid'))
            ->limit($tol, $limit)
            ->order('createtime', 'desc')
            ->select();

        $list["msg"]="";
        $list["code"]=0;
        $list["count"]=$ydcrecordcount;
        $list["data"]=$ydcrecords;
        if(empty($ydcrecords)){
            $list["msg"]="暂无数据";
        }

        return json($list);
//        echo '{"code":0,"msg":"","count":'.$ydcrecordcount.',"data":[';
//        foreach($ydcrecords as $ydcrecord){
//            echo json_encode($ydcrecord);
//            if($ydcrecord['id'] !== $ydcrecords[count($ydcrecords) - 1]['id']){
//                echo ',';
//            }
//        }
//        echo ']}';




    }
    
}