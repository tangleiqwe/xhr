<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

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
    <script src="/paipai/Public/script/jquery.min.js"></script>
    <script src="/paipai/Public/layer/layer.js"></script>
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
    <h1 class="mui-title">玩客币充值</h1>
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
    <div class="mui-card">
        <div class="mui-input-row">
        <div class="mui-content-padded">
            <h5>操作提示：</h5>
            <p>
                1、转账玩客币至平台个人玩客币钱包，并上传转账凭证。<br>2、在交易平台填写充值信息并提交。
            </p>
            <h5>平台交易地址：</h5>
        </div>
            <div class="mui-input-row" style="margin: 10px 5px;">
                <textarea id="cardid" rows="2" readonly  placeholder="多行文本框"><?=C('pai_cm')?></textarea>
                <div class="mui-card-footer">
                    <a class="mui-card-link"></a>
                    <a class="mui-card-link" onClick="copy_cardid()">复制链克账户</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mui-card">
    <h5 class="mui-content-padded">充值信息</h5>
    <form class="mui-input-group" action="/paipai/index.php/Home/My/paicz_insert" method="post">
    <div class="mui-input-row">
        <label>账号</label>
        <input id='zhanghao'name="zhanghao" type="text" class="mui-input-clear mui-input" placeholder="请输入使用的链克账户">
    </div>
    <div class="mui-input-row">
    <label>充值数量</label>
    <input id='czsl'name="czsl" type="number" class="mui-input-clear mui-input" placeholder="请输入充值数量，最少5个">

        </div>

        <input id='czpz' name="czpz" type="hidden" class="mui-input-clear mui-input" placeholder="上传凭证" value="<?=$scpz?>">
        <!--<div class="mui-input-row">
            <label>凭证上传</label> <input type="file"  style="top: 5px" class="mui-input-clear mui-input"name="file" />

            &lt;!&ndash;<input type="submit" name="submit" class="mui-input-clear mui-input" value="上传" />&ndash;&gt;
        </div>-->
        <div class="mui-card-footer">
            <?php if($type == 1) { ?>
            <button id="cBtn_pic" type="button" class="mui-btn mui-icon mui-icon-image "  onclick="cof()" style="width: 150px;height: 40px"> 上传凭证</button>
            <?php } else {?>
            <button id="cBtn_pic1" type="button" class="mui-btn mui-icon mui-icon-image mui-btn-royal"  onclick="cof()" style="width: 150px;height: 40px;" disabled> 凭证上传成功</button>
            <?php  }?>
            <button id="login" type="submit" class="mui-btn mui-icon mui-icon-paperplane" style="width: 150px;height: 40px"> 提交审核</button>

        </div>
        <!--<div class="mui-card-footer">
            <button id='login' type="submit" class="mui-btn mui-btn-block mui-btn-primary" >提交</button>
        </div>-->

    </form>
    </div>
    </div>

</div>
<script>
    function cof() {
        layer.open({
            type: 2,
            title: '选择凭证并上传',
            shadeClose: true,
            shade: 0.8,
            area: ['95%', '470px'],
            content: '/paipai/index.php/Home/My/pic_pai' //iframe的url
        });
    }

    function copy_cardid()
    {
        var cardid=document.getElementById("cardid");
        cardid.select(); // 选择对象
        document.execCommand("Copy"); // 执行浏览器复制命令
    }
</script>
</body>

</html>