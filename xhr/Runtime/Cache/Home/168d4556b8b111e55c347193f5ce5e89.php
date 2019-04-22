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
	var URL = "/xhr/index.php/Home/Index";
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


        div.search {
            padding: 5px 0;
            background: #191919;
        }
        form {
            position: relative;
            width: 95%;
            margin: 0 auto;
        }

        input, button {
            border: none;
            outline: none;
        }

        input {
            width: 100%;
            height: 30px;
            padding-left: 13px;
        }

        button {
            height: 25px;
            width: 42px;
            cursor: pointer;
            position: absolute;
        }

    </style>
</head>

<body>




<header class="mui-bar mui-bar-nav" style="height: 40px;left: auto;right: auto;max-width: 640px;min-width: 320px;margin: 0 auto;width: 100%;background: #191919">
    <img src="/xhr/Public/images/baner1.png" style="height: 90%; padding-top: 10px">
    <!--<h1 class="mui-title">⑤①交易宝</h1>-->
    <a  class="mui-pull-right" href="#" style="color: #fff">
        <div class="search bar8">
            <form action="/xhr/index.php/Home/Index/searchList" method="post" id="search_form">
                <input type="text" id="str" name="str" placeholder="请输入您要搜索的影片名称...">
                <button type="button" onclick="f_search()" style="z-index: 999"></button>
                <!--<a id="icon-icon-contact"><span class="mui-icon mui-icon-contact"></span></a>-->
            </form>
        </div>
    </a>
</header>

<script type="text/javascript">
    function f_search() {
        $('#str').width("241");
        $('#str').focus();

        if ($('#str').width() == "241"){
            $('#search_form').submit();
        }

    }
</script>

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

<!--<div class="indexsearch mui-content" style="padding-bottom: 0px;padding-top: 37px">
    <div class="search bar6">
        <form>
            <input type="text" placeholder="请输入您要搜索的内容...">
            <button type="submit"></button>
        </form>
    </div>
    &lt;!&ndash;<div class="mui-input-row mui-search">
        <input type="search" class="mui-input-clear" placeholder="搜你想要的" style="height: 30px;font-size: 12px">
        <span class="mui-icon mui-icon-speech"></span>
        <button>搜索</button>
    </div>&ndash;&gt;
    &lt;!&ndash;<div class="mui-input-row mui-search">
        <input type="search" class="mui-input-clear" placeholder="">
    </div>&ndash;&gt;
</div>-->

