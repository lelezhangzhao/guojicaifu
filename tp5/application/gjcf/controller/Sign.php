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
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        $userid = Session::get('userid');
        $signrecord = SignrecordModel::where('userid', $userid)
            ->whereTime('signtime', '>=', 'today')
            ->find();
        if(!empty($signrecord)){
            $json_arr = ['code' => 104, 'msg' => '今日已签到'];
            return json_encode($json_arr);
        }

        //signrecord
        SignrecordModel::AddSignRecord(date('Y-m-d H:i:s'), $userid);

        //ydcrecord
        YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $userid, 10, 3);

        //user
        $user = UserModel::get($userid);
        $user->freezenydc += 10;
        $user->allowField(true)->save();

        $json_arr = ['code' => 0, 'msg' => '签到成功'];
        return json_encode($json_arr);

    }
}
