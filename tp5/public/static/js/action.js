
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
    window.open(url);
}

$(function(){

    $("li#match").click(function(){
        GetMatch();
    });
    $("li#investrecord").click(function(){
        OpenNewUrl("/index.php/gjcf/invest_record/index");
    });
    $("li#charge").click(function(){
        OpenNewUrl("/index.php/gjcf/charge/index");
    });
    $("li#withdraw").click(function(){
        OpenNewUrl("/index.php/gjcf/withdraw/index");
    });
    $("li#transfer").click(function(){
        OpenNewUrl("/index.php/gjcf/transfer/index");
    });
    $("li#transferrecord").click(function(){
        OpenNewUrl("/index.php/gjcf/transfer_record/index");
    });
    $("li#displaypersoninfo").click(function(){
        OpenNewUrl("/index.php/gjcf/account_info/index");
    });
    $("li#fixpassword").click(function(){
        OpenNewUrl("/index.php/gjcf/fix_password/index");
    });
    $("li#fixsecondpassword").click(function(){
        OpenNewUrl("/index.php/gjcf/fix_second_password/index");
    });

    $("li#xitonggonggao").click(function(){
        alert("xitonggonggao");
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
            document.getElementById("withdrawconfirmok"+chargeid).disabled = "disabled";
            document.getElementById("withdrawconfirmcancel"+chargeid).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/withdrawconfirm/withdrawconfirmsuccess?withdrawid="+withdrawid);
    xmlhttp.send();
}

function WithdrawConfirmFailed(withdrawid){
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("withdrawconfirmok"+chargeid).disabled = "disabled";
            document.getElementById("withdrawconfirmcancel"+chargeid).disabled = "disabled";
        }
    }
    xmlhttp.open("POST", "/index.php/gjcf/withdrawconfirm/withdrawconfirmfailed?withdrawid="+withdrawid);
    xmlhttp.send();
}







