<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<style>
    .imgbox{
        font-size: 0;
        width: 100%;
        height: 95%;
        text-align: center;
    }
    .imgbox img{

        margin: auto;
        max-height: 100%;
        max-width: 100%;
        vertical-align: middle;
        outline: 1px solid #9aafe5 ;

    }
</style>
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
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">帮助中心</h1>
</header>
<div class="mui-content">
    <div class="mui-card">
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">一、用户注册</a>
                <div class="mui-collapse-content">
                    <p>
                        打开平台登录页面，点击注册，进入用户注册页面，录入个人账号注册信息。
                    </p>
                    <ul class="mui-table-view">
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_1_1.jpg"></li>
                        <br>
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_1_2.jpg"></li>
                    </ul>
                    <br>
                    <P>注：姓名、银行卡信息务必统一；Discovery账户和手机后四位信息务必准确，避免提现环节出现问题。</P>
                </div>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">二、用户充值</a>
                <div class="mui-collapse-content">
                            <a class="mui-navigate-right" href="#">1、π充值</a>
                            <div class="mui-collapse-content">
                                <p>
                                    在个人中心，点击账户充值，进入π充值页面，查看并复制平台π交易地址 ，
                                    通过个人Discovery账户以交易地址转账方式向平台转π，然后录入π充值信息，并上传凭证即用户个人Discovery转账截图（确保截图清晰）。
                                </p>
                                <ul class="mui-table-view">
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_1.jpg"></li>
                                    <br>
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_2.jpg"></li>
                                    <br>
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_3.jpg"></li>
                                    <br>
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_4.jpg"></li>
                                    <br>
                                    </ul>
                                <br>
                                    <P>
                                        注：51交易宝平台转π采用交易地址形式（平台交易地址可以直接在π充值页面复制），
                                        用户使用Discovery转π时请选择“通过交易地址转账”方式完成转π。如下：
                                    </P>
                                   <ul class="mui-table-view">
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_5.jpg"></li>
                                    <br>
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_6.jpg"></li>
                                    <br>
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_7.jpg"></li>
                                    <br>
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_8.jpg"></li>
                                    </ul>
                            </div>
                            <br>
                            <a class="mui-navigate-right" href="#"> 2、人民币充值</a>
                            <div class="mui-collapse-content">
                                <p>
                                    在个人中心，点击账户充值，进入人民币充值页面，查看并获取平台银行账号 ，
                                    通过个人银行账户向平台转账，然后录入充值信息，并上传凭证即用户个人银行转账截图（确保截图清晰）。
                                </p>
                                <ul class="mui-table-view">
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_9.jpg"></li>
                                    <br>
                                    <li class="imgbox"><img src="/paipai/Public/images/helppai/help_2_10.jpg"></li>
                                    <br>
                                </ul>
                                </div>
                </div>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">三、用户交易</a>
                <div class="mui-collapse-content">
                    <a class="mui-navigate-right" href="#">1、我要卖π</a>
                     <div class="mui-collapse-content">
                         <p>
                             在平台首页，点击“卖”进入卖π页面，根据用户个人意愿输入期望的π售出价格和售出数量，
                             点击“确定售出挂单”，即可显示挂单成功，等待后续用户购买。点击确定后可进入交易记录页面，
                             在交易记录中用户可以查询挂单信息。
                         </p>
                         <ul class="mui-table-view">
                             <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_1.png"></li>
                             <br>
                             <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_2.png"></li>
                             <br>
                             <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_3.png"></li>
                             <br>
                             <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_4.png"></li>
                             <br>
                         </ul>
                         </div>
                    <br>
                <a class="mui-navigate-right" href="#">2、我要买π</a>
                <div class="mui-collapse-content">
                    <p>
                    在平台首页，点击“买”进入π交易所，即可查看平台上的π资产实时成交信息。点击“全站在售委托”，
                    进入购买页面，即可查看全站π资产委卖信息，用户可以根据自己的意向价格，选取相应价格委卖的π，
                    点击“购买”后按购买提示，输入购买数量，完成购买。此时，用户购买成交记录会在“全站实时成交”信息中显示。
                    </p>
                    <ul class="mui-table-view">
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_5.png"></li>
                        <br>
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_6.png"></li>
                        <br>
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_7.png"></li>
                        <br>
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_8.png"></li>
                        <br>
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_3_9.png"></li>
                        <br>
                    </ul>
                    </div>

                </div>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">四、用户提现</a>
                <div class="mui-collapse-content">
                    <a class="mui-navigate-right" href="#">1、π提现</a>
                    <div class="mui-collapse-content">
                    <p>
                        在个人中心，点击用户提现，进入π提现页面，输入提现数量并提交，待平台审核后，两小时内将相应数量的π资产转账至用户预留的Discovery账户中。
                    </p>

                    <ul class="mui-table-view">
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_4_1.png"></li>
                        <br>
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_4_2.png"></li>
                        <br>
                        </ul>
                        </div>
                    <br>
                        <a class="mui-navigate-right" href="#">2、人民币提现</a>
                     <div class="mui-collapse-content">
                        <p>
                            在个人中心，点击用户提现，进入人民币提现页面，输入提现金额并提交，待平台审核后，两小时内将相应金额资金转账至用户预留的个人银行账户中。
                        </p>
                        <ul class="mui-table-view">
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_4_3.png"></li>
                        <br>
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_4_4.png"></li>
                        <br>
                    </ul>
                   </div>

                </div>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">五、平台推广</a>
                <div class="mui-collapse-content">
                    <p>
                        51交易宝平台设立用户推广奖励机制。用户进入个人中心，点击“邀请链接”，进入我的邀请链接页面，
                        即可查看平台为每个用户生成的个人专属的平台推荐链接。复制该链接网址发给好友，邀请的新用户使用平台发生交易时即可获得平台奖励。
                    </p>

                    <ul class="mui-table-view">
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_5_1.png"></li>
                        <br>
                        <li class="imgbox"><img src="/paipai/Public/images/helppai/help_5_2.png"></li>
                        <br>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
    mui.previewImage();
</script>

</body>

</html>