<?php
namespace Home\Controller;
use Think\Controller;

define("APPID", "wx0f9d0bda068ef7ed");//你微信定义的appid
define("APPSECRET","d0853dfffa34422b8e228b743e12b65d");//你微信公众号的appsecret

//session_start;//打开session

class IndexController extends Controller
{
    public function _initialize(){
//        global $user;
//        if(empty($_SESSION['admin_name'])){
//            $this->redirect("Wap/login");
//        }else{
//            $user = $_SESSION['admin_name'];
//        }
    }

    public function Index(){
        $type_list = M('mmm')->where('type = 2')->select();
        $this->assign('type_list',$type_list);

        /*$new_list = M('videolist')->order('id desc')->limit(6)->select();
        $this->assign('new_list',$new_list);*/
        $this->assign('footIndex',1);
        $this->display();
    }
    public function searchList(){
        $str = checkstr($_REQUEST['str']);
        $list = M('videolist')->where('v_name like "%'.$str.'%"')->select();
        $this->assign('list',$list);
        $this->assign('str',$str);
//        dump($list);
        $this->assign('footIndex',1);
        $this->display();
    }

    public function inpost(){
        $this->display();
    }
    public function video(){
        $user = checkuser();
        $id = $_REQUEST['id'];
        $v_info = M('videolist')->where('id = '.$id)->find();
        $this->assign('v_info',$v_info);

        if(empty($_SESSION['user'])){
            $buy_flag = 'false';
            $loginflag = '0';
        }else{
            $loginflag = '1';
            //如果已登录，则判断是否购买过
            $userid = $_SESSION['user']['userid'];
            /*$sql = "select count(1) js from buy_video where userid = $userid and videoid = $id and Dele = 1";
            $info = M()->query($sql);
            $check_js = $info[0]['js'];*/

            //判断vip会员是否到期，是否有试看

            $sql_1 = "select * from `user` where userid = '$userid' and flag = 1";
            $user_info = M()->query($sql_1);
            $vip_end = $user_info[0]['vip_end'];

            if($vip_end == '0'){
                $buy_flag = 'false';
            } else {
                if(strtotime(date('Y-m-d'))>strtotime($vip_end)){
                    $buy_flag = 'false';
                } else {
                    $buy_flag = 'true';
                }
            }
            //如果购买过，则计数大于0，购买标志位true
           /* if($check_js > 0){
                $buy_flag = 'true';
            } else {
                $buy_flag = 'false';
            }*/
        }
        $sksj = getparameter('sksj');
        $this->assign('sksj',$sksj);//是否已已购买标志
        $this->assign('buy_flag',$buy_flag);//是否已已购买标志
        $this->assign('loginflag',$loginflag);//是否已经登录
        $this->assign('footIndex',1);
        $this->display();
    }

    public function tab_list(){
        $tab = checkstr(I('tab'));
        $type_list = M('mmm')->where('type = 2')->select();
        $this->assign('type_list',$type_list);

        if(empty($tab)) $tab = 5;
        $this->assign('tab',$tab);
        /*$hot_list = M('videolist')->order('v_viewCount desc')->limit(9)->select();
        $this->assign('hot_list',$hot_list);
        $om_list = M('videolist')->where('v_type = 5')->order('id desc')->limit(9)->select();
        $this->assign('om_list',$om_list);
        $yz_list = M('videolist')->where('v_type = 6')->order('id desc')->limit(9)->select();
        $this->assign('yz_list',$yz_list);
        $zp_list = M('videolist')->where('v_type = 7')->order('id desc')->limit(9)->select();
        $this->assign('zp_list',$zp_list);
        $xz_list = M('videolist')->where('v_type = 8')->order('id desc')->limit(9)->select();
        $this->assign('xz_list',$xz_list);*/

        $this->assign('footIndex',2);
        $this->display();
    }
    public function tab_list_new(){
        $tab = checkstr(I('tab'));
        $type_list = M('mmm')->where('type = 2')->select();
        $this->assign('type_list',$type_list);
        $this->assign('tab',$tab);
        /*$hot_list = M('videolist')->order('v_viewCount desc')->limit(9)->select();
        $this->assign('hot_list',$hot_list);
        $om_list = M('videolist')->where('v_type = 5')->order('id desc')->limit(9)->select();
        $this->assign('om_list',$om_list);
        $yz_list = M('videolist')->where('v_type = 6')->order('id desc')->limit(9)->select();
        $this->assign('yz_list',$yz_list);
        $zp_list = M('videolist')->where('v_type = 7')->order('id desc')->limit(9)->select();
        $this->assign('zp_list',$zp_list);
        $xz_list = M('videolist')->where('v_type = 8')->order('id desc')->limit(9)->select();
        $this->assign('xz_list',$xz_list);*/

        $this->assign('footIndex',2);
        $this->display();
    }
    public function new_tab_list(){
        $v_type = checkstr(I('type'));
        $a_index = checkstr(I('count'));
        $b_end = 9;
        if($v_type == '0'){
            $new_list = M('videolist')->order('v_viewCount desc')->limit($a_index,$b_end)->select();
        } else {
            $new_list = M('videolist')->where('v_type = '.$v_type)->order('id desc')->limit($a_index,$b_end)->select();
        }
        $this->ajaxReturn ($new_list,'JSON');
    }

