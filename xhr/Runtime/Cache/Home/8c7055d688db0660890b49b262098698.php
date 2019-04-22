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
    <!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>-->
    <h1 class="mui-title">交易记录</h1>
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
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"  style="color: #2D93CA; font-weight: bolder"><a href="/paipai/index.php/Home/My/jylist">
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
    <div id="slider" class="mui-slider">
        <div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
            <a class="mui-control-item" href="#item1mobile">
                购入记录
            </a>
            <a class="mui-control-item" href="#item2mobile">
                卖出记录
            </a>
        </div>
        <div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-6"></div>

        <div class="mui-slider-group">
            <div id="item1mobile" class="mui-slider-item mui-control-content <?php if($type != 2) {?> mui-active <?php }?>">
                <div id="scroll1" class="mui-scroll-wrapper">
                    <div class="mui-scroll">
                        <ul class="mui-table-view mui-grid-view mui-grid-12" >
                            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4" >
                                <span class="mui-icon-extra mui-icon-extra-outline" style="font-size: 14px; font-weight: bold; color: #2D93CA">时间</span>
                            </li>
                            <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-2" >
                                <span class="mui-icon-extra mui-icon-extra-calc" style="font-size: 14px; font-weight: bold; color: #2D93CA">数量</span>
                            </li>
                            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                <span class="mui-icon-extra mui-icon-extra-prech" style="font-size: 14px; font-weight: bold; color: #2D93CA">价格</span>
                            </li>
                            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                <span class="mui-icon-extra mui-icon-extra-gold" style="font-size: 14px; font-weight: bold; color: #2D93CA">总价</span>
                            </li>
                        </ul>
                        <?php if(is_array($buy_list)): $i = 0; $__LIST__ = $buy_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-card-footer" style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px;padding-right: 0px">
                                <ul class="mui-table-view mui-grid-view mui-grid-12" >
                                    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4" >
                                        <span class="" style="font-size: 14px"><?php echo ($vo["operdate"]); ?></span>
                                    </li>
                                    <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-2" >
                                        <span class="" style="font-size: 14px"><?php echo ($vo["num"]); ?></span>
                                    </li>
                                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                        <span class="" style="font-size: 15px"><?php echo ($vo["price"]); ?></span>
                                    </li>
                                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                        <span class="" style="font-size: 14px"><?php echo ($vo["sumje"]); ?></span>
                                    </li>
                                </ul>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div id="item2mobile" class="mui-slider-item mui-control-content <?php if($type == 2) {?> mui-active <?php }?>">
                <div id="scroll2" class="mui-scroll-wrapper">
                    <div class="mui-scroll">
                        <ul class="mui-table-view mui-grid-view mui-grid-12" >
                            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                <span class="mui-icon-extra mui-icon-extra-outline" style="font-size: 14px; font-weight: bold; color: #2D93CA">时间</span>
                            </li>
                            <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-2" >
                                <span class="mui-icon-extra mui-icon-extra-calc" style="font-size: 14px; font-weight: bold; color: #2D93CA">数量</span>
                            </li>
                            <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-2" >
                                <span class="mui-icon-extra mui-icon-extra-prech" style="font-size: 14px; font-weight: bold; color: #2D93CA">价格</span>
                            </li>
                            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                <span class="mui-icon-extra mui-icon-extra-gold" style="font-size: 14px; font-weight: bold; color: #2D93CA">总价</span>
                            </li>
                            <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-2" >

                            </li>
                        </ul>
                        <?php if(is_array($sell_list)): $i = 0; $__LIST__ = $sell_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['type'] == '挂单'){ ?>
                            <a id="confirmBtn" name="confirmBtn" onclick="conf(<?=$vo['id']?>)" >
                                <?php }?>
                                <div class="mui-card-footer" style="padding-top: 0px;padding-bottom: 0px;padding-left: 0px;padding-right: 0px">
                                    <ul class="mui-table-view mui-grid-view mui-grid-12" >
                                        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                            <span class="" style="font-size: 14px"><?php echo ($vo["operdate"]); ?></span>
                                        </li>
                                        <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-2" >
                                            <span class="" style="font-size: 14px"><?php echo ($vo["num"]); ?></span>
                                        </li>
                                        <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-2" >
                                            <span class="" style="font-size: 15px"><?php echo ($vo["price"]); ?></span>
                                        </li>
                                        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                                            <span class="" style="font-size: 14px"><?php echo ($vo["sumje"]); ?></span>
                                        </li>


                                        <li class="mui-table-view-cell mui-media mui-col-xs-2 mui-col-sm-2" >
                                            <?php
 if($vo['type'] == '挂单'){ ?>
                                            <span class="mui-icon-extra mui-icon-extra-cart" style="font-size: 13px; color:#4cd964"> 挂单</span>
                                            <?php }else {?>
                                            <span class="mui-icon-extra mui-icon-extra-class" style="font-size: 13px; color:#ff8000"> 完成</span>
<?php }?>
                                        </li>
                                    </ul>
                                </div>
                                <?php
 if($vo['type'] == '挂单'){ ?>
                            </a>
                            <?php } endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script>
    mui.toast('挂单记录，可点击撤单！');

    mui.init({
        swipeBack: false
    });
    function conf(id) {

        var btnArray = ['否', '是'];
        mui.confirm('您确定撤销此订单么？', '撤单警告', btnArray, function(e) {
            if (e.index == 1) {
               window.location.href="/paipai/index.php/Home/My/chedan/id/"+id;
            } else {

            }
        })

    }
    (function($) {
        $('.mui-scroll-wrapper').scroll({
            indicators: true //是否显示滚动条
        });
        /*var html2 = '<ul class="mui-table-view"><li class="mui-table-view-cell">第二个选项卡子项-1</li><li class="mui-table-view-cell">第二个选项卡子项-2</li><li class="mui-table-view-cell">第二个选项卡子项-3</li><li class="mui-table-view-cell">第二个选项卡子项-4</li><li class="mui-table-view-cell">第二个选项卡子项-5</li></ul>';
         //        var html3 = '<ul class="mui-table-view"><li class="mui-table-view-cell">第三个选项卡子项-1</li><li class="mui-table-view-cell">第三个选项卡子项-2</li><li class="mui-table-view-cell">第三个选项卡子项-3</li><li class="mui-table-view-cell">第三个选项卡子项-4</li><li class="mui-table-view-cell">第三个选项卡子项-5</li></ul>';
         var item2 = document.getElementById('item2mobile');
         //        var item3 = document.getElementById('item3mobile');
         document.getElementById('slider').addEventListener('slide', function(e) {
         if (e.detail.slideNumber === 1) {
         if (item2.querySelector('.mui-loading')) {
         setTimeout(function() {
         item2.querySelector('.mui-scroll').innerHTML = html2;
         }, 500);
         }
         }
         });*/

    })(mui);
</script>

</body>

</html>