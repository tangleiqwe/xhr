<?php
namespace Home\Controller;
use Think\Controller;
class MyController extends Controller {


    public function _initialize(){
       global $user;
        $user = checkuser();
        $this->assign('user', $user);
  }


    public function Index(){
        global $user;
        //从session里取
        $userid = $user['userid'];
//        dump($user);

        $sql = "select * from `user` where userid = $userid and flag= 1";
        $user = M()->query($sql);

        $sql = "select count(1) js from `user` where pid = $userid ";
        $tj = M()->query($sql);

        $sql = "select xjnum from userzj where userid = $userid";
        $qb = M()->query($sql);

        $sql = "select sum(num) num from gdlist where userid = $userid and flag = 1";
        $num = M()->query($sql);

        $sfkqtj = getparameter('sfkqtj');
        $this->assign('user',$user);

        $this->assign('num',$num[0]['num']);

        $this->assign('js',$tj[0]['js']);
        $this->assign('xjnum',$qb[0]['xjnum']);
        $this->assign('footIndex',4);
        $this->assign('sfkqtj',$sfkqtj);
        $this->display();
    }

    public function liuyan(){
        global $user;
        $list = M('liuyan')->where('r_userid = '.$user['userid'])->order('r_date')->select();
        $this->assign('list',$list);
        $this->assign('user',$user);
        $this->assign('footIndex',4);
        $this->display();
    }
    public function liuyan_save(){
        global $user;
        $para['type'] = '1';
        $para['r_date'] = date("Y-m-d H:i:s");
        $para['r_value'] = checkstr(I('liuyan_txt'));
        $para['r_userid'] = $user['userid'];

//        dump($para);exit;
        if (insertRow('liuyan', $para)) {
            msg_u(U('Home/My/liuyan'));
        } else{
            msg_b("留言失败");
        }
    }
    public function reg_invitation(){
        global $user;
        //从session里取
        $userid = $user['userid'];

        $url = "http://" . $_SERVER['HTTP_HOST'] . "/xhr/index.php/home/user/zhuce/no/".$userid;
        $this->assign('user',$user[0]);
        $this->assign('url',$url);
        $this->assign('footIndex',4);
        $this->display();
    }
    public function czlist(){
        global $user;
        $userid = $user['userid'];
        // $userid = "1001";
        $sql = "select id,DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,type from prorclist where flag = 1 and userid = $userid  and rorctype =1 ORDER BY operdate desc";
        $plist = M()->query($sql);

        $sql = "select id,DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,xjnum,type from xjrorclist where flag = 1 and userid = $userid  and rorctype =1 ORDER BY operdate desc";
        $rmblist = M()->query($sql);


        $this->assign('plist',$plist);
        $this->assign('rmblist',$rmblist);
        $this->assign('footIndex',4);
        $this->display();
    }
    public function rmbcz(){
        $type = checkstr(I('get.type'));
        $scpz = checkstr(I('get.scpz'));
        $scpz = str_replace("&quot;","",$scpz);

        $this->assign('type',$type);
        $this->assign('scpz',$scpz);
        $this->assign('footIndex',4);
        $this->display();
    }
    public function rmbcz_insert(){
        //RMB充值

        if($_POST){
            global $user;
            $para['userid'] = $user['userid'];
            //$para['userid'] = '1001';
            //$userid = '1001';
            if(empty(I('post.czzh'))) msg_b('充值账号不能为空');
            if(empty(I('post.czname'))) msg_b('姓名不能为空');
            if(empty(I('post.czje'))) msg_b('充值金额不能为空');
            if(empty(I('post.czpz'))) msg_b('请上传凭证后，再提交审核！');
            $rmbczsl = checkNumber(I('post.czje'));
            $rmbczzh= checkstr(I('post.czzh'));
            $rmbczname= checkstr(I('post.czname'));
            if($rmbczsl<10) msg_b('充值金额不能小于10元');

            $para['operdate'] =date('y-m-d G:i:s');
            $para['xjnum'] =$rmbczsl;
            $para['adudate'] ='';
            $para['aduuser'] ='';
            $para['type'] = '1';
            $para['rorctype'] = '1';
            $para['flag'] = '1';
            $para['czzh'] = $rmbczzh;
            $para['czname'] = $rmbczname;
            $para['czpz'] = I('post.czpz');

            if (insertRow('xjrorclist', $para)) {
                msg_l("RMB充值申请成功",U('Home/My/index'));
            } else {
                msg_b("RMB充值申请失败,清联系管理员.");
            }
        }
    }

