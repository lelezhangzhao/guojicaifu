<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;
use think\Db;

use app\gjcf\api\Helper as HelperApi;


class Investrecord extends Controller{
    public function Index(){
        HelperApi::TestLoginAndStatus($this);

        $userid = Session::get('userid');
        $result = Db::view('investrecord')
            ->view('project', 'caption, investydc, profitydc, balancedays, balanceperday', 'project.id = investrecord.projectid')
            ->where('investrecord.userid', $userid)
            ->select();

        $this->assign('investlist', $result);

        return $this->fetch();

    }
}