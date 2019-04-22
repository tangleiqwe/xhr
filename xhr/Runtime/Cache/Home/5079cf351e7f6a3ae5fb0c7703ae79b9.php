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
	var URL = "/paipai/index.php/Home/User";
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

        .title{
            margin: 20px 15px 10px;
            color: #6d6d72;
            font-size: 15px;
        }

        .oa-contact-cell.mui-table .mui-table-cell {
            padding: 11px 0;
            vertical-align: middle;
        }

        .oa-contact-cell {
            position: relative;
            margin: -11px 0;
        }

        .oa-contact-avatar {
            width: 75px;
        }
        .oa-contact-avatar img {
            border-radius: 50%;
        }
        .oa-contact-content {
            width: 100%;
        }
        .oa-contact-name {
            margin-right: 20px;
        }
        .oa-contact-name, oa-contact-position {
            float: left;
        }
    </style>
    <style>
        .flex-container {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-flow: row wrap;
            justify-content: space-between;
            text-align: center;
        }

        .mui-content-padded {
            padding: 10px;
        }

        .mui-content-padded a {
            /*margin: 3px;*/
            width: 50px;
            height: 50px;
            display: inline-block;
            text-align: center;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 25px;
            background-clip: padding-box;
        }

        .mui-content-padded a .mui-icon-extra {
            margin-top: 12px;
        }

        .mui-spinner,
        .mui-spinner-white {
            margin-top: 12px
        }

        .active .mui-spinner-indicator {
            background: #007AFF;
        }

    </style>

    <style>
        .chart {
            height: 200px;
        }
        h5 {
            margin-top: 30px;
            font-weight: bold;
        }
        h5:first-child {
            margin-top: 15px;
        }

    </style>

    <style>
        .flex-container {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-flow: row wrap;
            justify-content: space-between;
            text-align: center;
        }
        .mui-content-padded {
            padding: 10px;
        }
        .mui-content-padded a {
            margin: 3px;
            width: 50px;
            height: 50px;
            display: inline-block;
            text-align: center;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 25px;
            background-clip: padding-box;
        }
        .mui-content-padded a .mui-icon {
            margin-top: 0px;
        }
        .active .mui-spinner-indicator {
            background: #007AFF;
        }
        .mui-content a {
            color: #8F8F94;
        }
        .mui-content a.active {
            color: #007aff;
        }
    </style>

    <script src="/paipai/Public/libs/echarts-all.js"></script>
</head>

<body>
<header class="mui-bar mui-bar-nav" style="height: 50px">
    <img src="/paipai/Public/images/logo1.png" style="height: 90%; padding-top: 10px">
    <!--<h1 class="mui-title">⑤①交易宝</h1>-->
</header>
<nav class="mui-bar mui-bar-tab">
    <ul class="mui-table-view mui-grid-view mui-grid-12" style="padding: 0 0 3px 0">
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"  style="color: #2D93CA; font-weight: bolder">
            <a href="/paipai/index.php/Home/User/index">
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
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/paipai/index.php/Home/My/index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 15px">个人中心</div>
            </a></li>
    </ul>
</nav>