    public function jbxxxg(){
        global $user;

        $userid= $user['userid'];

        //$userid="1001";
        $sql = "select * from user where userid = $userid";
        $qb = M()->query($sql);

        $this->assign('user', $qb[0]['user']);
        $this->assign('headimg', $qb[0]['headimg']);
        $this->assign('xm', $qb[0]['name']);
        $this->assign('dh', $qb[0]['telephone']);
        $this->assign('khh', $qb[0]['khh']);
        $this->assign('yhhm', $qb[0]['yhcardid']);
        $this->assign('pzh', $qb[0]['mjzh']);
        $this->assign('pzhhsw', $qb[0]['mjtelen']);
        $this->assign('footIndex',4);
        $this->display();
    }
    public function jbxxxg_update(){
        global $user;
        $userid= $user['userid'];
        //$userid = '1001';
        if(empty(I('post.xm'))) msg_b('姓名不能为空');
        if(empty(I('post.dh'))) msg_b('电话不能为空');
//        if(empty(I('post.khh'))) msg_b('开户行不能为空');
//        if(empty(I('post.yhhm'))) msg_b('银行号码不能为空');

        $para['name'] = checkstr(I('post.xm'));
        $para['telephone']= checkNumber(I('post.dh'));
       /* $para['khh']  = checkstr(I('post.khh'));
        $para['yhcardid'] = checkNumber(I('post.yhhm'));
        $para['mjzh'] = checkstr(I('post.pzh'));*/
//        $para['mjtelen'] = checkNumber(I('post.pzhhsw'));
        $strwhere="userid=$userid";
        if (updateRows('user', $para,$strwhere)) {
            msg_l("修改成功",U('Home/My/index'));
        }
        else{ msg_b("修改失败");}

    }

    public function xgmm(){
        $this->assign('footIndex',4);
        $this->display();
    }
    public function xgmm_update(){
        if($_POST) {
            global $user;
            $userid= $user['userid'];
            //$userid="1001";
            if(empty(I('post.ymm'))) msg_b('原密码不能为空');
            if(empty(I('post.newmm'))) msg_b('新密码不能为空');
            if(empty(I('post.qrmm'))) msg_b('重新密码不能为空');
            $ymm = checkstr(I('post.ymm'));
            $newmm = checkstr(I('post.newmm'));
            $qrmm = checkstr(I('post.qrmm'));
            $sql = "select pasword from user where userid = $userid";
            $qb = M()->query($sql);
            if($qb[0]['pasword']!=md5($ymm)){

                msg_b('原始密码输入错误请重新输入');
            }
            if($newmm!=$qrmm)
            {msg_b('重新密码与新密码不一致请重新输入');}

            try {
                M()->startTrans();
                $sql = "update  user set pasword= '".md5($newmm)."' where userid='".$userid."'";

                M()->execute($sql);
                M()->commit();
                msg_l("修改成功", U('Home/My/index'));
            } catch (Exception $e) {
                M()->rollback();
                msg_b("修改失败");
            }
        }
    }
    public function txlist(){
        global $user;
        $userid = $user['userid'];
        $sql = "select id,DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,type from prorclist where flag = 1 and userid = $userid  and rorctype =2 ORDER BY operdate desc";
        $plist = M()->query($sql);

        $sql = "select id,DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,xjnum,type from xjrorclist where flag = 1 and userid = $userid  and rorctype =2 ORDER BY operdate desc";
        $rmblist = M()->query($sql);


        $this->assign('plist',$plist);
        $this->assign('rmblist',$rmblist);
        $this->assign('footIndex',4);
        $this->display();
    }

