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
	var URL = "/xhr/index.php/Home/Buy";
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
    <h1 class="mui-title">订单支付结果</h1>
</header>

<div class="mui-content" >
    <form method="post" class="" action="/xhr/index.php/Home/Buy/inpost/videoid/<?=$v_info['id']?>/order_amount/<?=$v_info['sell_price']?>">
        <div class="mui-content" style="background-color:#fff">
            <!--<div class="mui-card-content" >
                <div id="video" style="width:100%;height: 280px;"></div>
            </div>-->
            <div class="mui-card-header mui-card-media" style="height:40vw;background-image:url(/xhr/Public/images/cbd.jpg)"></div>

            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <p>状态： <?=$status?></p>
                    <p style="color: #333;">描述： <?=$msg?></p>
                    <p style="color: #333;">链接： <?=$data?></p>
                </div>
            </div>
            <div class="mui-card-footer">
                <a class="mui-btn mui-btn-success mui-btn-block" href="/xhr/index.php/Home/Index/video/id/<?=$product_name?>">已打赏，请点击观看</a>
            </div>
        </div>
    </form>
</div>

<!--<form id="form1" method="get" name="form1">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="30" align="center">
                <h1>
                    ※ 在线支付结果（<?php echo $order_status; ?> ）※
                </h1>
            </td>
        </tr>
    </table>
    <table bordercolor="#cccccc" cellspacing="5" cellpadding="0" width="400" align="center"
           border="0">
        <tr>
            <td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
                商家订单号：</td>
            <td class="text_12" bordercolor="#ffffff" align="left">
                <input  name='TransID' value= "<?php echo $order_no; ?>" />
            </td>
        </tr>
        <tr>
            <td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
                验证签名结果：</td>
            <td class="text_12" bordercolor="#ffffff" align="left">
                <?php if( $valiSign ){ ?>
                <input name='resultDesc' value="验证签名成功"/>
                <?php }else{ ?>
                <input name='resultDesc' value="验证签名失败"/>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
                交易成功金额：</td>
            <td class="text_12" bordercolor="#ffffff" align="left">
                <input  name='FactMoney'  value= "<?php echo $order_amount; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
                订单附加消息：</td>
            <td class="text_12" bordercolor="#ffffff" align="left">
                <input  name='additionalInfo' value= "<?php echo $order_info; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
                交易成功时间：</td>
            <td class="text_12" bordercolor="#ffffff" align="left">
                <input  name='SuccTime' value= "<?php echo $order_success_time; ?>"/>
            </td>
        </tr>
    </table>
</form>-->
</body>
</html>