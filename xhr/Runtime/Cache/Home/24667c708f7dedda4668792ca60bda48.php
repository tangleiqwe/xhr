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
	var URL = "/xhr/index.php/Home/My";
	var APP = "/xhr/index.php";
	var ROOT = "/xhr";
	var PUBLIC = ROOT + "/Public";
	var UPLOAD = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>" + "/upload/";
</script>
<script src="/xhr/Public/js/mui.min.js"></script>
<script src="/xhr/Public/script/jquery.min.js"></script>
<!--<script src="/xhr/Public/js/mui.enterfocus.js"></script>-->
<!--<script src="/xhr/Public/js/app.js"></script>-->
<script src="/xhr/Public/js/mui.view.js "></script>
<!--<script src='/xhr/Public/js/feedback.js'></script>-->
    <script src="/xhr/Public/script/jquery.min.js"></script>
    <script src="/xhr/Public/layer/layer.js"></script>
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
    <h1 class="mui-title">RMB充值</h1>
</header>
<nav class="mui-bar mui-bar-tab">
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
                <div class="mui-tab-label" style="font-size: 11px">首页</div>
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
            <div class="mui-tab-label" style="font-size: 11px">分类</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
         <?php if($footIndex == 3){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="/xhr/index.php/Home/My/my_vip">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">VIP会员</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
        <?php if($footIndex == 4){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="/xhr/index.php/Home/My/Index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">个人中心</div>
        </a></li>
    </ul>
</nav>
<div class="mui-content">
    <div class="mui-card">
    <h5 class="mui-content-padded">操作方式：<br><br>1、先给平台银行帐号转账，并截取转账凭证。<br><br>
        2、在交易平台填写充值申请。<br><br>3、平台进行审核确认（工作时间2小时内）。
    </h5>
    <!--<form class="mui-input-group">-->
        <div class="mui-input-row">
            <h5 ><label style="width: 30%;">账户姓名：</label><label style="width:70%;" id="cardname"><?=C('yhk_name')?></label>
            </h5>
        </div>
        <div class="mui-input-row">
            <h5 ><label style="width: 30%;">银行卡号：</label>
                <input style="width: 10%;color: #007AFF; "id='fz' type="button"onClick="copy_cardid()" value="复制">
                <input style="width: 60%; "id='cardid' type="text" value="<?=C('yhk_carid')?>" >
            </h5>
        </div>
        <div class="mui-input-row">
            <h5 ><label style="width: 30%;">开户银行：</label><label style="width:70%;" id="khh"><?=C('yhk_khh')?></label>
            </h5>
        </div>
    <!--</form>-->
    </div>
    <div class="mui-card">
    <h5 class="mui-content-padded">充值信息</h5>
    <form class="mui-input-group"   action="/xhr/index.php/Home/My/rmbcz_insert" method="post">
    <div class="mui-input-row">
        <label>充值账号</label>
        <input id='czzh'name="czzh" type="number" class="mui-input-clear mui-input" placeholder="请输入充值的银行、支付宝账号" style="font-size: 14px">
    </div>
    <div class="mui-input-row">
        <label>姓名</label>
        <input id='czname'name="czname" type="text" class="mui-input-clear mui-input" placeholder="请输充值账号姓名" style="font-size: 14px">
    </div>
    <div class="mui-input-row">
        <label>充值金额</label>
        <input id='czje' name="czje" type="number" class="mui-input-clear mui-input" placeholder="请输充值金额，最少10元" style="font-size: 14px">
    </div>
    <!--<div class="mui-input-row">
        <label>凭证上传</label> <input type="file"  style="top: 5px" class="mui-input-clear mui-input"name="file" />
        <input type="submit" name="submit"   class="mui-input-clear mui-input" value="上传" />
    </div>-->
        <input id='czpz' name="czpz" type="text" class="mui-input-clear mui-input" value="<?=$scpz?>">
        <div class="mui-card-footer">
            <?php if($type == 1) { ?>
            <button id="cBtn_pic" type="button" class="mui-btn mui-icon mui-icon-image "  onclick="cof()" style="width: 150px;height: 40px"> 上传凭证</button>
            <?php } else {?>
            <button id="cBtn_pic" type="button" class="mui-btn mui-icon mui-icon-image mui-btn-royal"  onclick="cof()" style="width: 150px;height: 40px" disabled> 凭证上传成功</button>
            <?php  }?>
            <button id="login"  class="mui-btn mui-icon mui-icon-paperplane" style="width: 150px;height: 40px"> 提交审核</button>
        </div>
    <!--<button id='login' class="mui-btn mui-btn-block mui-btn-primary" >提交</button>-->
</form>
    </div>

</div>

<script>
    function cof() {
        layer.open({
            type: 2,
            title: '选择凭证并上传',
            shadeClose: true,
            shade: 0.8,
            area: ['95%', '470px'],
            content: '/xhr/index.php/Home/My/pic_rmb' //iframe的url
        });
    }

    function copy_cardid()
    {
        var cardid=document.getElementById("cardid");
        cardid.select(); // 选择对象
        document.execCommand("Copy"); // 执行浏览器复制命令
    }
</script>
</body>

</html>