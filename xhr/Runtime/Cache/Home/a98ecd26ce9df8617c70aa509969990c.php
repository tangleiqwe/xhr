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
    <h1 class="mui-title">RMB提现</h1>
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
    <div class="mui-card">
    <h5 class="mui-content-padded">操作方式：<br><br>1、在平台提交提现申请。<br><br>
        2、平台进行审核确认，并打款（工作时间2小时内）。
    </h5>
    <form class="mui-input-group">

        <div class="mui-input-row">
            <h5 ><label style="width: 30%;">RMB余额：</label><label style="width:70%;" id="rmbye"><?=number_format($xjnum,2)?></label>
            </h5>
        </div>

    </form>
        </div>
    <div class="mui-card">
    <h5 class="mui-content-padded">提款信息
    </h5>
    <form class="mui-input-group"action="/xhr/index.php/Home/My/rmbtx_insert" method="post">
        <div class="mui-input-row">
            <h5 ><label style="width: 30%;">提款姓名：</label><label style="width:70%;" id="cardname"><?=$name?></label>
            </h5>
        </div>
        <div class="mui-input-row">
            <h5 ><label style="width: 30%;">提款卡号：</label><label style="width:70%;" id="cardid"><?=$yhcardid?></label>
            </h5>
        </div>
        <div class="mui-input-row">
            <h5 ><label style="width: 30%;">开户银行：</label><label style="width:70%;" id="khh"><?=$khh?></label>
            </h5>
        </div>
        <div class="mui-input-row">
            <label>提款金额</label>
            <input id='tkje' name="tkje" type="number" class="mui-input-clear mui-input" placeholder="请输提款金额，最少10元">
        </div>
        <div class="mui-card-footer">
        <button id='login' type="submit" class="mui-btn mui-btn-block mui-btn-primary" >提交</button>
            </div>
    </form>
        </div>
<!--    <h5 class="mui-content-padded">可撤销的RMB提现信息</h5>
    <form style="height: 250px" class="mui-input-group">

        <div  class="mui-content ">
            <div id="scroll" class="mui-scroll-wrapper">
                <div class="mui-scroll">
                    <ul class="mui-table-view mui-grid-view mui-grid-12" >
                        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                            <span class="mui-icon-extra mui-icon-extra-calc" style="font-size: 13px; font-weight: bold; color: #2D93CA">状态</span>
                        </li>
                        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                            <span class="mui-icon-extra mui-icon-extra-outline" style="font-size: 13px; font-weight: bold; color: #2D93CA">时间</span>
                        </li>
                        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                            <span class="mui-icon-extra mui-icon-extra-gold" style="font-size: 13px; font-weight: bold; color: #2D93CA">数量</span>
                        </li>
                        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                            <span class="mui-icon-extra mui-icon-extra-topic" style="font-size: 13px; font-weight: bold; color: #2D93CA">操作</span>
                        </li>
                    </ul>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a onclick="rmbtx_del(<?=$vo['id']?>)">
                            <div class="mui-card-footer" style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px;padding-right: 0px">
                                <ul class="mui-table-view mui-grid-view mui-grid-12" >
                                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                        <span class="" style="font-size: 12px">申请</span>
                                    </li>
                                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                        <span class="" style="font-size: 15px"><?php echo ($vo["operdate"]); ?></span>
                                    </li>
                                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                        <span class="" style="font-size: 12px"><?php echo ($vo["xjnum"]); ?></span>
                                    </li>
                                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                        <span class="mui-icon-extra mui-icon-extra-class" style="font-size: 13px; color:#4cd964"> 撤销</span>
                                    </li>

                                </ul>
                            </div>
                        </a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

        </div>

    </form>-->

</div>
</div>

</div>
<script>
    function rmbtx_del(id) {
        var btnArray = ['取消', '确定'];

        mui.confirm('您确定要撤销此记录？', '操作提示', btnArray, function(e) {
            if (e.index == 1) {
                window.location.href = "/xhr/index.php/Home/My/rmbtx_del/id/"+ id ;
            } else {
            }
        });
    }
    (function($) {
        $('.mui-scroll-wrapper').scroll({
            indicators: true //是否显示滚动条
        });

    })(mui);




</script>
</body>

</html>