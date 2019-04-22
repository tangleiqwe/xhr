<?php
namespace Home\Controller;
use Think\Controller;
class BuyController extends Controller {


    public function _initialize(){
        /*global $user;
        $user = checkuser();
        $this->assign('user', $user);*/
    }



    public function index($videoid){
        global $user;
        try{
            //从session里取
            $userid = $user['userid'];
            //$videoid = checkstr($_REQUEST['videoid']);

            $sql = "select count(1) js from buy_video where userid = $userid and videoid = $videoid and Dele = 1";
            $info = M()->query($sql);
            $check_js = $info[0]['js'];

            if($check_js == 0){

                $sell_price = M('videolist')->field('sell_price')->where('id = '.$videoid)->find();
                $sell_price = $sell_price['sell_price'];

                M()->startTrans();

                /* ________预留调用支付接口__________ */
                $this->js($sell_price,$videoid,$userid);
                /* _____________________________ */

                $para['userid'] = $userid;
                $para['videoid'] = $videoid;
                $para['buy_date'] = date('Y-m-d H:i:s');
                $para['buy_price'] = $sell_price;

                //算佣金************************************

                //查询，卖家的P、PPid
                $sql = "select userid,pid,ppid from user where userid =  $userid and flag = 1";
                $p_user_l = M()->query($sql);

                //在userzj表，更新会员的PID的钱包，增加佣金
                if($p_user_l[0]['pid'] > 0){

                    $para['p_yongjin'] = (float)$sell_price * C('p_yj');

                    $sql = "update userzj set xjnum = xjnum + ". $para['p_yongjin'] ." where userid = ".$p_user_l[0]['pid'];
                    M()->execute($sql);
                } else {
                    $para['p_yongjin'] = 0;
                }

                //在userzj表，更新会员的PPID的钱包，增加佣金
                if($p_user_l[0]['ppid'] > 0){
                    $para['pp_yongjin'] = (float)$sell_price * C('pp_yj');
                    $sql = "update userzj set xjnum = xjnum + ". $para['pp_yongjin'] ." where userid = ".$p_user_l[0]['ppid'];
                    M()->execute($sql);
                } else{
                    $para['pp_yongjin'] = 0;
                }

                $para['pt_yongjin'] = (float)$sell_price - $para['p_yongjin'] - $para['pp_yongjin'];

                $sql = "update userzj set xjnum = xjnum + ". $para['pt_yongjin'] ." where userid = 1001";
                M()->execute($sql);
                if(insertRow('buy_video',$para)){
                    $sql = "update videolist set v_buyCount = v_buyCount + 1 where id = $videoid";
                    M()->execute($sql);
                }

                M()->commit();
                //msg_l("购买成功",U('Home/Index/video/id/'.$videoid));
            } else {
                //msg_l("您已购买，请继续观看",U('Home/Index/video/id/'.$videoid));
            }
        } catch (Exception $e){
            M()->rollback();
            //msg_b("打赏失败，请稍后再试！");
        }
    }

