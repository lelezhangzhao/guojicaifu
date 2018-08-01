<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"E:\share\project\trunk\tp5\public/../application/gjcf\view\admin\index.html";i:1533103800;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1531971031;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1533103482;s:60:"E:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532420336;}*/ ?>
<html>
<head>
    <title>管理员页面</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>


    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/css/style.css?version=2" type="text/css" />
    <link rel="stylesheet" href="/static/dtree/dtree.css?version=4" type="text/css" />
    <script type="text/javascript" src="/static/js/action.js?version=47"></script>
    <script type="text/javascript" src="/static/qrcodejs/qrcode.min.js"></script>
    <script type="text/javascript" src="/static/dtree/dtree.js?version=4"></script>
    <script type="text/javascript">

    </script>
    <style>
        #top_info{
            visibility:hidden;
        }
    </style>

</head>
<body class="layui-layout-body">

<div id="top_info">
    <div class="layui-container" id="header_userinfo">
        <form class="layui-form layui-form-pane" action="javascript:;" >
            <!--<div class="layui-container" style="width:625;position:relative;left:0%">-->
            <div class="layui-form-item layui-inline">
                <label class="layui-form-label" >用户名：</label>
                <div class="layui-input-inline">
                    <label class="layui-form-label" id="header_username" style="width:200;"></label>
                </div>
            </div>
            <div class="layui-form-item layui-inline">
                <label class="layui-form-label">用户ID：</label>
                <div class="layui-input-inline">
                    <label class="layui-form-label" id="header_userid"></label>
                </div>
            </div>
            <!--<div class="layui-form-item layui-inline">-->
                <!--<label class="layui-form-label">可用YDC：</label>-->
                <!--<div class="layui-input-inline">-->
                    <!--<label class="layui-form-label" id="header_usableydc"></label>-->
                <!--</div>-->
            <!--</div>-->
            <!--<div class="layui-form-item layui-inline">-->
                <!--<label class="layui-form-label">冻结YDC：</label>-->
                <!--<div class="layui-input-inline">-->
                    <!--<label class="layui-form-label" id="header_freezenydc"></label>-->
                <!--</div>-->
            <!--</div>-->

            <div class="layui-form-item layui-inline">
                <div class="layui-input-inline">
                    <button class="layui-btn" id="header_sign">签到</button>
                    <button class="layui-btn" id="header_logout">退出</button>
                </div>
            </div>
        </form>
    </div>

    <div class="layui-container">
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
                    <dd id="header_invite"><a href="javascript:;">邀请链接</a></dd>
                    <dd id="header_bonus"><a href="javascript:;">今日分红</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="javascript:;">系统公告</a></li>
        </ul>
    </div>
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



<div id="bottom">
    <form method="post" >
        <div>
            充值确认：<input type="submit" value="充值确认" formaction="<?php echo url('gjcf/chargeconfirm/index'); ?>"/><br/>
            提现确认：<input type="submit" value="提现确认" formaction="<?php echo url('gjcf/withdrawconfirm/index'); ?>"/><br/>
            结算：<input type="submit" value="结算" formaction="<?php echo url('gjcf/balance/index'); ?>" /><br/>
            分红利润：<input type="text" name="bonusprofit" /><input type="submit" value="设置" formaction="<?php echo url('gjcf/bonusconfirm/setbonus'); ?>" /><br/>
            <input type="submit" value="分红" formaction="<?php echo url('gjcf/bonusconfirm/index'); ?>" /><br/>
        </div>
    </form>
</div>

</body>
