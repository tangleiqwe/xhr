<?php
namespace Home\Controller;
use Think\Controller;
class ToolController extends Controller {

    public $a;
    public $a_mjp = array();
    public $weeksy = 0.04;
    public $totaljine = 0;
    public $remaining_pai = 0;//复投后剩下的零头金额
    public $weekcount = 0;
    public $bili = 36.2;

    public function _initialize(){
        global $user;
//        $user['uid'] = "1";
        $user = checkuser();
        $headimgurl = $_SESSION["headimgurl"];
        $this->assign('headimgurl', $headimgurl);
        $this->assign('user', $user);
        $foot_index = 3;
        $this->assign('foot_index', $foot_index);
        $jssdk = new JssdkController();
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage', $signPackage);
    }

    /*public function index1(){
        if(empty(I('get.begindate'))){
            $begindate = date('Y-m-d');
        }
        if(empty(I('get.bili'))){
            $bili = $this->bili;
        }
        if(empty(I('get.jine')) || empty(I('get.zhouqi')) || empty(I('get.begindate')) || empty(I('get.bili'))){
            $noimg = "1";
        }else{
            $zhouqi = checkNumber(I('get.zhouqi'));
            $init_jine = checkNumber(I('get.jine'));
            $begindate = checkstr(I('get.begindate'));
//            $bili = checkNumber(I('get.bili'));
            $this->bili = checkNumber(I('get.bili'));

            $noimg = "0";

            //初始化投资数据
            $this->a_mjp[0] = new mjpController($init_jine,$begindate);

            $this->remaining_pai = 0;

            $jilu = array();

            for($i = 1; $i <= $zhouqi; $i++){
                $this->weekcount = $i;

                $currday = date('Y-m-d',strtotime($begindate . " + ". 7*$i ." day"));

                $tempsy = $this->jisuantotalpai()*$this->weeksy;//本周总返利

                $this->remaining_pai += $tempsy;  //总可投金额
//            dump($this->remaining_pai);

                $this->futou($currday);

//                dump($this->a_mjp);
                $a_temp = "";
                foreach($this->a_mjp as $a){
//                    $a_temp .= $a->init_jine. "(".$a->weekcount.")" . " ";
                    if($a->weekcount > 0){
                        $a_temp += $a->init_jine;
                    }
                }

                $jilu[] = array($a_temp,$this->remaining_pai,$this->jisuanxiaqisy(), $this->a_mjp[count($this->a_mjp)-1]->init_jine);
            }

            $zongshouyi = 0;

            foreach($this->a_mjp as $a){
                $zongshouyi += $a->init_jine * $a->weekcount * $a->weeksy;
            }

            $this->assign('zhouqi', $zhouqi);
            $this->assign('init_jine', $init_jine);

//            $this->assign('jilu', $jilu);
//            $this->assign('zongshouyi', $zongshouyi);
//            $this->assign('bili', $this->bili);
//            $this->assign('lastxs', $this->a_mjp[count($this->a_mjp)-1]->weeksy);

            $lastxs = $this->a_mjp[count($this->a_mjp)-1]->weeksy;

            $text = array();
            $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
            $init_rmb = $init_jine*$this->bili;
            $totalrmb = $zongshouyi*$this->bili;
            $bili = $this->bili;
            $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元";
            $beishu = round($zongshouyi/$init_jine, 4);
            $text[] = "收益倍数：xx 倍；总复投周期：xx 周";
            $text[] = "最后一次复投时间：xxxx-xx-xx;收益为(周)：xx %";
            $text[] = "收益时间：xxxx-xx-xx 到 xxxx-xx-xx；平均每周收益（π）：xxxx";
            $text[] = "计划时间：xxxx-xx-xx 到 xxxx-xx-xx；平均每周收益（π）：xxxx";

            $imgname = $this->createimg($text,$jilu,I('get.xiangxi'));
            $this->assign('imgname', $imgname);
        }

        $this->assign('begindate', $begindate);
        $this->assign('bili', $bili);
        $menu_list = selectmenu(1);
        $this->assign('menu_list', $menu_list);
        $this->assign('noimg', $noimg);
        $this->assign('xiangxi', I('get.xiangxi'));
        $this->display();
    }*/

