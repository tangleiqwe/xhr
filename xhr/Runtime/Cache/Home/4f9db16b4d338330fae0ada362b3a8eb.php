<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

<head>

    <meta charset="utf-8">
<title>⑤①交易宝</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!--标准mui.css-->
<link rel="stylesheet" href="/dcdw/Public/css/mui.min.css">
<!--App自定义的css-->
<link rel="stylesheet" type="text/css" href="/dcdw/Public/css/app.css"/>
<link href="/dcdw/Public/css/style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/dcdw/Public/css/icons-extra.css" />


<script type="text/javascript">
	var URL = "/dcdw/index.php/Home/User";
	var APP = "/dcdw/index.php";
	var ROOT = "/dcdw";
	var PUBLIC = ROOT + "/Public";
	var UPLOAD = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>" + "/upload/";
</script>
<script src="/dcdw/Public/js/mui.min.js"></script>
<script src="/dcdw/Public/js/mui.enterfocus.js"></script>
<script src="/dcdw/Public/js/app.js"></script>
<script src="/dcdw/Public/js/mui.view.js "></script>
<script src='/dcdw/Public/js/feedback.js'></script>
    <style>
        .area {
            margin: 20px auto 0px auto;
        }

        .mui-input-group {
            margin-top: 10px;
        }

        .mui-input-group:first-child {
            margin-top: 20px;
        }

        .mui-input-group label {
            width: 22%;
        }

        .mui-input-row label~input,
        .mui-input-row label~select,
        .mui-input-row label~textarea {
            width: 78%;
        }

        .mui-checkbox input[type=checkbox],
        .mui-radio input[type=radio] {
            top: 6px;
        }

        .mui-content-padded {
            margin-top: 25px;
        }

        .mui-btn {
            padding: 10px;
        }

        .link-area {
            display: block;
            margin-top: 25px;
            text-align: center;
        }

        .spliter {
            color: #bbb;
            padding: 0px 8px;
        }

        .oauth-area {
            position: absolute;
            bottom: 20px;
            left: 0px;
            text-align: center;
            width: 100%;
            padding: 0px;
            margin: 0px;
        }

        .oauth-area .oauth-btn {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-size: 30px 30px;
            background-position: center center;
            background-repeat: no-repeat;
            margin: 0px 20px;
            /*-webkit-filter: grayscale(100%); */
            border: solid 1px #ddd;
            border-radius: 25px;
        }

        .oauth-area .oauth-btn:active {
            border: solid 1px #aaa;
        }

        .oauth-area .oauth-btn.disabled {
            background-color: #ddd;
        }
    </style>

</head>

<body>
<header class="mui-bar mui-bar-nav" style="height: 50px">
    <img src="/dcdw/Public/images/logo1.png" style="height: 90%; padding-top: 10px">
    <!--<h1 class="mui-title">⑤①交易宝</h1>-->
</header>
<div class="mui-content">
    <div class="mui-card">
        <div class="mui-card-header mui-card-media" style="height:40vw;background-image:url(/dcdw/Public/images/banner3.jpg)"></div>
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <form id='login-form' action="/dcdw/index.php/Home/User/checkLogined" method="post" class="mui-input-group">
                    <div class="mui-input-row">
                        <label>账号</label>
                        <input id='username' name="username" type="text" class="mui-input-clear mui-input" placeholder="请输入账号">
                    </div>
                    <div class="mui-input-row">
                        <label>密码</label>
                        <input id='pw' name="pw" type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
                    </div>
                    <div class="mui-content-padded">
                        <button id='login' class="mui-btn mui-btn-block mui-btn-primary" type="submit">登录</button>
                        <div class="link-area">
                            <a id='reg' href="zhuce.html">注册账号</a> <span class="spliter">|</span> <a id='forgetPassword'  href="lxkf.html">联系客服</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
   <!-- <form class="mui-input-group">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell">
                手势登录
                <div id="autoLogin" class="mui-switch">
                    <div class="mui-switch-handle"></div>
                </div>
            </li>
        </ul>
    </form>-->

</div>

</body>

</html>