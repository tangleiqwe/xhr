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
	var URL = "/xhr/index.php/Home/Index";
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
    <style>


        .mui-bar .mui-pull-left .mui-icon {
            padding-right: 5px;
            font-size: 28px;
        }

        .mui-bar .mui-btn {
            font-weight: normal;
            font-size: 17px;
        }

        .mui-bar .mui-btn-link {
            top: 1px;
        }

        .mui-content img{
            width: 100%;
        }
        .hm-description{
            margin: 15px;
        }

        .hm-description>li {
            font-size: 14px;
            color: #8f8f94;
        }
        .foot-pad{
            padding: 0px 0px 0px 0px;
            min-height: 35px;
        }

    </style>
</head>

<body>



<header class="mui-bar mui-bar-transparent" style="height: 50px">
    <img src="/xhr/Public/images/baner1.png" style="height: 90%; padding-top: 10px">
    <!--<h1 class="mui-title">⑤①交易宝</h1>-->
    <a class="mui-action-back mui-icon mui-icon-search mui-pull-right" href="search.html"></a>
</header>

<nav class="mui-bar mui-bar-tab">
    <ul class="mui-table-view mui-grid-view mui-grid-12" style="padding: 0 0 3px 0; background-color: #303032" >
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3 foot-active" >
            <a href="/xhr/index.php/Home/Index/index">
                <span class="mui-icon mui-icon-home" style="padding-top: 0px;padding-bottom: 0px"></span>
                <div class="mui-tab-label" style="font-size: 11px">首页</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3 foot-no"><a href="/xhr/index.php/Home/Index/tab_list">
            <span class="mui-icon mui-icon-navigate" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">分类</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3 foot-no"><a href="#">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">VIP会员</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3 foot-no"><a href="/xhr/index.php/Home/My/index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">我的</div>
        </a></li>
    </ul>
</nav>

<div class="mui-content">
    <!--轮播图片-->
    <div id="slider" class="mui-slider " >
        <div class="mui-slider-group mui-slider-loop">
            <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
            <div class="mui-slider-item mui-slider-item-duplicate">
                <a href="#">
                    <img src="/xhr/Public/images/yuantiao.jpg">
                    <p class="mui-slider-title">静静看这世界</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/xhr/Public/images/lb1.png">
                    <p class="mui-slider-title">幸福就是可以一起睡觉</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/xhr/Public/images/muwu.jpg">
                    <p class="mui-slider-title">想要一间这样的木屋，静静的喝咖啡</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/xhr/Public/images/cbd.jpg">
                    <p class="mui-slider-title">Color of SIP CBD</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/xhr/Public/images/yuantiao.jpg">
                    <p class="mui-slider-title">静静看这世界</p>
                </a>
            </div>
            <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
            <div class="mui-slider-item mui-slider-item-duplicate">
                <a href="#">
                    <img src="/xhr/Public/images/lb1.png">
                    <p class="mui-slider-title">幸福就是可以一起睡觉</p>
                </a>
            </div>
        </div>
        <div class="mui-slider-indicator mui-text-right">
            <div class="mui-indicator mui-active"></div>
            <div class="mui-indicator"></div>
            <div class="mui-indicator"></div>
            <div class="mui-indicator"></div>
        </div>
    </div>