    public function index(){
        $_SESSION['last-page'] = "/Home/Tool/index";
        if(empty(I('get.begindate'))){
            $begindate = date('Y-m-d');
        }
        if(empty(I('get.bili'))){
            $bili = $this->bili;
        }else{
            $bili = checkFloat((float)I('get.bili'));
        }

        if(empty(I('get.jine')) || empty(I('get.zhouqi')) || empty(I('get.begindate'))){
            $noimg = "1";
        }else {
            $zhouqi = checkNumber(I('get.zhouqi'));
            $init_jine = checkNumber(I('get.jine'));
            $begindate = checkstr(I('get.begindate'));
//            $bili = checkNumber(I('get.bili'));

//            if (I('get.xiangxi') == 1 && empty($_SESSION['admin-session-name'])) {
/*            if (I('get.xiangxi') == 1 ) {
                $noimg = "1";
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript"> $(document).ready(function () { layer.open({type: 2, title: false, area: ["462px", "303px"], shadeClose: true, shade: 0.8, content: "' . __MODULE__ . '/Log/login"}); });</script>';
            } else {*/
                $noimg = "0";
                //初始化投资数据
                $this->a_mjp[0] = new mjpController($init_jine, $begindate);

                $this->remaining_pai = 0;

                $jilu = array();

                for ($i = 1; $i <= $zhouqi; $i++) {
                    $this->weekcount = $i;

                    $currday = date('Y-m-d', strtotime($begindate . " + " . 7 * $i . " day"));

                    $tempsy = $this->jisuantotalpai() * $this->weeksy;//本周总返利

                    $this->remaining_pai += $tempsy;  //总可投金额
//            dump($this->remaining_pai);

                    $this->futou($currday);

//                dump($this->a_mjp);
                    $a_temp = "";
                    foreach ($this->a_mjp as $a) {
//                    $a_temp .= $a->init_jine. "(".$a->weekcount.")" . " ";
                        if ($a->weekcount > 0) {
                            $a_temp += $a->init_jine;
                        }
                    }

                    $jilu[] = array($a_temp, $this->remaining_pai, $this->jisuanxiaqisy(), $this->a_mjp[count($this->a_mjp) - 1]->init_jine);
                }

                $zongshouyi = 0;
//                dump($this->a_mjp);
                foreach ($this->a_mjp as $a) {
                    $zongshouyi += $a->init_jine * $a->weekcount * $a->weeksy;
                }


                $this->assign('zhouqi', $zhouqi);
                $this->assign('init_jine', $init_jine);

                $lastxs = $this->a_mjp[count($this->a_mjp) - 1]->weeksy;
                $text = array();



                if (I('get.xiangxi') == 1) {
                    $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
                    $init_rmb = $init_jine * $bili;
                    $totalrmb = $zongshouyi * $bili;
                    //$bili = $this->bili;
                    $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元（参考比例：$bili ）";
                    $beishu = round($zongshouyi / $init_jine, 4);
                    $text[] = "收益倍数：$beishu 倍；总复投周期：$zhouqi 周";
                    $text[] = "最后一次复投时间：" . date('Y-m-d', strtotime($begindate . " + " . 7 * $zhouqi . " day")) . ";收益为(周)：" . $lastxs * 100 . " %";
                    $text[] = "收益时间：" . date('Y-m-d', strtotime($begindate . " + " . 7 * ($zhouqi + 1) . " day")) . " 到 " . date('Y-m-d', strtotime($begindate . " + " . 7 * ($zhouqi + 50) . " day")) . "；平均每周收益（π）：" . round($zongshouyi / 50, 4);
                    $text[] = "计划时间：$begindate 到 " . date('Y-m-d', strtotime($begindate . " + " . 7 * ($zhouqi + 50) . " day")) . "；平均每周收益（π）：" . round($zongshouyi / ($zhouqi + 50), 4);
                } else {
                    $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
                    $init_rmb = $init_jine * $bili;
                    $totalrmb = $zongshouyi * $bili;
                    //$bili = $this->bili;
                    $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元（参考比例：$bili ）";
                    $beishu = round($zongshouyi / $init_jine, 4);
                    $text[] = "收益倍数：xx 倍；总复投周期：xx 周";
                    $text[] = "最后一次复投时间：xxxx-xx-xx;收益为(周)：xx %";
                    $text[] = "收益时间：xxxx-xx-xx 到 xxxx-xx-xx；平均每周收益（π）：xxxx";
                    $text[] = "计划时间：xxxx-xx-xx 到 xxxx-xx-xx；平均每周收益（π）：xxxx";
                    $text[] = "要查看每周复投具体金额，请点击“查看详细数据”";
                }

                $imgname = $this->createimg($text, $jilu, I('get.xiangxi'));
                $this->assign('imgname', $imgname);
//            }
        }



            /*if(I('get.xiangxi') == 1 && empty($_SESSION['admin-session-name'])){
                $noimg = "1";
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript"> $(document).ready(function () { layer.open({type: 2, title: false, area: ["462px", "303px"], shadeClose: true, shade: 0.8, content: "'.__MODULE__.'/Log/login"}); });</script>';

            }else{
                $noimg = "0";
                //初始化投资数据
                $this->a_mjp[0] = new mjpController($init_jine,$begindate);

                $this->remaining_pai = 0;

                $jilu = array();

                for($i = 1; $i <= $zhouqi; $i++){
                    $this->weekcount = $i;

                    $currday = date('Y-m-d',strtotime($begindate . " + ". 7*$i ." day"));

                    $tempsy = $this->jisuantotalpai()*$this->weeksy;//本周总返利

                    $this->remaining_pai += $tempsy;  //总可投金额
//            dump($this->remaining_pai);

                    $this->futou($currday);

//                dump($this->a_mjp);
                    $a_temp = "";
                    foreach($this->a_mjp as $a){
//                    $a_temp .= $a->init_jine. "(".$a->weekcount.")" . " ";
                        if($a->weekcount > 0){
                            $a_temp += $a->init_jine;
                        }
                    }

                    $jilu[] = array($a_temp,$this->remaining_pai,$this->jisuanxiaqisy(), $this->a_mjp[count($this->a_mjp)-1]->init_jine);
                }

                $zongshouyi = 0;
//                dump($this->a_mjp);
                foreach($this->a_mjp as $a){
                    $zongshouyi += $a->init_jine * $a->weekcount * $a->weeksy;
                }


                $this->assign('zhouqi', $zhouqi);
                $this->assign('init_jine', $init_jine);

                $lastxs = $this->a_mjp[count($this->a_mjp)-1]->weeksy;
                $text = array();
                $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
                $init_rmb = $init_jine*$this->bili;
                $totalrmb = $zongshouyi*$this->bili;
                $bili = $this->bili;
                $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元（参考比例：$bili ）";
                $beishu = round($zongshouyi/$init_jine, 4);

            }

            if(empty($_SESSION['admin-session-name'])){
//                msg_l("请先登录！",__MODULE__."/Index/user_register");
                $noimg = "1";
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript"> $(document).ready(function () { layer.open({type: 2, title: false, area: ["462px", "303px"], shadeClose: true, shade: 0.8, content: "'.__MODULE__.'/Log/login"}); });</script>';
            }else{
                $noimg = "0";
                $this->a_mjp = array();
                //初始化投资数据
                $this->a_mjp[0] = new mjpController($init_jine,$begindate);

                $this->remaining_pai = 0;

                $jilu = array();

                for($i = 1; $i <= $zhouqi; $i++){
                    $this->weekcount = $i;

                    $currday = date('Y-m-d',strtotime($begindate . " + ". 7*$i ." day"));

                    $tempsy = $this->jisuantotalpai()*$this->weeksy;//本周总返利

                    $this->remaining_pai += $tempsy;  //总可投金额
//            dump($this->remaining_pai);

                    $this->futou($currday);

//                dump($this->a_mjp);
                    $a_temp = "";
                    foreach($this->a_mjp as $a){
//                    $a_temp .= $a->init_jine. "(".$a->weekcount.")" . " ";
                        if($a->weekcount > 0){
                            $a_temp += $a->init_jine;
                        }
                    }

                    $jilu[] = array($a_temp,$this->remaining_pai,$this->jisuanxiaqisy(), $this->a_mjp[count($this->a_mjp)-1]->init_jine);
                }

                $zongshouyi = 0;
                foreach($this->a_mjp as $a){
                    $zongshouyi += $a->init_jine * $a->weekcount * $a->weeksy;
                }

                $this->assign('zhouqi', $zhouqi);
                $this->assign('init_jine', $init_jine);

//            $this->assign('jilu', $jilu);
//            $this->assign('zongshouyi', $zongshouyi);
//            $this->assign('bili', $this->bili);
//            $this->assign('lastxs', $this->a_mjp[count($this->a_mjp)-1]->weeksy);

                $lastxs = $this->a_mjp[count($this->a_mjp)-1]->weeksy;

                $text = array();
                $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
                $init_rmb = $init_jine*$this->bili;
                $totalrmb = $zongshouyi*$this->bili;
                $bili = $this->bili;
                $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元（参考比例：$bili ）";
                $beishu = round($zongshouyi/$init_jine, 4);
                $text[] = "收益倍数：$beishu 倍；总复投周期：$zhouqi 周";
                $text[] = "最后一次复投时间：". date('Y-m-d',strtotime($begindate . " + ". 7*$zhouqi ." day")) .";收益为(周)：".$lastxs*100 ." %";
                $text[] = "收益时间：".date('Y-m-d',strtotime($begindate . " + ". 7*($zhouqi+1) ." day"))." 到 ".date('Y-m-d',strtotime($begindate . " + ". 7*($zhouqi+50) ." day"))."；平均每周收益（π）：". round($zongshouyi/50, 4);
                $text[] = "计划时间：$begindate 到 ".date('Y-m-d',strtotime($begindate . " + ". 7*($zhouqi+50) ." day")) ."；平均每周收益（π）：". round($zongshouyi/($zhouqi+50), 4);

                $imgname = $this->createimg($text,$jilu,I('get.xiangxi'));
                $this->assign('imgname', $imgname);
            }
        }*/

        $this->assign('begindate', $begindate);
        $this->assign('bili', $bili);
//        $menu_list = selectmenu(1);
//        $this->assign('menu_list', $menu_list);
        $this->assign('noimg', $noimg);
        $this->assign('xiangxi', I('get.xiangxi'));
        $this->display();
    }

