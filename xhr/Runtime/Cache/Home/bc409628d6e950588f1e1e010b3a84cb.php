<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" name="pay" id="pay" action="<?php echo $payUrl; ?>">
    <table>
        <tr>
            <td>
                <input name='service_type' type='hidden' value="<?php echo $service_type; ?>"/>
                <input name='merchant_code' type='hidden' value="<?php echo $merchant_code; ?>"/>
                <input name='interface_version' type='hidden' value="<?php echo $interface_version; ?>"/>
                <input name='sign_type' type='hidden' value="<?php echo $sign_type; ?>"/>
                <input name='order_no' type='hidden' value="<?php echo $order_no; ?>"/>
                <input name='order_time' type='hidden' value="<?php echo $order_time; ?>"/>
                <input name='order_amount' type='hidden' value="<?php echo $order_amount; ?>"/>
                <input name='product_number' type='hidden' value="<?php echo $product_number; ?>"/>
                <input name='notify_url' type='hidden' value="<?php echo $notify_url; ?>"/>
                <input name='return_url' type='hidden' value="<?php echo $return_url; ?>"/>
                <input name='bank_code' type='hidden' value="<?php echo $bank_code; ?>"/>
                <input name='product_name' type='hidden' value="<?php echo $product_name; ?>"/>
                <input name='order_userid' type='hidden' value="<?php echo $order_userid; ?>"/>
                <input name='order_info' type='hidden' value="<?php echo $order_info; ?>"/>
                <input name='notice_type' type='hidden' value="<?php echo $notice_type; ?>"/>
                <input name='sign' type='hidden' value="<?php echo $sign; ?>"/>
                <input name='pay_model' type='hidden' value="<?php echo $pay_model; ?>"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    function subpay(){
        document.pay.submit();
    }
    //设置等待1秒提交from，防止Post提交太快里面的数据丢失;
    //等待1秒提交,页面会空白1秒，请接入者自行在本页中设计增加等待的之类的图片作为显示渲染;
    setTimeout(subpay,1000);
</script>
</body>
</html>