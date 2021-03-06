<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>二维码支付测试</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!--标准mui.css-->
    <link rel="stylesheet" href="/paipai/Public/css/mui.min.css">
    <!--App自定义的css-->
    <link rel="stylesheet" type="text/css" href="/paipai/Public/css/app.css" />
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>-->
    <h1 class="mui-title">二维码支付测试</h1>
</header>
<div class="mui-content">

    <div class="mui-card">
        <div class="mui-card-header mui-card-media">
            <img src="/paipai/Public/images/muwu.jpg" />
            <div class="mui-media-body">
                子陵
                <p>测试于 <?=date("Y-m-d h:i:sa")?></p>
            </div>
            <!--<img class="mui-pull-left" src="../images/logo.png" width="34px" height="34px" />
            <h2>小M</h2>
            <p>发表于 2016-06-30 15:30</p>-->
        </div>
        <div class="mui-card-content" >
            <?php
 if(strstr($_SERVER['HTTP_USER_AGENT'],'Alipay')){?>
                <img class="mui-media-object" src="/paipai/Public/images/zpb_erweima.png" width="90%" style="padding-left: 45px;padding-top: 10px;padding-bottom: 10px">
            <?php } else { ?>
            <img class="mui-media-object" src="/paipai/Public/images/erweima.png" width="90%" style="padding-left: 45px;padding-top: 10px;padding-bottom: 10px">
            <?php }?>

            <!--<img src="/paipai/Public/images/erweima.png" alt="" width="100%"/>-->
        </div>
        <div class="mui-card-footer" style="padding-top: 10px;padding-bottom: 10px">
            <br>
            <a class="mui-card-link"><img src="/paipai/Public/images/weixin2.png" style="width: 35px"></a>
            <a class="mui-card-link"><img src="/paipai/Public/images/qq2.png" style="width: 35px"></a>
            <a class="mui-card-link"><img src="/paipai/Public/images/zhifubao.png" style="width: 35px"></a>
            <br>
        </div>
    </div>
</div>
<script src="/paipai/Public/js/mui.min.js"></script>
</body>
</html>