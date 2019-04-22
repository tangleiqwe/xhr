<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
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
<link href="/xhr/Public/css/style.css" rel="stylesheet" />
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
	var URL = "/xhr/index.php/Home/Chplayer";
	var APP = "/xhr/index.php";
	var ROOT = "/xhr";
	var PUBLIC = ROOT + "/Public";
	var UPLOAD = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>" + "/upload/";
</script>
<script src="/xhr/Public/js/mui.min.js"></script>
<script src="/xhr/Public/js/mui.enterfocus.js"></script>
<script src="/xhr/Public/js/app.js"></script>
<script src="/xhr/Public/js/mui.view.js "></script>
<script src='/xhr/Public/js/feedback.js'></script>
</head>
<body>
<script type="text/javascript" src="/xhr/Public/js/chplayer/chplayer.min.js"></script>
<div class="mui-content">
    <div class="mui-card">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell mui-collapse">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right" href="#">
                    <img class="mui-media-object mui-pull-left head-img" id="head-img" src="/xhr/Public/<?php if(empty($user[0]['headimg'])) { echo 'images/logo.png'; } else { echo 'upload/'.$user[0]['headimg']; } ?>">
                    <div class="mui-media-body">
                        <?=$user[0]['user']?>
                        <p class='mui-ellipsis'>钱包余额：<span class="mui-badge mui-badge-warning "><?=number_format($xjnum,2)?></span> </p>
                    </div>
                </a>
                <ul class="mui-table-view mui-table-view-chevron">
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="/xhr/index.php/Home/My/jbxxxg">修改资料</a>
                    </li>
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="/xhr/index.php/Home/My/xgmm">修改密码</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="mui-content">
    <div id="video" style=""></div>
</div>

<script type="text/javascript">
    var video_url = PUBLIC + '/huoying.mp4';
    var videoObject = {
        container: '#video',//“#”代表容器的ID，“.”或“”代表容器的class
        variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
        video: video_url//视频地址
    };
    var player=new chplayer(videoObject);
</script>
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
        "><a href="#">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">VIP会员</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
        <?php if($footIndex == 4){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="/xhr/index.php/Home/My/index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">个人中心</div>
        </a></li>
    </ul>
</nav>
</body>
</html>