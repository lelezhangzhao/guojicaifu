<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Session;
use think\Db;

use app\gjcf\model\User as UserModel;
use app\gjcf\api\Helper as HelperApi;


class Invest extends Controller{
    public function InvestProject(Request $request)
    {
        HelperApi::TestLoginAndStatus($this);

        $project_id = $request->param('projectid');
        $project = ProjectModel::where('id', $project_id)->find();
        if (empty($project)) {
            //违规访问，封号
            HelperApi::SetUserDisabled(Session::get('id'), '违规访问project');
        }
        HelperApi::TestAccountInfo($this);

        $user = UserModel::get(Session::get('user_id'));
        if ($user->usableydc < $project->investydc) {
            $this->error('用户余额不足，先充值', '/index.php/gjcf/charge/index');
        }

        Db::startTrans();
        try {
            //用户余额
            $user->lock(true)->usableydc -= $project->investydc;
            $user->commit();

            //当前项目是否可投资
            $project->lock(true);
            $project->curinvest += $project->investydc;
            $project->remaininvest -= $project->investydc;
            if ($project->remainintvest <= 0) {
                $project->status = 2;
                $error = 'remainintvest is not valible';
                throw new Exception($error);
            }else{
                $project->commit();
            }
        } catch (\Exception $e) {
            Db::rollback();
            throw $e;
        }
    }

}