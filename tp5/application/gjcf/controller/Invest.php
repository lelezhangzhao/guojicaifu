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
    public function InvestProject(Request $request){
        HelperApi::TestLoginAndStatus($this);

        $project_id = $request->param('projectid');
        $project = ProjectModel::where('id', $project_id)->find();
        if (empty($project)) {
            //违规访问，封号
            HelperApi::SetUserDisabled(Session::get('id'), '违规访问project');
        }
        HelperApi::TestAccountInfo($this);

        $user = UserModel::get(Session::get('userid'));
        if ($user->usableydc < $project->investydc) {
            $this->error('用户余额不足，先充值', '/index.php/gjcf/charge/index');
        }

        Db::startTrans();
        try {
            //当前项目是否可投资
            $trans_project = Db::name('project')->lock(true)->where('id', $project_id)->find();

            if ($trans_project['remaininvest'] < $trans_project['investydc']) {
                $trans_project['status'] = 2;
                $error = 'remainintvest is not valible';
                throw new Exception($error);
            }else{
                $trans_project['curinvest'] += $trans_project['investydc'];
                $trans_project['remaininvest'] -= $trans_project['investydc'];
                Db::name('project')->update($trans_project);

                Db::commit();
            }
        } catch (\Exception $e) {
            Db::rollback();
            throw $e;
        }

        //第一次投资，该用户加入refereeone
        if($user->hasinvest === 0){
            //refereeone
            RefereeoneModel::AddRefereeone($user->referee);
        }

        //用户余额
        $user->usableydc -= $project->investydc;
        $user->hasinvest = 1;
        $user->allowField(true)->save();

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
        if(!empty($refereeoneuser)){
            $refereeoneydc = $project->investydc * $refereeprofit->refereeone;
            RefereerecordModel::AddRefereerecord($refereeoneuser->id, 0, $user->id, $project_id, $refereeoneydc);
            $refereeoneuser->usableydc += $refereeoneydc;
            $releasefreezenydc = 0;
            if($refereeoneuser->freezenydc > 0){
                if($refereeoneuser->freezenydc > $refereeoneydc){
                    $releasefreezenydc = $refereeoneydc;
                }else{
                    $releasefreezenydc = $refereeoneuser->freezenydc;
                }
                $refereeoneuser->freezenydc -= $releasefreezenydc;
                $refereeoneuser->usableydc += $releasefreezenydc;
            }
            $refereeoneuser->allowField(true)->save();
            YdcrecordModel::AddYdcRecord(date('Y-m-d H:i:s'), $refereeoneuser->id, $refereeoneydc, 4);

            $refereetwouser = UserModel::where('id', $refereeoneuser->referee)->find();
            if(!empty($refereetwouser)){
                $refereetwoydc = $project->investydc * $refereeprofit->refereetwo;
                RefereerecordModel::AddRefereerecord($refereetwouser->id, 1, $user->id, $project_id, $refereetwoydc);
                $refereetwouser->usableydc += $refereetwoydc;
                $releasefreezenydc = 0;
                if($refereetwouser->freezenydc > 0) {
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
                if(!empty($refereethreeuser)){
                    $refereethreeydc = $project->investydc * $refereeprofit->refereethree;
                    RefereerecordModel::AddRefereerecord($refereethreeuser->id, 1, $user->id, $project_id, $refereethreeydc);
                    $refereethreeuser->usableydc += $refereethreeydc;
                    $releasefreezenydc = 0;

                    if($refereethreeuser->freezenydc > 0) {
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
        $this->success('投资成功', 'gjcf/index/index', 0, 1);
    }

}