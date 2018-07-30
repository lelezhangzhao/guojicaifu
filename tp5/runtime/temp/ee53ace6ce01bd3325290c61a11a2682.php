<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"H:\share\project\trunk\tp5\public/../application/gjcf\view\signup\index.html";i:1532949222;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\layout.html";i:1532007517;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\header.html";i:1532949221;s:60:"H:\share\project\trunk\tp5\application\gjcf\view\footer.html";i:1532433712;}*/ ?>
<html>
<head>
    <title>注册</title>
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



<script text="text/javascript">
    var referee = GetUrlParam('referee');
    window.onload = function(){
        $("#signup_referee").val(referee);
    }
</script>


<div class="layui-container" style="width:650;position:relative;left:0%">
    <form action="" target="exec_target" class="layui-form layui-form-pane" >
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" name="signup_username" id="signup_username" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input type="text" name="signup_password" id="signup_password" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-inline">
                <input type="text" name="signup_tel" id="signup_tel" lay-verify="required|phone" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline">
                <button class="layui-btn" id="signup_gettelidentify">点击发送验证码</button>
            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机验证码</label>
            <div class="layui-input-inline">
                <input type="text" name="signup_telidentify" id="signup_telidentify" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">推荐人ID</label>
            <div class="layui-input-inline">
                <input type="text" name="signup_referee" id="signup_referee" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">验证码</label>
            <div class="layui-input-inline">
                <input type="text" name="signup_capcha" id="signup_capcha" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline">
                <img id="signup_capcha_img" src="<?php echo captcha_src(); ?>" onclick="this.src='/index.php/captcha?id='+Math.random()" style="cursor: pointer;position:relative;left:0%;" /><br />
            </div>

        </div>
        <div class="layui-form-item">
        </div>
        <button class="layui-btn" lay-submit="" lay-filter="demo1" id="signup_signup">注册</button>

    </form>

</div>
<iframe name="exec_target" hidden />
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date'
        });
        laydate.render({
            elem: '#date1'
        });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return '标题至少得5个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });

        //监听指定开关
        form.on('switch(switchTest)', function(data){
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听提交
        form.on('submit(demo1)', function(data){
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
        });

        //表单初始赋值
        form.val('example', {
            "username": "贤心" // "name": "value"
            ,"password": "123456"
            ,"interest": 1
            ,"like[write]": true //复选框选中状态
            ,"close": true //开关状态
            ,"sex": "女"
            ,"desc": "我爱 layui"
        })


    });
</script>

