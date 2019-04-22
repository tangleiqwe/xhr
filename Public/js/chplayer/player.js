function play() {
	player.playOrPause();
}
function loadedHandler(){
	//播放器加载成功，可以注册监听
	player.addListener('error', errorHandler); //监听视频加载出错
	player.addListener('timeupdate', timeUpdateHandler); //监听播放时间
	player.addListener('play', playHandler); //监听视频加载出错
}
function errorHandler(){
	alert('加载失败了');
}

var elementLogin = null; //是否存在提示层
var loginShow = false;

function timeUpdateHandler() {
	console.log(buy_flag);
	//console.log('当前播放时间（秒）：' + player.time);
	if(player.time >= 30 && !buy_flag) { //如果播放时间大于30，则又没有购买过，则停止播放
		player.pause();
		if(!loginShow && !elementLogin) {
			showlable();
		}
	}
}
function playHandler() { //监听播放状态
	if(loginShow) {
		player.pause();
	}
}
function fullHandler(b) { //监听全屏切换
	if(loginShow && elementLogin) {
		player.deleteElement(elementLogin);
		elementLogin = null;
		window.setTimeout('showLogin()', 200);
	}
}
function showlable() { //显示需要购买继续观看
	loginShow = true;
	var attribute = {
		list: [//list=定义元素列表
			{
				type: 'text',//说明是文本
				text: '30秒试看结束，请购买vip观看！',//文本内容
				fontColor: '#FFFFFF',//文本颜色
				fontSize: 14,//文本字体大小，单位：px
				fontFamily: '"Microsoft YaHei", YaHei, "微软雅黑", SimHei,"\5FAE\8F6F\96C5\9ED1", "黑体",Arial',//文本字体
				lineHeight:30,//文字行距
				alpha: 1,//文本透明度(0-1)
				paddingLeft:15,//文本内左边距离
				paddingRight:15,//文本内右边距离
				paddingTop:5,//文本内上边的距离
				paddingBottom:5,//文本内下边的距离
				marginLeft:10,//文本离左边的距离
				marginRight:0,//文本离右边的距离
				marginTop:10,//文本离上边的距离
				marginBottom:0,//文本离下边的距离
				backgroundColor:'#000000',//文本的背景颜色
				backAlpha:0.5,//文本的背景透明度(0-1)
				backRadius:30//文本的背景圆角弧度
			}
		],
		x:10,//元件x轴坐标，注意，如果定义了position就没有必要定义x,y的值了，x,y支持数字和百分比，使用百分比时请使用单引号，比如'50%'
		y: 10,//元件y轴坐标
		alpha:1,//元件的透明度
		backAlpha:0.5,//元件的背景透明度(0-1)
		backRadius:60//元件的背景圆角弧度
	}
	elementLogin=player.addElement(attribute);//elementLogin是返回元件本身，可以用于其它用户，比如缓动
}