<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

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
        h5 {
            margin: 10px 7px;
        }
    </style>
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

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">密码修改</h1>
</header>
<div class="mui-content">
    <div class="mui-content-padded" style="margin: 5px;">

        <h5>密码修改</h5>
        <form class="mui-input-group">
            <div class="mui-input-row">
                <label>原密码</label>
                <input type="text" placeholder="请输入原密码">
            </div>
        <div class="mui-input-row ">
            <label >新密码</label>
                <input  type="text" class="mui-input-password" placeholder="请输入新密码">
        </div>
            <div class="mui-input-row ">
                <label >确认密码</label>
                <input  type="text" class="mui-input-password" placeholder="请再输入一遍新密码">
            </div>
            </form>

            <div class="mui-content-padded" >
                <button id='login' class="mui-btn mui-btn-block mui-btn-primary"  >提交</button>
            </div>
    </div>
</div>
<script src="../js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    //语音识别完成事件
    document.getElementById("search").addEventListener('recognized', function(e) {
        console.log(e.detail.value);
    });

    var nativeWebview, imm, InputMethodManager;
    var initNativeObjects = function() {
        if (mui.os.android) {
            var main = plus.android.runtimeMainActivity();
            var Context = plus.android.importClass("android.content.Context");
            InputMethodManager = plus.android.importClass("android.view.inputmethod.InputMethodManager");
            imm = main.getSystemService(Context.INPUT_METHOD_SERVICE);
        } else {
            nativeWebview = plus.webview.currentWebview().nativeInstanceObject();
        }
    };
    var showSoftInput = function() {
        if (mui.os.android) {
            imm.toggleSoftInput(0, InputMethodManager.SHOW_FORCED);
        } else {
            nativeWebview.plusCallMethod({
                "setKeyboardDisplayRequiresUserAction": false
            });
        }
        setTimeout(function() {
            var inputElem = document.querySelector('input');
            inputElem.focus();
            inputElem.parentNode.classList.add('mui-active'); //第一个是search，加上激活样式
        }, 200);
    };
    mui.plusReady(function() {
        initNativeObjects();
        showSoftInput();
    });

</script>
</body>

</html>