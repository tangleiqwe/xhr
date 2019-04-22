<?php
namespace Home\Controller;
use Think\Controller;
//define("APPID", "wx0f9d0bda068ef7ed");//你微信定义的appid
//define("APPSECRET","d0853dfffa34422b8e228b743e12b65d");//你微信公众号的appsecret
class UserController extends Controller
{
    public function _initialize(){
//        global $user;
//        if(empty($_SESSION['admin_name'])){
//            $this->redirect("Wap/login");
//        }else{
//            $user = $_SESSION['admin_name'];
//        }
        /*$jssdk = new JssdkController();
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage', $signPackage);*/
    }
    
    public function zhuce(){
        $no = checkstr(I('get.no'));
        $this->assign('no', $no);
        $this->display();
    }
    public function zhuce_insert(){

        if(empty(I('post.account'))) msg_b('注册账号不能为空');
        if(empty(I('post.password'))) msg_b('注册密码不能为空');
        if(empty(I('post.r_key'))) msg_b('找回key不能为空');
        /*if(empty(I('post.xm'))){
            $para['name'] = '临时昵称';
        } else {
            $para['name'] = checkstr(I('post.xm'));
        }*/
        if(empty(I('post.no'))){
            $para['pid'] = '0';
        } else {
            $para['pid'] = checkstr(I('post.no'));
            $para['ppid'] = M('user')->where('userid="%s"',array(I('post.no')))->getField('pid')->find();
        }
        $para['user'] = checkstr(I('post.account'));
        $para['pasword'] = md5(checkstr(I('post.password')));
        $para['r_key'] = checkstr(I('post.r_key'));

        $sqluser = "select count(1) num from user where  user ='".$para['user']."'";
        $qbuser = M()->query($sqluser);
        if( $qbuser[0]['num']>0 ){  msg_b('此账号名称已经被注册'); }


        $para['perdate'] = date('y-m-d G:i:s');
        if (insertRow('user', $para)) {
            $sqlnu = "select userid from user where  user ='".$para['user']."'";
            $qbus = M()->query($sqlnu);
            $userid=$qbus[0]["userid"];
            $para2['userid']=$qbus[0]["userid"];
            $para2['xjnum']=0;
            //$para2['pnum']=0;
            $para2['changedate']=date('y-m-d G:i:s');;
            $para2['flag']=1;
           if(insertRow('userzj', $para2)){
               msg_l("注册成功",U('Home/User/login'));
           } else{
               $sql3 = "delete from user  where userid='".$userid."'";
               M()->query($sql3);
               msg_b("注册失败");
           }
        }
        else{ msg_b("注册失败");}
    }
    
    
    public function login(){
        $this->assign('footIndex',4);
        $this->display();
    }

    public function checkLogined(){
        if($_POST){
            $username = checkstr(I('post.username'));
            if(empty($username)) msg_b('用户名不能为空');
//            if(!ctype_alnum($username)) msg_b('用户名包含非法字符,请重新输入');

            $pw = checkstr(I('post.pw'));
            if(empty($pw)) msg_b('密码不能为空');

            $user = M('user')->where('user="%s" and pasword = "%s" ',array($username,md5($pw)))->find();
            if(empty($user)) msg_b('用户名或密码错误,请重新输入');
            $_SESSION['user']=$user;
            msg_u(U("Home/My/Index"));
        }
    }

    public function Index(){

        $d_price = M('gdlist')->field('price')->where("flag = '1'")->order('price asc')->find();
        $g_price = M('gdlist')->field('price')->where("flag = '1'")->order('price desc')->find();

        $sql = "select sum(num) num,sum(sumje) sumje from cjlist where flag = 1 ";
        $sum = M()->query($sql);

        $sql = "select DATE_FORMAT(operdate,'%m.%d') date,sum(num) num,max(price) price from cjlist where flag = 1 GROUP BY DATE_FORMAT(operdate,'%Y-%m-%d')";
        $char = M()->query($sql);

        $res_num = '';
        foreach($char as $v){
            $res_num .= $v['num'] . ",";
        }

        $res_date = '';
        foreach($char as $v){
            $res_date .= "'" . $v['date'] . "',";
        }

        $res_price = '';
        foreach($char as $v){
            $res_price .= "'" . $v['price'] . "',";
        }

        if($_SESSION['user']){
            $sql = "select xjnum,pnum from userzj where userid = ".$_SESSION['user']['userid'];
            $qb = M()->query($sql);
            $this->assign('qb', $qb[0]);

            $userid = $_SESSION['user']['userid'];
            $sql = "select * from `user` where userid = $userid and flag= 1";
            $user = M()->query($sql);
            $this->assign('user', $user[0]);
            
        }
        $this->assign('res_date', rtrim($res_date,','));
        $this->assign('res_num', rtrim($res_num,','));
        $this->assign('res_price', rtrim($res_price,','));
        
        $this->assign('d_price', $d_price['price']);
        $this->assign('g_price', $g_price['price']);
        
        $this->assign('num', $sum[0]['num']);
        $this->assign('sumje', $sum[0]['sumje']);
        $this->display();
    }
    public function register(){
        $this->display();
    }

    public function loginout(){
        session('user',null);
        msg_u(U("Home/User/login"));
    }

    public function uppic(){
        $this->display();
    }

