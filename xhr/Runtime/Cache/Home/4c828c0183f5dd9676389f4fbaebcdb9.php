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
        .mui-table h4,.mui-table h5,.mui-table .mui-h5,.mui-table .mui-h6,.mui-table p{
            margin-top: 0;
        }
        .mui-table h4{
            line-height: 21px;
            font-weight: 500;
        }

        .mui-table .oa-icon{
            position: absolute;
            right:0;
            bottom: 0;
        }
        .mui-table .oa-icon-star-filled{
            color:#f14e41;
        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">我的邀请</h1>
</header>
<nav class="mui-bar mui-bar-tab">
    <ul class="mui-table-view mui-grid-view mui-grid-12" style="padding: 0 0 3px 0">
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
            <a href="/paipai/index.php/Home/User/index" >
                <span class="mui-icon mui-icon-home" style="padding-top: 0px;padding-bottom: 0px"></span>
                <div class="mui-tab-label" style="font-size: 15px">首页</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/paipai/index.php/Home/My/trad">
            <span class="mui-icon mui-icon-navigate" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 15px">交易所</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/paipai/index.php/Home/My/jylist">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 15px">交易记录</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"  style="color: #2D93CA; font-weight: bolder"><a href="/paipai/index.php/Home/My/index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 15px">个人中心</div>
        </a></li>
    </ul>
</nav>
<div class="mui-content">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-card">
            <div class="mui-card-header mui-card-media">
                <!--<img src="/paipai/Public/images/logo.png" />-->
                <img src="/paipai/Public/<?php if(empty($vo['headimg'])) { echo 'images/logo.png'; } else { echo 'upload/'.$vo['headimg']; } ?>">
                <div class="mui-media-body">
                    <?php echo ($vo["user"]); ?>
                    <p>更新于 <?=date('Y-m-d H:i:s')?></p>
                </div>
                <!--<img class="mui-pull-left" src="../images/logo.png" width="34px" height="34px" />
                <h2>小M</h2>
                <p>发表于 2016-06-30 15:30</p>-->
            </div>
            <div class="mui-card-footer" style="font-size: 12px">
                <a class="mui-card-link">邀请：<?php echo ($vo["js"]); ?> 人</a>
                <a class="mui-card-link">贡献：<?=number_format($vo['p_yongjin'],2)?> 元</a>
                <a class="mui-card-link">推荐贡献：<?=number_format($vo['pp_yongjin'],2)?> 元</a>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</body>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>
</html>