    /*public function yqsy(){
        if(empty(I('get.sybegindate'))){
            $sybegindate = date('Y-m-d');
        }
        if(empty(I('get.bili'))){
            $bili = $this->bili;
        }
        if(empty(I('get.bjine')) || empty(I('get.shouyi')) || empty(I('get.sybegindate')) || empty(I('get.bili'))){
            $noimg = "1";
        }else{
            $shouyi = checkNumber(I('get.shouyi'));
            $init_jine = checkNumber(I('get.bjine'));
            $sybegindate = checkstr(I('get.sybegindate'));
            $bili = checkNumber(I('get.bili'));
            $this->bili = checkNumber(I('get.bili'));

            $noimg = "0";

            for($zhouqi = 1;$zhouqi < 100;$zhouqi++){
                //初始化投资数据
                $this->a_mjp = array();
                $this->a_mjp[0] = new mjpController($init_jine,$sybegindate);

                $this->remaining_pai = 0;

                $jilu = array();

                for($i = 1; $i <= $zhouqi; $i++){
                    $this->weekcount = $i;

                    $currday = date('Y-m-d',strtotime($sybegindate . " + ". 7*$i ." day"));

                    $tempsy = $this->jisuantotalpai()*$this->weeksy;//本周总返利

                    $this->remaining_pai += $tempsy;  //总可投金额
//            dump($this->remaining_pai);

                    $this->futou($currday);

                    $a_temp = 0;
                    foreach($this->a_mjp as $a){
                        if($a->weekcount > 0){
                            $a_temp += $a->init_jine;
                        }
                    }

                    $jilu[] = array($a_temp,$this->remaining_pai,$this->jisuanxiaqisy(), $this->a_mjp[count($this->a_mjp)-1]->init_jine);
                }

                $zongshouyi = 0;
                foreach($this->a_mjp as $a){
                    $zongshouyi += $a->init_jine * $a->weekcount * $a->weeksy;
                }

                if($zongshouyi/$init_jine >= $shouyi){
                    break;
                }

            }

            $this->assign('zhouqi', $zhouqi);
            $this->assign('bjine', $init_jine);
            $this->assign('shouyi', $shouyi);

            $lastxs = $this->a_mjp[count($this->a_mjp)-1]->weeksy;
            $text = array();
            $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
            $init_rmb = $init_jine*$this->bili;
            $totalrmb = $zongshouyi*$this->bili;
            $bili = $this->bili;
            $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元";
            $beishu = round($zongshouyi/$init_jine, 4);
            $text[] = "收益倍数：xx 倍；总复投周期：xx 周";
            $text[] = "最后一次复投时间：xxxx-xx-xx;收益为(周)：xx %";
            $text[] = "收益时间：xxxx-xx-xx 到 xxxx-xx-xx；平均每周收益（π）：xxxx";
            $text[] = "计划时间：xxxx-xx-xx 到 xxxx-xx-xx；平均每周收益（π）：xxxx";

//            if(I('get.xiangxi') == 1){
//                $text[] = "";
//                $text[] = "周数                 当周可收益金额                 下周收益              本周复投金额";
//                foreach ($jilu as $k=>$v) {
//                    $text[] = ($k+1) ."                       $v[0]                     $v[2]              $v[3]";
//                }
//            }

            $imgname = $this->createimg($text,$jilu,I('get.xiangxi'));
            $this->assign('imgname', $imgname);
        }
        $this->assign('sybegindate', $sybegindate);
        $this->assign('bili', $bili);
        $menu_list = selectmenu(1);
        $this->assign('menu_list', $menu_list);
        $this->assign('noimg', $noimg);
        $this->assign('xiangxi', I('get.xiangxi'));
        $this->display();
    }*/