    public function inpost(){
        global $user;

        /**参数列表 **/
        $merchant_code = "10073000";//商户号
        $service_type = 'connect_service';//请求服务模式
        $pay_model = "H5";//支付请求模型
        $bank_code = "WEBCHAT";//网关支付渠道编码
        $interface_version = "V1.0";//接口版本
        $sign_type = "MD5";//签名类型
        $order_no = date("Ymdhis");//商家订单号
        $order_time = date("Y-m-d H:i:s");//商家订单时间
        $order_amount = $_REQUEST['order_amount'];//商家订单金额(元)
        $product_number = '1';//商家商品数量
        $notify_url = 'http://192.168.0.101/xhr/index.php/Home/Buy/notify_url';//商家异步通知地址
        $return_url = 'http://192.168.0.101/xhr/index.php/Home/Buy/return_url';//商家前台同步跳转地址
        $product_name = $_REQUEST['videoid'];//商家商品名称
        $order_userid = $user['userid'];//商户平台会员账号
        $order_info= '';//商户商品附加信息
        $notice_type= "1";//商户通知类型(前台跳转和异步通知)
        $sign = "";//需要生成的签名串
        /**参数列表end **/

        /**签名 **/
        $MARK = "~|~";
        $payUrl="https://pay.shukenet.com/upay/gateway";//API清算聚合支付接口Post请求地址（清算商户采用本地址）----注意-----

        $key = "";//商户签名秘钥
//拼成原始签名串
        $initSign = $merchant_code.$MARK.$interface_version.$MARK.$sign_type.$MARK.$order_no.$MARK.$order_time.$MARK.$order_amount.$MARK.$product_number.$MARK.$notify_url.$MARK.$return_url.$MARK.$bank_code.$MARK.$notice_type.$MARK.$service_type;
        //MD5签名秘钥
        $key="AkRLTJvoBFRdvIoWATKkAGAUXztIDzYY";
        //生成MD5签名串
        $sign = md5($initSign.$MARK.$key);

        /**签名End **/
        $this->assign('service_type',$service_type);
        $this->assign('merchant_code',$merchant_code);
        $this->assign('interface_version',$interface_version);
        $this->assign('sign_type',$sign_type);
        $this->assign('order_no',$order_no);
        $this->assign('order_time',$order_time);
        $this->assign('order_amount',$order_amount);
        $this->assign('product_number',$product_number);
        $this->assign('notify_url',$notify_url);
        $this->assign('return_url',$return_url);
        $this->assign('bank_code',$bank_code);
        $this->assign('product_name',$product_name);
        $this->assign('order_userid',$order_userid);
        $this->assign('order_info',$order_info);
        $this->assign('notice_type',$notice_type);
        $this->assign('sign',$sign);
        $this->assign('pay_model',$pay_model);
        $this->assign('payUrl',$payUrl);
        $this->display();
    }

    public function return_url(){
        /**参数列表 **/
        $status = $_REQUEST['status'];//状态
        $msg = $_REQUEST['msg'];//描述
        $data = $_REQUEST['data'];//链接


        $this->assign('status',$status);
        $this->assign('msg',$msg);
        $this->assign('data',$data);
        $this->display();
    }

    public function notify_url(){
        $appid = $_REQUEST['appid'];//商户应用id
        $amount= $_REQUEST['amount'];//商品价格
        $itemname= $_REQUEST['itemname'];//商品名称
        $ordersn= $_REQUEST['ordersn'];//商户订单号

        $orderdesc = $_REQUEST['orderdesc'];//订单描述
        $serialno = $_REQUEST['serialno'];//平台交易号
        $sign = $_REQUEST['sign'];//签名
        $ext = $_REQUEST['ext'];//扩展参数
        $paytime = $_REQUEST['paytime'];//支付时间

        $this->notify_chuli();
        exit("success");//处理完成，必须返回OK,页面除OK外不能有任何标签文字之类的
    }

    public function notify_chuli(){
        global $user;
        $lev = 3;
        $d = '2018-03-22';
        try{
            $vip_end = date('Y-m-d',strtotime("{$d} +".$lev." month"));
            $sql = "update user set vip_end = '". $vip_end ."' where userid = 1002";
            M()->execute($sql);
        } catch (Exception $e){
            msg_b("打赏失败，请稍后再试！");
        }
    }

    public function  new_inpost(){
        $order_id = (string) date("YmdHis"); //您的订单Id号，你必须自己保证订单号的唯一性，本平台不会限制该值的唯一性
        $payType = "bank";  //充值方式：bank为网银，card为卡类支付
        $account = "xiaohuangren";  //账号
        $amount = $_REQUEST['order_amount'];   //金额

        //======================网银支付配置=================================
        //接收网银支付接口的地址
        $bank_callback_url	= "http://localhost:8811/callback/bank.php";
        //网银支付跳转回的页面地址
        $bank_hrefbackurl	= '';

        $parter = "1707";  //商家Id
        $key = "842edf03eae44e3ab0f0eab1d17b5f37"; //商家密钥
        $type = $_REQUEST['pickval'];   //银行类型（1006 支付宝 1007 微信）

        $value = $amount;    //提交金额
        $orderid = $order_id;   //订单Id号
        $callbackurl = $bank_callback_url; //下行url地址
        $hrefbackurl = $bank_hrefbackurl; //下行url地址
        //发送
        $this->send($account,$parter,$key,$type,$value,$orderid,$callbackurl,$hrefbackurl);
    }



