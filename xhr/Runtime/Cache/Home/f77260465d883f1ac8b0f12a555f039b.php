<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="/xhr/Public/map/js/echarts.js"></script>
    <script type="text/javascript" src="/xhr/Public/map/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            //json方式
            initchartForJson();
        });
    </script>
</head>
<body>
<!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
<div id="main" style="height:500px;border:1px solid #ccc;padding:10px;"></div>
</body>
<script type="text/javascript">
    var ROOT = "/xhr";
    var PUBLIC = ROOT + "/Public";
    function initchartForJson() {
        var imgPath = PUBLIC+'/images/banner5.jpg';
        console.log(imgPath);
        var mapJsonPath = PUBLIC+'/images/230100.json';
        var areaName = '哈尔滨市';
        var option = {
            series: [{
                type: 'map',
                //map的值也是，省份汉语名称
                map: areaName
            }]
        };

        $.get(mapJsonPath, function (mapJson) {
            echarts.registerMap(areaName, mapJson);
            var chart = echarts.init(document.getElementById('main'));
            chart.setOption(option);
        });
    }
</script>
</html>