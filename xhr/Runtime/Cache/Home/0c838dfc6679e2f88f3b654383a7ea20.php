<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
<title>小黄人</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!--标准mui.css-->
<link rel="stylesheet" href="/xhr/Public/css/mui.min.css">
<!--App自定义的css-->
<link rel="stylesheet" type="text/css" href="/xhr/Public/css/app.css"/>
<link href="/xhr/Public/css/style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/xhr/Public/css/icons-extra.css" />
<style>
	html,
	body {
		background-color: #efeff4;
		font-size: 14px;
		font-family: "Microsoft YaHei", 微软雅黑, "Microsoft JhengHei", "黑体";
	}

	.foot-no{
		color: #9b9b9c;
		font-weight: normal;
	}
	.foot-active{
		color: #f64c47;
		font-weight: bolder
	}


</style>

<script type="text/javascript">
	var URL = "/xhr/index.php/Home/Ckplayer";
	var APP = "/xhr/index.php";
	var ROOT = "/xhr";
	var PUBLIC = ROOT + "/Public";
	var UPLOAD = "<?php echo $_SERVER['DOCUMENT_ROOT'];?>" + "/upload/";
</script>
<script src="/xhr/Public/js/mui.min.js"></script>
<script src="/xhr/Public/js/mui.enterfocus.js"></script>
<script src="/xhr/Public/js/app.js"></script>
<script src="/xhr/Public/js/mui.view.js "></script>
<script src='/xhr/Public/js/feedback.js'></script>
		<meta charset="UTF-8">
		<title>ckplayer</title>
		<script type="text/javascript" src="/xhr/Public/js/ckplayer/ckplayer.js" charset="UTF-8"></script>
		<style type="text/css">
			body {
				margin: 0;
				padding: 0px;
				font-family: "Microsoft YaHei", YaHei, "微软雅黑", SimHei, "黑体";
				font-size: 14px
			}
		</style>

	</head>

	<body>
	<nav class="mui-bar mui-bar-tab">
    <ul class="mui-table-view mui-grid-view mui-grid-12" style="padding: 0 0 3px 0; background-color: #303032" >
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
         <?php if($footIndex == 1){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        " >
            <a href="/xhr/index.php/Home/Index/index">
                <span class="mui-icon mui-icon-home" style="padding-top: 0px;padding-bottom: 0px"></span>
                <div class="mui-tab-label" style="font-size: 11px">首页</div>
            </a>
        </li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
         <?php if($footIndex == 2){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="/xhr/index.php/Home/Index/tab_list">
            <span class="mui-icon mui-icon-navigate" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">分类</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
         <?php if($footIndex == 3){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="#">
            <span class="mui-icon mui-icon-search" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">VIP会员</div>
        </a></li>
        <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3
        <?php if($footIndex == 4){ ?>
            foot-active
        <?php } else {?>
            foot-no
        <?php }?>
        "><a href="/xhr/index.php/Home/My/index">
            <span class="mui-icon mui-icon-person" style="padding-top: 0px;padding-bottom: 0px"></span>
            <div class="mui-tab-label" style="font-size: 11px">个人中心</div>
        </a></li>
    </ul>
</nav>
		<div id="video" style="width: 600px; height: 400px;"></div>
		<script type="text/javascript">
			var videoObject = {
				//playerID:'ckplayer01',//播放器ID，第一个字符不能是数字，用来在使用多个播放器时监听到的函数将在所有参数最后添加一个参数用来获取播放器的内容
				container: '#video', //容器的ID或className
				variable: 'player', //播放函数名称
				loaded: 'loadedHandler', //当播放器加载后执行的函数
				loop: true, //播放结束是否循环播放
				//autoplay: true, //是否自动播放
				//duration: 500, //设置视频总时间
				cktrack: 'material/srt.srt', //字幕文件
				poster: 'material/poster.jpg', //封面图片
				preview: { //预览图片
					file: ['material/mydream_en1800_1010_01.png', 'material/mydream_en1800_1010_02.png'],
					scale: 2
				},
				config: '', //指定配置函数
				//debug: true, //是否开启调试模式
				//flashplayer: true, //强制使用flashplayer
				drag: 'start', //拖动的属性
				seek: 0, //默认跳转的时间
				//playbackrate:1,//默认速度的编号，只对html5有效,设置成-1则不显示倍速
				//advertisements:'website:ad.json',
				//front:'frontFun',//上一集的操作函数
				//next:'nextFun',//下一集的操作函数
				//广告部分开始
				adfront: 'http://www.ckplayer.com/yytf/swf/front001.swf,http://www.ckplayer.com/yytf/swf/front002.swf', //前置广告
				adfronttime: '15,15',
				adfrontlink: '',
				adpause: 'http://www.ckplayer.com/yytf/swf/pause001.swf,http://www.ckplayer.com/yytf/swf/pause002.swf',
				adpausetime: '5,5',
				adpauselink: '',
				adinsert: 'http://www.ckplayer.com/yytf/swf/insert001.swf,http://www.ckplayer.com/yytf/swf/insert002.swf',
				adinserttime: '10,10',
				adinsertlink: '',
				inserttime: '10,80',
				adend: 'http://www.ckplayer.com/yytf/swf/end001.swf,http://www.ckplayer.com/yytf/swf/end002.swf',
				adendtime: '15,15',
				adendlink: '',
				//广告部分结束
				promptSpot: [ //提示点
					{
						words: '提示点文字01',
						time: 30
					},
					{
						words: '提示点文字02',
						time: 150
					}
				],
				//mobileCkControls:true,//是否在移动端（包括ios）环境中显示控制栏
				//live:true,//是否是直播视频，true=直播，false=点播
				video: [
			        ['http://img.ksbbs.com/asset/Mon_1703/05cacb4e02f9d9e.mp4', 'video/mp4', '中文标清', 0],
			        ['http://img.ksbbs.com/asset/Mon_1703/d0897b4e9ddd9a5.mp4', 'video/mp4', '中文高清', 0],
			        ['http://img.ksbbs.com/asset/Mon_1703/eb048d7839442d0.mp4', 'video/mp4', '英文高清', 10],
			        ['http://img.ksbbs.com/asset/Mon_1703/d30e02a5626c066.mp4', 'video/mp4', '英文超清', 0]
			    ]//视频地址
			};
			var player = new ckplayer(videoObject);
			function loadedHandler() {
				player.addListener('error', errorHandler); //监听视频加载出错
				player.addListener('loadedmetadata', loadedMetaDataHandler); //监听元数据
				player.addListener('duration', durationHandler); //监听播放时间
				player.addListener('time', timeHandler); //监听播放时间
				player.addListener('play', playHandler); //监听暂停播放
				player.addListener('pause', pauseHandler); //监听暂停播放
				player.addListener('buffer', bufferHandler); //监听缓冲状态
				player.addListener('seek', seekHandler); //监听跳转播放完成
				player.addListener('seekTime', seekTimeHandler); //监听跳转播放完成
				player.addListener('volume', volumeChangeHandler); //监听音量改变
				player.addListener('full', fullHandler); //监听全屏/非全屏切换
				player.addListener('ended', endedHandler); //监听播放结束
				player.addListener('screenshot', screenshotHandler); //监听截图功能
				player.addListener('mouse', mouseHandler); //监听鼠标坐标
				player.addListener('frontAd', frontAdHandler); //监听前置广告的动作
				player.addListener('wheel', wheelHandler); //监听视频放大缩小
				player.addListener('controlBar', controlBarHandler); //监听控制栏显示隐藏事件
				player.addListener('clickEvent', clickEventHandler); //监听点击事件
				player.addListener('definitionChange', definitionChangeHandler); //监听清晰度切换事件
			}
			function errorHandler() {
				console.log('出错')
				changeText('.playerstate', '状态：视频加载错误，停止执行其它动作，等待其它操作');
			}

			function loadedMetaDataHandler() {
				var metaData = player.getMetaDate();
				//console.log(metaData)
				var html = ''
				//console.log(metaData);
				if(parseInt(metaData['videoWidth']) > 0) {
					changeText('.playerstate', '状态：获取到元数据信息，如果数据错误，可以使用延迟获取');
					html += '总时间：' + metaData['duration'] + '秒，';
					html += '音量：' + metaData['volume'] + '（范围0-1），';
					html += '播放器的宽度：' + metaData['width'] + 'px，';
					html += '播放器的高度：' + metaData['height'] + 'px，';
					html += '视频宽度：' + metaData['videoWidth'] + 'px，';
					html += '视频高度：' + metaData['videoHeight'] + 'px，';
					html += '视频原始宽度：' + metaData['streamWidth'] + 'px，';
					html += '视频原始高度：' + metaData['streamHeight'] + 'px，';
					html += '是否暂停状态：' + metaData['paused'];
				} else {
					changeText('.playerstate', '状态：未正确获取到元数据信息');
					html = '没有获取到元数据';
				}
				changeText('.metadata', html);
			}
			function playHandler() {
				//player.animateResume();//继续播放所有弹幕
				changeText('.playstate', getHtml('.playstate') + ' 播放');
				window.setTimeout(function() {
					loadedMetaDataHandler();
				}, 1000);
				loadedMetaDataHandler();
			}

			function pauseHandler() {
				//player.animatePause();//暂停所有弹幕
				changeText('.playstate', getHtml('.playstate') + ' 暂停');
				loadedMetaDataHandler();
			}

			function timeHandler(time) {
				changeText('.currenttimestate', '当前播放时间（秒）：' + time);
			}

			function durationHandler(duration) {
				changeText('.duration', '总时间（秒）：' + duration);
			}

			function seekHandler(state) {
				changeText('.seekstate', getHtml('.seekstate') + ' ' + state);
			}

			function seekTimeHandler(time) {
				changeText('.seekstate', getHtml('.seekstate') + ' seekTime:' + time);
			}

			function bufferHandler(buffer) {
				//console.log(buffer);
				changeText('.bufferstate', '缓冲：' + buffer);
			}

			function volumeChangeHandler(vol) {
				changeText('.volumechangestate', '当前音量：' + vol);
			}

			function screenshotHandler(obj) {
				changeText('.screenshot', '图片名称：' + obj['name'] + ',截图对象：' + obj['object'] + ',是否用户保存：' + obj['save'] + ',图片：<img src="' + obj['base64'] + '">');
			}

			function fullHandler(b) {
				if(b) {
					html = ' 全屏';
				} else {
					html = ' 否';
				}
				changeText('.fullstate', getHtml('.fullstate') + html);
				
			}

			function endedHandler() {
				changeText('.endedstate', '播放结束');
			}

			function mouseHandler(obj) {
				changeText('.mouse', '鼠标位置，x：' + obj['x'] + '，y：' + obj['y']);
			}

			function frontAdHandler(status) {
				changeText('.frontad', getHtml('.frontad') + ' ' + status);
			}
			var zoomNow = 1;

			function wheelHandler(n) {
				if(n > 0) {
					if(zoomNow < 5) {
						zoomNow += 0.1;
					}
				} else {
					if(zoomNow > 0) {
						zoomNow -= 0.1;
					}
				}
				player.videoZoom(zoomNow);//支持鼠标滚轮控制放大缩小
			}
			function controlBarHandler(show){
				if(show) {
					html = ' 显示';
				} else {
					html = ' 隐藏';
				}
				changeText('.controlBar', getHtml('.controlBar') + html);
			}
			function clickEventHandler(eve){
				changeText('.clickEvent', getHtml('.clickEvent') + ' '+eve);
			}
			function definitionChangeHandler(num){
				changeText('.definitionChange', getHtml('.definitionChange') + ',切换清晰度编号'+num);
			}
			var videoChangeNum = 0;

			function seekTime() {
				var time = parseInt(player.getByElement('.seektime').value);
				var metaData = player.getMetaDate();
				var duration = metaData['duration'];
				if(time < 0) {
					alert('请填写大于0的数字');
					return;
				}
				if(time > duration) {
					alert('请填写小于' + duration + '的数字');
					return;
				}
				player.videoSeek(time);
			}

			function changeVolume() {
				var volume = player.getByElement('.changevolume').value;
				volume = Math.floor(volume * 100) / 100
				if(volume < 0) {
					alert('请填写大于0的数字');
					return;
				}
				if(volume > 1) {
					alert('请填写小于1的数字');
					return;
				}
				player.changeVolume(volume);
			}

			function changeSize() {
				player.changeSize(w, h)
			}

			function frontFun() {
				alert('点击了前一集');
			}

			function nextFun() {
				alert('点击了下一集');
			}

			function adjump() {
				alert('点击了跳过广告按钮');
			}

			function newVideo() {
				var videoUrl = player.getByElement('.videourl').value;
				changeVideo(videoUrl);
			}

			function newVideo2() {
				var videoUrl = player.getByElement('.videourl2').value;
				changeVideo(videoUrl);
			}

			function changeVideo(videoUrl) {
				if(player == null) {
					return;
				}

				var newVideoObject = {
					container: '#video', //容器的ID
					variable: 'player',
					autoplay: true, //是否自动播放
					loaded: 'loadedHandler', //当播放器加载后执行的函数
					video: videoUrl
				}
				//判断是需要重新加载播放器还是直接换新地址

				if(player.playerType == 'html5video') {
					if(player.getFileExt(videoUrl) == '.flv' || player.getFileExt(videoUrl) == '.m3u8' || player.getFileExt(videoUrl) == '.f4v' || videoUrl.substr(0, 4) == 'rtmp') {
						player.removeChild();

						player = null;
						player = new ckplayer();
						player.embed(newVideoObject);
					} else {
						player.newVideo(newVideoObject);
					}
				} else {
					if(player.getFileExt(videoUrl) == '.mp4' || player.getFileExt(videoUrl) == '.webm' || player.getFileExt(videoUrl) == '.ogg') {
						player = null;
						player = new ckplayer();
						player.embed(newVideoObject);
					} else {
						player.newVideo(newVideoObject);
					}
				}
			}
			var elementTemp = null; //保存元件
			function newElement() {
				if(elementTemp != null) {
					alert('为了演示的简单性，本实例只能建立一个元件');
					return;
				}
				var attribute = {
					list: [ //list=定义元素列表
						{
							type: 'png', //定义元素类型：只有二种类型，image=使用图片，text=文本
							file: 'material/logo.png', //图片地址
							radius: 30, //图片圆角弧度
							width: 30, //定义图片宽，必需要定义
							height: 30, //定义图片高，必需要定义
							alpha: 0.9, //图片透明度(0-1)
							marginLeft: 10, //图片离左边的距离
							marginRight: 10, //图片离右边的距离
							marginTop: 10, //图片离上边的距离
							marginBottom: 10, //图片离下边的距离
							clickEvent: "link->http://www.ckplayer.com"
						}, {
							type: 'text', //说明是文本
							text: '演示弹幕内容，弹幕只支持普通文本，不支持HTML', //文本内容
							color: '0xFFDD00', //文本颜色
							size: 14, //文本字体大小，单位：px
							font: '"Microsoft YaHei", YaHei, "微软雅黑", SimHei,"\5FAE\8F6F\96C5\9ED1", "黑体",Arial', //文本字体
							leading: 30, //文字行距
							alpha: 1, //文本透明度(0-1)
							paddingLeft: 10, //文本内左边距离
							paddingRight: 10, //文本内右边距离
							paddingTop: 0, //文本内上边的距离
							paddingBottom: 0, //文本内下边的距离
							marginLeft: 0, //文本离左边的距离
							marginRight: 10, //文本离右边的距离
							marginTop: 10, //文本离上边的距离
							marginBottom: 0, //文本离下边的距离
							backgroundColor: '0xFF0000', //文本的背景颜色
							backAlpha: 0.5, //文本的背景透明度(0-1)
							backRadius: 30, //文本的背景圆角弧度
							clickEvent: "actionScript->videoPlay"
						}
					],
					x: 10, //元件x轴坐标，注意，如果定义了position就没有必要定义x,y的值了，x,y支持数字和百分比，使用百分比时请使用单引号，比如'50%'
					y: 50, //元件y轴坐标
					//position:[1,1],//位置[x轴对齐方式（0=左，1=中，2=右），y轴对齐方式（0=上，1=中，2=下），x轴偏移量（不填写或null则自动判断，第一个值为0=紧贴左边，1=中间对齐，2=贴合右边），y轴偏移量（不填写或null则自动判断，0=紧贴上方，1=中间对齐，2=紧贴下方）]
					alpha: 1, //元件的透明度
					backgroundColor: '0xFFDD00', //元件的背景色
					backAlpha: 0.5, //元件的背景透明度(0-1)
					backRadius: 60, //元件的背景圆角弧度
					clickEvent: "actionScript->videoPlay"
				}
				elementTemp = player.addElement(attribute);
			}

			function deleteElement() {
				if(elementTemp != null) {
					player.deleteElement(elementTemp);
					elementTemp = null;
				} else {
					alert('演示删除元件需要先添加');
				}
			}

			function newDanmu() {
				//弹幕说明

				var danmuObj = {
					list: [{
						type: 'image', //定义元素类型：只有二种类型，image=使用图片，text=文本
						file: 'material/logo.png', //图片地址
						radius: 30, //图片圆角弧度
						width: 30, //定义图片宽，必需要定义
						height: 30, //定义图片高，必需要定义
						alpha: 0.9, //图片透明度(0-1)
						marginLeft: 10, //图片离左边的距离
						marginRight: 10, //图片离右边的距离
						marginTop: 10, //图片离上边的距离
						marginBottom: 10, //图片离下边的距离
						clickEvent: "link->http://"
					}, {
						type: 'text', //说明是文本
						text: '演示弹幕内容，弹幕只支持普通文本，不支持HTML', //文本内容
						color: '0xFFDD00', //文本颜色
						size: 14, //文本字体大小，单位：px
						font: '"Microsoft YaHei", YaHei, "微软雅黑", SimHei,"\5FAE\8F6F\96C5\9ED1", "黑体",Arial', //文本字体
						leading: 30, //文字行距
						alpha: 1, //文本透明度(0-1)
						paddingLeft: 10, //文本内左边距离
						paddingRight: 10, //文本内右边距离
						paddingTop: 0, //文本内上边的距离
						paddingBottom: 0, //文本内下边的距离
						marginLeft: 0, //文本离左边的距离
						marginRight: 10, //文本离右边的距离
						marginTop: 10, //文本离上边的距离
						marginBottom: 0, //文本离下边的距离
						backgroundColor: '0xFF0000', //文本的背景颜色
						backAlpha: 0.5, //文本的背景透明度(0-1)
						backRadius: 30, //文本的背景圆角弧度
						clickEvent: "actionScript->videoPlay"
					}],
					x: '100%', //x轴坐标
					y: "50%", //y轴坐标
					//position:[2,1,0],//位置[x轴对齐方式（0=左，1=中，2=右），y轴对齐方式（0=上，1=中，2=下），x轴偏移量（不填写或null则自动判断，第一个值为0=紧贴左边，1=中间对齐，2=贴合右边），y轴偏移量（不填写或null则自动判断，0=紧贴上方，1=中间对齐，2=紧贴下方）]
					alpha: 1,
					//backgroundColor:'#FFFFFF',
					backAlpha: 0.8,
					backRadius: 30 //背景圆角弧度
				}
				var danmu = player.addElement(danmuObj);
				var danmuS = player.getElement(danmu);
				var obj = {
					element: danmu,
					parameter: 'x',
					static: true, //是否禁止其它属性，true=是，即当x(y)(alpha)变化时，y(x)(x,y)在播放器尺寸变化时不允许变化
					effect: 'None.easeOut',
					start: null,
					end: -danmuS['width'],
					speed: 10,
					overStop: true,
					pauseStop: true,
					callBack: 'deleteChild'
				};
				var danmuAnimate = player.animate(obj);
			}

			function deleteChild(ele) {
				if(player) {
					player.deleteElement(ele);
				}
			}

			function changeText(div, text) {
				player.getByElement(div).innerHTML = text;
			}

			function getHtml(div) {
				return player.getByElement(div).innerHTML;
			}
			var zoom = 1;
		</script>
		<p>
			<a href="http://www.ckplayer.com/" target="_blank">官网：http://www.ckplayer.com</a>,版本号：X</p>
		<p>以下仅列出部分功能，全部功能请至官网
			<a href="http://www.ckplayer.com/manualX/" target="_blank">《手册》</a>查看</p>
		<p>
			<button type="button" onclick="player.videoPlay()">播放</button>
			<button type="button" onclick="player.videoPause()">暂停</button>
			<button type="button" onclick="player.playOrPause()">播放/暂停</button>
			<button type="button" onclick="player.videoMute()">静音</button>
			<button type="button" onclick="player.videoEscMute()">取消静音</button>
			<button type="button" onclick="player.videoClear()">清除视频(仅flashplayer)</button>
			<button type="button" onclick="loadedMetaDataHandler()">获取元数据</button>
			<button type="button" onclick="newElement()">添加元件</button>
			<button type="button" onclick="deleteElement()">删除元件</button>
			<button type="button" onclick="newDanmu()">添加弹幕</button>
			<button type="button" onclick="player.screenshot('video',false,'视频截图')">视频截图(需要视频权限)</button>
			<button type="button" onclick="player.screenshot('player',false,'播放器截图')">播放器截图(需要视频权限)</button>
		</p>
		<p>
			<button type="button" onclick="player.adPause()">暂停广告(仅flashplayer)</button>
			<button type="button" onclick="player.adPlay()">继续播放广告(仅flashplayer)</button>
			<button type="button" onclick="player.videoPlay()">关闭（结束）广告(仅flashplayer)</button>
		</p>
		<p>
			<button type="button" onclick="player.changeControlBarShow(true)">显示控制栏</button>
			<button type="button" onclick="player.changeControlBarShow(false)">隐藏控制栏</button>
		</p>
		<p>
			<button type="button" onclick="player.videoRotation()">默认角度</button>
			<button type="button" onclick="player.videoRotation(1)">顺时针旋转</button>
			<button type="button" onclick="player.videoRotation(-1)">逆时针旋转</button>
			<button type="button" onclick="player.videoRotation(90)">旋转90</button>
			<button type="button" onclick="player.videoRotation(180)">旋转180</button>
			<button type="button" onclick="player.videoRotation(270)">旋转270</button>
			<button type="button" onclick="player.videoRotation(-90)">旋转-90</button>
			<button type="button" onclick="player.videoRotation(-180)">旋转-180</button>
			<button type="button" onclick="player.videoRotation(-270)">旋转-270</button>
		</p>
		<p>
			<button type="button" onclick="player.videoZoom(1)">默认大小</button>
			<button type="button" onclick="player.videoZoom(zoom+=0.1)">放大</button>
			<button type="button" onclick="player.videoZoom(zoom-=0.1)">缩小</button>
		</p>
		<p>
			<button type="button" onclick="player.changePlaybackRate(1)">默认速度(仅H5)</button>
			<button type="button" onclick="player.changePlaybackRate(0)">0.5倍(仅H5)</button>
			<button type="button" onclick="player.changePlaybackRate(3)">1.5倍(仅H5)</button>
			<button type="button" onclick="player.changePlaybackRate(4)">2倍(仅H5)</button>
			
		</p>
		<p>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',1)">正常拖动</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',0)">不能拖动</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',2)">只能前进（向右拖动）</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',3)">只能后退</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',4)">能回到第一次拖动时的位置</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',5)">看过的地方可以随意拖动</button>
		</p>
		<p>
			<button type="button" onclick="player.videoProportion()">原始比例(仅flashplayer)</button>
			<button type="button" onclick="player.videoProportion(4,3)">4:3(仅flashplayer)</button>
			<button type="button" onclick="player.videoProportion(16,9)">16:9(仅flashplayer)</button>
		</p>
		<p>
			<button type="button" onclick="player.videoBrightness(100)">调整亮度(仅flashplayer)</button>
			<button type="button" onclick="player.videoBrightness(0)">恢复亮度(仅flashplayer)</button>
			<button type="button" onclick="player.videoContrast(200)">调整对比度(仅flashplayer)</button>
			<button type="button" onclick="player.videoContrast(127.5)">恢复对比度(仅flashplayer)</button>
			<button type="button" onclick="player.videoSaturation(0)">调整饱和度(仅flashplayer)</button>
			<button type="button" onclick="player.videoSaturation(1)">恢复饱和度(仅flashplayer)</button>
			<button type="button" onclick="player.videoHue(-90)">调整色相(仅flashplayer)</button>
			<button type="button" onclick="player.videoHue(0)">恢复色相(仅flashplayer)</button>
		</p>
		<p>
			<input type="text" class="videourl" style="width: 500px;" placeholder="视频地址" value="http://www.flashls.org/playlists/test_001/stream_1000k_48k_640x360.m3u8">

			<button type="button" onclick="newVideo()">播放</button>
		</p>
		<p>
			<input type="text" class="videourl2" style="width: 500px;" placeholder="视频地址" value="/xhr/Public/hadoop02a_实施Hadoop集群.mp4">

			<button type="button" onclick="newVideo2()">播放</button>

		</p>
		<p class="metadata"></p>
		<p>单独监听功能：</p>
		<p class="handler">
			<span class="duration"></span><br />
			<span class="playstate">播放状态：</span><br />
			<span class="seekstate">跳转状态:无</span><br />
			<span class="bufferstate">缓冲:100</span><br />
			<span class="volumechangestate">当前音量：0.8</span><br />
			<span class="fullstate">是否全屏：否</span><br />
			<span class="controlBar">控制栏：显示</span><br />
			<span class="endedstate">还未结束</span><br />
			<span class="currenttimestate">当前播放时间（秒）：0</span><br />
			<span class="frontad">前置广告状态：</span><br />
			<span class="mouse">鼠标位置</span><br />
			<span class="definitionChange">切换清晰度：</span><br />
			<span class="clickEvent">点击监听：</span><br />
			<span class="screenshot">监听截图功能</span>

		</p>
	</body>

</html>