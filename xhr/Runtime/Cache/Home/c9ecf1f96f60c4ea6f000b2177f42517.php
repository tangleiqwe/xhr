<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>支付页面</title>
    <style>
        #weixin-tip{display:none;position:fixed;left:0;top:0;background:rgba(0,0,0,0.8);filter:alpha(opacity=80);width:100%;height:100%;z-index:100;}
        #weixin-tip p{text-align:center;margin-top:10%;padding:0 5%;position:relative;}
        #weixin-tip .close{color:#fff;padding:5px;font:bold 20px/24px simsun;text-shadow:0 1px 0 #ddd;position:absolute;top:0;left:5%;}
    </style>
    <script>
        var is_weixin = (function(){return navigator.userAgent.toLowerCase().indexOf('micromessenger') !== -1})();
        window.onload = function() {
            var winHeight = typeof window.innerHeight != 'undefined' ? window.innerHeight : document.documentElement.clientHeight; //兼容IOS，不需要的可以去掉
            var tip = document.getElementById('weixin-tip');
            var close = document.getElementById('close');
            if (is_weixin) {
                tip.style.height = winHeight + 'px'; //兼容IOS弹窗整屏
                tip.style.display = 'block';
            } else{
                document.getElementById("pay").submit();
            }
        }
    </script>
</head>
<body>
<form id="pay" name="pay" action="https://www.eocz.cn/apisubmit" method="post">
    <input type="hidden" name="version" value="<?php echo $version?>">
    <input type="hidden" name="customerid" value="<?php echo $customerid?>">
    <input type="hidden" name="sdorderno" value="<?php echo $sdorderno?>">
    <input type="hidden" name="total_fee" value="<?php echo $total_fee?>">
    <input type="hidden" name="paytype" value="<?php echo $paytype?>">
    <input type="hidden" name="notifyurl" value="<?php echo $notifyurl?>">
    <input type="hidden" name="returnurl" value="<?php echo $returnurl?>">
    <input type="hidden" name="remark" value="<?php echo $remark?>">
    <input type="hidden" name="bankcode" value="<?php echo $bankcode?>">
    <input type="hidden" name="sign" value="<?php echo $sign?>">
    <input type="hidden" name="get_code" value="<?php echo $get_code?>">
</form>

<div id="weixin-tip">
    <p>
        <img src="/xhr/Public/images/live_weixin.png" alt="微信打开"/>
    </p>
</div>

</body>
</html>