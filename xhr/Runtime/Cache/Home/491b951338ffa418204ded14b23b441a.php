<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

<head>

    <meta charset="utf-8">
<title>小黄人</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!--标准mui.css-->
<link rel="stylesheet" href="/xhr/Public/css/mui.min.css">
<!--App自定义的css-->
<link rel="stylesheet" type="text/css" href="/xhr/Public/css/app.css"/>
<!--<link href="/xhr/Public/css/style.css" rel="stylesheet" />-->
<link rel="stylesheet" type="text/css" href="/xhr/Public/css/icons-extra.css" />
<style>
	html,
	body {
		background-color: #efeff4;
		font-size: 14px;
		font-family: "Microsoft YaHei", 微软雅黑, "Microsoft JhengHei", "黑体";
	}

	.foot-no{
		color: #9b9b9c;
		font-weight: normal;
	}
	.foot-active{
		color: #f64c47;
		font-weight: bolder
	}


</style>

<script type="text/javascript">
	var URL = "/xhr/index.php/Home/User";
	var APP = "/xhr/index.php";
	var ROOT = "/xhr";
	var PUBLIC = ROOT + "/Public";
	var Set = ROOT + "/Public";
	var UPLOAD = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>" + "/upload/";
</script>
<script src="/xhr/Public/js/mui.min.js"></script>
<script src="/xhr/Public/script/jquery.min.js"></script>
<!--<script src="/xhr/Public/js/mui.enterfocus.js"></script>-->
<!--<script src="/xhr/Public/js/app.js"></script>-->
<script src="/xhr/Public/js/mui.view.js "></script>
<!--<script src='/xhr/Public/js/feedback.js'></script>-->
    <style>
        .area {
            margin: 20px auto 0px auto;
        }

        .mui-input-group {
            margin-top: 10px;
        }

        .mui-input-group:first-child {
            margin-top: 2px;
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
    <h1 class="mui-title">账号注册</h1>
</header>
<div class="mui-content">
    <div class="mui-card">
        <!--<div class="mui-card-header mui-card-media" style="height:18vw;background-image:url(/xhr/Public/images/banner4.jpg)"></div>-->
    <form class="mui-input-group" action="/xhr/index.php/Home/User/zhuce_insert" method="post">
        <!--<div class="mui-input-row" style="background:#F5F5F5 "> <h5 class="mui-content-padded">登录信息</h5>  </div>-->
        <div class="mui-input-row" style="height: 50px">
            <label>账号</label>
            <input id='account' name="account" type="text" class="mui-input-clear mui-input" placeholder="请输入登录账号">
        </div>

        <div class="mui-input-row"  style="height: 50px">
            <label>密码</label>
            <input id='password' name="password" type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
            <!--<span class="mui-icon mui-icon-eye"></span>-->
        </div>
        <div class="mui-input-row"  style="height: 50px">
            <label>密码找回key</label>
            <input id='r_key' name="r_key" type="number" class="mui-input-clear mui-input" placeholder="请输入6位数字（请记牢，找回密码时使用）">
        </div>
        <div class="mui-input-row"  style="height: 50px">
            <label>邀请人</label>
            <input id='no' name="no" type="text" class="mui-input-clear mui-input" placeholder="邀请人ID（如没有可不填）" value="<?=$no?>">
        </div>
    <div class="mui-content-padded">
        <button id='login' type="submit" class="mui-btn mui-btn-block mui-btn-primary" >注 册 用 户</button>
    </div>
    </form>
        </div>
</div>

<nav class="mui-bar mui-bar-tab" style="left: auto;right: auto;max-width: 640px;min-width: 320px;margin: 0 auto">
    <ul class="mui-table-view mui-grid-view mui-grid-12" style="padding: 0 0 3px 0; background-color: #303032" >
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
         <?php if($footIndex == 1){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        " >
            <a href="/xhr/index.php/Home/Index/index">
                <span class="mui-icon mui-icon-home" style="padding-top: 0px;padding-bottom: 0px"></span>
                <div class="mui-tab-label" style="font-size: 14px">首页</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
         <?php if($footIndex == 2){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="/xhr/index.php/Home/Index/tab_list">
            <span class="mui-icon mui-icon-navigate" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 14px">分类</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
         <?php if($footIndex == 3){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="/xhr/index.php/Home/My/my_vip">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 14px">VIP会员</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
        <?php if($footIndex == 4){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="/xhr/index.php/Home/My/Index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 14px">个人中心</div>
        </a></li>
    </ul>
</nav>

</body>

</html>