<?php
namespace Home\Controller;
use Think\Controller;

define("APPID", "wx0f9d0bda068ef7ed");//你微信定义的appid
define("APPSECRET","d0853dfffa34422b8e228b743e12b65d");//你微信公众号的appsecret

//session_start;//打开session

class ChplayerController extends Controller
{
    public function _initialize(){
    }
    public function test(){
        $this->assign('footIndex',1);
        $this->display();
    }
    public function Index(){
        $this->assign('footIndex',1);
        $this->display();
    }
    public function video(){
        $this->assign('footIndex',1);
        $this->display();
    }

    public function tab_list(){
        $this->assign('footIndex',2);
        $this->display();
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

//        dump($res["headimgurl"]);exit;
        $user = M('v_user')->where('openid="%s"',array($res['openid']))->find();
        //dump($user);
		//exit;
        if(empty($user)){
//            msg_l("首次登录，请补充基本信息！",U("Home/Funding/editdata"));
            msg_l("首次登录，请补充基本信息！",U("Home/Wap/editdata"));
        } else{
            //$user['openid'] = $res['openid'];
            $_SESSION['admin_name']=$user;
            $this->redirect("My/index");
//            header("location:http://www.icoco.xin/wxt_webhome/test.php");
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
}