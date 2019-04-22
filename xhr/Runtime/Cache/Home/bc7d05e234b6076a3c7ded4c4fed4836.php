<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
<title>小黄人</title>
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
	var URL = "/dcdw/index.php/Home/Index";
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
        html,
        body {
            background-color: #efeff4;
        }

        .mui-bar .mui-pull-left .mui-icon {
            padding-right: 5px;
            font-size: 28px;
        }

        .mui-bar .mui-btn {
            font-weight: normal;
            font-size: 17px;
        }

        .mui-bar .mui-btn-link {
            top: 1px;
        }

        .mui-content img{
            width: 100%;
        }
        .hm-description{
            margin: 15px;
        }

        .hm-description>li {
            font-size: 14px;
            color: #8f8f94;
        }


    </style>
</head>

<body>

<nav class="mui-bar mui-bar-tab">
    <ul class="mui-table-view mui-grid-view mui-grid-12" style="padding: 0 0 3px 0" >
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"  style="color: #2D93CA; font-weight: bolder">
            <a href="/dcdw/index.php/Home/User/index">
                <span class="mui-icon mui-icon-home" style="padding-top: 0px;padding-bottom: 0px"></span>
                <div class="mui-tab-label" style="font-size: 11px">首页</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/dcdw/index.php/Home/My/trad">
            <span class="mui-icon mui-icon-navigate" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">分类</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/dcdw/index.php/Home/My/jylist">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">VIP会员</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/dcdw/index.php/Home/My/index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">我的</div>
        </a></li>
    </ul>
</nav>

<header class="mui-bar mui-bar-transparent" style="height: 50px">
    <img src="/dcdw/Public/images/baner1.png" style="height: 90%; padding-top: 10px">
    <!--<h1 class="mui-title">⑤①交易宝</h1>-->
    <a class="mui-action-back mui-icon mui-icon-search mui-pull-right" href="search.html"></a>
</header>

<div class="mui-content">
    <!--轮播图片-->
    <div id="slider" class="mui-slider " >
        <div class="mui-slider-group mui-slider-loop">
            <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
            <div class="mui-slider-item mui-slider-item-duplicate">
                <a href="#">
                    <img src="/dcdw/Public/images/yuantiao.jpg">
                    <p class="mui-slider-title">静静看这世界</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/dcdw/Public/images/shuijiao.jpg">
                    <p class="mui-slider-title">幸福就是可以一起睡觉</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/dcdw/Public/images/muwu.jpg">
                    <p class="mui-slider-title">想要一间这样的木屋，静静的喝咖啡</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/dcdw/Public/images/cbd.jpg">
                    <p class="mui-slider-title">Color of SIP CBD</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/dcdw/Public/images/yuantiao.jpg">
                    <p class="mui-slider-title">静静看这世界</p>
                </a>
            </div>
            <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
            <div class="mui-slider-item mui-slider-item-duplicate">
                <a href="#">
                    <img src="/dcdw/Public/images/shuijiao.jpg">
                    <p class="mui-slider-title">幸福就是可以一起睡觉</p>
                </a>
            </div>
        </div>
        <div class="mui-slider-indicator mui-text-right">
            <div class="mui-indicator mui-active"></div>
            <div class="mui-indicator"></div>
            <div class="mui-indicator"></div>
            <div class="mui-indicator"></div>
        </div>
    </div>

    <div class="mui-content" style="background-color:#fff">
        <h5 style="background-color:#efeff4">慢生活</h5>
        <ul class="mui-table-view mui-grid-view">
            <li class="mui-table-view-cell mui-media mui-col-xs-6">
                <a href="#">
                    <img class="mui-media-object" src="/dcdw/Public/images/shuijiao.jpg">
                    <div class="mui-media-body">幸福就是可以一起睡觉</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-6">
                <a href="#">
                    <img class="mui-media-object" src="/dcdw/Public/images/muwu.jpg">
                    <div class="mui-media-body">想要一间这样的木屋，静静的喝咖啡</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-6">
                <a href="#"><img class="mui-media-object" src="/dcdw/Public/images/cbd.jpg">
                    <div class="mui-media-body">Color of SIP CBD</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-6">
                <a href="#">
                    <img class="mui-media-object" src="/dcdw/Public/images/yuantiao.jpg">
                    <div class="mui-media-body">静静看这世界</div></a></li>
        </ul>
    </div>
    <p style="margin: 30px 15px 20px;">这是transparent bar（透明导航栏）演示页面， 默认情况下标题栏透明，
        当用户向下滚动时，标题栏逐渐由透明转变为不透明；当用户再次向上滚动时，标题栏又从不透明变为透明状态。
    </p>
    <p style="margin: 5px 15px 15px 15px;">
        这是一种解决滚动条通顶问题的变通解决方案，该方案相比双webview的方案，性能更高，动效更酷，但也有其适用场景：
    </p>
    <p style="margin: 30px 15px 20px;">这是transparent bar（透明导航栏）演示页面， 默认情况下标题栏透明，
        当用户向下滚动时，标题栏逐渐由透明转变为不透明；当用户再次向上滚动时，标题栏又从不透明变为透明状态。
    </p>
    <p style="margin: 5px 15px 15px 15px;">
        这是一种解决滚动条通顶问题的变通解决方案，该方案相比双webview的方案，性能更高，动效更酷，但也有其适用场景：
    </p>
    <p style="margin: 30px 15px 20px;">这是transparent bar（透明导航栏）演示页面， 默认情况下标题栏透明，
        当用户向下滚动时，标题栏逐渐由透明转变为不透明；当用户再次向上滚动时，标题栏又从不透明变为透明状态。
    </p>
    <p style="margin: 5px 15px 15px 15px;">
        这是一种解决滚动条通顶问题的变通解决方案，该方案相比双webview的方案，性能更高，动效更酷，但也有其适用场景：
    </p>
    <ul class="hm-description">
        <li>顶部最好有图片或轮播组件</li>
        <li>导航栏字体颜色和图片颜色协调</li>
    </ul>
</div>

</body>

<script type="text/javascript">
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
</script>

</html>