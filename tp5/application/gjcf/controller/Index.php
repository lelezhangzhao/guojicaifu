<?php
namespace app\gjcf\controller;

use think\Controller;
use think\Request;
use think\Db;

use app\gjcf\model\Project as ProjectModel;
use app\gjcf\api\Helper as HelperApi;


class Index extends Controller{
    public function index(Request $request){

        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }
        return $this->fetch();
    }

    public function GetProject(Request $request){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

//        $page = $request->param('page');
//        $limit = $request->param('limit');

//        $tol = ($page - 1) * $limit;

//        $projectcount = Db::name('project')
//            ->where('status', 0)
//            ->count();

        $projects = Db::name('project')
            ->where('status', 0)
//            ->limit($tol, $limit)
            ->select();


        $list["msg"]="";
        $list["code"]=0;
//        $list["count"]=$projectcount;
        $list["data"]=$projects;
        if(empty($projects)){
            $list["msg"]="暂无数据";
        }

        return json($list);


//        echo '{"code":0,"msg":"","count":'.$projectcount.',"data":[';
//        foreach($projects as $project){
//            echo json_encode($project);
//            if($project['id'] !== $projects[count($projects) - 1]['id']){
//                echo ",";
//            }
//        }
//        echo "]}";


/*       echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<project>';
        foreach ($projects as $project) {
            echo '<item>';
            echo '<id>'.$project->id.'</id>';
            echo '<caption>'.$project->caption.'</caption>';
            echo '<investydc>'.$project->investydc.'</investydc>';
            echo '<profitydc>'.$project->profitydc.'</profitydc>';
            echo '<curinvest>'.$project->curinvest.'</curinvest>';
            echo '<remaininvest>'.$project->remaininvest.'</remaininvest>';
            echo '</item>';
        }
        echo '</project>';
*/

/*
        foreach($projects as $project){
            echo '项目名称：'.$project['caption'].'<br/>';
            echo '投资金额：'.$project['investydc'].'<br/>';
            echo '收益金额：'.$project['profitydc'].'<br/>';
            echo '当前投资额：'.$project['curinvest'].'<br/>';
            echo '剩余投资额：'.$project['remaininvest'].'<br/>';
            $status = $project['status'];
            if((int)$status === 0){
                echo '<input type="submit" value="投资" formaction="/index.php/gjcf/invest/InvestProject?projectid='.$project['id'].'" /><br/>';
            }else if((int)$status === 1){
                echo '<input type="button" disabled value="投资未开始" /><br/>';
            }else if((int)$status === 2){
                echo '<input type="button" disabled value="投资已结束" /><br/>';
            }
        }
*/
    }
}
