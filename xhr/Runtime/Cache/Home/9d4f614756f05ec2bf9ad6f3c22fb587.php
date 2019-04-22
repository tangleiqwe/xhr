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
	var Set = ROOT + "/Public";
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
<header class="mui-bar mui-bar-nav">
    <!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>-->
    <h1 class="mui-title">个人中心</h1>
</header>
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

<div class="mui-content">
    <div class="mui-content"  style="margin-top: -13px">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell mui-collapse">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right" href="#">
                    <img class="mui-media-object mui-pull-left head-img"  style="height: 60px;max-width: 60px"  id="head-img" src="/xhr/Public/<?php if(empty($user[0]['headimg'])) { echo 'images/logo.png'; } else { echo 'upload/'.$user[0]['headimg']; } ?>">
                    <div class="mui-media-body" style="margin-top: 5px">
                        <span style="font-size: 17px;"><?=$user[0]['user']?></span>
                        <?php if($sfkqtj == 'Y') { ?>
                        　<span style="color: #9b9b9b">|</span>　钱包余额：<span style="padding-left: 10px;padding-right: 10px" class="mui-badge mui-badge-warning "><?=number_format($xjnum,2)?></span>
                        <?php } ?>
                        <p class='mui-ellipsis' style="margin-top: 12px">
                            <?php if($user[0]['vip_end'] == '0') {?>
                            普通会员
                            <?php } else {?>
                            vip有效期至：<?=$user[0]['vip_end']?>
                            <?php }?>
                        </p>
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
    <?php if($sfkqtj == 'Y') { ?>
    <div class="mui-content" style="margin-bottom: 10px;">
        <ul class="mui-table-view">
            <!--<li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right">
                    账户充值
                </a>
                <ul class="mui-table-view mui-table-view-chevron">
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="/xhr/index.php/Home/My/rmbcz/type/1">RMB充值</a>
                    </li>
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="/xhr/index.php/Home/My/czlist">充值记录</a>
                    </li>
                </ul>
            </li>-->
            <li class="mui-table-view-cell mui-collapse">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right">
                    用户提现
                </a>
                <ul class="mui-table-view mui-table-view-chevron">
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="/xhr/index.php/Home/My/rmbtx">RMB提现</a>
                    </li>
                    <li class="mui-table-view-cell"><a class="mui-navigate-right" href="/xhr/index.php/Home/My/txlist">提现记录</a>
                    </li>
                </ul>
            </li>
            <li class="mui-table-view-cell" style="vertical-align: middle">
                <a class="mui-navigate-right" href="/xhr/index.php/Home/My/join">
                    <!--<img class=" mui-pull-left" style="width: 35px; padding-right: 10px" src="/xhr/Public/images/1111.png">-->
                    <span class="mui-badge mui-badge-danger"><?=$js?></span>
                    我的邀请
                </a>
            </li>
            <li class="mui-table-view-cell" style="vertical-align: middle">
                <a class="mui-navigate-right" href="/xhr/index.php/Home/My/reg_invitation">
                    <!--<img class=" mui-pull-left" style="width: 35px; padding-right: 10px" src="/xhr/Public/images/1111.png">-->

                    邀请链接
                </a>
            </li>
        </ul>
    </div>
    <?php } ?>
    <div class="mui-content" style="margin-bottom: 10px;">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell">
                <a  class="mui-navigate-right"href="/xhr/index.php/Home/My/buy_list">会员购买记录 <i class="mui-pull-right update"></i></a>
            </li>
        </ul>
    </div>
    <div class="mui-content" style="margin-bottom: 30px;">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell">
                <a  class="mui-navigate-right"href="/xhr/index.php/Home/My/liuyan">平台留言 <i class="mui-pull-right update"></i></a>
            </li>
        </ul>
    </div>
    <!--<div class="mui-content" style="margin-bottom: 30px;">
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell">
                <a  class="mui-navigate-right"href="/xhr/index.php/Home/My/helppai">帮助中心 <i class="mui-pull-right update">V1.1.0</i></a>
            </li>
        </ul>
    </div>-->



    <div class="mui-content">
        <ul class="mui-table-view">
            <li class="mui-table-view-cell" style="text-align: center;">
                <a href="/xhr/index.php/Home/User/loginout">退出登录</a>
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