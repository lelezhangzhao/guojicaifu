<?php

namespace app\gjcf\controller;

use think\Controller;
use think\Session;

use app\gjcf\api\Helper as HelperApi;

use app\gjcf\model\User as UserModel;
use app\gjcf\model\Investrecord as InvestrecordModel;
use app\gjcf\model\Project as ProjectModel;

class Balance extends Controller{
    public function Index(){
        if(!HelperApi::IsAdmin()){
            HelperApi::SetUserDisabled(Session::get('userid'), '违规访问balance');
        }

        return $this->fetch();
    }

    public function Balance(){
        $investrecord = InvestrecordModel::where('status', 0)->select();

        foreach($investrecord as $oneinvestrecord){
            //更新investrecord
            $project = ProjectModel::where('id', $oneinvestrecord->projectid)->find();
            $invest = InvestrecordModel::where('id', $oneinvestrecord->id)->find();
            $diffday = (strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($invest->investtime)))) / 86400;

            if($diffday > $invest->paydays){
                $invest->paydays += 1;
                if($invest->paydays === $project->balancedays){
                    $invest->status = 1;
                }
            }
            $invest->allowField(true)->save();

            //更新user
            $user = UserModel::where('id', $invest->userid)->find();
            $user->usableydc += $project->balanceperday;
            $user->allowField(true)->save();

            //ydcrecord
            YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $user->id, $project->balanceperday, 2);

        }

        $this->success('结算完成', 'gjcf/admin/index', 0, 1);

    }
}