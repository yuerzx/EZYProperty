<?php
	/*
	 *选房系统mysql数据库创建
楼盘信息
  项目名称（文本）
  项目类型（下拉）
  入住时间（下拉）
  总层高（下拉）
  有轨电车（下拉）
  火车（下拉）
  公交车（下拉）
  五公里学校（下拉）
  五公里医院（下拉）
  五公里商场 （下拉）
  健身房（下拉）
  游泳池（下拉）
  层高（下拉）
  描述（下拉）
  户型图链接 project_link varchar
  项目logo project_logo varchar
   
户型信息
  项目名称（下拉）
	门牌号（文本）
	楼层（下拉）
	已售出（下拉）
	卧室（下拉）
	洗浴间（下拉）
	车位（下拉）
	内部面积（文本）
	外部面积（文本）
	价格（文本）
  卧室是否有窗户（下拉）
  朝向（下拉）
  书房（下拉）
  储藏室（下拉）
  花园（下拉）
  户型图（上传）
  描述（文本）
	项目名称(Project Name): Text
	房产类型(Type): Selection
		1. Apartment 
		2. House
		3. Townhouse
		4. Land
		5. House and Land
		
	门牌号（No.）: Text
	
	楼层 (Level) : Num
	总层高 (Building Levels) : Num
	已出售 (Sold): True or False
	卧室（Bed）：Num
	洗浴间(Bath): Num
	车位(Car Park): Num
	内部面积(Int. M2): Num
	外部面积(Ext. M2): Num
	---------------------------总面积(Total M2): 内部面积+外部面积    /可以在php系统实现，不用数据库/
	
	价格(Price): Num 
	
	---------------------平均价格(Price per sqt): 价格除以内部面积   /不用储存在数据库，可以用php计算/
	
	卧室是否有窗户(Bed Room Windows): True or False
	
	朝向(Towards): 非空
	
		1. 东(East)
		2. 西(West)
		3. 南(North)
		4. 北(South)
  
  有轨电车(Tram): Num
  
  火车(Train): Num
  
  公交车(Bus): Num
  
  五公里内学校(5km school): Num
  
  五公里内医院(5km hospital): Num
  
  五公里内商场(5km shopping): Num
  
  健身房(GYM): True or False
  
  游泳池(SwimmingPool): True or False
  
  层高(height)：Num 非空
  
  书房(Study Room)：Num
  
  储藏室(Storage Room): Num
  
  花园(Garden): True or False
  
  户型图(Floor Plan): IMAGE
feature 特色图像
  
	*/
	define( 'DIEONDBERROR', true );
	function creat_house_sql(){
		global $wpdb;
		$house_table_name = $wpdb->prefix.'house';
		/*创建房产数据表*/
		if($wpdb->get_var("SHOW TABLES LIKE '".$house_table_name."'")!=$house_table_name){
			$sql = "
				CREATE TABLE $house_table_name(
					ID int(10) NOT NULL AUTO_INCREMENT,
					project_name varchar(255) NOT NULL,
					house_number varchar(255),
					house_level tinyint(3),
					sold varchar(255),
					bedroom tinyint(3),
					bath tinyint(3),
					car_park int(10),
					int_m2 varchar(255),
					ext_m2 varchar(255),
					price int(10),
					bedroom_windows enum('yes','no') NOT NULL DEFAULT 'yes',
					towards enum('东','西','南','北') NOT NULL DEFAULT '东',
					study_room tinyint(3),
					storage_room tinyint(3),
					garden enum('yes','no') NOT NULL DEFAULT 'yes',
					floor_plan varchar(255),
					description text,
					PRIMARY KEY(ID)
				)ENGINE=MyISAM DEFAULT CHARSET=UTF8;
			";
			$wpdb->show_errors();
			$wpdb->query($sql);
		}
		/*创建楼盘数据表*/
		$type_table_name = $wpdb->prefix.'house_project';
		if($wpdb->get_var("SHOW TABLES LIKE '".$type_table_name."'")!=$type_table_name){
			$sql = "
				CREATE TABLE $type_table_name(
					ID int NOT NULL AUTO_INCREMENT,
					project_name varchar(255) NOT NULL,
					project_type varchar(255) NOT NULL,
					project_logo varchar(255),
					project_link varchar(255),
					occupancy_month varchar(255),
					occupancy_year varchar(255),
					building_levels tinyint(3),
					tram int(10),
					train int(10),
					bus int(10),
					school_5km int(10),
					hospital_5km int(10),
					shopping_5km int(10),
					gym enum('yes','no') NOT NULL DEFAULT 'yes',
					swimming_pool enum('yes','no') NOT NULL DEFAULT 'yes',
					height tinyint(3),
					feature varchar(255),
					price_list varchar(255),
					contact varchar(255),
					search_place varchar(255),
					description text,
					latlng varchar(255),
					PRIMARY KEY(ID)
				)ENGINE=MyISAM DEFAULT CHARSET=UTF8;
			";
			$wpdb->show_errors();
			$wpdb->query($sql);
		}
	}
add_action('after_setup_theme','creat_house_sql');
?>