<div class="mui-content">

    <div class="mui-card">

        <?php
 if($_SESSION['user']) { ?>
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right" href="/paipai/index.php/Home/My/index">
                    <img class="mui-media-object mui-pull-left head-img" id="head-img" src="/paipai/Public/<?php if(empty($user['headimg'])) { echo 'images/logo.png'; } else { echo 'upload/'.$user['headimg']; } ?>">
                    <div class="mui-media-body">
                        <?=$_SESSION['user']['user']?>
                        <p class='mui-ellipsis'>更新时间：<?=date("Y-m-d H:i:s")?></p>
                    </div>
                </a>
            </li>
        </ul>
        <div class="mui-card-footer">
            <a class="mui-card-link">π余额：<span class="mui-badge mui-badge-warning "><?=number_format($qb['pnum'],2)?></span></a>
            <a class="mui-card-link">RMB余额：<span class="mui-badge mui-badge-warning "><?=number_format($qb['xjnum'],2)?></span></a>
        </div>
        <?php } else {?>
        <ul class="mui-table-view mui-table-view-chevron">
            <li class="mui-table-view-cell">
                <!--<a class="mui-navigate-right" href="#">产品</a>-->
                <a class="mui-navigate-right" href="/paipai/index.php/Home/User/login">
                    <img class="mui-media-object mui-pull-left head-img" id="head-img" src="/paipai/Public/images/logo.png">
                    <div class="mui-media-body">
                        游客
                        <p class='mui-ellipsis'>请点击登录系统！</p>
                    </div>
                </a>
            </li>
        </ul>
        <?php }?>
    </div>

    <div class="mui-card">
        <!--<div class="mui-card-header mui-card-media">
            <img src="/paipai/Public/images/logo.png" />
            <div class="mui-media-body">
                PAIPAI
                <p>刷新于
                    <?=date('Y-m-d H:i:s')?>
                </p>
            </div>
            &lt;!&ndash;<img class="mui-pull-left" src="../images/logo.png" width="34px" height="34px" />
            <h2>小M</h2>
            <p>发表于 2016-06-30 15:30</p>&ndash;&gt;
        </div>-->
        <div class="mui-card-content" >
            <div class="chart" id="lineChart" style="padding-left: 10px"></div>
            <!--<img src="/paipai/Public/images/yuantiao.jpg" alt="" width="100%"/>-->
        </div>
        <div class="mui-card-footer">
            <a style="width: 40%;color: #00a2d4" class=" mui-btn mui-icon mui-icon-undo " href="/paipai/index.php/Home/My/trad/type/2"><h4>买</h4></a>
            <a style="width: 40%;color: #00a2d4" class=" mui-btn mui-icon mui-icon-redo " href="/paipai/index.php/Home/My/sell_n"> <h4>卖</h4></a>
            <!--<a class=" mui-btn mui-icon mui-icon-home"> More</a>-->
        </div>
    </div>
    <div class="mui-card">
        <!--<ul class="mui-table-view">
            <li class="mui-table-view-divider">π/RMB</li>
            <li class="mui-table-view-cell">最新价格：5.11 <span class="mui-badge mui-badge-primary">-15.28%</span></li>
            <li class="mui-table-view-cell">最高价 <span class="mui-badge mui-badge-danger">7.55</span></li>
            <li class="mui-table-view-cell">在售数量 <span class="mui-badge mui-badge-success">2500</span></li>

        </ul>-->
        <div class="mui-card-header">π/RMB</div>
        <div class="mui-card-content" >
            <ul class="mui-table-view mui-grid-view mui-grid-12" >
                <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                    <a href="#">
                        <!--<span class="mui-icon mui-icon-home"></span>-->
                        <div class="mui-media-body" style="font-size: 15px" >最低价</div>
                        <div class="mui-media-body" style="padding-bottom: 20px"><span class="mui-badge mui-badge-success" ><?=number_format($d_price,2)?></span></div>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                    <a href="#">
                        <!--<span class="mui-icon mui-icon-home"></span>-->
                        <div class="mui-media-body" style="font-size: 15px" >最高价</div>
                        <div class="mui-media-body" style="padding-bottom: 20px"><span class="mui-badge mui-badge-danger" ><?=number_format($g_price,2)?></span></div>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                    <a href="#">
                        <!--<span class="mui-icon mui-icon-home"></span>-->
                        <div class="mui-media-body" style="font-size: 15px" >成交量</div>
                        <div class="mui-media-body" style="padding-bottom: 20px"><span class="mui-badge mui-badge-warning" ><?=number_format($num,2)?></span></div>
                    </a>
                </li>
                <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" >
                    <a href="#">
                        <!--<span class="mui-icon mui-icon-home"></span>-->
                        <div class="mui-media-body" style="font-size: 15px" >成交额</div>
                        <div class="mui-media-body" style="padding-bottom: 20px"><span class="mui-badge mui-badge-purple" ><?=number_format($sumje,2)?></span></div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mui-card-footer">
            <a class="mui-card-link"></a>
            <a class="mui-card-link" href="/paipai/index.php/Home/My/trad">Read more</a>
        </div>
    </div>
</div>

</body>

<script>
    mui.init({
        swipeBack:true //启用右滑关闭功能
    });
</script>

<script>
    var getOption = function(chartType) {
        var chartOption = chartType == 'pie' ? {
            calculable: false,
            series: [{
                name: '访问来源',
                type: 'pie',
                radius: '65%',
                center: ['50%', '50%'],
                data: [{
                    value: 335,
                    name: '直接访问'
                }]
            }]
        } : {
            legend: {
                data: [ '日交易量变化情况']
            },
            grid: {
                x: 35,
                x2: 10,
                y: 30,
                y2: 25
            },
            toolbox: {
                show: false,
                feature: {
                    mark: {
                        show: true
                    },
                    dataView: {
                        show: true,
                        readOnly: false
                    },
                    magicType: {
                        show: true,
                        type: ['line', 'bar']
                    },
                    restore: {
                        show: true
                    },
                    saveAsImage: {
                        show: true
                    }
                }
            },
            calculable: false,
            xAxis: [{
                type: 'category',
                data: [<?=$res_date?>]
            }],
            yAxis: [{
                type: 'value',
                splitArea: {
                    show: true
                }
            }],
            series: [{
                name: '日交易量变化情况',
                type: chartType,
                data: [<?=$res_num?>]
            }]
        };
        return chartOption;
    };
    var byId = function(id) {
        return document.getElementById(id);
    };
    var lineChart = echarts.init(byId('lineChart'));
    lineChart.setOption(getOption('line'));
    byId("echarts").addEventListener('tap',function(){
        var url = this.getAttribute('data-url');
        plus.runtime.openURL(url);
    },false);
</script>

</html>