<br>
    <div class="mui-content" style="background-color:#fff">
        <div class="mui-card-header mui-card-media">
            <img src="/xhr/Public/images/logo1_1.png">
            <div class="mui-media-body">
                OM
                <p>最后更新于 2016-06-30 15:30</p>
            </div>
        </div>
        <div class="mui-card-content">
            <ul class="mui-table-view mui-grid-view" >
                <li class="mui-table-view-cell mui-media mui-col-xs-6" >
                    <a href="/xhr/index.php/Home/Index/video">
                        <img class="mui-media-object" src="/xhr/Public/images/shuijiao.jpg">
                        <div class="mui-media-body" style="padding-bottom: 25px">幸福就是可以一起睡觉</div>
                        <div class="mui-card-footer foot-pad">
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：433人</p></a>
                            <a class="mui-card-link"></a>
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px" ></span>：2.00</p></a>
                        </div>
                    </a></li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6" >
                    <a href="/xhr/index.php/Home/Index/video">
                        <img class="mui-media-object" src="/xhr/Public/images/muwu.jpg">
                        <div class="mui-media-body" style="padding-bottom: 25px">想要一间这样的木屋</div>

                        <div class="mui-card-footer foot-pad">
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：1533人</p></a>
                            <a class="mui-card-link"></a>
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px" ></span>：2.00</p></a>
                        </div>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6">
                    <a href="/xhr/index.php/Home/Index/video"><img class="mui-media-object" src="/xhr/Public/images/cbd.jpg">
                        <div class="mui-media-body" style="padding-bottom: 25px">Color of SIP CBD</div>
                        <div class="mui-card-footer foot-pad">
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：1533人</p></a>
                            <a class="mui-card-link"></a>
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px" ></span>：2.00</p></a>
                        </div>
                    </a></li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6">
                    <a href="/xhr/index.php/Home/Index/video">
                        <img class="mui-media-object" src="/xhr/Public/images/yuantiao.jpg">
                        <div class="mui-media-body" style="padding-bottom: 25px">静静看这世界</div>
                        <div class="mui-card-footer foot-pad">
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：132人</p></a>
                            <a class="mui-card-link"></a>
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px" ></span>：2.00</p></a>
                        </div>
                    </a></li>
            </ul>
        </div>
        <div class="mui-card-footer">
            <a class="mui-card-link"></a>
            <a class="mui-card-link" href="/xhr/index.php/Home/Index/tab_list">查看更多</a>
            <a class="mui-card-link"></a>
        </div>
    </div>
<BR>
    <div class="mui-content" style="background-color:#fff">
        <div class="mui-card-header mui-card-media">
            <img src="/xhr/Public/images/logo2_2.png">
            <div class="mui-media-body">
                YZ
                <p>最后更新于 2016-06-30 15:30</p>
            </div>
            <!--<img class="mui-pull-left" src="../images/logo.png" width="34px" height="34px" />
            <h2>小M</h2>
            <p>发表于 2016-06-30 15:30</p>-->
        </div>
        <div class="mui-card-content">
            <ul class="mui-table-view mui-grid-view" >
                <li class="mui-table-view-cell mui-media mui-col-xs-6" >
                    <a href="/xhr/index.php/Home/Index/video">
                        <img class="mui-media-object" src="/xhr/Public/images/shuijiao.jpg">
                        <div class="mui-media-body" style="padding-bottom: 25px">幸福就是可以一起睡觉</div>
                        <div class="mui-card-footer foot-pad">
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：433人</p></a>
                            <a class="mui-card-link"></a>
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px" ></span>：2.00</p></a>
                        </div>
                    </a></li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6" >
                    <a href="/xhr/index.php/Home/Index/video">
                        <img class="mui-media-object" src="/xhr/Public/images/muwu.jpg">
                        <div class="mui-media-body" style="padding-bottom: 25px">想要一间这样的木屋</div>

                        <div class="mui-card-footer foot-pad">
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：1533人</p></a>
                            <a class="mui-card-link"></a>
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px" ></span>：2.00</p></a>
                        </div>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6">
                    <a href="/xhr/index.php/Home/Index/video"><img class="mui-media-object" src="/xhr/Public/images/cbd.jpg">
                        <div class="mui-media-body" style="padding-bottom: 25px">Color of SIP CBD</div>
                        <div class="mui-card-footer foot-pad">
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：1533人</p></a>
                            <a class="mui-card-link"></a>
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px" ></span>：2.00</p></a>
                        </div>
                    </a></li>
                <li class="mui-table-view-cell mui-media mui-col-xs-6">
                    <a href="/xhr/index.php/Home/Index/video">
                        <img class="mui-media-object" src="/xhr/Public/images/yuantiao.jpg">
                        <div class="mui-media-body" style="padding-bottom: 25px">静静看这世界</div>
                        <div class="mui-card-footer foot-pad">
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：132人</p></a>
                            <a class="mui-card-link"></a>
                            <a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 14px" ></span>：2.00</p></a>
                        </div>
                    </a></li>
            </ul>
        </div>
        <div class="mui-card-footer">
            <a class="mui-card-link"></a>
            <a class="mui-card-link" href="/xhr/index.php/Home/Index/tab_list">查看更多</a>
            <a class="mui-card-link"></a>
        </div>
    </div>
    <Br>
</div>



</body>

<script type="text/javascript">
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
</script>

</html>