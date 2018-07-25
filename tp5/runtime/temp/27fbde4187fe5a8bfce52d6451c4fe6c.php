<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"H:\share\project\trunk\tp5\public/../application/gjcf\view\login\index.html";i:1532494818;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532516980;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532433712;}*/ ?>
<html>
<head>
    <title>登录</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>

    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <script type="text/javascript" src="/static/js/action.js?version=21"></script>
    <script type="text/javascript">

    </script>

</head>
<body class="layui-layout-body">

<div id="top_info" class="layui-header">
    <div id="userinfo" >
        <form method="post">
            <span float="left">
                用户名：<label id="headerusername"></label>
                用户ID：<label id="headeruserid"></label>
                可用YDC：<label id="headerusableydc"></label>
                冻结YDC：<label id="headerfreezenydc"></label>
            </span>
                <span float="right">
                    <input type="submit" value="签到" formaction="<?php echo url('gjcf/sign/sign'); ?>"/>
                    <input type="submit" value="退出" formaction="<?php echo url('gjcf/logout/logout'); ?>"/>
                </span>
        </form>

    </div>

    <ul class="layui-nav" >
        <li class="layui-nav-item">
            <a href="javascript:;">项目信息</a>
            <dl class="layui-nav-child">
                <dd id="project"><a href="javascript:;">项目列表</a></dd>
                <dd id="investrecord"><a href="javascript:;">投资记录</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">充值提现</a>
            <dl class="layui-nav-child">
                <dd id="charge"><a href="javascript:;">充值</a></dd>
                <dd id="withdraw"><a href="javascript:;">提现</a></dd>
                <dd id="ydcrecord"><a href="javascript:;">收益记录</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">账户管理</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd id="fixaccountinfo"><a href="javascript:;">支付账户</a></dd>
                <dd id="fixpassword"><a href="javascript:;">修改密码</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:;">团队信息</a>
            <dl class="layui-nav-child">
                <dd id="myteam"><a href="javascript:;">我的团队</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="javascript:;">系统公告</a></li>
    </ul>


</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>

</body>
</html>



<body>
<form method="post" target="exec_target">

    用户名 <input type="text" id="loginusername" name="username" /><br />
    密码 <input type="text" id="loginpassword" name="password" /><br />
    验证码 <input type="text" id="logincapcha" name="capcha" /><br/>
    <img src="<?php echo captcha_src(); ?>" onclick="this.src='/index.php/captcha?id='+Math.random()" style="cursor: pointer" /><br />
    <input type="submit" value="登录" id="loginligin" /><br />
    <input type="submit" value="忘记密码" formaction="<?php echo url('gjcf/forgetpassword/index'); ?>" name="forgetpassword" />
    <input type="submit" value="注册" formaction="<?php echo url('gjcf/signup/index'); ?>" name="signup"/>
</form>
<iframe hidden name="exec_target"/>

</body>