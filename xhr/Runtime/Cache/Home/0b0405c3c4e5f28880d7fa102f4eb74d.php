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
    <title></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link href="css/index.css" rel="stylesheet" />-->
    <style>
        html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            height: 100%;
        }

        body {
            -webkit-font-smoothing: antialiased;
            line-height: 1.6;
            font-family: "Helvetica Neue",Helvetica,"Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;
            height: 100%;
        }

        input, textarea, button, a {
            outline: 0;
        }

        body, h1, h2, h3, h4, h5, h6, p, ul, ol, dl, dd, fieldset, textarea {
            margin: 0;
        }

        fieldset, legend, textarea, input {
            padding: 0;
        }

        ul, ol {
            padding-left: 0;
            list-style-type: none;
        }

        a img, fieldset {
            border: 0;
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary {
            display: block;
        }

        audio, canvas, video {
            display: inline-block;
        }

        audio:not([controls]) {
            display: none;
            height: 0;
        }

        pre {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            white-space: pre-wrap;
            word-break: initial;
        }
        .preMain {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            white-space: pre-wrap;
            word-break: initial;
            font-weight: 700;
        }

        .hide {
            display: none;
        }

        svg:not(:root) {
            overflow: hidden;
        }

        figure {
            margin: 0;
        }

        button, input, select, textarea {
            font-family: inherit;
            font-size: 100%;
            margin: 0;
        }

        button, select {
            text-transform: none;
        }

        button, html input[type=button], input[type=reset], input[type=submit] {
            cursor: pointer;
            -webkit-appearance: button;
        }

        button[disabled], html input[disabled] {
            cursor: default;
        }

        input[type=checkbox], input[type=radio] {
            box-sizing: border-box;
            padding: 0;
        }

        input[type=search] {
            box-sizing: content-box;
            -moz-box-sizing: content-box;
            -webkit-appearance: textfield;
            -webkit-box-sizing: content-box;
        }

        input[type=search]::-webkit-search-cancel-button, input[type=search]::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        button::-moz-focus-inner, input::-moz-focus-inner {
            border: 0;
            padding: 0;
        }

        textarea {
            overflow: auto;
            vertical-align: top;
            resize: none;
        }

        input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
            box-shadow: inset 0 0 0 1000px #fff;
            -moz-box-shadow: inset 0 0 0 1000px #fff;
            -webkit-box-shadow: inset 0 0 0 1000px #fff;
        }

        select {
            border-radius: 0;
            -webkit-border-radius: 0;
        }

        img{
            vertical-align: middle;
        }

        a.btn {
            text-decoration: none;
        }

        .btn {
            display: inline-block;
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            padding: 2px 4px;
            font-size: 14px;
            height: 20px;
            line-height: 20px;
            margin-top: 3px;
            cursor: pointer;
        }

        .btn_send {
            background-color: #5CB700;
            color: white;
            display: none;
        }


        .clearfix:after {
            content: ' ';
            visibility: hidden;
            display: block;
            height: 0;
            clear: both;
        }

        .main {
            height: 100%;
        }

        .main_inner {
            height: 100%;
            overflow: hidden;
        }

        .panel {
            position: relative;
            width: 0px;
            height: 100%;
            float: left;
            background: #2e3238;
        }

        /*信息*/
        .box {
            position: relative;
            background-color: #eee;
            height: 100%;
            overflow: hidden;
            display: flex;
            flex-flow: column;
        }

        .box_hd {
            height: 0px;
        }

        .box_bd {
            padding: 10px 10px 0;
            overflow-y: auto;
            overflow-x: hidden;
            flex: 1;
        }


        .message {
            margin-bottom: 16px;
            float: left;
            width: 100%;
        }

        .message.me {
            float: right;
            text-align: right;
            clear: right;
        }

        .message .avatar {
            width: 40px;
            height: 40px;
            border-radius: 2px;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            float: left;
            cursor: pointer;
        }

        .message.me .avatar {
            float: right;
        }

        .message .nickname {
            font-weight: 400;
            padding-left: 10px;
            font-size: 12px;
            height: 22px;
            line-height: 24px;
            color: #4f4f4f;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            word-wrap: normal;
        }

        .message .nickname .time {
            margin-left: 10px;
        }

        .message.me .nickname {
            padding-right: 10px;
        }

        .message.me .nickname .time {
            margin-right: 10px;
        }

        .message .content {
            overflow: hidden;
        }

        .bubble {
            max-width: 70%;
            min-height: 1em;
            display: inline-block;
            vertical-align: top;
            position: relative;
            text-align: left;
            font-size: 14px;
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            margin: 0 10px;
        }

        .bubble.bubble_default {
            background-color: #fff;
        }

        .bubble:before, .bubble:after {
            position: absolute;
            top: 14px;
            border: 6px solid transparent;
            content: " ";
        }

        .bubble.left:before, .bubble.left:after {
            right: 100%;
        }

        .bubble.left:after {
            border-right-color: #FFF;
            border-right-width: 4px;
        }

        .bubble.right:before, .bubble.right:after {
            left: 100%;
        }

        .bubble.right:after {
            border-left-color: #FFF;
        }

        .bubble.bubble_primary {
            background-color: #b2e281;
        }

        .bubble.bubble_primary.left:after {
            border-right-color: #b2e281;
            border-right-width: 4px;
        }

        .bubble.bubble_primary.right:after {
            border-left-color: #b2e281;
            border-left-width: 4px;
        }

        .bubble.bubble_primary.right.arrow_primary:before {
            border-left-color: #b2e281;
            border-left-width: 4px;
        }

        .bubble.bubble_primary.right.arrow_primary:after {
            border-left-color: #fff;
            border-left-width: 4px;
            margin-left: -2px;
        }

        .bubble.no_arrow {
            background-color: transparent;
        }

        .bubble.no_arrow:before, .bubble.no_arrow:after {
            display: none;
        }

        .bubble_cont {
            word-wrap: break-word;
            word-break: break-all;
            min-height: 25px;
        }



        .bubble_cont img {
            vertical-align: middle;
        }

        .bubble_cont .plain {
            padding: 9px 13px;
        }

        .bubble_cont .picture {
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        .bubble_cont .picture img {
            display: block;
            cursor: pointer;
            max-width: 100%;
        }


        .box_ft {
            background-color: white;
            padding: 0 6px;
            border-top: 1px solid #ccc;
        }

        .box_ft_hd {
            display: flex;
        }

        .box_ft_hd .eaitWrap {
            flex: 1;
            padding-bottom: 5px;
        }

        .box_ft_hd .editArea {
            overflow-y: auto;
            overflow-x: hidden;
            outline: 0;
            border-bottom: 1px solid #ababab;
            font-size: 14px;
            padding: 0 5px;
            max-height: 2em;
            line-height: 1.4;
            margin-top: 5px;
        }

        .web_wechat_face {
            background: url(img/ico.png) 0 -805px;
            width: 30px;
            height: 30px;
            vertical-align: middle;
            display: inline-block;
        }

        .web_wechat_pic {
            background: url(img/ico.png) 0 -1638px;
            width: 30px;
            height: 30px;
            vertical-align: middle;
            display: inline-block;
            margin: 0px 3px;
        }



        .exp_hd {
            overflow: hidden;
            background-color: #F2F2F2;
        }

        .exp_hd_item {
            float: left;
        }

        .exp_hd_item.active {
            background-color: #fff;
            border-top-left-radius: 4px;
            -moz-border-radius-topleft: 4px;
            -webkit-border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            -moz-border-radius-topright: 4px;
            -webkit-border-top-right-radius: 4px;
        }

        .exp_hd_item a {
            display: block;
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            font-size: 14px;
        }

        .exp_bd {
            overflow: auto;
            background-color: #fff;
        }

        .exp_cont {
            display: none;
            height:200px;
            padding: 10px 0;
            min-height: 50px;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .exp_cont.active {
            display: block;
        }

        .eaitWrap .qqface{
            border:0;
        }

        /*信息end*/


        /*表情*/

        .qqface{
            float: left;
            font-size: 0;
            text-indent: -999em;
            border-bottom: 1px solid #F0F0F0;
            border-right: 1px solid #F0F0F0;
            cursor: pointer;
            background: url(img/face1.png) top left no-repeat;
            width: 28px;
            height: 28px;
            display: inline;
            display: -moz-inline-stack;
            display: inline-block;
            vertical-align: top;
            zoom: 1;
            *display: inline;
        }

        .qqface0 {
            background-position: 0 0;
        }

        .qqface1 {
            background-position: -29px 0;
        }

        .qqface2 {
            background-position: -58px 0;
        }

        .qqface3 {
            background-position: -87px 0;
        }

        .qqface4 {
            background-position: -116px 0;
        }

        .qqface5 {
            background-position: -145px 0;
        }

        .qqface6 {
            background-position: -174px 0;
        }

        .qqface7 {
            background-position: -203px 0;
        }

        .qqface8 {
            background-position: -232px 0;
        }

        .qqface9 {
            background-position: -261px 0;
        }

        .qqface10 {
            background-position: -290px 0;
        }

        .qqface11 {
            background-position: -319px 0;
        }

        .qqface12 {
            background-position: -348px 0;
        }

        .qqface13 {
            background-position: -377px 0;
        }

        .qqface14 {
            background-position: -406px 0;
        }

        .qqface15 {
            background-position: 0 -29px;
        }

        .qqface16 {
            background-position: -29px -29px;
        }

        .qqface17 {
            background-position: -58px -29px;
        }

        .qqface18 {
            background-position: -87px -29px;
        }

        .qqface19 {
            background-position: -116px -29px;
        }

        .qqface20 {
            background-position: -145px -29px;
        }

        .qqface21 {
            background-position: -174px -29px;
        }

        .qqface22 {
            background-position: -203px -29px;
        }

        .qqface23 {
            background-position: -232px -29px;
        }

        .qqface24 {
            background-position: -261px -29px;
        }

        .qqface25 {
            background-position: -290px -29px;
        }

        .qqface26 {
            background-position: -319px -29px;
        }

        .qqface27 {
            background-position: -348px -29px;
        }

        .qqface28 {
            background-position: -377px -29px;
        }

        .qqface29 {
            background-position: -406px -29px;
        }

        .qqface30 {
            background-position: 0 -58px;
        }

        .qqface31 {
            background-position: -29px -58px;
        }

        .qqface32 {
            background-position: -58px -58px;
        }

        .qqface33 {
            background-position: -87px -58px;
        }

        .qqface34 {
            background-position: -116px -58px;
        }

        .qqface35 {
            background-position: -145px -58px;
        }

        .qqface36 {
            background-position: -174px -58px;
        }

        .qqface37 {
            background-position: -203px -58px;
        }

        .qqface38 {
            background-position: -232px -58px;
        }

        .qqface39 {
            background-position: -261px -58px;
        }

        .qqface40 {
            background-position: -290px -58px;
        }

        .qqface41 {
            background-position: -319px -58px;
        }

        .qqface42 {
            background-position: -348px -58px;
        }

        .qqface43 {
            background-position: -377px -58px;
        }

        .qqface44 {
            background-position: -406px -58px;
        }

        .qqface45 {
            background-position: 0 -87px;
        }

        .qqface46 {
            background-position: -29px -87px;
        }

        .qqface47 {
            background-position: -58px -87px;
        }

        .qqface48 {
            background-position: -87px -87px;
        }

        .qqface49 {
            background-position: -116px -87px;
        }

        .qqface50 {
            background-position: -145px -87px;
        }

        .qqface51 {
            background-position: -174px -87px;
        }

        .qqface52 {
            background-position: -203px -87px;
        }

        .qqface53 {
            background-position: -232px -87px;
        }

        .qqface54 {
            background-position: -261px -87px;
        }

        .qqface55 {
            background-position: -290px -87px;
        }

        .qqface56 {
            background-position: -319px -87px;
        }

        .qqface57 {
            background-position: -348px -87px;
        }

        .qqface58 {
            background-position: -377px -87px;
        }

        .qqface59 {
            background-position: -406px -87px;
        }

        .qqface60 {
            background-position: 0 -116px;
        }

        .qqface61 {
            background-position: -29px -116px;
        }

        .qqface62 {
            background-position: -58px -116px;
        }

        .qqface63 {
            background-position: -87px -116px;
        }

        .qqface64 {
            background-position: -116px -116px;
        }

        .qqface65 {
            background-position: -145px -116px;
        }

        .qqface66 {
            background-position: -174px -116px;
        }

        .qqface67 {
            background-position: -203px -116px;
        }

        .qqface68 {
            background-position: -232px -116px;
        }

        .qqface69 {
            background-position: -261px -116px;
        }

        .qqface70 {
            background-position: -290px -116px;
        }

        .qqface71 {
            background-position: -319px -116px;
        }

        .qqface72 {
            background-position: -348px -116px;
        }

        .qqface73 {
            background-position: -377px -116px;
        }

        .qqface74 {
            background-position: -406px -116px;
        }

        .qqface75 {
            background-position: 0 -145px;
        }

        .qqface76 {
            background-position: -29px -145px;
        }

        .qqface77 {
            background-position: -58px -145px;
        }

        .qqface78 {
            background-position: -87px -145px;
        }

        .qqface79 {
            background-position: -116px -145px;
        }

        .qqface80 {
            background-position: -145px -145px;
        }

        .qqface81 {
            background-position: -174px -145px;
        }

        .qqface82 {
            background-position: -203px -145px;
        }

        .qqface83 {
            background-position: -232px -145px;
        }

        .qqface84 {
            background-position: -261px -145px;
        }

        .qqface85 {
            background-position: -290px -145px;
        }

        .qqface86 {
            background-position: -319px -145px;
        }

        .qqface87 {
            background-position: -348px -145px;
        }

        .qqface88 {
            background-position: -377px -145px;
        }

        .qqface89 {
            background-position: -406px -145px;
        }

        .qqface90 {
            background-position: 0 -174px;
        }

        .qqface91 {
            background-position: -29px -174px;
        }

        .qqface92 {
            background-position: -58px -174px;
        }

        .qqface93 {
            background-position: -87px -174px;
        }

        .qqface94 {
            background-position: -116px -174px;
        }

        .qqface95 {
            background-position: -145px -174px;
        }

        .qqface96 {
            background-position: -174px -174px;
        }

        .qqface97 {
            background-position: -203px -174px;
        }

        .qqface98 {
            background-position: -232px -174px;
        }

        .qqface99 {
            background-position: -261px -174px;
        }

        .qqface100 {
            background-position: -290px -174px;
        }

        .qqface101 {
            background-position: -319px -174px;
        }

        .qqface102 {
            background-position: -348px -174px;
        }

        .qqface103 {
            background-position: -377px -174px;
        }

        .qqface104 {
            background-position: -406px -174px;
        }



        /*表情end*/


        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            background-color: #c3c3c3;
        }

        ::-webkit-scrollbar-track {
            background-color: transparent;
        }

    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav" style="height: 40px">
    <!--<a class="mui-icon mui-icon-left-nav mui-pull-left" href="/xhr/index.php/Home/My/Index"></a>-->
    <h1 class="mui-title">平台留言</h1>
</header>
<div id="div_body" class="page_add_product page_pro page_zixun">

    <div id="div_main" class="main_inner clearfix" style="padding-top: 45px;margin-bottom: 40px">
        <div class="panel"></div>
        <div id="chatArea" class="box chat" style="padding-top: 10px">
            <div class="box_hd"></div>
            <div class="box_bd" id="messageList">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['type'] == 2) { ?>
                        <div class="message me">
                            <img class="avatar" src="/xhr/Public/images/logo.png" />
                            <div class="content">
                                <div class="nickname"><?=$user['name']?><span class="time"><?php echo ($vo["r_date"]); ?></span></div>
                                <div class="bubble bubble_primary right">
                                    <div class="bubble_cont">
                                        <div class="plain">
                                            <pre><?php echo ($vo["r_value"]); ?></pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="message">
                            <img class="avatar" src="/xhr/Public/upload/<?=$user['headimg']?>" />
                            <div class="content">
                                <div class="nickname">平台<span class="time"><?php echo ($vo["r_date"]); ?></span></div>
                                <div class="bubble bubble_default left">
                                    <div class="bubble_cont">
                                        <div class="plain">
                                            <pre><?php echo ($vo["r_value"]); ?></pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <form class=""   action="/xhr/index.php/Home/Index/liuyan_save" method="post">
        <input type="hidden" name="uid" value="<?php echo ($user["userid"]); ?>">
        <div id="div_foot" class="wrap_con footbar askprice_footbar" style="height: 40px;padding: 0">
            <div class="btn_group dis_box" >
                <div class="left_box box_flex" style="width: 80%">
                    <a href="javascript:void(0)" >
                        <div class=" icon_wxyy icon_btn" style="height: 40px;background-size:50px;background-position:8px 2px"></div>
                    </a>
                    <input name="liuyan_txt" value="" style="height: 35px;margin-top: 3px;margin-left: 10px;width: 80%;border: 1px;border-bottom: 1px solid #ccc;font-size: 14px" onclick="lis_gg()" >
                </div>
                <div class="box_flex" style="width: 20%;">
                    <button type="submit" class="btn btn_buy" style="width: 90%;margin-right: 0;border-radius:3px;height: 30px;line-height: 30px;font-size: 13px;margin-top: 5px;margin-left: 5px">发送</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(function () {
        lis_gg();
    })

    function lis_gg() {
        var scrollHeight = $('#div_body').prop("scrollHeight");
        $("html,body").animate({scrollTop:scrollHeight}, 500);
    }
</script>
</body>
</html>