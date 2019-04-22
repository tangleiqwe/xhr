<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

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
</head>

<body>

<style>
    .mui-control-content {
        background-color: white;
        min-height: 500px;
    }
    .mui-control-content .mui-loading {
        margin-top: 50px;
    }
</style>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">充值记录</h1>
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
    <ul class="mui-table-view mui-grid-view mui-grid-12" >
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-2" >
            <span class="mui-icon-extra mui-icon-extra-outline" style="font-size: 15px; font-weight: bold; color: #2D93CA">单号</span>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-4" >
            <span class="mui-icon-extra mui-icon-extra-calc" style="font-size: 15px; font-weight: bold; color: #2D93CA">时间</span>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-3" >
            <span class="mui-icon-extra mui-icon-extra-prech" style="font-size: 15px; font-weight: bold; color: #2D93CA">金额</span>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
            <span class="mui-icon-extra mui-icon-extra-gold" style="font-size: 15px; font-weight: bold; color: #2D93CA">状态</span>
        </li>
    </ul>
    <?php if(is_array($rmblist)): $i = 0; $__LIST__ = $rmblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="mui-table-view mui-grid-view mui-grid-12" >
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-2" style="height: 40px">
            <span class="" style="font-size: 14px"><?php echo ($vo["id"]); ?></span>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-4" >
            <span class="" style="font-size: 14px"><?php echo ($vo["operdate"]); ?></span>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-3" >
            <span class="" style="font-size: 14px"><?php echo ($vo["xjnum"]); ?></span>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-3" >
            <?php
 if($vo['type'] == '1'){ ?>
            <span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px; color:#4cd964"> 提交</span>
            <?php }else {?>
            <span class="mui-icon-extra mui-icon-extra-class" style="font-size: 14px; color:#ff8000"> 完成</span>
            <?php }?>
        </li>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</body>

</html>