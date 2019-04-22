<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PAIPAI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--标准mui.css-->
    <link rel="stylesheet" href="/paipai/Public/css/mui.min.css">
    <!--App自定义的css-->
    <link rel="stylesheet" type="text/css" href="/paipai/Public/css/app.css"/>
    <link href="/paipai/Public/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/paipai/Public/css/icons-extra.css" />


    <style>
        .title{
            margin: 20px 15px 7px;
            color: #6d6d72;
            font-size: 15px;
        }
        #clipArea {
            height: 300px;
        }
        #file,
        #clipBtn {
            margin: 20px;
        }
        #view {
            margin: 0 auto;
            width: 200px;
            height: 200px;
            background-color: #666;
        }
    </style>
</head>
<body >

<div class="mui-content">
    <div class="mui-content-padded">
        <div id="clipArea"></div>
        <input type="file" id="file" style="display: none">
        <div id="view" style="display: none"></div>
        <div class="mui-card-footer">
            <button id="cBtn_pic" type="button" class="mui-btn mui-icon mui-icon-image "  onclick="cof()" style="width: 200px;height: 50px"> 选择凭证</button>
            <button id="clipBtn" type="button" class="mui-btn mui-icon mui-icon-paperplane" style="width: 200px;height: 50px"> 确认选取并上传</button>
        </div>
    </div>

</div>



</body>
<script src="/paipai/Public/photoClip/hammer.min.js"></script>
<script src="/paipai/Public/photoClip/iscroll-zoom-min.js"></script>
<script src="/paipai/Public/photoClip/lrz.all.bundle.js"></script>
<script src="/paipai/Public/photoClip/PhotoClip.js"></script>
<script src="/paipai/Public/script/jquery.min.js"></script>
<script src="/paipai/Public/layer/layer.js"></script>

<script>
    function cof() {
        document.getElementById("file").click();
    }

    var pc = new PhotoClip('#clipArea', {
        size: 260,
        outputSize: 640,
        //adaptive: ['60%', '80%'],
        file: '#file',
//        view: '#view',
        ok: '#clipBtn',
        //img: 'img/mm.jpg',
        loadStart: function() {
            console.log('开始读取照片');
        },
        loadComplete: function() {
            console.log('照片读取完成');
        },
        done: function(dataURL) {
            $.ajax({
                url: "/paipai/index.php/Home/My/pic_rmbcz",
                data: {str: dataURL},
                type: 'post',
                dataType: 'html',
                success:function(msg){
//                    parent.$('#scpz').val('我被改变了');
                    /*parent.document.getElementById("cBtn_pic").value="凭证上传成功";
                     parent.document.getElementById("scpz").value = msg;*/
                    parent.window.location.href = "/paipai/index.php/Home/My/rmbcz/type/2/scpz/"+msg;
                }
            });

        },
        fail: function(msg) {
            alert(msg);
        }
    });

</script>

</html>