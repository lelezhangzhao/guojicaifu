<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\model\Signrecord as SignrecordModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\model\User as UserModel;

use app\gjcf\api\Helper as HelperApi;

class Sign extends Controller{

    public function Sign(){
        HelperApi::TestLoginAndStatus($this);

        $userid = Session::get('userid');
        $signrecord = SignrecordModel::where('userid', $userid)
            ->whereTime('signtime', '>=', 'today')
            ->find();
        if(!empty($signrecord)){
            $this->error('今日已签到', 'gjcf/index/index', 0, 1);
        }

        //signrecord
        SignrecordModel::AddSignRecord(date('Y-m-d H:i:s'), $userid);

        //ydcrecord
        YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $userid, 10, 3);

        //user
        $user = UserModel::get($userid);
        $user->freezenydc += 10;
        $user->allowField(true)->save();

        $this->success('签到成功', 'gjcf/index/index', 0, 1);

    }
}
