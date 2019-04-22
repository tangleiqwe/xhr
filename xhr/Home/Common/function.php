<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/25 0025
 * Time: 下午 3:46
 */

/**
 * 获取来访IP地址
 */
function ip($outFormatAsLong = false)
{
    if (isset($HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR']))
        $ip = $HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'];
    elseif (isset($HTTP_SERVER_VARS['HTTP_CLIENT_IP']))
        $ip = $HTTP_SERVER_VARS['HTTP_CLIENT_IP'];
    elseif (isset($HTTP_SERVER_VARS['REMOTE_ADDR']))
        $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
    elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    elseif (isset($_SERVER['HTTP_CLIENT_IP']))
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    elseif (isset($_SERVER['REMOTE_ADDR']))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = '0.0.0.0';

    // 有时候获取两个IP
    // 前一个是实际IP，后一个是本地局域网
    // string(24) "220.172.11.231, 10.3.0.4"
    if (strrpos(',', $ip) >= 0) {
        $ip = explode(',', $ip, 2);
        $ip = current($ip);
    }

    //$ip=explode('.', $ip);
    //return ($ip[0]<<24)|($ip[1]<<16)|($ip[2]<<8)|$ip[3];
    return $outFormatAsLong ? ip2long($ip) : $ip;
}



function wjStrFilter($str, $pi_Def = "", $pi_iType = 1)
{
    if (isset($_GET[$str]))
        $str = trim($_GET[$str]);
    else if (isset($_POST[$str]))
        $str = trim($_POST[$str]);
    else if ($str)
        $str = trim($str);
    else
        return $pi_Def;
    // INT
    if ($pi_iType == 0) {
        if (is_numeric($str))
            return $str;
        else
            return $pi_Def;
    }

    // String
    if ($str) {
        $str = str_replace("chr(9)", "&nbsp;", $str);
        $str = str_replace("chr(10)chr(13)", "<br />", $str);
        $str = str_replace("chr(10)", "<br />", $str);
        $str = str_replace("chr(13)", "<br />", $str);
        $str = str_replace("chr(32)", "&nbsp;", $str);
        $str = str_replace("chr(34)", "&quot;", $str);
        $str = str_replace("chr(39)", "&#39;", $str);
        $str = str_replace("script", "&#115cript", $str);
        $str = str_replace("&", "&amp;", $str);
        $str = str_replace(";", "&#59;", $str);
        $str = str_replace("'", "&#39;", $str);
        $str = str_replace("<", "&lt;", $str);
        $str = str_replace(">", "&gt;", $str);
        $str = str_replace("#", "&#40;", $str);
        $str = str_replace("*", "&#42;", $str);
        $str = str_replace("--", "&#45;&#45;", $str);

        $str = preg_replace("/insert/i", "", $str);
        $str = preg_replace("/update/i", "", $str);
        $str = preg_replace("/delete/i", "", $str);
        $str = preg_replace("/exec/i", "", $str);

        if (get_magic_quotes_gpc()) {
            $str = str_replace("\\\"", "&quot;", $str);
            $str = str_replace("\\''", "&#039;", $str);
        } else {
            $str = addslashes($str);
            $str = str_replace("\"", "&quot;", $str);
            $str = str_replace("'", "&#039;", $str);

        }
        $str = mysql_escape_string($str);
    }
    return $str;
}

function getPl($type = null, $played = null)
{
    $type = wjStrFilter($type, 0, 0);
    $played = wjStrFilter($played, 0, 0);
//    if($type==null) $type=$this->type;
//    if($played==null) $played=$this->$played;

    $rs = M("played")->field("bonusProp, bonusPropBase")->where("id=%d", array($played))->find();
    return $rs;
}

function ifs()
{
    $args = func_get_args();
    for ($i = 0; $i < count($args); $i++) {
        if ($args[$i] === '0' || $args[$i]) return $args[$i];
    }
}

function getTypes($type)
{
    if (empty($type)) {
        $sql = "select * from ssc_type where isDelete=0 order by sort asc";
        $types = getObject($sql, 'id', null, 3600);
    } else {
        $sql = "select * from ssc_type where isDelete=0 and id=$type order by sort asc";
        $types = M()->query($sql);
        $types = $types[0];
    }
    return $types;
}

function getObject($sql, $field, $params = null, $expire = 0)
{
//        echo $sql;exit;
//    if($expire){
//        //var_dump($this->getCacheDir());exit;
//        if(is_file($file=getCacheDir().md5($sql.serialize($params))) && filemtime($file)+$expire>$times){
//            $str = 'a:1:{i:3;a:14:{s:2:"id";s:1:"3";s:4:"type";s:1:"1";s:6:"enable";s:1:"1";s:8:"isDelete";s:1:"0";s:4:"sort";s:1:"2";s:4:"name";s:6:"ssc-jx";s:8:"codeList";s:19:"0,1,2,3,4,5,6,7,8,9";s:5:"title";s:15:"江西时时彩";s:9:"shortName";s:9:"江西彩";s:4:"info";s:65:"时间：09:00～23:00<br>频率：10分钟/期<br>全天：84期";s:9:"onGetNoed";s:5:"no0Hd";s:10:"data_ftime";s:2:"90";s:16:"defaultViewGroup";s:1:"2";s:7:"android";s:1:"1";}}';
//            //$str = "";
//            return unserialize($str);
//        }else{
//            file_put_contents($file, serialize($data=getObject($sql, $field, $params)));
//            return $data;
//        }
//    }else{

    $sql = str_replace("?", $params, $sql);
    $types = M()->query($sql);
    $data = array();
    if ($types) foreach ($types as $var) {
        $data[$var['id']] = $var;
    }

    return $data;
//    }
}


//随机函数
function randomkeys($length)
{
    $key = "";
    $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $pattern1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pattern2 = '0123456789';
    for ($i = 0; $i < $length; $i++) {
        $key .= $pattern{mt_rand(0, 35)};
    }

    return $key;
}


function iff($if, $true, $false = '')
{
    return $if ? $true : $false;
}

function msg_b($s)
{
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no"> <link rel="stylesheet" href="' . __ROOT__ . '/Public/css/mui.min.css"> <script src="' . __ROOT__ . '/Public/js/mui.min.js"></script> <script src="' . __ROOT__ . '/Public/script/jquery.min.js"></script><script type="text/javascript"> $(document).ready(function () { mui.alert("' . $s . '","提醒",function() {history.go(-1);}); });</script>';
    exit;
}
function msg_b_l($s)
{
    echo '<link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript">  $(document).ready(function () { layer.alert("' . $s . '");});</script>';
    exit;
}

function msg_l($s, $u)
{
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no"> <link rel="stylesheet" href="' . __ROOT__ . '/Public/css/mui.min.css"> <script src="' . __ROOT__ . '/Public/js/mui.min.js"></script> <script src="' . __ROOT__ . '/Public/script/jquery.min.js"></script><script type="text/javascript"> $(document).ready(function () { mui.alert("' . $s . '","提醒",function() {window.location.href="' . $u . '";}); });</script>';
    exit;
}

function msg_u($u)
{
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <script src="' . __ROOT__ . '/Public/script/jquery.min.js"></script><script type="text/javascript"> $(document).ready(function () { window.location.href="' . $u . '";});</script>';
    exit;
}

function msg_p($s, $u)
{
    echo '<link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript"> $(document).ready(function () { layer.alert("' . $s . '",{icon: 7}, function(index){  window.parent.location.href="' . $u . '";  layer.close(index);}); });</script>';
    exit;
}
function msg_p_r($s)
{
    echo '<link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript"> $(document).ready(function () { layer.alert("' . $s . '",{icon: 7}, function(index){  window.parent.location.reload();  layer.close(index);}); });</script>';
    exit;
}
function layerclose($s)
{
    echo '<link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript"> $(document).ready(function () { layer.alert("' . $s . '",{icon: 7}, function(index){  layer.close(index);}); });</script>';
    exit;
}


function getBrowser()
{
    $flag = $_SERVER['HTTP_USER_AGENT'];
    $para = array();

    // 检查操作系统
    if (preg_match('/Windows[\d\. \w]*/', $flag, $match)) $para['os'] = $match[0];

    if (preg_match('/Chrome\/[\d\.\w]*/', $flag, $match)) {
        // 检查Chrome
        $para['browser'] = $match[0];
    } elseif (preg_match('/Safari\/[\d\.\w]*/', $flag, $match)) {
        // 检查Safari
        $para['browser'] = $match[0];
    } elseif (preg_match('/MSIE [\d\.\w]*/', $flag, $match)) {
        // IE
        $para['browser'] = $match[0];
    } elseif (preg_match('/Opera\/[\d\.\w]*/', $flag, $match)) {
        // opera
        $para['browser'] = $match[0];
    } elseif (preg_match('/Firefox\/[\d\.\w]*/', $flag, $match)) {
        // Firefox
        $para['browser'] = $match[0];
    } else {
        $para['browser'] = 'unkown';
    }
    //print_r($para);exit;
    return $para;
}

function str_digui($arr, $lastid, &$return)
{
    if (!empty($arr)) {
        $sign = 0;//是否是第一个子元素
        $lorr = 2;//第一个子元素是否是左枝
//        dump($arr);
        foreach ($arr as $k => $v) {
            if ($v['lastid'] == $lastid) {
                $u_left = substr($v['weizhi'], -1);
//                dump($u_left);
                if ($sign == 0) {
                    if ($u_left == 'r') {
                        $tempstr = ",
                'children': [
                    { 'name': '未注册', 'uid': ''";
                        $tempv = $v;
                        $lorr = 1;//第一个是右枝
                    } else {
                        $return = $return . ",
                'children': [
                    { 'name': '" . $v['username'] . "', 'fandian': '" . $v['fandian'] . "'";
//                    dump($return);
                        str_digui($arr, $lastid . $v['uid'] . ",", $return);
                        $lorr = 0;//第一个是左枝
                    }
                    $sign = 1;
                    unset($arr[$k]);
                } else {
                    if ($u_left == 'r') {
                        $return = $return . ",
                    { 'name': '" . $v['username'] . "', 'fandian': '" . $v['fandian'] . "'";
//                    dump($return);
                        $sign = 2;
                        unset($arr[$k]);
                        str_digui($arr, $lastid . $v['uid'] . ",", $return);
                    } else {
                        $return = $return . ",
                'children': [
                    { 'name': '" . $v['username'] . "', 'fandian': '" . $v['fandian'] . "'";
                        str_digui($arr, $lastid . $v['uid'] . ",", $return);
                        unset($arr[$k]);

                        $return = $return . ",
                    { 'name': '" . $tempv['username'] . "', 'fandian': '" . $tempv['fandian'] . "'";
//                        dump($return);
                        str_digui($arr, $lastid . $tempv['uid'] . ",", $return);
                        unset($tempv);
                        unset($tempstr);
                        $sign = 2;
                    }
                }
            }
        }
//        dump($return);


        if ($sign == 1) {
            if ($lorr == 1) {
                $return = $return . ",
                'children': [
                    { 'name': '未注册', 'uid': ''}";
                $return = $return . ",
                    { 'name': '" . $tempv['username'] . "', 'fandian': '" . $tempv['fandian'] . "'";
                str_digui($arr, $lastid . $tempv['uid'] . ",", $return);
                $return = $return . "]";
                if ($tempv['username'] == 'e123456') {
//                    dump($return);
                }
                unset($tempv);
                unset($tempstr);
            } else {
                $return = $return . ",
                    { 'name': '未注册', 'uid': ''}]";
            }
        }
        if ($sign == 2) {
            $return = $return . "]";
        }
        $return = $return . "}";
//        dump($return);
    }
}

function weizhi_l($arr, $lastid, $u)
{
    $return = $u;
    if (!empty($arr)) {
        foreach ($arr as $k => $v) {
            if ($v['lastid'] == $lastid) {
                $u_weizhi = substr($v['weizhi'], -1);

                if ($u_weizhi == 'l') {
                    $return = weizhi_l($arr,$lastid . $v['uid'] . ",", $v);
                }
                unset($arr[$k]);
            }
        }
    }
    return $return;
}

function weizhi_r($arr, $lastid, $u)
{
    $return = $u;
    if (!empty($arr)) {
        foreach ($arr as $k => $v) {
            if ($v['lastid'] == $lastid) {
                $u_weizhi = substr($v['weizhi'], -1);

                if ($u_weizhi == 'r') {
                    $return = weizhi_l($arr,$lastid . $v['uid'] . ",", $v);
                }
                unset($arr[$k]);
            }
        }
    }
    return $return;
}

/**
 * 获得某天的统计信息
 */
function getDateCount($date=null){
    if(!$date) $date=strtotime(date("Y-m-d",time()));
    //$sql="select count(*) betCount, sum(beiShu*mode*actionNum*(fpEnable+1)) betAmount, sum(beiShu*mode/2*zjCount*bonusProp) zjAmount from {$this->prename}bets where kjTime between $date and $date+24*3600 and lotteryNo<>'' and isDelete=0";
    $sql="select count(*) betCount, sum(beiShu*mode*actionNum*(fpEnable+1)) betAmount, sum(bonus) zjAmount from ssc_bets where kjTime between $date and $date+24*3600 and lotteryNo<>'' and isDelete=0";
    $rs=M()->query($sql);
    $all = $rs[0];
    $rs = M('coin_log')->field('sum(coin) s')->where("liqType between 2 and 3 and actionTime between $date and $date+24*3600")->find();
    $all['fanDianAmount']=$rs['s'];
    $rs = M('coin_log')->field('sum(coin) s')->where("liqType in(50,51,52,53) and actionTime between $date and $date+24*3600")->find();
    $all['brokerageAmount']=$rs['s'];

    return $all;
}
function updateRows($table, $data, $where){
    $sql="update $table set";
    foreach($data as $key=>$_v)
    {
        $_v = checkstr($_v);
        $sql.=" $key = '$_v',";
    }
    $sql=rtrim($sql, ',')." where $where";
    $id = M()->execute($sql);
//    dump(M()->_sql());exit;
    return $id;
}
function insertRow($table, $data){
    $sql="insert into $table(";
    $values='';
    foreach($data as $key=>$val){
        $val = checkstr($val);
        if($values){
            $sql.=', ';
            $values.=', ';
        }
        $sql.="`$key`";
        $values.="'" .$val ."'";
    }
    $sql.=") values($values)";
    $id = M()->execute($sql);
    return $id;
    //return $this->insert($sql, $data);
}
/**
 * 管理员日志
 */
function addLog($type,$logString, $extfield0=0, $extfield1=''){
    $user = unserialize($_SESSION['admin-session-name']);
    $log=array(
        'uid'=>$user["uid"],
        'username'=>$user['username'],
        'type'=>$type,
        'actionTime'=>intval($_SERVER['REQUEST_TIME']),
        'actionIP'=>ip(true),
        'action'=>$logString,
        'extfield0'=>$extfield0,
        'extfield1'=>$extfield1
    );
    insertRow('ssc_admin_log', $log);
}

function CsubStr($str,$start,$len,$suffix='...'){
    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $str, $info);
    $len*=2;
    $i=0;
    $tmpstr = '';
    while($i < $len && array_key_exists($start,$info[0])) {
        if (strlen($info[0][$start]) > 1) {
            $i+=2;
            if ($i <= $len)  $tmpstr .= $info[0][$start];
        }else {
            if (++$i <= $len)  $tmpstr .= $info[0][$start];
        }
        $start++;
    }
    return array_key_exists($start,$info[0]) ? $tmpstr.=$suffix : $tmpstr;
}

function checkupload(){//1 检查是否有超过规定时间未上传凭证的数据 2 检查是否有超过项目结束时间的项目，将状态变成众筹结束（2）
    $delay = C('delay_time')*60;
//    $sql = "select * from ald_wap_funding_in where flag=1 and in_date+$delay<".time(). " ";
    $rs = M("wap_funding_in")->field("id,num,funding_id")->where(("flag=1 and in_date+$delay<".time()))->select();
//    dump(M()->_sql());
    if(!empty($rs)){
        foreach ($rs as $v) {
            try {
                M()->startTrans();
                $sql = "update ald_wap_funding_in set flag=4,isDelete=1 where id=" . $v["id"];
                M()->execute($sql);
                $sql = "update ald_wap_funding set left_num=left_num+" . $v["num"] . " where id=" . $v["funding_id"];
                M()->execute($sql);
                M()->commit();
            }catch(Exception $e){
                M()->rollback();
            }
        }
    }

    //检查是否有超过项目结束时间的项目，将状态变成众筹结束（2）
    $rs = M("wap_funding")->field("id")->where(("flag=0 and out_date<".time()))->select();
//    dump(M()->_sql());
    if(!empty($rs)){
        foreach ($rs as $v) {
//            dump($v["id"]);
            $sql = "update ald_wap_funding set flag=1 where id=" . $v["id"];
            M()->execute($sql);
        }
    }
}

function sendphone($mobile,$xiangmu,$member,$num){//众筹短信提醒
    $message = "您好，由您发起的众筹项目【". $xiangmu ."】，会员【". $member ."】已参与【". $num ."】，请及时查看并确认。";
    $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
    $post_data = "account=cf_tefw&password=abc654321abc&mobile=".$mobile."&content=".rawurlencode($message);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $target);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $return_str = curl_exec($curl);
    curl_close($curl);
    $gets = xml_to_array($return_str);

    if($gets['SubmitResult']['code']==2){
        $_SESSION['mobile'] = $mobile;
        return 'success';
    }else{
        return $gets['SubmitResult']['msg'];
    }
}

function sendtraderok($mobile,$member,$num,$type){//会员完成π转账或资金转账，等待共享者确认。短信发送给共享者
    //$type:类型(1 买入，2卖出)
    if($type == 1){
        $message = "您好，会员【$member】已申请购买【$num】π，并已完成资金转账，请及时查看并确认。";
    }else{
        $message = "您好，会员【$member】已申请卖出【$num】π，并已完成π转账，请及时查看并确认。";
    }
    $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
    $post_data = "account=cf_tefw&password=abc654321abc&mobile=".$mobile."&content=".rawurlencode($message);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $target);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $return_str = curl_exec($curl);
    curl_close($curl);
    $gets = xml_to_array($return_str);

    if($gets['SubmitResult']['code']==2){
        $_SESSION['mobile'] = $mobile;
        return 'success';
    }else{
        return $gets['SubmitResult']['msg'];
    }
}

function sendmemberok($mobile,$member,$num,$type){//共享者完成π转账或资金转账，等待会员评价。短信发送给会员
    //$type:类型(1 买入，2卖出)
    if($type == 1){
        $message = "您好，您购买的【$num】π，共享者【$member】已完成π转账，请及时查看并评价。";
    }else{
        $message = "您好，您卖出的【$num】π，共享者【$member】已完成资金转账，请及时查看并评价。";
    }
    $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
    $post_data = "account=cf_tefw&password=abc654321abc&mobile=".$mobile."&content=".rawurlencode($message);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $target);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $return_str = curl_exec($curl);
    curl_close($curl);
    $gets = xml_to_array($return_str);

    if($gets['SubmitResult']['code']==2){
        $_SESSION['mobile'] = $mobile;
        return 'success';
    }else{
        return $gets['SubmitResult']['msg'];
    }
}

/*function sendtraderok($mobile,$member,$num){//会员完成π转账，等待共享者确认。短信发送给共享者
    $message = "您好，会员【$member】已申请卖出【$num】π，并已完成π转账，请及时查看并确认。";
    $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
    $post_data = "account=cf_tefw&password=abc654321abc&mobile=".$mobile."&content=".rawurlencode($message);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $target);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $return_str = curl_exec($curl);
    curl_close($curl);
    $gets = xml_to_array($return_str);

    if($gets['SubmitResult']['code']==2){
        $_SESSION['mobile'] = $mobile;
        return 'success';
    }else{
        return $gets['SubmitResult']['msg'];
    }
}*/

//将 xml数据转换为数组格式。
function xml_to_array($xml){
    $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
    if(preg_match_all($reg, $xml, $matches)){
        $count = count($matches[0]);
        for($i = 0; $i < $count; $i++){
            $subxml= $matches[2][$i];
            $key = $matches[1][$i];
            if(preg_match( $reg, $subxml )){
                $arr[$key] = xml_to_array( $subxml );
            }else{
                $arr[$key] = $subxml;
            }
        }
    }
    return $arr;
}

function checkuser(){
	//dump($_SESSION['openid']);
    /*if(empty($_SESSION['openid'])){
        //header("location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0f9d0bda068ef7ed&redirect_uri=http://wap.tjtrds.com/index.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect");
        redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0f9d0bda068ef7ed&redirect_uri=http://wap.tjtrds.com/index.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect");
    }else{
        if(empty($_SESSION['admin_name'])){
			//dump($_SESSION);
			//header("location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0f9d0bda068ef7ed&redirect_uri=http://wap.tjtrds.com/index.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect");
			redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0f9d0bda068ef7ed&redirect_uri=http://wap.tjtrds.com/index.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect");
			
            //$user = M('v_user')->where('openid="%s"',array($_SESSION['openid']))->find();
			//dump($user);
            //$_SESSION['admin_name'] = $user;
			//dump($_SESSION);
        }else{
            $user = $_SESSION['admin_name'];
        }
    }*/

    if(empty($_SESSION['user'])){
        msg_l("请先登录系统！",U('Home/User/login'));
    }else{
        $user = $_SESSION['user'];
    }
    return $user;
}

function time_tran($date) {
    $str = '';
    $timer = strtotime($date);
    $diff = $_SERVER['REQUEST_TIME'] - $timer;
    $day = floor($diff / 86400);
    $free = $diff % 86400;
    if($day > 0) {
        return $day."天前";
    }else{
        if($free>0){
            $hour = floor($free / 3600);
            $free = $free % 3600;
            if($hour>0){
                return $hour."小时前";
            }else{
                if($free>0){
                    $min = floor($free / 60);
                    $free = $free % 60;
                    if($min>0){
                        return $min."分钟前";
                    }else{
                        if($free>0){
                            return $free."秒前";
                        }else{
                            return '刚刚';
                        }
                    }
                }else{
                    return '刚刚';
                }
            }
        }else{
            return '刚刚';
        }
    }
}

//上传新闻图片，不验证为空
function pic_upload($pic_src){

    $upload = new \Think\Upload();
    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
    $upload->rootPath = 'ald_houtai/Public';
    $upload->savePath = '/upload/xinwen/';

//    dump($upload->rootPath);exit;

    if (!empty($_FILES[$pic_src]["name"])) {
        if (strpos($_FILES[$pic_src]["name"], "exe") === false && strpos($_FILES[$pic_src]["name"], "bat") === false) {
            if ((($_FILES[$pic_src]["type"] == "image/gif") || ($_FILES[$pic_src]["type"] == "image/jpeg") || ($_FILES[$pic_src]["type"] == "image/png") || ($_FILES[$pic_src]["type"] == "image/pjpeg"))) {
                $info = $upload->uploadOne($_FILES[$pic_src]);
                if (!$info) {
                    msg_b($upload->getError());
                }
                $pic = $info['savename'];
            } else {
                msg_b("只能上传gif或者jpg格式的图片!");
            }
        } else {
            msg_b("只能上传gif或者jpg格式的图片!");
        }
    }else{
        msg_b("图片没找到，请重新上传凭证图片!");
    }
    return $pic;
}

function getparameter($type){
    $rs = M('parameter')->where('type="%s"',array($type))->find();
    $value = $rs['value'];
    return $value;
}
