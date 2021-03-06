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
    <script type="text/javascript" src="/xhr/Public/js/chplayer/chplayer.js"></script>
    <!--<script type="text/javascript" src="/xhr/Public/js/chplayer/player.js"></script>-->
    <style>
        h5 {
        margin: 5px 7px;
        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav" style="height: 40px">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title"><?=$v_info['v_name']?></h1>
</header>
<div class="mui-content" style="padding-top:40px">
    <form method="post" class="" action="/xhr/index.php/Home/My/my_vip">
        <div class="mui-content" style="background-color:#fff">
        <div class="mui-card-content" >
                <div id="video" style="width:100%;height: 280px;"></div>
        </div>
        <?php if($buy_flag == 'false') {?>
            <div class="mui-card-content"  style="background-color: #191919;padding: 5px">
                <span style="color: #fff;font-size: 12px;padding: 5px">试看<?=$sksj?>秒，观看完整版请<a href="/xhr/index.php/Home/My/my_vip" style="color: #59ac2a;font-size: 13px;font-weight: 600"> 开通会员</a></span>
            </div>
        <?php }?>
        <div class="mui-card-content">
            <div class="mui-card-content-inner">
                <p>更新于： <?=$v_info['v_createdate']?></p>
                <p style="color: #333;"><?=$v_info['v_memo']?></p>
            </div>
        </div>
        <div class="mui-card-footer foot-pad">
            <a class="mui-card-link">评分：<?=$v_info['v_pingfen']?></a>
            <a class="mui-card-link">观看人数：<?=$v_info['v_viewCount']?></a>
        </div>

        <!--<div class="mui-card-footer">
            <?php if($buy_flag == 'false') {?>
                <button type="submit" class="mui-btn mui-btn-success mui-btn-block">
                    <?php if($loginflag == 1){?>
                        购 买 VIP 观 看
                    <?php } else {?>
                        请先登录，再点击观看
                    <?php }?>
                </button>
            <?php } else {?>
            <span class="mui-badge mui-badge-warning mui-badge-inverted" style="font-size: 16px">已是vip会员，请直接观看！</span>
            <?php }?>
        </div>-->

    </div>
</form>
</div>

<script type="text/javascript">
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    mui('.mui-scroll-wrapper').scroll();
    mui('body').on('shown', '.mui-popover', function(e) {
        //console.log('shown', e.detail.id);//detail为当前popover元素
    });
    mui('body').on('hidden', '.mui-popover', function(e) {
        //console.log('hidden', e.detail.id);//detail为当前popover元素
    });

    var video="";

    video_url = ROOT + "/pp_ht/Public"+"<?=$v_info['v_url']?>";
    video_img_url = "<?=$v_info['v_pic']?>";

    var videoObject = {
        container: '#video',
        variable: 'player',
        volume: 0.6,
        poster: video_img_url,
        autoplay: false,
        loop: false,
        live: false,
        loaded: 'loadedHandler',
        video: video_url
    };
    player=new chplayer(videoObject);

    /*$.ajax({
        url:"/xhr/index.php/Home/My/geturl",
        data:{id:<?=$v_info['id']?>},
        type:"POST",
        dataType:"text",
        success: function(data){
        video = eval(data);

        }
    })*/

    function play() {
        player.playOrPause();
    }
    function loadedHandler(){
        //播放器加载成功，可以注册监听
        player.addListener('error', errorHandler); //监听视频加载出错
        player.addListener('timeupdate', timeUpdateHandler); //监听播放时间
        player.addListener('play', playHandler); //监听视频加载出错
        player.addListener('pause', pauseHandler); //监听视频加载出错
    }
    function errorHandler(){
        alert('视频加载失败！');
    }
    var elementLogin = null; //是否存在提示层
    var buy_flag = <?=$buy_flag?>;
    var loginShow = false;

    var play_count_flag = true; //观看计数开关

    function timeUpdateHandler() {
        if(player.time >= <?php echo ($sksj); ?> && !buy_flag) {
            player.pause();//暂停播放
        }
    }
    function playHandler() { //监听播放状态
        if (play_count_flag){

            $.ajax({
                url:"/xhr/index.php/Home/Index/view_count",
                data:{id:<?=$v_info['id']?>},
                type:"POST",
                dataType:"text",
                success: function(data){
                    data_list = eval(data);

                }
            })

            play_count_flag = false;
        }

        if(loginShow) {
            player.pause();
        }
    }
    function pauseHandler() {
        if(player.time >= <?php echo ($sksj); ?> && !buy_flag) {
            if(!loginShow && !elementLogin) {
                if(confirm('<?php echo ($sksj); ?>秒试看结束，是否去购买VIP继续观看？')==true){
                    window.location.href="/xhr/index.php/Home/My/my_vip";
                }else{
                    window.location.reload();
                }
            }
        }
    }
    function fullHandler(b) { //监听全屏切换
        if(loginShow && elementLogin) {
            player.deleteElement(elementLogin);
            elementLogin = null;
            window.setTimeout('showLogin()', 200);
        }
    }
    function showlable() { //显示需要购买继续观看
        loginShow = true;
        var attribute = {
            list: [//list=定义元素列表
                {
                    type: 'text',//说明是文本
                    text: '30秒试看结束，请购买vip观看！',//文本内容
                    fontColor: '#FFFFFF',//文本颜色
                    fontSize: 14,//文本字体大小，单位：px
                    fontFamily: '"Microsoft YaHei", YaHei, "微软雅黑", SimHei,"\5FAE\8F6F\96C5\9ED1", "黑体",Arial',//文本字体
                    lineHeight:30,//文字行距
                    alpha: 1,//文本透明度(0-1)
                    paddingLeft:15,//文本内左边距离
                    paddingRight:15,//文本内右边距离
                    paddingTop:5,//文本内上边的距离
                    paddingBottom:5,//文本内下边的距离
                    marginLeft:10,//文本离左边的距离
                    marginRight:0,//文本离右边的距离
                    marginTop:10,//文本离上边的距离
                    marginBottom:0,//文本离下边的距离
                    backgroundColor:'#000000',//文本的背景颜色
                    backAlpha:0.5,//文本的背景透明度(0-1)
                    backRadius:30//文本的背景圆角弧度
                }
            ],
            x:10,//元件x轴坐标，注意，如果定义了position就没有必要定义x,y的值了，x,y支持数字和百分比，使用百分比时请使用单引号，比如'50%'
            y: 10,//元件y轴坐标
            alpha:1,//元件的透明度
            backAlpha:0.5,//元件的背景透明度(0-1)
            backRadius:60//元件的背景圆角弧度
        }
        elementLogin=player.addElement(attribute);//elementLogin是返回元件本身，可以用于其它用户，比如缓动
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
</body>
</html>