    public function join(){
        global $user;
        //从session里取
        $userid = $user['userid'];

        $sql = "select m1.`user`,m1.userid,m1.headimg,m1.pid,case when m1.p_yongjin is null then 0 else m1.p_yongjin end p_yongjin, case when m2.pp_yongjin is null then 0 else m2.pp_yongjin end pp_yongjin, case when m3.js is null then 0 else m3.js end js from  ( select a.`user`,a.headimg,a.`name`,a.userid,a.pid,t.p_yongjin from `user` a LEFT JOIN ( select userid,sum(p_yongjin) p_yongjin from buy_video 	where Dele = 1 	GROUP BY userid ) t on a.userid = t.userid where a.pid = $userid and a.flag = 1  ) m1 LEFT JOIN ( select a.pid,sum(t.pp_yongjin) pp_yongjin from `user` a 	LEFT JOIN ( select userid,sum(pp_yongjin) pp_yongjin from buy_video 	where Dele = 1 	GROUP BY userid ) t on a.userid = t.userid 	where a.flag = 1 	GROUP BY a.pid ) m2 on m1.userid = m2.pid LEFT JOIN ( SELECT pid,count(1) js from `user` where flag = 1 GROUP BY pid ) m3 on m1.userid = m3.pid";
        $list = M()->query($sql);

        $this->assign('list',$list);
        $this->assign('footIndex',4);
        $this->display();
    }
    public function rmbtx(){
        //RMB提现加载
        global $user;
        //从session里取
        $userid = $user['userid'];
        //$userid = '1001';
        $sql = "select xjnum from userzj where userid = $userid";
        $qb = M()->query($sql);
        $mjsql="select name,yhcardid,khh FROM user t where t.userid = $userid";
        $mjqb = M()->query($mjsql);
        $this->assign('xjnum',$qb[0]['xjnum']);
        
        

        $this->assign('name',$mjqb[0]['name']);
        $this->assign('yhcardid',$mjqb[0]['yhcardid']);
        $this->assign('khh',$mjqb[0]['khh']);

        $sql2 = "select DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,xjnum,id from xjrorclist where flag = 1 and userid= ' ".$userid." 'and type='1'  ORDER BY operdate desc";
        //msg_b($sql2);
        $list = M()->query($sql2);

        $this->assign('list',$list);
        $this->assign('footIndex',4);
        $this->display();
    }
    public function rmbtx_insert(){
        //RMB提现

        if($_POST){
            global $user;
            $para['userid'] = $user['userid'];
            //$para['userid'] = '1001';
            $userid = $user['userid'];
            if(empty(I('post.tkje'))) msg_b('提现金额不能为空');
            $rmbtxsl = checkNumber(I('post.tkje'));
            if($rmbtxsl<10) msg_b('提现金额不能小于10元');
            $pnumsql = "select xjnum from userzj where userid = $userid";
            $pnumqb = M()->query($pnumsql);
            if($rmbtxsl>$pnumqb[0]['xjnum']) msg_b('RMB余额不足');

            $para['operdate'] =date('y-m-d G:i:s');
            $para['xjnum'] =$rmbtxsl;
            $para['adudate'] ='';
            $para['aduuser'] ='';
            $para['type'] = '1';
            $para['rorctype'] = '2';
            $para['flag'] = '1';

            if (insertRow('xjrorclist', $para)) {
                try{
                    M()->startTrans();
                    $sql = "update  userzj set xjnum =xjnum- $rmbtxsl where userid=$userid   ";
                    M()->execute($sql);
                    M()->commit();
                    msg_l("RMB提现成功",U('Home/My/index'));
                }catch(Exception $e){
                    M()->rollback();
                    $sql = "delete from  xjrorclist  where userid=$userid and operdate=".$para['operdate']."   ";
                    M()->execute($sql);
                    M()->commit();
                    msg_b("RMB提现失败,清联系管理员.");
                }
            } else {
                msg_b("RMB提现失败,清联系管理员.");
            }
        }
    }
    public function rmbtx_del( ){
        //RMB提现撤销
        $id = checkstr(I("get.id"));
        global $user;
        $userid = $user['userid'];
       // $userid = '1001';
        try{
            M()->startTrans();
            $sql = "update  xjrorclist set flag='0',cxdate= DATE_FORMAT(NOW(),'%y-%m-%d %H:%i:%s') where id=$id ";
            M()->execute($sql);
            $sql2 = "update  userzj set xjnum =xjnum+ (select xjnum from xjrorclist t where t.id=$id) where userid=$userid   ";
            M()->execute($sql2);
            M()->commit();
            msg_l("撤单成功",U('Home/My/rmbtx'));
        }catch(Exception $e){
            M()->rollback();
            msg_l("撤单失败",U('Home/My/rmbtx'));
        }
    }