    public function saoma(){
        if(strstr($_SERVER['HTTP_USER_AGENT'], 'QQ/')){
            msg_l('测试：QQ支付，调用QQ收银台！',U("Home/User/erweima")) ;
            //判断扫描二维码的APP为 支付宝
        }ELSE IF(strstr($_SERVER['HTTP_USER_AGENT'], 'Alipay')){
            msg_l('测试：支付宝支付，调用支付宝收银台！',U("Home/User/erweima")) ;
            //判断扫描二维码的APP为 微信
        }ELSE IF(strstr($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger/')){
            msg_l('测试：微信支付，调用微信收银台！',U("Home/User/erweima")) ;
        }
    }

    public function getcode(){

        $no = checkstr(I('get.no'));

        if(empty($no)){
            $sql = "select * from lottery ORDER BY id DESC LIMIT 1";
        } else {
            $sql = "select * from lottery where `No` > '$no' ORDER BY id DESC LIMIT 1";
        }
        $codelist = M()->query($sql);

        dump($codelist);
    }
    public function notify_url(){
        if($_POST){
            $merchant_code = $_POST['merchant_code'];//商户号
            $interface_version= $_POST['interface_version'];//接口版本
            $order_no= $_POST['order_no'];//商家订单号
            $trade_no= $_POST['trade_no'];//平台的支付订单号
            $order_amount= $_POST['order_amount'];//商家订单金额
            $product_number= $_POST['product_number'];//商家商品数量
            $order_success_time= $_POST['order_success_time'];//订单支付成功时间
            $order_time= $_POST['order_time'];//商家订单时间
            $order_status= $_POST['order_status'];//订单支付状态--支付成功：success,支付失败：failure
            $bank_code= $_POST['bank_code'];//支付渠道编码
            $sign_type= $_POST['sign_type'];//签名类型
            $bank_name= $_POST['bank_name'];//消费者支付渠道名称
            $product_name= $_POST['product_name'];//商品名称
            $order_userid= $_POST['order_userid'];//商户平台支付会员账号
            $order_info= $_POST['order_info'];//商户平台支付会员账号
            $sign= $_POST['sign'];//MD5或RSA签名,根据您请求签名模型生成的
            /**参数列表end **/
            /**-------------签名--------------- **/
            $MARK = "~|~";
//商户签名秘钥
            $key = "";
//拼成原始签名串
            $initSign = $merchant_code.$MARK.$interface_version.$MARK.$order_no.$MARK.$trade_no.$MARK.$order_amount.$MARK
                .$product_number.$MARK.$order_success_time.$MARK.$order_time.$MARK.$order_status.$MARK.$bank_code;
//验证签名串是否正确
            $valiSign = false;

//根据您商户设置的签名模型自行选择对应的签名方式
            $key="AkRLTJvoBFRdvIoWATKkAGAUXztIDzYY";
            //生成MD5签名串和sign进行比较
            $notitysign = md5($initSign.$MARK.$key);
            if($notitysign == $sign){
                $valiSign = true;//验证签名通过
            }
            /**-------------签名end--------------- **/

//        echo 'OK';
            if($valiSign){
                //------------订单支付成功，签名验证正确，开始处理你的平台逻辑,注意多次重复通知----------------
                $this->notify_chuli($product_name,$order_userid);
                echo 'OK';//处理完成，必须返回OK,页面除OK外不能有任何标签文字之类的
            }else{
                echo 'FAIL';//签名验证失败了，请检查签名或参数信息的正确性
            }
        }
    }

    public function notify_chuli($videoid,$userid){
        //global $user;
        try{
            //从session里取
            //$userid = $user['userid'];
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
                //msg_l("购买成功",U('Home/Index/video/id/'.$videoid));
            } else {
                //msg_l("您已购买，请继续观看",U('Home/Index/video/id/'.$videoid));
            }
        } catch (Exception $e){
            M()->rollback();
            //msg_b("打赏失败，请稍后再试！");
        }
    }

    //获取access_token
    public function get_access_token(){
        $appid = 'wxae6ce7062a5f230f';
        $secret = 'c5e427511602f88c944cf52c796ccb63';
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
        return $data = $this->curl_get($url);
    }

    public function curl_get($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $data;
    }
    //获得二维码
    public function get_qrcode() {
        header('content-type:image/gif');
        $uid = 6;
        $data = array();
        $data['scene'] = "uid=" . $uid;
        $data['page'] = "pages/popular/popular";
        $data = json_encode($data);
        dump($data);
        $access = json_decode($this->get_access_token(),true);
        dump($access);
        $access_token= $access['access_token'];
        dump($access_token);


        $url = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=" . $access_token;
        $da = $this->get_http_array($url,$data);

        echo json_encode(array('pictures'=>$da));
        $this->assign('data',$da);
        dump($da);
        $this->fetch();

    }
    public function get_http_array($url,$post_data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   //没有这个会自动输出，不用print_r();也会在后面多个1
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        $out = json_decode($output);
        return $out;
    }

    public function zhmm_update(){
        if($_POST) {
            $username= checkstr(I('username'));
            $sql = "select userid,r_key from user where user = '$username'";
            $qb = M()->query($sql);
            if (empty($qb)) msg_b('用户名不存在，请重新填写.');
            
            $userid = $qb[0]['userid'];
            if(empty(I('post.r_key'))) msg_b('密码找回key不能为空');
            if(empty(I('post.newmm'))) msg_b('新密码不能为空');
            if(empty(I('post.qrmm'))) msg_b('确认密码不能为空');
            $r_key = checkstr(I('post.r_key'));
            $newmm = checkstr(I('post.newmm'));
            $qrmm = checkstr(I('post.qrmm'));

            if($qb[0]['r_key']!= $r_key ){
                msg_b('key输入错误，请重新填写');
            }
            if($newmm!=$qrmm)
            {msg_b('确认密码与新密码不一致请重新输入');}

            try {
                M()->startTrans();
                $sql = "update  user set pasword= '".md5($newmm)."' where userid='".$userid."'";

                M()->execute($sql);
                M()->commit();
                msg_l("重置成功", U('Home/User/login'));
            } catch (Exception $e) {
                M()->rollback();
                msg_b("重置失败");
            }
        }
    }
}