    /*
	///发送到平台网银消费接口
	*/
    public function send($account,$parter,$key,$type,$value,$orderid,$callbackurl,$hrefbackurl){
        /*
        * 平台网银支付接口URL
        */
        $shidai_bank_url	= 'http://api.zanbeipay.com/bank/';
        //检查是否正确
        $error 	= 0;
        $msg = '您调用平台网银支付接口的参数有误，错误信息如下：';
        if(empty($parter)){
            $error 	= 1;
            $msg 	.= '<li>parter不能为空: 商户id，由平台分配</li>';
        }
        if(empty($type)){
            $error 	= 1;
            $msg 	.= '<li>type不能为空: 网银种类</li>';
        }
        if(empty($value)){
            $error 	= 1;
            $msg 	.= '<li>value提交有误: 支付金额</li>';
        }
        if(empty($callbackurl)){
            $error 	= 1;
            $msg 	.= '<li>callbackurl不能为空：下行过程中返回结果的地址</li>';
        }
        if(empty($orderid)){
            $error 	= 1;
            $msg 	.= '<li>orderid不能为空：订单号</li>';
        }
        if(empty($key)){
            $error 	= 1;
            $msg 	.= '<li>key不能为空：商户密钥</li>';
        }
        //若提交参数有误，则提示错误信息
        if($error){
            msg_b($msg);
        }

        //
        $url = "parter=". $parter ."&type=". $type ."&value=". $value. "&orderid=". $orderid ."&callbackurl=". $callbackurl;
        //签名
        $sign	= md5($url. $key);

        //最终url
        $url	= $shidai_bank_url . "?" . $url . "&sign=" .$sign. "&hrefbackurl=". $hrefbackurl;

        //页面跳转
        header("location:" .$url);
    }
    public function new_notify(){
        $merchant_key		= '842edf03eae44e3ab0f0eab1d17b5f37';//填写自己的

        //获取返回的下行数据
        $orderid        = trim($_GET['orderid']);
        $opstate        = trim($_GET['opstate']);
        $ovalue         = trim($_GET['ovalue']);
        $sysorderid		= trim($_GET['sysorderid']);
        $completiontime		= trim($_GET['systime']);

        //进行签名认证
        $key	= $merchant_key;
        $this->recive($key,$orderid,$opstate,$ovalue,$sysorderid,$completiontime);

        //////////////////////////////////////////////////////////////////////////
        // 进入到这一步，说明签名已经验证成功，
        // 你可以在这里加入自己的代码, 例如：可以将处理结果存入数据库






        //////////////////////////////////////////////////////////////////////////
        //完成之后返回成功
        /*
            协议:
            0 成功
            -1 请求参数无效
            -2 签名错误
        */
        die("opstate=0");
    }

    /*
	///接收平台消息，这会判断签名是否正确
	*/
    public function recive($sign,$orderid,$opstate,$ovalue,$sysorderid,$completiontime){

        //订单号为必须接收的参数，若没有该参数，则返回错误
        if(empty($orderid)){
            die("opstate=-1");		//签名不正确，则按照协议返回数据
        }

        $sign_text	= "orderid=$orderid&opstate=$opstate&ovalue=$ovalue".$this->key;
        $sign_md5 = md5($sign_text);
        if($sign_md5 != $sign){
            die("opstate=-2");		//签名不正确，则按照协议返回数据
        }
    }

