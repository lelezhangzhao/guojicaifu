<?php

namespace app\gjcf\controller;

use think\Controller;

use app\gjcf\api\Helper as HelperApi;

class Systeminfo extends Controller{
    public function Index(){
        $status = HelperApi::TestLoginAndStatus($this);
        if(true !== $status){
            return $status;
        }

        return $this->fetch();
    }


}