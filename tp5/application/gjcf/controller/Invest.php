<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Session;
use think\Db;
use think\Request;

use app\gjcf\api\Helper as HelperApi;
use app\gjcf\model\User as UserModel;
use app\gjcf\model\Project as ProjectModel;
use app\gjcf\model\Investrecord as InvestrecordModel;
use app\gjcf\model\Refereeprofit as RefereeprofitModel;
use app\gjcf\model\Refereerecord as RefereerecordModel;
use app\gjcf\model\Ydcrecord as YdcrecordModel;
use app\gjcf\model\Refereeone as RefereeoneModel;


class Invest extends Controller{
    public function InvestProject(Request $request){ //10,1,11,9,12,0,13

        $status = HelperApi::TestLoginAndStatus($this);
        if($status !== true){
            return $status;
        }

        $accountstatus = HelperApi::TestAccountInfo($this);
        if($accountstatus !== true){
            return $accountstatus;
        }

        $projectid = $request->param('projectid');

        $userid = Session::get('userid');

        $project = ProjectModel::get($projectid);

        if($project['status'] === 1){
            $json_arr = ['code' => 601, 'msg' => '项目未开始'];
            return json_encode($json_arr);
        }else if($project['status'] === 2){
            $json_arr = ['code' => 602, 'msg' => '项目已结束'];
            return json_encode($json_arr);
        }


        $user = UserModel::get($userid);
        if($project['status'] === 0){
            //可用ydc类型
            if ($user->usableydc < $project->investydc) {
                $json_arr = ['code' => 200, 'msg' => '可用余额不足'];
                return json_encode($json_arr);
            }

        }else if($project['status'] === 1) {
            //体验金类型
            if ($user->tasteydc < $project->investydc) {
                $json_arr = ['code' => 201, 'msg' => '可用体验金不足'];
                return json_encode($json_arr);
            }

        }


        Db::startTrans();
        try {
            //当前项目是否可投资
            $project_trans = Db::name('project')->lock(true)->where('id', $projectid)->find();
            $user_trans = Db::name('user')->lock(true)->where('id', $userid)->find();



            if ($project_trans['remaininvest'] < $project_trans['investydc']) {
                $project_trans['status'] = 2;
                throw new \Exception('项目额度不足', 600);
            }else{
                //项目类型
                if($project_trans['ydctype'] === 0){
                    //可用ydc类型
                    //用户余额
                    $user_trans['usableydc'] -= $project_trans['investydc'];

                }else if($project_trans['ydctype'] === 1) {
                    //体验金类型
                    if ($user_trans['tasteydc'] < $project_trans['investydc']) {
                        throw new \Exception('可用体验金不足', 201);
                    }
                    //用户余额
                    $user_trans['tasteydc'] -= $project_trans['investydc'];

                }

                $project_trans['curinvest'] += $project_trans['investydc'];
                $project_trans['remaininvest'] -= $project_trans['investydc'];

                $project_trans['projectpercent'] = $project_trans['curinvest'] / $project_trans['totalinvest'] * 100 . '%';
                Db::name('project')->update($project_trans, ['curinvest' => $project_trans['curinvest'], 'remaininvest' => $project_trans['remaininvest']]);
                Db::name('user')->update($user_trans);

                Db::commit();
            }
        } catch (\Exception $e) {
            $json_arr = ['code' => $e->getCode(), 'msg' => $e->getMessage()];
            Db::rollback();
            return json_encode($json_arr);
        }

        //第一次投资，该用户加入refereeone
        if($project->ydctype === 0 && $user->hasinvest === 0){
            //refereeone
            RefereeoneModel::AddRefereeone($user->referee);
            $user->activetime = date('Y-m-d');
            $user->hasinvest = 1;
            $user->allowField(true)->save();
        }


        //invest
        $investrecord = new InvestrecordModel();
        $investrecord->projectid = $project->id;
        $investrecord->userid = $user->id;
        $investrecord->status = 0;
        $investrecord->paydays = 0;
        $investrecord->allowField(true)->save();

        //三级推荐奖
        $refereeprofit = RefereeprofitModel::where('id', 1)->find();
        $refereeoneuser = UserModel::where('id', $user->referee)->find();
        if(!empty($refereeoneuser)) {
            $refereeoneydc = $project->investydc * $refereeprofit->refereeone;
            RefereerecordModel::AddRefereerecord($refereeoneuser->id, 0, $user->id, $projectid, $refereeoneydc);
            $refereeoneuser->usableydc += $refereeoneydc;
            $releasefreezenydc = 0;
            if ($refereeoneuser->freezenydc > 0) {
                if ($refereeoneuser->freezenydc > $refereeoneydc) {
                    $releasefreezenydc = $refereeoneydc;
                } else {
                    $releasefreezenydc = $refereeoneuser->freezenydc;
                }
                $refereeoneuser->freezenydc -= $releasefreezenydc;
                $refereeoneuser->usableydc += $releasefreezenydc;
            }
            $refereeoneuser->allowField(true)->save();
            YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $refereeoneuser->id, $refereeoneydc, 4);

            $refereetwouser = UserModel::where('id', $refereeoneuser->referee)->find();
            if (!empty($refereetwouser)) {
                $refereetwoydc = $project->investydc * $refereeprofit->refereetwo;
                RefereerecordModel::AddRefereerecord($refereetwouser->id, 1, $user->id, $projectid, $refereetwoydc);
                $refereetwouser->usableydc += $refereetwoydc;
                $releasefreezenydc = 0;
                if ($refereetwouser->freezenydc > 0) {
                    if ($refereetwouser->freezenydc > $refereetwoydc) {
                        $releasefreezenydc = $refereetwoydc;
                    } else {
                        $releasefreezenydc = $refereetwouser->freezenydc;
                    }
                    $refereetwouser->freezenydc -= $releasefreezenydc;
                    $refereetwouser->usableydc += $releasefreezenydc;
                }

                $refereetwouser->allowField(true)->save();
                YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $refereetwouser->id, $refereetwoydc, 5);

                $refereethreeuser = UserModel::where('id', $refereetwouser->referee)->find();
                if (!empty($refereethreeuser)) {
                    $refereethreeydc = $project->investydc * $refereeprofit->refereethree;
                    RefereerecordModel::AddRefereerecord($refereethreeuser->id, 1, $user->id, $projectid, $refereethreeydc);
                    $refereethreeuser->usableydc += $refereethreeydc;
                    $releasefreezenydc = 0;

                    if ($refereethreeuser->freezenydc > 0) {
                        if ($refereethreeuser->freezenydc > $refereethreeydc) {
                            $releasefreezenydc = $refereethreeydc;
                        } else {
                            $releasefreezenydc = $refereethreeuser->freezenydc;
                        }
                        $refereethreeuser->freezenydc -= $releasefreezenydc;
                        $refereethreeuser->usableydc += $releasefreezenydc;
                    }

                    $refereethreeuser->allowField(true)->save();
                    YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $refereethreeuser->id, $refereethreeydc, 6);
                }
            }
        }
        $json_arr = ['code' => 0, 'msg' => '投资成功', 'projectpercent' => $project->projectpercent, 'remaininvest' => $project->remaininvest];
        return json_encode($json_arr);
    }

}