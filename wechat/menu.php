<?php
//creat to build up the base menus for wechat account
include "wechat.class.php";
$options = array(
		'token'=>'yuerzx', //填写你设定的key
		'appid'=>'wxb5f3236813dba18d', //填写高级调用功能的app id
 		'appsecret'=>'6a87d1b4eb1ba3d26010d4f457544560' //填写高级调用功能的密钥
	);
$weObj = new Wechat($options);
//$weObj->valid();
$newmenu =  array(
		"button"=>
			array(
				array('name'=>'中介系统', 
					'sub_button'=> array(
						array('type' =>'click', 'name'=>'公司简介','key'=>'Company_intro'),
						array('type' =>'click', 'name'=>'公司新闻', 'key'=>'Company_news'),
						array('type' =>'click', 'name'=>'操作指令', 'key'=>'Guide'),
						)),
				
				array('name'=>'购置房产', 
					'sub_button'=> array(
						array('type' =>'click', 'name'=>'五月特惠房源', 'key'=>'Special_property'),
						array('type' =>'click', 'name'=>'公寓项目','key'=>'Buy_apartment'),
						array('type' =>'click', 'name'=>'独立别墅', 'key'=>'Buy_house'),
						array('type' =>'click', 'name'=>'联排别墅', 'key'=>'Buy_townhouse'),

						)),
				array('name'=>'购房工具',
					'sub_button'=> array(
						array('type' =>'view',  'name'=>'贷款计算器',     'url'=>'http://'),
                        array('type' =>'click', 'name'=>'当日贷款利率',   'key'=>'Day_rate'),
                        array('type' =>'view',  'name'=>'购房流程',      'url'=>'http://'),
                        array('type' =>'view',  'name'=>'联系团队',      'url'=>'http://'),
						 ))
		));
$result = $weObj->createMenu($newmenu);
var_dump($result);
