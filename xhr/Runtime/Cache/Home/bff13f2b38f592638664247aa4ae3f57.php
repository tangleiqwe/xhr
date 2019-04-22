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


    <style>
        .title{
            margin: 20px 15px 7px;
            color: #6d6d72;
            font-size: 15px;
        }
        #clipArea {
            height: 300px;
        }
        #file,
        #clipBtn {
            margin: 20px;
        }
        #view {
            margin: 0 auto;
            width: 200px;
            height: 200px;
            background-color: #666;
        }
    </style>
</head>
<body ontouchstart="">

<header class="mui-bar mui-bar-nav">
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

    <div class="mui-card">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell" onclick="cof()">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right" href="#">
                    <img class="mui-media-object mui-pull-left head-img" id="head-img" src="/paipai/Public/images/logo.png">
                </a>
            </li>
        </ul>
    </div>
</div>

<div id="clipArea" onclick="cof()"></div>
<input type="file" id="file" style="display: none" onchange="view_dis()">
<button id="clipBtn">截取</button>
<div id="view"></div>

</body>
<script src="/paipai/Public/photoClip/hammer.min.js"></script>
<script src="/paipai/Public/photoClip/iscroll-zoom-min.js"></script>
<script src="/paipai/Public/photoClip/lrz.all.bundle.js"></script>
<script src="/paipai/Public/photoClip/PhotoClip.js"></script>
<script src="/paipai/Public/layer/layer.js"></script>

<script>
    function cof() {
        document.getElementById("file").click();
    }

    function view_dis() {
        layer.alert('内容');
    }

    var pc = new PhotoClip('#clipArea', {
        size: 260,
        outputSize: 640,
        //adaptive: ['60%', '80%'],
        file: '#file',
//        view: '#view',
        ok: '#clipBtn',
        //img: 'img/mm.jpg',
        loadStart: function() {
            console.log('开始读取照片');
        },
        loadComplete: function() {
            console.log('照片读取完成');
        },
        done: function(dataURL) {
            console.log(dataURL);
        },
        fail: function(msg) {
            alert(msg);
        }
    });

</script>

<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</html>