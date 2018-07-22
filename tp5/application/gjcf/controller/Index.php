<?php
namespace app\gjcf\controller;

use think\Controller;

use app\gjcf\model\Project as ProjectModel;
use app\gjcf\api\Helper as HelperApi;


class Index extends Controller{
    public function index(){
        HelperApi::TestLoginAndStatus($this);
        return $this->fetch();
    }

    public function GetProject(){
        $projects = ProjectModel::all();
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
    }



}