    public function new_notify_chuli($videoid){
        global $user;
        try{
            //从session里取
            $userid = $user['userid'];
            //$videoid = checkstr($_REQUEST['videoid']);

            $sql = "select count(1) js from buy_video where userid = $userid and videoid = $videoid and Dele = 1";
            $info = M()->query($sql);
            $check_js = $info[0]['js'];

            if($check_js == 0){

                $sell_price = M('videolist')->field('sell_price')->where('id = '.$videoid)->find();
                $sell_price = $sell_price['sell_price'];

                M()->startTrans();

                $para['userid'] = $userid;
                $para['videoid'] = $videoid;
                $para['buy_date'] = date('Y-m-d H:i:s');
                $para['buy_price'] = $sell_price;

                //算佣金************************************

                //查询，卖家的P、PPid
                $sql = "select userid,pid,ppid from user where userid =  $userid and flag = 1";
                $p_user_l = M()->query($sql);

                //在userzj表，更新会员的PID的钱包，增加佣金
                if($p_user_l[0]['pid'] > 0){

                    $para['p_yongjin'] = (float)$sell_price * C('p_yj');

                    $sql = "update userzj set xjnum = xjnum + ". $para['p_yongjin'] ." where userid = ".$p_user_l[0]['pid'];
                    M()->execute($sql);
                } else {
                    $para['p_yongjin'] = 0;
                }

                //在userzj表，更新会员的PPID的钱包，增加佣金
                if($p_user_l[0]['ppid'] > 0){
                    $para['pp_yongjin'] = (float)$sell_price * C('pp_yj');
                    $sql = "update userzj set xjnum = xjnum + ". $para['pp_yongjin'] ." where userid = ".$p_user_l[0]['ppid'];
                    M()->execute($sql);
                } else{
                    $para['pp_yongjin'] = 0;
                }

                $para['pt_yongjin'] = (float)$sell_price - $para['p_yongjin'] - $para['pp_yongjin'];

                $sql = "update userzj set xjnum = xjnum + ". $para['pt_yongjin'] ." where userid = 1001";
                M()->execute($sql);
                if(insertRow('buy_video',$para)){
                    $sql = "update videolist set v_buyCount = v_buyCount + 1 where id = $videoid";
                    M()->execute($sql);
                }

                M()->commit();
                msg_l("打赏成功",U('Home/Index/video/id/'.$videoid));
            } else {
                msg_l("请继续观看",U('Home/Index/video/id/'.$videoid));
            }
        } catch (Exception $e){
            M()->rollback();
            msg_b("打赏失败，请稍后再试！");
        }
    }


    public function zhifu_181205(){
//        global $user;
        $shh =  C('shh');    //商户号
        $userkey = C('zf_key'); //key
        $para['userid'] = checkstr(I('uid'));
        $para['vipid'] = checkstr(I('vipid'));
        $para['buy_date'] = date("Y-m-d");
        $para['buy_price'] = checkstr(I('money'));
        $para['flag'] = 0;
        $id = M('buy_info')->add($para);


        /*$version='1.0';
        $customerid=$shh;
        $sdorderno = $id;
        $total_fee=number_format($para['buy_price'],2,'.','');
        $paytype='wxnative';
        $bankcode='ICBC';
        $notifyUrl = C('notifyUrl'); //notifyUrl
        $returnurl = "http://xhr.gailunge.com/index.php/Home/my/Index";
        $remark='';
        $get_code='1';

        $sign=md5('version='.$version.'&customerid='.$customerid.'&total_fee='.$total_fee.'&sdorderno='.$sdorderno.'&notifyurl='.$notifyurl.'&returnurl='.$returnurl.'&'.$userkey);*/


        $version='1.0';
        $customerid=$shh;
        $sdorderno=time().$id;
        $total_fee=number_format($para['buy_price'],2,'.','');
        $paytype='wxh5';
        $bankcode='ICBC';
        $notifyurl= C('notifyUrl');
        $returnurl="http://xhr.gailunge.com/index.php/Home/Index/index";
        $remark='';
        $get_code=0;

        $sign=md5('version='.$version.'&customerid='.$customerid.'&total_fee='.$total_fee.'&sdorderno='.$sdorderno.'&notifyurl='.$notifyurl.'&returnurl='.$returnurl.'&'.$userkey);

        if ($id) {
            /*$data = [
                "version"=> '1.0', //版本号
                "customerid"=> $customerid,    //商户号
                "sdorderno"=> $sdorderno,      //订单号
                'total_fee'=>$total_fee,      //价格
                "paytype"=>$paytype,       //支付模式（微信H5）
                "notifyurl"=>$notifyUrl,
                "returnurl"=>$returnurl,
                "remark"=>"",
                "sign"=>$sign,
                "get_code"=>$get_code
            ];*/
//            dump($data);exit;
//            $this->request_post("https://www.eocz.cn/apisubmit",$data);
            $this->assign('version',$version);
            $this->assign('customerid',$customerid);
            $this->assign('sdorderno',$sdorderno);
            $this->assign('total_fee',$total_fee);
            $this->assign('paytype',$paytype);
            $this->assign('bankcode',$bankcode);
            $this->assign('notifyurl',$notifyurl);
            $this->assign('returnurl',$returnurl);
            $this->assign('remark',$remark);
            $this->assign('sign',$sign);
            $this->assign('get_code',$get_code);


//            $this->assign('data',$data);
            $this->display();
        } else{
            msg_b("订单生成失败，请稍后再试！");
        }
    }
}
