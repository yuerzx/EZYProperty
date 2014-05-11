<?php
include "wechat.class.php";
$options = array(
		'token'=>'yuerzx', //填写你设定的key
		'appid'=>'wxb5f3236813dba18d', //填写高级调用功能的app id
 		'appsecret'=>'6a87d1b4eb1ba3d26010d4f457544560' //填写高级调用功能的密钥
	);
$weObj = new Wechat($options);
//$weObj->valid();
$type = $weObj->getRev()->getRevType();
$events = $weObj->getRev()->getRevEvent(); //接收事件推送
if($type == Wechat::MSGTYPE_TEXT) $words = $weObj->getRev()->getRevContent();
include 'wechat_greetings.php';
switch($type) {
	case Wechat::MSGTYPE_TEXT:
			switch ($words) {
				case '1':
					$weObj->text("最新楼盘即将推出，敬请期待")->reply();
					break;
				case '2':
					$weObj->text("买卖房屋，就去澳法")->reply();
					break;
				case '5':
					$weObj->news($Company_team)->reply();
					break;
				case '优惠':
					$weObj->text("恭喜你获得超级彩蛋！！！ 您中了别墅一套600平米！！")->reply();
					break;
				case '制作':
					$news_info = array(
					"0"=>array(
	 				'Title'=>'Han Sun',
					'Description'=>'系统制作，Han Sun. Hansun@1230.me',
					'PicUrl'=>'http://maifang-com-au.qiniudn.com/logo-230px.png',
	 				'Url'=>''
					) );
					$weObj->news($news_info)->reply();										
				default:
					$weObj->text("对不起，相应的指令无法识别，请输入【5】联系我们的团队予以解决，谢谢")->reply();
					break;
			}


			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
			if($events['event']=='subscribe') $weObj->text("您好，欢迎关注澳发地产集团，在这里你可以找到最详细的资讯！请回复相应的数字获得相应的服务，感谢您的关注	\n【1】最新楼盘	\n【2】房屋买卖	\n【3】房屋出租	\n【4】意见反馈	\n【5】联系团队")->reply();
			if($events['event']=='CLICK'):
			switch ($events['key']) {
					case 'Company_intro':
						$weObj->news($Company_intro)->reply();
						break;
					case 'Company_news':
						$weObj->news($Company_news)->reply();
						break;
					case 'Buy_property': //购买房源
						$weObj->news($Buy_property)->reply();
						break;				
					default:
						$weObj->text("正在建设中，即将竣工，谢谢。稍后访问，必有惊喜。现开通功能：【购置房产】，【联系团队】板块。")->reply();
						break;
				}	

			endif;
			exit;
			break;
	case Wechat::MSGTYPE_IMAGE:
			break;
	default:
			$weObj->text("help info")->reply();
}