    public function helppai(){
        $this->assign('footIndex',4);
        $this->display();
    }
    public function buy_list(){
        global $user;
        //从session里取
        $userid = $user['userid'];
        //$buy_list = M('buy_video')->where('userid = '.$userid)->select();

        $sql = "select a.*,b.v_name,b.v_pic,b.v_url,b.v_memo from buy_video a LEFT JOIN videolist b on a.videoid = b.id and b.Dele = 1 where a.Dele = 1 and userid = $userid";
        $buy_list = M()->query($sql);
        $this->assign('buy_list',$buy_list);
        $this->assign('footIndex',4);
        $this->display();
    }



    public function trad(){
        global $user;
        //从session里取
        $userid = $user['userid'];

        $sql = "select xjnum from userzj where userid = $userid";
        $qb = M()->query($sql);
        
        $type = checkstr(I("get.type"));
        
        $sql = "select DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,num,price,sumje from cjlist where flag = 1 ORDER BY operdate desc";
        $list = M()->query($sql);

        $sql = "select id,DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,num,price,sumje from gdlist where userid <> $userid and flag = 1 ORDER BY price";
        $sell_list = M()->query($sql);

        $this->assign('xjnum',$qb[0]['xjnum']);
        $this->assign('type',$type);
        $this->assign('list',$list);
        $this->assign('sell_list',$sell_list);
        $this->display();
    }

    public function chedan(){
        $id = checkstr(I("get.id"));

        try{
            M()->startTrans();

            $sql = "select userid,num from gdlist where id = $id";
            $sell_list = M()->query($sql);

//            dump($sell_list);exit;
            $sql = "delete from gdlist where id = $id";
            M()->execute($sql);


            //撤单的币，返回钱包
            //在userzj表，更新买入会员的币的数额，扣除买币的rmb金额
            $sql = "update userzj set pnum = pnum + ".$sell_list[0]['num']." where userid = ".$sell_list[0]['userid'];
            M()->execute($sql);

            M()->commit();
            msg_l("撤单成功",U('Home/My/jylist/type/2'));
        }catch(Exception $e){
            M()->rollback();
            msg_l("撤单失败",U('Home/My/jylist/type/2'));
        }
    }
    public function jylist(){
        global $user;
        $type = checkstr(I("get.type"));
        //从session里取
        $userid = $user['userid'];

        $sql = "select DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,num,price,sumje from cjlist where flag = 1 and buy_userid = $userid  ORDER BY operdate desc";
        $buy_list = M()->query($sql);

        $sql = "select * from (select id,DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,num,price,sumje,'完成' type from cjlist where flag = 1 and sell_userid = $userid UNION select id,DATE_FORMAT(operdate,'%y-%m-%d %H:%i' ) operdate,num,price,sumje,'挂单' type from gdlist where flag = 1 and userid = $userid and gdtype = 2 ) t ORDER BY type desc";
        $sell_list = M()->query($sql);

        $this->assign('type',$type);
        $this->assign('buy_list',$buy_list);
        $this->assign('sell_list',$sell_list);
        $this->display();
    }


