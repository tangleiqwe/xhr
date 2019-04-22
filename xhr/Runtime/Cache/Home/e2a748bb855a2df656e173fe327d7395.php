<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

<head>

    <meta charset="utf-8">
<title>PAIPAI</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!--标准mui.css-->
<link rel="stylesheet" href="/paipai/Public/css/mui.min.css">
<!--App自定义的css-->
<link rel="stylesheet" type="text/css" href="/paipai/Public/css/app.css"/>
<link href="/paipai/Public/css/style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/paipai/Public/css/icons-extra.css" />


<script type="text/javascript">
	var URL = "/paipai/index.php/Home/User";
	var APP = "/paipai/index.php";
	var ROOT = "/paipai";
	var PUBLIC = ROOT + "/Public";
	var UPLOAD = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>" + "/upload/";
</script>
<script src="/paipai/Public/js/mui.min.js"></script>
<script src="/paipai/Public/js/mui.enterfocus.js"></script>
<script src="/paipai/Public/js/app.js"></script>
<script src="/paipai/Public/js/mui.view.js "></script>
<script src='/paipai/Public/js/feedback.js'></script>
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
            width: 25%;
        }

        .mui-input-row label~input,
        .mui-input-row label~select,
        .mui-input-row label~textarea {
            width: 75%;
        }

        .mui-checkbox input[type=checkbox],
        .mui-radio input[type=radio] {
            top: 6px;
        }

        .mui-content-padded {
            margin-top: 10px;
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

<body class="mui-android mui-android-6 mui-android-6-0">
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">基本信息修改</h1>
</header>
<div class="mui-content">
    <h5 class="mui-content-padded">基本信息</h5>
    <form class="mui-input-group">
    <div class="mui-input-row">
        <label>*姓名</label>
        <input id='xm' type="text" class="mui-input-clear mui-input" placeholder="请输入姓名">
    </div>
    <div class="mui-input-row">
    <label>*电话</label>
    <input id='dh' type="text" class="mui-input-clear mui-input" placeholder="请输手机号码">
     </div>
    </form>
    <h5 class="mui-content-padded">银行卡信息(必须为自己的银行卡信息)</h5>
    <form class="mui-input-group">
    <div class="mui-input-row">
        <label>*开户行</label>
        <input id='khh' type="text" class="mui-input-clear mui-input" placeholder="请输入开户行信息">
    </div>
    <div class="mui-input-row">
        <label style="">*银行卡号</label>
        <input id='yhhm' type="text" class="mui-input-clear mui-input" placeholder="请输入银行卡卡号">
    </div>
        </form>
    <h5 class="mui-content-padded">Discovery信息</h5>
    <form class="mui-input-group">
    <div class="mui-input-row">
        <label style=" width: 35%;">*Discovery账号</label>
        <input id='pzh'  style=" width: 65%;" type="text" class="mui-input-clear mui-input" placeholder="请输入Discovery账号">
    </div>
    <div class="mui-input-row">
        <label style=" width: 35%;">*手机号后四位</label>
        <input id='pzhhsw' style=" width: 65%;" type="text" class="mui-input-clear mui-input" placeholder="请输入Discovery账号手机号后四位">
    </div>
    </form>
    <div class="mui-content-padded">

        <button id='login' class="mui-btn mui-btn-block mui-btn-primary" >提交</button>
    </div>
    </div>

</div>

</body>

</html>