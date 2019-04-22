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
	var URL = "/paipai/index.php/Home/My";
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
        .title{
            margin: 20px 15px 7px;
            color: #6d6d72;
            font-size: 15px;
        }

    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>-->
    <h1 class="mui-title">个人中心</h1>
</header>

<nav class="mui-bar mui-bar-tab">
    <ul class="mui-table-view mui-grid-view mui-grid-12" style="padding: 0 0 3px 0">
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
            <a href="/paipai/index.php/Home/User/index" >
                <span class="mui-icon mui-icon-home" style="padding-top: 0px;padding-bottom: 0px"></span>
                <div class="mui-tab-label" style="font-size: 10px">首页</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/paipai/index.php/Home/My/trad">
            <span class="mui-icon mui-icon-navigate" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 10px">交易所</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/paipai/index.php/Home/My/jylist">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 10px">交易记录</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"  style="color: #2D93CA; font-weight: bolder"><a href="/paipai/index.php/Home/My/index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 10px">个人中心</div>
        </a></li>
    </ul>
</nav>

<div class="mui-content">
    <!--<div class="mui-card" style="margin-bottom: 20px;">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell mui-media">
                <a class="mui-navigate-right" href="#account">
                    <img class="mui-media-object mui-pull-left head-img" id="head-img" src="/paipai/Public/images/logo.png">
                    <div class="mui-media-body">
                        Hello MUI
                        <p class='mui-ellipsis'>账号:hellomui</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>-->

    <div class="mui-card">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell mui-collapse">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right" href="#">
                    <img class="mui-media-object mui-pull-left head-img" id="head-img" src="/paipai/Public/images/logo.png">
                    <div class="mui-media-body">
                        一叶知秋
                        <p class='mui-ellipsis'>在售：<?=number_format($num,2)?> π</p>
                    </div>
                </a>

                <ul class="mui-table-view mui-table-view-chevron">
                    <!--<li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">实名认证</a>
                    </li>-->
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">修改资料</a>
                    </li>
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">修改密码</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="mui-card-footer">
            <a class="mui-card-link">π余额：<span class="mui-badge mui-badge-warning "><?=number_format($pnum,2)?></span></a>
            <a class="mui-card-link">RMB余额：<span class="mui-badge mui-badge-warning "><?=number_format($xjnum,2)?></span></a>
        </div>
    </div>

    <div class="mui-card" style="margin-bottom: 10px;">
        <ul class="mui-table-view">
            <li class="mui-table-view-cell" style="vertical-align: middle">
                <a class="mui-navigate-right" href="/paipai/index.php/Home/My/join">
                    <!--<img class=" mui-pull-left" style="width: 35px; padding-right: 10px" src="/paipai/Public/images/1111.png">-->
                    <span class="mui-badge mui-badge-danger"><?=$js?></span>
                    我的邀请
                </a>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right">
                    账号充值
                </a>
                <ul class="mui-table-view mui-table-view-chevron">
                    <!--<li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">实名认证</a>
                    </li>-->
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">π充值</a>
                    </li>
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">RMB充值</a>
                    </li>
                </ul>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right">
                    用户提现
                </a>
                <ul class="mui-table-view mui-table-view-chevron">
                    <!--<li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">实名认证</a>
                    </li>-->
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">π提现</a>
                    </li>
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="#">RMB提现</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="mui-card" style="margin-bottom: 30px;">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell">
                <a href="#about" class="mui-navigate-right">关于PAIPAI <i class="mui-pull-right update">V1.1.0</i></a>
            </li>
        </ul>
    </div>

    <div class="mui-card">
        <ul class="mui-table-view">
            <li class="mui-table-view-cell" style="text-align: center;">
                <a>退出登录</a>
            </li>
        </ul>
        <!--<button type="button" class="mui-btn mui-btn-danger mui-btn-block">Block button</button>-->
    </div>

</div>





</body>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</html>