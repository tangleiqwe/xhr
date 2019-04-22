<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
<title>⑤①交易宝</title>
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
        h5 {
            margin: 5px 7px;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">卖π</h1>
</header>
<nav class="mui-bar mui-bar-tab">
    <ul class="mui-table-view mui-grid-view mui-grid-12" style="padding: 0 0 3px 0">
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
            <a href="/paipai/index.php/Home/User/index" >
                <span class="mui-icon mui-icon-home" style="padding-top: 0px;padding-bottom: 0px"></span>
                <div class="mui-tab-label" style="font-size: 15px">首页</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" style="color: #2D93CA; font-weight: bolder"><a href="/paipai/index.php/Home/My/trad">
            <span class="mui-icon mui-icon-navigate" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 15px">交易所</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/paipai/index.php/Home/My/jylist">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 15px">交易记录</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/paipai/index.php/Home/My/index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 15px">个人中心</div>
        </a></li>
    </ul>
</nav>
<div class="mui-content">
    <form id="myform" class="" action="/paipai/index.php/Home/My/sell_n_bc" method="post">
        <div class="mui-card" style="margin-bottom: 10px;">
            <ul class="mui-table-view">
                <li class="mui-table-view-cell" style="vertical-align: middle">
                    <div class="mui-input-row">
                        <label>π余额</label>
                        <label><?=number_format($pnum,2)?></label>
                        <!--<input type="text" placeholder="请输入卖出单价">-->
                    </div>
                </li>
                <li class="mui-table-view-cell" style="vertical-align: middle">
                    <div class="mui-input-row">
                        <label>建议售价</label>
                        <label><?=number_format($d_price,2)?></label>
                        <!--<input type="text" placeholder="请输入卖出单价">-->
                    </div>
                </li>
                <li class="mui-table-view-cell" style="vertical-align: middle">
                    <div class="mui-input-row">
                        <label>单价</label>
                        <input id="price" name="price" type="number" placeholder="请输入售出单价">
                    </div>
                </li>
                <li class="mui-table-view-cell mui-collapse">
                    <div class="mui-input-row">
                        <label>数量</label>
                        <input id="num" name="num" type="number" class="mui-input-clear" placeholder="请输入售出数量">
                    </div>
                </li>
                <li class="mui-table-view-cell mui-collapse" style="height: 90px">
                    <div class="mui-button-row">
                        <button type="button" class="mui-btn mui-btn-warning mui-btn-block" onclick="cof()">确 定 售 出 挂 单</button>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</div>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    function cof() {
        document.getElementById("myform").submit();
    }
</script>
</body>

</html>