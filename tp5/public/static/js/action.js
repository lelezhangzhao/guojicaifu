
var xmlhttp;
if (window.XMLHttpRequest){
    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
} else {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

//index
function OpenNewUrl(url) {
    window.location.href = url;
    // window.open(url);
}

$(function(){
    $("#project").click(function(){
        OpenNewUrl("/index.php/gjcf/index/index");
        // GetProject();
    });
    $("#investrecord").click(function(){
        OpenNewUrl("/index.php/gjcf/investrecord/index");
    });
    $("#charge").click(function(){
        OpenNewUrl("/index.php/gjcf/charge/index");
    });
    $("#withdraw").click(function(){
        OpenNewUrl("/index.php/gjcf/withdraw/index");
    });
    $("#ydcrecord").click(function(){
        OpenNewUrl("/index.php/gjcf/ydcrecord/index");
    });
    $("#fixaccountinfo").click(function(){
        OpenNewUrl("/index.php/gjcf/accountinfo/index");
    });
    $("#fixpassword").click(function(){
        OpenNewUrl("/index.php/gjcf/fixpassword/index");
    });
    $("#myteam").click(function(){
        OpenNewUrl("/index.php/gjcf/team/index");
    });
    $("#systemad").click(function(){
        alert("systemad");
    });
});


(function ($) {
    $.getUrlParam = function (name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]); return null;
    }
})(jQuery);

function GetWithdrawYdc(){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("withdrawydc").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/withdraw/getwithdrawydc");
    xmlhttp.send();
}

function GetProject(){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("projectlist").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/index/getproject");
    xmlhttp.send();
}

function ChargeConfirmSuccess(chargeid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("chargeconfirmok"+chargeid).disabled = "disabled";
            document.getElementById("chargeconfirmcancel"+chargeid).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/chargeconfirm/chargeconfirmsuccess?chargeid="+chargeid);
    xmlhttp.send();
}

function ChargeConfirmFailed(chargeid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("chargeconfirmok"+chargeid).disabled = "disabled";
            document.getElementById("chargeconfirmcancel"+chargeid).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/chargeconfirm/chargeconfirmfailed?chargeid="+chargeid);
    xmlhttp.send();
}

function WithdrawConfirmSuccess(withdrawid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("withdrawconfirmok"+withdrawid).disabled = "disabled";
            document.getElementById("withdrawconfirmcancel"+withdrawid).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/withdrawconfirm/withdrawconfirmsuccess?withdrawid="+withdrawid);
    xmlhttp.send();
}

function WithdrawConfirmFailed(withdrawid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("withdrawconfirmok"+withdrawid).disabled = "disabled";
            document.getElementById("withdrawconfirmcancel"+withdrawid).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/withdrawconfirm/withdrawconfirmfailed?withdrawid="+withdrawid);
    xmlhttp.send();
}

function GetAccountInfoTelIdentify(){
    sendCode(document.getElementById("getaccountinfotelidentify"));
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            layer.msg("验证码已发送");
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/accountinfo/gettelidentify");
    xmlhttp.send();
}

function SaveAccountInfo(name, alipaynum, telidentify){
    xmlhttp.onreadystatechange = function (){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            layer.msg(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/accountinfo/saveaccountinfo?name="+name+"&alipaynum="+alipaynum+"&telidentify="+telidentify);
    xmlhttp.send();
}


var clock="";
var nums = 120;
var btn;

function sendCode(thisBtn) {
    btn = thisBtn
    btn.disabled = true; //将按钮置为不可点击
    btn.value = nums+'秒后可重新获取';
    clock = setInterval(doLoop, 1000); //一秒执行一次
}
function doLoop() {
    nums--;
    if(nums > 0){
        btn.value = nums+'秒后可重新获取';
    }else{
        clearInterval(clock); //清除js定时器
        btn.disabled = false;
        btn.value = '点击发送验证码';
        nums = 120; //重置时间
    }
}