    function getCode(){
        //获取accse_token
        $code = $_GET["code"];
        //用code获取access_yoken
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$code."&grant_type=authorization_code";
        //这里可以获取全部的东西  access_token openid scope
        $res = $this->https_request($url);
        $res  = json_decode($res,true);
        $openid = $res["openid"];
        echo "<pre>";
        $access_token = $res["access_token"];
        //这里是获取用户信息
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
        $res = $this->https_request($url);
        $res = json_decode($res,true);
        $_SESSION["openid"]=$res['openid'];
        $_SESSION["headimgurl"]=$res['headimgurl'];

        $user = M('v_user')->where('openid="%s"',array($res['openid']))->find();
        if(empty($user)){
            msg_l("首次登录，请补充基本信息！",U("Home/Wap/editdata"));
        } else{
            $_SESSION['admin_name']=$user;
            $this->redirect("My/index");
        }
    }
    function https_request($url, $data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    
    function erweima(){
        
    }

    function geturl(){
        
        echo "http://localhost/xhr/public/upload/video/beiwa.mp4";
    }

    function test(){
        $this->display();
    }
    public function view_count(){
        $id = checkstr(I('id'));
        $video = M("videolist");
        $video->where('id='.$id)->setInc('v_viewCount');
        $this->ajaxReturn ("1",'JSON');
    }

    public function liuyan_ht(){
//        global $user;
        $uid = checkstr(I('uid'));
        $list = M('liuyan')->where('r_userid = '.$uid)->order('r_date')->select();
//        dump($list);
        $this->assign('list',$list);
        $user = M('user')->where('userid = '.$uid)->find();
        $this->assign('user',$user);
        $this->display();
    }
    public function liuyan_save(){
        $uid = checkstr(I('uid'));
        $para['type'] = '2';
        $para['r_date'] = date("Y-m-d H:i:s");
        $para['r_value'] = checkstr(I('liuyan_txt'));
        $para['r_userid'] = $uid;

        if (insertRow('liuyan', $para)) {
            msg_u(U('Home/Index/liuyan_ht/uid/'.$uid));
        } else{
            msg_b("留言失败");
        }
    }

    public function notify181103(){
//        dump($_REQUEST);
        /**
         * 支付回调地址
         * 用于异步通知支付状态
         */
        $keySign = C('zf_key');//密钥

        $returnText = file_get_contents('php://input');
        $post = $returnText;
        $posts = explode('|',$post);
        $sign = $posts[0];
        $paramsJson = $posts[1];
        $paramsJsonBase64 = base64_encode($paramsJson);
        $paramsJsonBase64Md5 = md5($paramsJsonBase64);
        $signMyself = strtoupper(md5($keySign.$paramsJsonBase64Md5));

        if($sign != $signMyself){
            echo 'sign Error';
        }
        else{
            //获取传递的值
            $params = json_decode($paramsJson,true);

            // 这里会有一些逻辑的,具体有商户定义

            //成功一定要输出success这七个英文字母.


            echo 'success';
        }
    }
}