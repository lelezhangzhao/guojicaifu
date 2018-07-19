<?php
namespace app\gjcf\validate;

use think\Validate;

class User extends Validate{
    protected $rule = [
        ['username', 'require|min:5|max:30', '用户名为空|用户名至少5个字符|用户名最多30个字符'],
        ['password', 'require|min:5|max:30', '密码为空|密码至少5个字符|密码最多30个字符'],
        ['tel', 'require|checkTel', '手机号为空'],
        ['referee', 'require', '推荐人为空'],
    ];

    protected function checkTel($value)
    {
        $result = preg_match('/^1\d{10}$/', $value);
        if(!$result)
        {
            return '手机号格式错误';
        }
        else
        {
            return true;
        }
    }
}