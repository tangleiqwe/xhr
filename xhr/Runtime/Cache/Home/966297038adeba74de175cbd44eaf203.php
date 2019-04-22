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
    <link rel="stylesheet" type="text/css" href="/xhr/Public/css/app.css" />
    <link href="/xhr/Public/css/mui.picker.css" rel="stylesheet" />
    <link href="/xhr/Public/css/mui.poppicker.css" rel="stylesheet" />
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>-->
    <h1 class="mui-title">VIP会员</h1>
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
    <form id="form1" name="form1" method="post" class="">
        <input type="hidden" id="pickval" name="pickval">
        <input type="hidden" id="lev" name="lev" value="1">
        <input type="hidden" id="paytype" name="paytype" value="wap">
    <!--<div class="mui-content" style="margin-top: -13px">
        <ul class="mui-table-view">
            <li class="mui-table-view-cell">
                &lt;!&ndash;<a class="mui-navigate-right" href="#">产品</a>&ndash;&gt;
                <a class="" href="#">
                    <img class="mui-media-object mui-pull-left head-img" style="height: 60px;max-width: 60px" id="head-img" src="/xhr/Public/<?php if(empty($user['headimg'])) { echo 'images/logo.png'; } else { echo 'upload/'.$user['headimg']; } ?>">
                    <div class="mui-media-body" style="margin-top: 5px">
                        <span style="font-size: 17px;"><?=$user['name']?></span>　<span style="color: #9b9b9b">|</span>　钱包余额：<span style="padding-left: 10px;padding-right: 10px" class="mui-badge mui-badge-warning "><?=number_format($xjnum,2)?></span>
                        <p class='mui-ellipsis' style="margin-top: 12px">
                            <?php if($user['vip_end'] == '0') {?>
                            普通会员
                            <?php } else {?>
                            vip有效期至：<?=$user['vip_end']?>
                            <?php }?>
                        </p>
                    </div>
                </a>
            </li>
        </ul>
    </div>-->
        <div class="mui-card" style="margin: 0;margin-top: 5px">
            <div class="mui-card-header">vip会员套餐</div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner" style="padding: 5px 15px 5px 15px">
                    <ul class="mui-table-view">
                        <?php if(is_array($vip_list)): $i = 0; $__LIST__ = $vip_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell" id="<?php echo ($vo["id"]); ?>" style="height: 45px">
                                    <!--<span class="mui-badge mui-badge-warning">开通</span>-->
                                    <a href="/xhr/index.php/Home/buy/zhifu_181205/vipid/<?php echo ($vo["id"]); ?>/money/<?php echo ($vo["content"]); ?>/uid/<?php echo ($user["userid"]); ?>" class="mui-btn mui-badge-warning" style="margin-right: -10px;width: 70px;border-radius:50px;font-weight: 600">
                                        开通
                                    </a>
                                    <span class="mui-badge mui-badge-warning" style="right: 90px;background-color: #fff;color: #f0ad4e;font-weight: 600">￥ <?php echo ($vo["content"]); ?></span>
                                    <?php echo ($vo["name"]); ?>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <!--<div class="mui-card-footer">页脚</div>-->
        </div>
        <div class="mui-card" style="margin: 0;margin-top: 5px">
            <div class="mui-card-header">vip会员特权</div>
            <div class="mui-card-content">
                <ul class="mui-table-view mui-grid-view mui-grid-9" style="background-color:#fff">
                   <!-- <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                        <span class="mui-icon mui-icon-extra mui-icon-extra-class"  style="color: #f0ad4e"></span>
                        <div class="mui-media-body">独享片库</div></a></li>-->
                    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                        <span class="mui-icon mui-icon-extra mui-icon-extra-notice" style="color: #f0ad4e">
                            <!--<span class="mui-badge">5</span>-->
                        </span>
                        <div class="mui-media-body">杜比音效</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                        <span class="mui-icon mui-icon-extra mui-icon-extra-holiday" style="color: #f0ad4e"></span>
                        <div class="mui-media-body">尊贵标识</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                        <span class="mui-icon mui-icon-extra mui-icon-extra-trend" style="color: #f0ad4e"></span>
                        <div class="mui-media-body">播放加速</div></a></li>
                  <!--  <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                        <span class="mui-icon mui-icon-extra mui-icon-extra-gift" style="color: #f0ad4e"></span>
                        <div class="mui-media-body">推广奖励</div></a></li>-->
                    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                        <span class="mui-icon mui-icon-extra mui-icon-extra-outline" style="color: #f0ad4e"></span>
                        <div class="mui-media-body">充提优先</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                        <span class="mui-icon mui-icon-extra mui-icon-extra-custom" style="color: #f0ad4e"></span>
                        <div class="mui-media-body">尊享客服</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
                        <span class="mui-icon mui-icon-extra mui-icon-extra-new" style="color: #f0ad4e"></span>
                        <div class="mui-media-body">片源供应</div></a></li>
                </ul>
            </div>
            <!--<div class="mui-card-footer">页脚</div>-->
        </div>

    </form>
</div>
<script src="/xhr/Public/js/mui.picker.js"></script>
<script src="/xhr/Public/js/mui.poppicker.js"></script>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    var selectid = "1";
    var info = document.getElementById("info");

    function zhifu() {
        var canshu_diag = {
            version:'1.0',
            customerid:'100176',

        };
        $.ajaxSettings.async = false;
        $.post("https://www.eocz.cn/apisubmit",canshu_diag,function (diag_data) {
//                                console.log(diag_data);
            var str = '<pre class="preMain" style="padding: 0px 12px 5px 0px;border-bottom:1px solid #d9d9d9;width: 320px">' +
                    '<img src="/xhr/Public/App/dist/images/user/cf.png" style="width: 18px;margin-right: 5px;margin-top: -5px;">用药建议' +
                    '</pre>' +
                    '<div style="margin-top: 5px;margin-bottom: 5px;padding: 0px 12px">' +
                    '<p style="width: 100%;color: #5d5d5d;line-height: 25px">' +
                    '<span style="color: #000;width: 100%;line-height: 30px">疾病诊断：</span><br>'+ diag_data[0]["zd"].split(',')[0] +'<br>' +
                    '<span style="color: #000;width: 100%;line-height: 30px">药品：</span><br>';
            $(diag_data).each(function (index) {
                str = str + diag_data[index]['drugname'] + '<br>';
            });
            str = str + '</div>' +
                    '<div style="border-top:1px solid #d9d9d9;font-size: 14px;color: #b9b9b9;vertical-align: bottom;padding: 8px 0px 0px 0px;text-align: center">' +
                    '<a onclick="viewcf('+ data[index].content +')" style="border: 1px solid #7a807e;color: #3a74b4;height: 25px;line-height: 25px;padding: 5px 15px 5px 15px;border-radius: 20px">查看详情</a>' +
                    '</div>';
            content = str;
        });
    }
</script>
</body>
</html>