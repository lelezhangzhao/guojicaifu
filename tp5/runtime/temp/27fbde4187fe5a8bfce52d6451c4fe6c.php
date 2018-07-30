<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"H:\share\project\trunk\tp5\public/../application/gjcf\view\login\index.html";i:1532950363;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532949221;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532433712;}*/ ?>
<html>
<head>
    <title>登录</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>


    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/css/style.css?version=1" type="text/css" />
    <script type="text/javascript" src="/static/js/action.js?version=42"></script>
    <script type="text/javascript">

    </script>
    <style>
        #top_info{
            visibility:hidden;
        }
    </style>

</head>
<body class="layui-layout-body">

    <div id="top_info" class="layui-header">
        <div id="userinfo" >
            <div >
                <span float="left">
                    用户名：<label id="header_username"></label>
                    用户ID：<label id="header_userid"></label>
                    可用YDC：<label id="header_usableydc"></label>
                    冻结YDC：<label id="header_freezenydc"></label>
                </span>
                    <span float="right">
                        <input type="button" value="签到" id="header_sign"/>
                        <input type="button" value="退出" id="header_logout"/>
                    </span>
            </div>

        </div>

        <ul class="layui-nav" >
            <li class="layui-nav-item">
                <a href="javascript:;">项目信息</a>
                <dl class="layui-nav-child">
                    <dd id="header_project"><a href="javascript:;">项目列表</a></dd>
                    <dd id="header_investrecord"><a href="javascript:;">投资记录</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">充值提现</a>
                <dl class="layui-nav-child">
                    <dd id="header_charge"><a href="javascript:;">充值</a></dd>
                    <dd id="header_withdraw"><a href="javascript:;">提现</a></dd>
                    <dd id="header_ydcrecord"><a href="javascript:;">收益记录</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">账户管理</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd id="header_fixaccountinfo"><a href="javascript:;">支付账户</a></dd>
                    <dd id="header_fixpassword"><a href="javascript:;">修改密码</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">团队信息</a>
                <dl class="layui-nav-child">
                    <dd id="header_myteam"><a href="javascript:;">我的团队</a></dd>
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



<div class="layui-container" style="width:625;position:relative;left:0%">
    <form action="" target="exec_target" class="layui-form layui-form-pane" >
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" name="login_username" id="login_username" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input type="text" name="login_password" id="login_password" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">验证码</label>
            <div class="layui-input-inline">
                <input type="text" name="login_capcha" id="login_capcha" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <img id="signup_capcha_img" src="<?php echo captcha_src(); ?>" onclick="this.src='/index.php/captcha?id='+Math.random()" style="cursor: pointer" /><br />
        </div>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="demo1" id="login_login">登录</button>
        </div>
        <div class="layui-form-item">
            <button class="layui-btn" id="login_forgetpassword">忘记密码</button>
            <button class="layui-btn" id="login_signup">注册</button>
        </div>

    </form>
</div>
<iframe name="exec_target" hidden />

