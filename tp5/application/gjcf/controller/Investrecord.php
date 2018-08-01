<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;
use think\Db;
use think\Request;

use app\gjcf\api\Helper as HelperApi;

use app\gjcf\model\Investrecord as InvestrecordModel;


class Investrecord extends Controller{
    public function Index(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        return $this->fetch();

    }

    public function GetInvestRecord(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        $limit = $request->param('limit');
        $page = $request->param('page');

        $tol = ($page - 1) * $limit;

        $userid = Session::get('userid');

        $resultcount = InvestrecordModel::where('userid', $userid)->count();

        $results = Db::view('investrecord')
            ->view('project', 'caption, investydc, profitydc, balancedays, balanceperday', 'project.id = investrecord.projectid')
            ->where('investrecord.userid', $userid)
            ->limit($tol, $limit)
            ->select();



        $list["msg"]="";
        $list["code"]=0;
        $list["count"]=$resultcount;
        $list["data"]=$results;
        if(empty($results)){
            $list["msg"]="暂无数据";
        }

        return json($list);

//        echo '{"code":0,"msg":"","count":'.$resultcount.',"data":[';
//        foreach($results as $result){
//            echo json_encode($result);
//            if($result['id'] !== $results[count($results) - 1]['id']){
//                echo ',';
//            }
//        }
//        echo ']}';
    }
}