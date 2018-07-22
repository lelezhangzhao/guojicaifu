<?php

namespace app\gjcf\controller;


use think\Controller;
use think\Session;

use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\api\Helper as HelperApi;

class Ydcrecord extends Controller{
    public function Index(){
        //充值
        //提现
        //正常收益
        //签到
        //推荐收益
        //分红
        HelperApi::TestLoginAndStatus($this);

        $ydcrecord = YdcrecordModel::where('userid', Session::get('userid'))
            ->order('createtime', 'desc')
            ->paginate(10);


        $this->assign('ydcrecordlist', $ydcrecord);
        return $this->fetch();
    }
}