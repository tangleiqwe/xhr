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

        .mui-card .mui-control-content {
            padding: 10px;
        }

        .mui-control-content {
            height: 150px;
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

<div class="mui-content">
    <div style="padding: 10px 10px;">
        <div id="segmentedControl" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-primary">
            <?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="mui-control-item <?php if($vo['id']== $tab) echo 'mui-active'?>" href="#item<?php echo ($vo["id"]); ?>">
                    <?php echo ($vo["name"]); ?>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div>
        <?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="item<?php echo ($vo["id"]); ?>" class="mui-control-content <?php if($vo['id']== $tab) echo 'mui-active'?>" style="height: 800px">
                <div id="scroll" class="mui-scroll-wrapper">
                    <div class="mui-scroll">
                        <ul id="ul_<?php echo ($vo["id"]); ?>" dtype="<?php echo ($vo["id"]); ?>" class="mui-table-view mui-grid-view">
                            <?php
 $list = M('videolist')->where('v_type = '.$vo['id'])->order('id desc')->limit(9)->select(); ?>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_p): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media mui-col-xs-4" >
                                    <a id="<?php echo ($vo_p["id"]); ?>">
                                        <img class="mui-media-object" src="<?php echo ($vo_p["v_pic"]); ?>" style="width: 40vm">
                                        <span style="position: absolute; bottom: 36px; left: 18px;background: #191919;padding-left:10px;padding-right: 10px;filter: alpha(opacity=60);"><p style="font-size: 12px;color: #e77b4a;"><span class="mui-icon mui-icon-eye" style="font-size: 12px" ></span> <?php echo ($vo_p["v_viewCount"]); ?></p></span>
                                        <span style="position: absolute; bottom: 36px; right: 2px;background: #191919;padding-left:10px;padding-right: 10px;filter: alpha(opacity=60);"><p style="font-size: 12px;color: #e77b4a;"><?php echo ($vo_p["v_pingfen"]); ?></p></span>

                                        <div class="mui-media-body" style="padding-bottom: 25px"><?php echo ($vo_p["v_name"]); ?></div>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="mui-card-footer">
                            <a class="mui-card-link"></a>
                            <div id="more_<?php echo ($vo["id"]); ?>" class="mui-card-link" onclick="addendList(this)">点击 查看更多</div>
                            <div id="all_<?php echo ($vo["id"]); ?>" class="mui-card-link" style="display: none" >无更多内容</div>
                            <a class="mui-card-link"></a>
                        </div>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

</div>
<script src="../js/mui.min.js"></script>
<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    (function($) {
        $('#scroll').scroll({
            indicators: true //是否显示滚动条
        });
        var segmentedControl = document.getElementById('segmentedControl');
        $('.mui-input-group').on('change', 'input', function() {
            if (this.checked) {
                var styleEl = document.querySelector('input[name="style"]:checked');
                var colorEl = document.querySelector('input[name="color"]:checked');
                if (styleEl && colorEl) {
                    var style = styleEl.value;
                    var color = colorEl.value;
                    segmentedControl.className = 'mui-segmented-control' + (style ? (' mui-segmented-control-' + style) : '') + ' mui-segmented-control-' + color;
                }
            }
        });
    })(mui);
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

<script>
    mui.init();
    function addendList(obj) {
        var ul = $(obj).parent().parent().find("ul");
        var type_id = ul.attr('dtype');
        lis = ul.children();
         $.ajax({
             url:"/xhr/index.php/Home/Index/new_tab_list",//这里指向的就不再是页面了，而是一个方法。
             data:{type:type_id,count:lis.length},
             type:"POST",
             dataType:"text",
             success: function(data){
                data_list = eval(data);
             console.log(data_list.length);
                 if(data_list.length != 0){
                     var temp = createFragment(ul,data_list);
                     console.log(temp);
                     ul.append(temp);
//                     new_lis = ul.getElementsByTagName('li');
//                    self.endPullUpToRefresh();
                 } else {
                     $('#more_'+type_id).hide();
                     $('#all_'+type_id).show();
//                    self.endPullUpToRefresh(true); //参数是true，加载完毕
                 }
             }
         })
    }
    var createFragment = function(ul, data_list) {
//        var length = ul.querySelectorAll('li').length;
        var fragment = document.createDocumentFragment();
        var li;
        $.each(data_list, function (i) {
            //console.log(data_list[i]);
            li = document.createElement('li');
            li.className = 'mui-table-view-cell mui-media mui-col-xs-4';
            var a_id = data_list[i].id;
            li.innerHTML = '<a href="/xhr/index.php/Home/Index/video/id/'+ a_id +'">' +
                    '<img class="mui-media-object" src="/xhr/Public/upload/pic/'+ data_list[i].v_pic +'" style="width: 40vm">' +
                    '<span style="position: absolute; bottom: 36px; left: 18px;background: #191919;padding-left:10px;padding-right: 10px;filter: alpha(opacity=60);"><p style="font-size: 12px;color: #e77b4a;"><span class="mui-icon mui-icon-eye" style="font-size: 12px" ></span> '+ data_list[i].v_viewCount +'</p></span>' +
                    '<span style="position: absolute; bottom: 36px; right: 2px;background: #191919;padding-left:10px;padding-right: 10px;filter: alpha(opacity=60);"><p style="font-size: 12px;color: #e77b4a;">'+ data_list[i].v_pingfen +'</p></span>' +
                    '<div class="mui-media-body" style="padding-bottom: 25px">'+ data_list[i].v_name +'</div></a>';
            fragment.appendChild(li);
        })
        return fragment;
    };
    (function($) {

        $("#div_tab").on('tap', 'a', function (event) {
            //console.log(this.id);
            window.location.href="/xhr/index.php/Home/Index/video/id/" + this.id;
        });
    })(mui);
</script>
<script>

</script>
</body>
</html>