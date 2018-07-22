<?php

namespace app\gjcf\controller;

use think\Session;



class Telidentify extends controller{
    public function GetTelIdentify($tel){
        $url = 'http://tp5.com/index.php/gjcf/post/index?mobile='.$tel;
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
        curl_setopt ( $ch, CURLOPT_POST, 1 ); //启用POST提交
        $file_contents = curl_exec ( $ch );
        Session::set('identify', $file_contents);
        curl_close ( $ch );

        return Session::get('identify');

    }

    public function TelIdentifyOk($identify){
        if((int)$identify !== (int)Session::get('identify')) {
            return '验证码错误';
        } else {
            Session::delete('identify');
            return true;
        }
    }
}