<div class="indexpage mui-content" style="padding-top: 40px">
    <!--轮播图片-->
    <div id="slider" class="mui-slider " >
        <div class="mui-slider-group mui-slider-loop">
            <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
            <div class="mui-slider-item mui-slider-item-duplicate">
                <a href="#">
                    <img src="/xhr/Public/images/banner/1.png">
                    <p class="mui-slider-title">静静看这世界</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/xhr/Public/images/banner/2.png">
                    <p class="mui-slider-title">幸福就是可以一起睡觉</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/xhr/Public/images/banner/3.png">
                    <p class="mui-slider-title">想要一间这样的木屋，静静的喝咖啡</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/xhr/Public/images/banner/4.png">
                    <p class="mui-slider-title">Color of SIP CBD</p>
                </a>
            </div>
            <div class="mui-slider-item">
                <a href="#">
                    <img src="/xhr/Public/images/banner/1.png">
                    <p class="mui-slider-title">静静看这世界</p>
                </a>
            </div>
            <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
            <div class="mui-slider-item mui-slider-item-duplicate">
                <a href="#">
                    <img src="/xhr/Public/images/banner/2.png">
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
    <?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_p): $mod = ($i % 2 );++$i;?><div class="mui-content" style="background-color:#fff;margin-top:-20px">
            <div class="mui-card-header mui-card-media " style="padding: 10px 10px 5px 10px">
                <img src="/xhr/Public/images/type/<?php echo ($vo_p["content"]); ?>" style="width: 50px;margin-top: -8px;height: auto;border-radius: 10px">
                <div class="mui-media-body" style="margin-left: 60px;">
                    <?php echo ($vo_p["name"]); ?>
                    <p style="margin-top: 3px;font-size: 12px">影片共计：15部</p>
                </div>
                <a href="/xhr/index.php/Home/Index/tab_list/tab/<?php echo ($vo_p["id"]); ?>">
                    <span style="position: absolute; bottom: 8px; right: 10px;background-image:linear-gradient(120deg,#f6513b,#f99b1f);padding-left:10px;padding-right: 10px;filter: alpha(opacity=60);height: 20px;border-radius: 10px"><p style="font-size: 12px;color: #fff;"> 更 多 </p></span>
                </a>
            </div>
            <div class="mui-card-content">
                <ul class="mui-table-view mui-grid-view" >
                    <?php
 $v_list = M('videolist')->where('v_type = '.$vo_p['id'])->order('v_pingfen desc')->limit(3)->select(); ?>

                    <?php if(is_array($v_list)): $i = 0; $__LIST__ = $v_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media mui-col-xs-4" >
                            <a href="/xhr/index.php/Home/Index/video/id/<?php echo ($vo["id"]); ?>">
                                <img class="mui-media-object" src="<?php echo ($vo["v_pic"]); ?>" style="width: 40vm">
                                <span style="position: absolute; bottom: 36px; left: 18px;background: #191919;padding-left:10px;padding-right: 10px;filter: alpha(opacity=60);"><p style="font-size: 12px;color: #e77b4a;"><span class="mui-icon mui-icon-eye" style="font-size: 12px" ></span> <?php echo ($vo["v_viewCount"]); ?></p></span>
                                <span style="position: absolute; bottom: 36px; right: 2px;background: #191919;padding-left:10px;padding-right: 10px;filter: alpha(opacity=60);"><p style="font-size: 12px;color: #e77b4a;"><?php echo ($vo["v_pingfen"]); ?></p></span>
                                <div class="mui-media-body" style="padding-bottom: 25px"><?php echo ($vo["v_name"]); ?></div>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <br><?php endforeach; endif; else: echo "" ;endif; ?>


    <!--<div class="mui-content" style="background-color:#fff;margin-top:-20px">
        <div class="mui-card-header mui-card-media">
            <img src="/xhr/Public/images/logo2_2.png">
            <div class="mui-media-body">
                最近更新
                <p>2016-06-30 15:30</p>
            </div>
        </div>
        <div class="mui-card-content">
            <ul class="mui-table-view mui-grid-view" >
                <?php if(is_array($new_list)): $i = 0; $__LIST__ = $new_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media mui-col-xs-4" >
                        <a href="/xhr/index.php/Home/Index/video/id/<?php echo ($vo["id"]); ?>">
                            &lt;!&ndash;<a class="mui-card-link"><p style="font-size: 13px; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 14px" ></span>：<?php echo ($vo["v_buyCount"]); ?>人</p></a>&ndash;&gt;
                            <img class="mui-media-object" src="/xhr/Public/upload/pic/<?php echo ($vo["v_pic"]); ?>" style="width: 40vm">
                            <span style="position: absolute; bottom: 36px; right: 5px;background: #191919;padding-left:5px;filter: alpha(opacity=60);"><p style="font-size: 12px;color: #e77b4a; text-align: right"><span class="mui-icon mui-icon-eye" style="font-size: 12px" ></span> <?php echo ($vo["v_buyCount"]); ?></p></span>
                            <div class="mui-media-body" style="padding-bottom: 25px"><?php echo ($vo["v_name"]); ?></div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        &lt;!&ndash;<div class="mui-card-footer">
            <a class="mui-card-link"></a>
            <a class="mui-card-link" href="/xhr/index.php/Home/Index/tab_list">查看更多</a>
            <a class="mui-card-link"></a>
        </div>&ndash;&gt;
    </div>-->
<BR>
</div>



</body>

<script type="text/javascript">
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
</script>
</html>