    public function yqsy(){
        $_SESSION['last-page'] = "/Home/Tool/yqsy";
        if(empty(I('get.sybegindate'))){
            $sybegindate = date('Y-m-d');
        }
        if(empty(I('get.bili'))){
            $bili = $this->bili;
        }else{
            $bili = checkFloat((float)I('get.bili'));
        }
        if(empty(I('get.bjine')) || empty(I('get.shouyi')) || empty(I('get.sybegindate'))){
            $noimg = "1";
        }else{
//            if (I('get.xiangxi') == 1 && empty($_SESSION['admin-session-name'])) {
/*            if (I('get.xiangxi') == 1 ) {
                $noimg = "1";
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript"> $(document).ready(function () { layer.open({type: 2, title: false, area: ["462px", "303px"], shadeClose: true, shade: 0.8, content: "' . __MODULE__ . '/Log/login"}); });</script>';
            } else {*/
                $shouyi = checkNumber(I('get.shouyi'));
                $init_jine = checkNumber(I('get.bjine'));
                $sybegindate = checkstr(I('get.sybegindate'));

                $noimg = "0";

                for($zhouqi = 1;$zhouqi < 100;$zhouqi++){
                    //初始化投资数据
                    $this->a_mjp = array();
                    $this->a_mjp[0] = new mjpController($init_jine,$sybegindate);

                    $this->remaining_pai = 0;

                    $jilu = array();

                    for($i = 1; $i <= $zhouqi; $i++){
                        $this->weekcount = $i;

                        $currday = date('Y-m-d',strtotime($sybegindate . " + ". 7*$i ." day"));

                        $tempsy = $this->jisuantotalpai()*$this->weeksy;//本周总返利

                        $this->remaining_pai += $tempsy;  //总可投金额
//            dump($this->remaining_pai);

                        $this->futou($currday);

//                dump($this->a_mjp);
//                        $a_temp = "";
//                        foreach($this->a_mjp as $a){
//                            $a_temp .= $a->init_jine. "(".$a->weekcount.")" . " ";
//                        }
                        $a_temp = 0;
                        foreach($this->a_mjp as $a){
                            if($a->weekcount > 0){
                                $a_temp += $a->init_jine;
                            }
                        }

                        $jilu[] = array($a_temp,$this->remaining_pai,$this->jisuanxiaqisy(), $this->a_mjp[count($this->a_mjp)-1]->init_jine);
                    }

                    $zongshouyi = 0;
                    foreach($this->a_mjp as $a){
                        $zongshouyi += $a->init_jine * $a->weekcount * $a->weeksy;
                    }

                    if($zongshouyi/$init_jine >= $shouyi){
                        break;
                    }

                }

                $this->assign('zhouqi', $zhouqi);
                $this->assign('bjine', $init_jine);
                $this->assign('bili', $bili);



                $this->assign('shouyi', $shouyi);

                $lastxs = $this->a_mjp[count($this->a_mjp)-1]->weeksy;
                $text = array();

                if (I('get.xiangxi') == 1) {
                    $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
                    $init_rmb = $init_jine * $bili;
                    $totalrmb = $zongshouyi * $bili;
                    //$bili = $this->bili;
                    $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元（参考比例：$bili ）";
                    $beishu = round($zongshouyi / $init_jine, 4);
                    $text[] = "收益倍数：$beishu 倍；总复投周期：$zhouqi 周";
                    $text[] = "最后一次复投时间：" . date('Y-m-d', strtotime($sybegindate . " + " . 7 * $zhouqi . " day")) . ";收益为(周)：" . $lastxs * 100 . " %";
                    $text[] = "收益时间：" . date('Y-m-d', strtotime($sybegindate . " + " . 7 * ($zhouqi + 1) . " day")) . " 到 " . date('Y-m-d', strtotime($sybegindate . " + " . 7 * ($zhouqi + 50) . " day")) . "；平均每周收益（π）：" . round($zongshouyi / 50, 4);
                    $text[] = "计划时间：$sybegindate 到 " . date('Y-m-d', strtotime($sybegindate . " + " . 7 * ($zhouqi + 50) . " day")) . "；平均每周收益（π）：" . round($zongshouyi / ($zhouqi + 50), 4);
                } else {
                    $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
                    $init_rmb = $init_jine * $bili;
                    $totalrmb = $zongshouyi * $bili;
                    //$bili = $this->bili;
                    $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元（参考比例：$bili ）";
                    $beishu = round($zongshouyi / $init_jine, 4);
                    $text[] = "收益倍数：xx 倍；总复投周期：xx 周";
                    $text[] = "最后一次复投时间：xxxx-xx-xx;收益为(周)：xx %";
                    $text[] = "收益时间：xxxx-xx-xx 到 xxxx-xx-xx；平均每周收益（π）：xxxx";
                    $text[] = "计划时间：xxxx-xx-xx 到 xxxx-xx-xx；平均每周收益（π）：xxxx";
                    $text[] = "要查看每周复投具体金额，请点击“查看详细数据”";
                }

                $imgname = $this->createimg($text, $jilu, I('get.xiangxi'));
                $this->assign('imgname', $imgname);
            }
            /*if(empty($_SESSION['admin-session-name'])){
                $noimg = "1";
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link rel="stylesheet" href="' . __ROOT__ . '/Public/css/style.css" type="text/css"> <script src="' . __ROOT__ . '/Public/js/jquery.js"></script><script src="' . __ROOT__ . '/Public/layer/layer.js"></script><script type="text/javascript"> $(document).ready(function () { layer.open({type: 2, title: false, area: ["462px", "303px"], shadeClose: true, shade: 0.8, content: "'.__MODULE__.'/Log/login"}); });</script>';
            }else{

                $shouyi = checkNumber(I('get.shouyi'));
                $init_jine = checkNumber(I('get.bjine'));
                $sybegindate = checkstr(I('get.sybegindate'));

                $noimg = "0";

                for($zhouqi = 1;$zhouqi < 100;$zhouqi++){
                    //初始化投资数据
                    $this->a_mjp = array();
                    $this->a_mjp[0] = new mjpController($init_jine,$sybegindate);

                    $this->remaining_pai = 0;

                    $jilu = array();

                    for($i = 1; $i <= $zhouqi; $i++){
                        $this->weekcount = $i;

                        $currday = date('Y-m-d',strtotime($sybegindate . " + ". 7*$i ." day"));

                        $tempsy = $this->jisuantotalpai()*$this->weeksy;//本周总返利

                        $this->remaining_pai += $tempsy;  //总可投金额
//            dump($this->remaining_pai);

                        $this->futou($currday);

//                dump($this->a_mjp);
//                        $a_temp = "";
//                        foreach($this->a_mjp as $a){
//                            $a_temp .= $a->init_jine. "(".$a->weekcount.")" . " ";
//                        }
                        $a_temp = 0;
                        foreach($this->a_mjp as $a){
                            if($a->weekcount > 0){
                                $a_temp += $a->init_jine;
                            }
                        }

                        $jilu[] = array($a_temp,$this->remaining_pai,$this->jisuanxiaqisy(), $this->a_mjp[count($this->a_mjp)-1]->init_jine);
                    }

                    $zongshouyi = 0;
                    foreach($this->a_mjp as $a){
                        $zongshouyi += $a->init_jine * $a->weekcount * $a->weeksy;
                    }

                    if($zongshouyi/$init_jine >= $shouyi){
                        break;
                    }

                }

                $this->assign('zhouqi', $zhouqi);
                $this->assign('bjine', $init_jine);
                $this->assign('bili', $bili);



                $this->assign('shouyi', $shouyi);

                $lastxs = $this->a_mjp[count($this->a_mjp)-1]->weeksy;
                $text = array();
                $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
                $init_rmb = $init_jine*$this->bili;
                $totalrmb = $zongshouyi*$this->bili;
                $bili = $this->bili;
                $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元（参考比例：$bili ）";
                $beishu = round($zongshouyi/$init_jine, 4);
                $text[] = "收益倍数：$beishu 倍；总复投周期：$zhouqi 周";
                $text[] = "最后一次复投时间：". date('Y-m-d',strtotime($sybegindate . " + ". 7*$zhouqi ." day")) .";收益为(周)：".$lastxs*100 ." %";
                $text[] = "收益时间：".date('Y-m-d',strtotime($sybegindate . " + ". 7*($zhouqi+1) ." day"))." 到 ".date('Y-m-d',strtotime($sybegindate . " + ". 7*($zhouqi+50) ." day"))."；平均每周收益（π）：". round($zongshouyi/50, 4);
                $text[] = "计划时间：$sybegindate 到 ".date('Y-m-d',strtotime($sybegindate . " + ". 7*($zhouqi+50) ." day")) ."；平均每周收益（π）：". round($zongshouyi/($zhouqi+50), 4);

//            if(I('get.xiangxi') == 1){
//                $text[] = "";
//                $text[] = "周数                 当周可收益金额                 下周收益              本周复投金额";
//                foreach ($jilu as $k=>$v) {
//                    $text[] = ($k+1) ."                       $v[0]                     $v[2]              $v[3]";
//                }
//            }

                $imgname = $this->createimg($text,$jilu,I('get.xiangxi'));
                $this->assign('imgname', $imgname);

//            $this->assign('jilu', $jilu);
//            $this->assign('zongshouyi', $zongshouyi);
//            $this->assign('bili', $this->bili);
//            $this->assign('lastxs', $this->a_mjp[count($this->a_mjp)-1]->weeksy);
            }*/
//        }

        $this->assign('bili', $bili);
        $this->assign('sybegindate', $sybegindate);
//        $menu_list = selectmenu(1);
//        $this->assign('menu_list', $menu_list);
        $this->assign('noimg', $noimg);
        $this->assign('xiangxi', I('get.xiangxi'));
        $this->display();
    }