    public function buy_n(){
        global $user;
        //从session里取
        $userid = $user['userid'];
        $id = checkstr(I("get.id"));
        $num = checkstr(I("get.num"));

        //查询，买家的钱，卖家的币
        $sql = "select * from userzj where userid = $userid ";
        $buy_user = M()->query($sql);

        $sql = "select * from gdlist where id = $id";
        $sell_user = M()->query($sql);

        //买币所需价格
        $fee = $sell_user['0']['price'] * $num;
        //判断，买家的钱是否够买币
        if($buy_user[0]['xjnum'] < $fee){
            msg_l("您的钱包金额，不足以购买，请充值或减少数量！",U('Home/My/trad/type/2'));
        }
        //判断，卖家的币，是否够卖，避免同时点击购买的
        if($sell_user['0']['num'] < $num){
            msg_l("您购买数量超过卖币数量，请重试！",U('Home/My/trad/type/2'));
        }


        try{
            M()->startTrans();

            //更新gdlist表，扣除卖掉的数量，如果已经都卖完，那就删除记录
            if($sell_user['0']['num'] == $num){
                //删除记录
                $sql = "DELETE from gdlist where id = $id";
                M()->execute($sql);
            } else {
                //更新
                $sql = "UPDATE gdlist set num = num - $num,sumje = sumje - $fee,ssje = ssje - $fee  where id = $id";
//                dump($sql);exit;
                M()->execute($sql);
            }
            //在cjlist表，插入成交记录表
            $para['buy_userid'] = $userid;
            $para['sell_userid'] = $sell_user[0]['userid'];
            $para['operdate'] = date('y-m-d H:i');
            $para['num'] = $num;
            $para['price'] = $sell_user[0]['price'];

            $para['sumje'] = $num * $sell_user[0]['price'];

            $para['sxf'] = C('buy_sxf') * $para['sumje'];
            $para['ssje'] = $para['sumje'] - $para['sxf'];
            $para['p_yongjin'] = $para['sxf'] * C('p_yj');
            $para['pp_yongjin'] = $para['sxf'] * C('pp_yj');
            $para['pt_yongjin'] = $para['sxf'] * C('pt_yj');

            insertRow("cjlist",$para);

            //在userzj表，更新买入会员的币的数额，扣除买币的rmb金额
            $sql = "update userzj set xjnum = xjnum - ". $num * $sell_user[0]['price'] .",pnum = pnum + $num where userid = $userid";
            M()->execute($sql);

            //在userzj表，更新卖出会员的卖币的rmb金额
            $sql = "update userzj set xjnum = xjnum + ". $para['ssje'] ." where userid = ".$sell_user[0]['userid'];
            M()->execute($sql);

            //算佣金************************************

            $sxf = $para['sxf'];
            //查询，卖家的P、PPid
            $sql = "select userid,pid,ppid from user where userid =  ".$sell_user[0]['userid']." and flag = 1";
            $sell_user_l = M()->query($sql);

            //在userzj表，更新卖出会员的PID的钱包，增加佣金
            if($sell_user_l[0]['pid'] > 0){
                $sql = "update userzj set xjnum = xjnum + ". $para['p_yongjin'] ." where userid = ".$sell_user_l[0]['pid'];
                M()->execute($sql);

                $sxf = $sxf - $para['p_yongjin'];
            }

            //在userzj表，更新卖出会员的PPID的钱包，增加佣金
            if($sell_user_l[0]['ppid'] > 0){
                $sql = "update userzj set xjnum = xjnum + ". $para['pp_yongjin'] ." where userid = ".$sell_user_l[0]['ppid'];
                M()->execute($sql);

                $sxf = $sxf - $para['pp_yongjin'];
            }

            $sql = "update userzj set xjnum = xjnum + ". $sxf ." where userid = 0";
            M()->execute($sql);

            M()->commit();
            msg_l('购买成功！',U('Home/My/trad/type/2'));
        }catch(Exception $e){
            M()->rollback();
            msg_l("买币失败，请联系管理员！",U('Home/My/trad/type/2'));
        }
    }
    public function sell_n(){
        global $user;
        //从session里取
        $userid = $user['userid'];
        $sql = "select pnum from userzj where userid = $userid";
        $qb = M()->query($sql);

        $d_price = M('gdlist')->field('price')->where("flag = '1'")->order('price asc')->find();

        $this->assign('d_price',$d_price['price']);
        $this->assign('pnum',$qb[0]['pnum']);
        $this->display();
    }
    public function sell_n_bc(){

        global $user;
        //从session里取
        $userid = $user['userid'];
        $num = checkstr(I("post.num"));
        $price = checkstr(I("post.price"));

        //查询，卖家的币，是否够用
        $sql = "select * from userzj where userid = $userid ";
        $sell_user = M()->query($sql);

        //判断，卖家的币，是否够卖，避免同时点击购买的
        if($sell_user['0']['pnum'] < $num){
            msg_b("您卖出数量超过总量，请重新填写！");
        }

        try{
            M()->startTrans();

            //在gdlist表，插入成交记录表
            $para['userid'] = $userid;
            $para['operdate'] = date('y-m-d H:i');
            $para['num'] = $num;
            $para['price'] = $price;
            $para['sumje'] = $num * $price;

            $para['sxf'] = C('sell_sxf') * $para['sumje'];
            $para['ssje'] = $para['sumje'] - $para['sxf'];

            insertRow("gdlist",$para);

            //在userzj表，更新买入会员的币的数额，扣除买币的rmb金额
            $sql = "update userzj set pnum = pnum - $num where userid = $userid";
            M()->execute($sql);

            M()->commit();
            msg_l('挂单成功！',U('Home/User/index'));
        }catch(Exception $e){
            M()->rollback();
            msg_l("挂单失败，请联系管理员！",U('Home/User/index'));
        }
    }
    public function up(){
        global $user;
        //从session里取
        $userid = $user['userid'];
        $base64 = I('post.str');
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result)){
            $type = $result[2];
            $picname = uniqid().".{$type}";
            $new_file = "./Public/upload/".$picname;
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64)))){
                $sql = "update user set headimg = '$picname' where userid = $userid";
                M()->execute($sql);
//                echo '新文件保存成功：', $new_file;
            }
        }
    }
    public function pic(){

        $this->display();
    }
    public function pic_rmbcz(){
        $base64 = I('post.str');
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result)){
            $type = $result[2];
            $picname = uniqid().".{$type}";
            $new_file = "./Public/upload/rmbcz/".$picname;
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64)))){
                $this->ajaxReturn($picname);
            }
        }
    }
    public function pic_rmb(){
        $id = I('get.id');
        $this->assign('id',$id);
        $this->display();
    }

    public function my_vip(){
        global $user;
        //从session里取
        $userid = $user['userid'];

        $sql = "select * from `user` where userid = $userid and flag= 1";
        $user = M()->query($sql);

        $sql = "select xjnum from userzj where userid = $userid";
        $qb = M()->query($sql);


        $vip_list = M('mmm')->where('type = 1')->select();
        $this->assign('vip_list',$vip_list);
        $this->assign('user',$user[0]);
        $this->assign('xjnum',$qb[0]['xjnum']);

        $this->assign('footIndex',3);
        $this->display();
    }


    public function  new_inpost(){
        $order_id = (string) date("YmdHis"); //您的订单Id号，你必须自己保证订单号的唯一性，本平台不会限制该值的唯一性
        $payType = "bank";  //充值方式：bank为网银，card为卡类支付
        $account = "xiaohuangren";  //账号

        $lev = $_REQUEST['lev'];
        $levType = C('levType');

        $buy_sum = $levType[$lev];


        $amount = $buy_sum;   //金额

        //======================网银支付配置=================================
        //接收网银支付接口的地址
        $bank_callback_url	= "http://localhost:8811/callback/card.php";
        //网银支付跳转回的页面地址
        $bank_hrefbackurl = '';

        $parter = "1707";  //商家Id
        $key = "842edf03eae44e3ab0f0eab1d17b5f37"; //商家密钥
        $type = $_REQUEST['pickval'];   //银行类型（1006 支付宝 1007 微信）

        $value = $amount;    //提交金额
        $orderid = $order_id;   //订单Id号
        $callbackurl = $bank_callback_url; //下行url地址
        $hrefbackurl = $bank_hrefbackurl; //下行url地址
        //发送
        $this->send($account,$parter,$key,$type,$value,$orderid,$callbackurl,$hrefbackurl,$lev);
    }

    /*
	///发送到平台网银消费接口
	*/
    public function send($account,$parter,$key,$type,$value,$orderid,$callbackurl,$hrefbackurl,$lev){
        global $user;
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
        $attach		= trim($_GET['attach']);

        //进行签名认证
        $key	= $merchant_key;
        $this->recive($key,$orderid,$opstate,$ovalue,$sysorderid,$completiontime);

        //////////////////////////////////////////////////////////////////////////
        // 进入到这一步，说明签名已经验证成功，
        // 你可以在这里加入自己的代码, 例如：可以将处理结果存入数据库
        $aa = explode('|', $attach);
        buy_vip($aa[0],$aa[1],$aa[2]);

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

    public function buy_vip($userid,$lev,$ovalue){
        global $user;
        try{
            M()->startTrans();
            $levType = C('levType');

            $d=$user['vip_end'];
            //$userid = $user['userid'];
            if($d== '0'){
                $d = date("Y-m-d");
            }

            $vip_end = date('Y-m-d',strtotime("{$d} +".$lev." month"));

            $buy_sum = $levType[$lev];
            if($buy_sum != $ovalue){
                msg_b("金额不符，请联系客服.");
            }

            $p_yongjin = $buy_sum * C('p_yj');
            $pp_yongjin = $buy_sum * C('pp_yj');
            $pt_yongjin = $buy_sum * C('pt_yj');


            //在userzj表，扣除买会员的钱
            $sql = "update userzj set xjnum = xjnum - ". $buy_sum ." where userid = $userid";
            M()->execute($sql);

            //在user表，更新会员VIP时间
            $sql = "update user set vip_end = '". $vip_end ."' where userid = ".$userid;
            M()->execute($sql);

            //算佣金************************************

            //查询，卖家的P、PPid
            $sql = "select userid,pid,ppid from user where userid =  ".$userid." and flag = 1";
            $sell_user_l = M()->query($sql);

            //在userzj表，更新会员的PID的钱包，增加佣金
            if($sell_user_l[0]['pid'] > 0){
                $sql = "update userzj set xjnum = xjnum + ". $p_yongjin ." where userid = ".$sell_user_l[0]['pid'];
                M()->execute($sql);
            }

            //在userzj表，更新卖出会员的PPID的钱包，增加佣金
            if($sell_user_l[0]['ppid'] > 0){
                $sql = "update userzj set xjnum = xjnum + ". $pp_yongjin ." where userid = ".$sell_user_l[0]['ppid'];
                M()->execute($sql);
            }

            $sql = "update userzj set xjnum = xjnum + ". $pt_yongjin ." where userid = 0";
            M()->execute($sql);

            M()->commit();

            $user = M('user')->where('userid="%s"',array($userid))->find();
            $_SESSION['user']=$user;

            msg_l('购买成功！',U('Home/My/index'));
        }catch(Exception $e){
            M()->rollback();
            msg_b("购买失败，请联系管理员！");
        }
    }
    
    public function geturl(){
        $id = checkstr(I("post.id"));
        $sql = "select * from videolist where id = $id and dele = 1";
        $videos = M()->query($sql);

        $v_url = "/upload/video/".$videos[0]['v_url'];
        $v_pic = "/upload/pic/".$videos[0]['v_pic'];
        $this->ajaxReturn ($v_url.'|'.$v_pic);
    }

    public function zhifu(){
        $preorderApi = "http://api.psdzy.cn";//下单接口
        $appid = 20122; //商户appid
        $appkey = "9a33b04c36deda68e626d77bd4e6cdc8";//

        $lev = $_REQUEST['lev'];
        $levType = C('levType');

        $buy_sum = $levType[$lev];

        $amount = $buy_sum * 100;
        $payway = 'weixin';

        /*if (isset($_REQUEST["amount"])) {
            $amount = $_REQUEST["amount"];
        }*/
        if (isset($_REQUEST["pickval"])) {
            $payway = $_REQUEST["pickval"];
        }

//        dump($payway);exit;
        //$paytype = "wap";//h5, wap , android , ios
        if (isset($_REQUEST["paytype"])) {
            $paytype = $_REQUEST["paytype"];
        }

        $params = array(
            "appid" => $appid,//商户apid
            "amount" => $amount, //价格 分
            "itemname" => "商品名",//商品名
            "ordersn" => "{$appid}_" . time() . mt_rand(1000, 9999),//商户订单号,必须唯一,必须appid_ 开头
            "orderdesc" => "订单描述",//订单描述
            "notifyurl" => "http://222.171.79.103:9998/xhr/index.php/Home/Buy/notify_url",//后端异步支付回调地址，改成app自己的通知地址
        );
        ksort($params);//key a-z 排序
        $signstr = join($params, "|") . "|" . $appkey;//把值拼接好再拼接上appkey
        $sign = md5($signstr);

        $params["sign"] = $sign;//签名
        $params["returnurl"] = "http://222.171.79.103:9998/xhr/index.php/Home/Buy/return_url";//web前端同步跳转地址
        $params["payway"] = $payway;//支付类型 ，不填表示app支付，可指定类型
        $params["ext"] = "";//app扩展参数
        $params["paytype"] = "$paytype";//付费方式

        $url = $preorderApi . "?" . http_build_query($params);
        //echo $url;
        //echo "<p><hr/></p>";
        $context = stream_context_create(array('http'=>array('ignore_errors'=>true)));
        $ret = file_get_contents($url, FALSE, $context);
//$ret = file_get_contents($url);

        /*----微信支付----*/
        //echo "$ret";
        //echo "<p><hr/></p>";
        $data = json_decode($ret, true);

        if ($data["status"] == 1) {
            /*微信公众号 wap支付*/
            echo "<script>";
            echo "window.location.href='".$data['data']."'";
            echo "</script>";
            //微信扫码支付
            echo "<img src=".$data['data'].">";
        } else {
            exit($data["msg"]);
        }

        /*----微信支付----*/


        /*---支付宝支付----*/
        echo "$ret";
    }

    public function zhifu_181103(){
        global $user;
        $shh =  C('shh');    //商户号
        $zf_key = C('zf_key'); //key
        $notifyUrl = C('notifyUrl'); //notifyUrl
        

        $para['userid'] = $user['userid'];
        $para['vipid'] = checkstr(I('vipid'));
        $para['buy_date'] = date("Y-m-d");
        $para['buy_price'] = checkstr(I('money'));
        $para['flag'] = 0;

        $id = M('buy_info')->add($para);
        if ($id) {
            $data = [
                "orderAmount"=> $para['buy_price'], //金额
                "orderId"=> $id,    //订单号
                "partner"=> $shh,   //商户号
                'payMethod'=>'11',      //微信
                "payType"=>"syt",       //模式
                "signType"=>"MD5",
                "version"=>"1.0",
            ];

            ksort($data);
            $postString = http_build_query($data);
            $signMyself = strtoupper(md5($postString.$zf_key));
            $data["sign"] = $signMyself;
            $data['productName'] = 'vip购买';
            $data['productId'] = $para['vipid'];
            $data['productDesc'] = 'vip购买';
            $data['notifyUrl'] = $notifyUrl;
            $postString = http_build_query($data);
            $url = "http://qr.sytpay.cn/api/v1/create.php?".$postString;

/*            dump($postString);
            dump($url);exit;*/

            header("Location: " .$url);
        } else{
            msg_b("订单生成失败，请稍后再试！");
        }






    }

    

    function request_post($url = '', $param = '') {
        if (empty($url) || empty($param)) {
            return false;
        }

        $postUrl = $url;
        $curlPost = $param;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }

}