    public function jisuanxiaqisy(){//计算下期收益
        $totalpai = 0;

        foreach($this->a_mjp as $k=>$v){
            if($v->weekcount > 0){
                $totalpai += $v->init_jine * $v->weeksy;
            }
        }

        return($totalpai);
    }

    public function jisuantotalpai(){//计算本期总收益
        $totalpai = 0;

        foreach($this->a_mjp as $k=>$v){
            if($v->weekcount > 0){
                $totalpai += $v->init_jine;
                $v->weekcount -= 1;
            }
        }

        return($totalpai);
    }

    public function futou($currday){
        if($this->remaining_pai >= 300){
            $tempcount = count($this->a_mjp);

//            $this->a_mjp[$tempcount] = new mjpController('300');
//            $this->remaining_pai -= 300;
            $adda = floor($this->remaining_pai / 300)*300;
            $this->a_mjp[$tempcount] = new mjpController($adda,$currday);
            $this->remaining_pai -= $adda;

//            dump($this->remaining_pai);
            $this->futou($currday);
        }
    }


    protected function createimg($text,$jilu=null,$if_xiangxi){
        if($if_xiangxi == 1){
            $heightb = count($text)+1+count($jilu)+1+1;
        }else{
            $heightb = count($text)+1+1;
        }

        $im = imagecreate(800, 40*$heightb);
        $bg = imagecolorallocate($im, 255, 255, 255); //设置画布的背景为白色
        $black = imagecolorallocate($im, 0, 0, 0); //设置一个颜色变量为黑色
        $font = 'Public/fonts/MSYH.ttf';//字体

        foreach($text as $k=>$v){
            imagefttext($im, 13, 0, 60, 40+40*($k+1), $black, $font, $v);
        }
        $topnum = count($text)+1;
        if($if_xiangxi == 1){
            $temptext = "";
//            $text[] = "周数                 当周可收益金额                 下周收益              本周复投金额";
            imagefttext($im, 13, 0, 60, 40*($topnum+1), $black, $font, "周数");
            imagefttext($im, 13, 0, 160, 40*($topnum+1), $black, $font, "当周可收益金额(π)");
            imagefttext($im, 13, 0, 360, 40*($topnum+1), $black, $font, "本周复投金额(π)");
            imagefttext($im, 13, 0, 560, 40*($topnum+1), $black, $font, "下周收益(π)");
            foreach ($jilu as $k=>$v) {
//                $text[] = ($k+1) ."                       $v[0]                     $v[2]              $v[3]";
                imagefttext($im, 13, 0, 60, 40*($topnum+1+$k+1), $black, $font, $k+1);
                imagefttext($im, 13, 0, 160, 40*($topnum+1+$k+1), $black, $font, $v[0]);
                imagefttext($im, 13, 0, 360, 40*($topnum+1+$k+1), $black, $font, $v[3]);
                imagefttext($im, 13, 0, 560, 40*($topnum+1+$k+1), $black, $font, $v[2]);
            }
        }

//        imagestring($im, 5, 100, 70, $string, $black); //水平的将字符串输出到图像中
//        imagestringup($im, 3, 59, 115, $string, $black); //垂直由下而上输到图像中
//        for($i=0,$j=strlen($string);$i<strlen($string);$i++,$j--) { //循环单个字符输出到图像中
//            imagechar($im, 3, 10 * ($i + 1), 10 * ($j + 2), $string[$i], $black); //向下倾斜输出每个字符
//            imagecharup($im, 3, 10 * ($i + 1), 10 * ($j + 2), $string[$i], $black); //向上倾斜输出每个字符
//        }


        $src_path = 'Public/tool/bg.png';
        $src = imagecreatefromstring(file_get_contents($src_path));
        //获取水印图片的宽高
        list($src_w, $src_h) = getimagesize($src_path);

        for($i = 0; $i < floor(40*$heightb/300); $i++){
            imagecopymerge($im, $src, 10, $i*300, 0, 0, $src_w, $src_h, 20);
            imagecopymerge($im, $src, 400, $i*300, 0, 0, $src_w, $src_h, 20);
        }


//        header('Content-type:image/jpeg');
//        imagejpeg($im);
        $imgname = time().".jpg";
        imagejpeg($im, "Public/tool/$imgname", 90);

        imagedestroy($im);
        imagedestroy($src);
        return $imgname;
    }

    public function tool_list(){
        global $user;

        $headimgurl = $_SESSION["headimgurl"];
        
        $this->assign('headimgurl', $headimgurl);
        $this->assign('user', $user);
        $this->display();
    }



/*    public function imagetest(){
        if(empty(I('get.jine')) || empty(I('get.zhouqi'))){

        }else{
            $zhouqi = I('get.zhouqi');
            $init_jine = I('get.jine');
            $begindate = I('get.begindate');

            //初始化投资数据
            $this->a_mjp[0] = new mjpController($init_jine,$begindate);

            $this->remaining_pai = 0;

            $jilu = array();

            for($i = 1; $i <= $zhouqi; $i++){
                $this->weekcount = $i;

                $currday = date('Y-m-d',strtotime($begindate . " + ". 7*$i ." day"));

                $tempsy = $this->jisuantotalpai()*$this->weeksy;//本周总返利

                $this->remaining_pai += $tempsy;  //总可投金额
//            dump($this->remaining_pai);

                $this->futou($currday);

//                dump($this->a_mjp);
                $a_temp = "";
                foreach($this->a_mjp as $a){
                    $a_temp .= $a->init_jine. "(".$a->weekcount.")" . " ";
                }

                $jilu[] = array($a_temp,$this->remaining_pai,$this->jisuanxiaqisy());
            }

            $zongshouyi = 0;
            foreach($this->a_mjp as $a){
                $zongshouyi += $a->init_jine * $a->weekcount * $a->weeksy;
            }

            $this->assign('zhouqi', $zhouqi);
            $this->assign('init_jine', $init_jine);
            $this->assign('begindate', $begindate);
//            $this->assign('jilu', $jilu);
//            $this->assign('zongshouyi', $zongshouyi);
//            $this->assign('bili', $this->bili);
//            $this->assign('lastxs', $this->a_mjp[count($this->a_mjp)-1]->weeksy);

            $lastxs = $this->a_mjp[count($this->a_mjp)-1]->weeksy;

            $text = array();
            $text[] = "投资金额（π）：$init_jine ；总收益（π）：$zongshouyi ；";
            $init_rmb = $init_jine*$this->bili;
            $totalrmb = $zongshouyi*$this->bili;
            $bili = $this->bili;
            $text[] = "投资金额（RMB）：$init_rmb ；总收益（RMB）：$totalrmb 元（参考比例：$bili ）";
            $beishu = round($zongshouyi/$init_jine, 4);
            $text[] = "收益倍数：$beishu 倍；总复投周期：$zhouqi 周";
            $text[] = "最后一次复投时间：". date('Y-m-d',strtotime($begindate . " + ". 7*$zhouqi ." day")) .";收益为(周)：".$lastxs*100 ." %";
            $text[] = "收益时间：".date('Y-m-d',strtotime($begindate . " + ". 7*($zhouqi+1) ." day"))." 到 ".date('Y-m-d',strtotime($begindate . " + ". 7*($zhouqi+50) ." day"))."；平均每周收益（π）：". round($zongshouyi/50, 4);
            $text[] = "计划时间：$begindate 到 ".date('Y-m-d',strtotime($begindate . " + ". 7*($zhouqi+50) ." day")) ."；平均每周收益（π）：". round($zongshouyi/($zhouqi+50), 4);
            $imgname = $this->createimg($text);
            $this->assign('imgname', $imgname);
        }
        $menu_list = selectmenu(1);
        $this->assign('menu_list', $menu_list);
        $this->display();
    }*/
}
