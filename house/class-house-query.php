<?php
	/*
	 * 选房系统数据查询类
	
	*英文为对应字段名称
	*约定全为小写，单词只见用间隔符
	------------------------------------------------
	|项目名称(project_name): Text
	|房产类型(project_type): Selection
	|	1. Apartment 
	|	2. House
	|	3. Townhouse
	|	4. Land
	|	5. House and Land
	|门牌号（house_number）: Text
	|楼层 (house_level) : Num
	|总层高 (building_levels) : Num
	|已出售 (sold): true or false
	|卧室（bedroom）：Num
	|洗浴间(bath): Num
	|车位(car_park): Num
	|内部面积(int_m2): Num
	|外部面积(ext_m2): Num
	|============================================总面积(total_m2): 内部面积+外部面积    /可以在php系统实现，不用数据库/	
	|价格(price): Num 	
	|=============================================平均价格(Price per sqt): 价格除以内部面积   /不用储存在数据库，可以用php计算/
	|卧室是否有窗户(bedroom_windows): True or False
	|朝向(towards): 
	|
	|	1. 东(east)
	|	2. 西(west)
	|	3. 南(north)
	|	4. 北(south)
  |
  |有轨电车(tram): Num
  |火车(train): Num
  |公交车(bus): Num
  |五公里内学校(school_5km): Num
  |五公里内医院(hospital_5km): Num
  |五公里内商场(shopping_5km): Num
  |健身房(gym): True or False
  |游泳池(swimming_pool): True or False
  |层高(height)：Num 非空
  |书房(study_room)：Num
  |储藏室(storage_room): Num
  |花园(garden): True or False
  |户型图(floor_plan): IMAGE
  |描述(description) text
  ------------------------------------------------------

function get_url() {
	$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
	$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
	$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
	return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
} */
define( 'DIEONDBERROR', true );


class WP_house{
	/*每页展示的数目*/
	public $houses_per_page = 10;
	
	/*当前页面*/
	private $current_page = 1;
	
	/*户型表名*/
	private $house_table_name;
	
	/*楼盘表名*/
	private $house_project_table;
	
	function __construct(){
		/*初始化分页*/
		global $wpdb;
		$this->house_table_name = $wpdb->prefix.'house';
		$this->house_project_table = $wpdb->prefix.'house_project';
		if(isset($_GET['current_page'])){
			$this->current_page = $_GET['current_page'];
		}
	}
	
	function get_current_page(){
		return $this->current_page;
	}
	
	/*获取最大页数*/
	function get_house_pages(){
		global $wpdb;
		$per_page = $this->houses_per_page;
		$all_item = $wpdb->get_var("SELECT count(*) FROM ".$this->house_table_name);
		$page = floor($all_item/$per_page) + 1;
		return $page;
	}
	function get_project_pages(){
		global $wpdb;
		$per_page = $this->houses_per_page;
		$all_item = $wpdb->get_var("SELECT count(*) FROM ".$this->house_project_table);
		$page = floor($all_item/$per_page) + 1;
		return $page;
	}
	
	/*----------------------
		生成查询条件，将数组转化为查询条件
	-----------------------*/
	private function parse_where($args){
		if(!empty($args))
			$args = array_filter($args);//过滤空数组
		if(!empty($args)){
		foreach($args as $key=>$value){
			/*大于或者小于条件*/
			if(strpos($value,'-')){
				$value_arr = explode('-',$value);//分割字符串。21-30分割为array('21','30'),用来处理两者之间的数值条件
				//最大最小设定,两个分别为max和min在前段处理，直接为空值
				if($value_arr[0]=='min'&&$value_arr[1]!='max'){
					$where .= $key."<='".$value_arr[1]."' AND ";
				}else if($value_arr[1]=='max'&&$value_arr[0]!='min'){
					$where .= $key.">='".$value_arr[0]."' AND ";
				}else{
				$where .= $key.">='".$value_arr[0]."' AND ".$key."<='".$value_arr[1]."' AND ";
				}
			}else{
				$where.= $key. "='".$value."' AND ";
			}
		}
		$where = rtrim($where,'AND ');
		return $where;
		}else{
			return false;
		}
	}
	
	
	function get_house_project($order = 'DESC'){
		/*获取楼盘信息*/
		global $wpdb;
		$house_project=array();
		$count = $wpdb->get_var("SELECT count(*) FROM ".$this->house_project_table);
		for($offset = 0;$offset<$count ; $offset++ ){
			$house_project[]= $wpdb->get_row("SELECT * FROM ".$this->house_project_table." ORDER BY ID $order",ARRAY_A,$offset);
		}
		return $house_project;
	}
	
	
	
	function get_house_project_by($args=null){
		global $wpdb;
		//初始化查询条件
		$old_args = array(
			'query'=>array(),
			'per_page'=>10,
			'order'=>'DESC',
			'orderby'=>'ID',
			'single'=>false
		);
		if($args!=null){
      $args = array_merge($old_args,$args);//sql数据查询
      $args = array_filter($args);//过滤空数组
   		$this->houses_per_page = $args['per_page'];
      if($this->parse_where($args['query'])){
        $where = 'WHERE '.$this->parse_where($args['query']).' ORDER BY '.$args['orderby']. ' ' .$args['order'];
      }else{
        $where = '';
      }
    }
		$offset = 0;
		/*初始化查询条件*/
		$wpdb->show_errors();
		$count = $wpdb->get_var("SELECT count(*) FROM ".$this->house_project_table." $where");
		if($count > $this->houses_per_page){
			$count =$this->houses_per_page;//当获取到的数量比设定的分页数量要大，则设置显示数量为分页数量
		}
		$count = $count * $this->current_page;
		/*初始偏移量*/
		if($args['single']==true){
			$house[] = $wpdb->get_row("SELECT * FROM ".$this->house_project_table." $where ",ARRAY_A);
		}else{
			$offset = ($this->current_page - 1)*$this->houses_per_page;
			for($offset ; $offset < $count; $offset++){
				$house[] = $wpdb->get_row("SELECT * FROM ".$this->house_project_table." $where ",ARRAY_A,$offset);
			}
		}
		$house['pages'] = $count;
		return $house;
		//return $where;		
	}

	
	
	function insert_house_project($args){
		/*
		 *插入楼盘信息
		 -----------------
		 $args = array(
			'project_name'=>'string',
			'project_type'=>'string',
			'project_logo'=>'string',
			'project_link'=>'string',
			'occupancy_month'=>'string',
			'occupancy_year'=>'string',
			'building_levels'=>'int',
			'tram'=>'int',
			'train'=>'int',
			'bus'=>'int',
			'school_5km'=>'int',
			'hospital_5km'=>'int',
			'shopping_5km'=>'int',
			'gym'=>'yes no',
			'swimming_pool'=>'string',
			'height'=>'int',
			'price_list'=>'string',
			'contact'=>'string',
			'search_place'=>'string',
			'description'=>'string',
			'latlng'=>'string',
		 )
		 -----------------
		*/
		global $wpdb;
		$wpdb->show_errors();
		if(!$wpdb->get_var("SELECT ID FROM ".$this->house_project_table." WHERE project_name='$args[project_name]'")){
			if($wpdb->insert(
				$this->house_project_table,
				$args,
				array('%s','%s','%s','%s','%s','%s','%d','%d','%d','%d','%d','%d','%d','%s','%s','%d','%s','%s','%s','%s','%s','%s')
			))
		 return true;
		}
	}
	function update_house_project($args,$id){
	/*更新楼盘信息，根据id*/
		global $wpdb; 
		$wpdb->show_errors();
		if($wpdb->update(
			$this->house_project_table,
			$args,
			array('ID'=>$id),
			array('%s','%s','%s','%s','%s','%s','%d','%d','%d','%d','%d','%d','%d','%s','%s','%d','%s','%s','%s','%s','%s','%s'),
			array('%d')
		))
		 return true;
	}
	function delete_house_project($args){
		/*根据项目名称删除楼盘信息*/
		global $wpdb;
		$wpdb->show_errors();
		if($wpdb->query("DELETE FROM ".$this->house_project_table." WHERE project_name='$args'"))
			return true;
	}
	
	/*
	 *增加户型信息
	 $args = array(
		'project_name'=>'string',
		'house_number'=>'string',
		'house_level'=>'int',
		'sold'=> 'string',
		'bedroom'=> 'int',
		'bath'=> 'int',
		'car_park'=> 'int',
		'int_m2' =>'string',
		'ext_m2'=> 'string',
		'price'=>'int',
		'bedroom_windows'=>'string',
		'towards'=>'string',
		'study_room'=>'int',
		'storage_room'=>'int',
		'garden'=>'string',
		'floor_plan'=>'string',
		'description'=>'string',	
	 );
	 插入成功返回真值。失败不返回值
	 */
	function insert_house($args){
		global $wpdb; 
		/*插入房屋数据*/
		$wpdb->show_errors();
		if($wpdb->insert(
			$this->house_table_name,
			$args,
			array('%s','%s','%d','%s','%d','%d','%d','%s','%s','%d','%s','%s','%d','%d','%s','%s','%s')
		))
			return true;
	}
	
	/*删除户型信息*/
	
	function delete_house($id){
		global $wpdb;
		$wpdb->show_errors();
		if($wpdb->query("DELETE FROM ".$this->house_table_name." WHERE ID=$id"))
			return true;
	}
	
	/*更新户型信息*/
	
	function update_house($args,$id){
		global $wpdb; 
		$wpdb->show_errors();
		if($wpdb->update(
			$this->house_table_name,
			$args,
			array('ID'=>$id),
			array('%s','%s','%d','%s','%d','%d','%d','%s','%s','%d','%s','%s','%d','%d','%s','%s','%s'),
			array('%d')
		))
		 return true;
		
	}
	
	/*
	 *获取房屋，通过数量限制
	 *返回一个数组
	 *
	 */
	function get_all_houses($per_page,$order='DESC'){
		global $wpdb;
		$offset = 0;
		$this->houses_per_page = $per_page ;
		$wpdb->show_errors();
		$count = $wpdb->get_var("SELECT count(*) FROM ".$this->house_table_name);//获取查询的总数量
		if($count > $this->houses_per_page){
			$count =$this->houses_per_page;//当获取到的数量比设定的分页数量要大，则设置显示数量为分页数量
		}
		$count = $count * $this->current_page;
		/*初始偏移量*/
		$offset = ($this->current_page - 1)*$this->houses_per_page;//
		//echo $this->current_page;
		//echo $offset;
		//echo $count;
		for($offset ; $offset < $count ; $offset++){
			$house[] = $wpdb->get_row("SELECT * FROM ".$this->house_table_name." ORDER BY ID $order",ARRAY_A,$offset);
		}
		return $house;
	}
	/*
	 *根据条件获取房屋类型
	 *get_house_by($args)
	 *$query为一个数组，包含查询的所有值.
	 参数实例
	 $args = array(
		'project_name''name',
		'project_type'=>'type',
	 )
	 找出符合project_name=name,并且project_type=type的房子
	 返回一个二维数组
	 第一个是数字索引数组，相应的则是字段与值的关联数组
	*/
	
	function get_houses_by($args){
		global $wpdb;
		$old_args = array(
			'query'=>array('bedroom'=>'1'),
			'per_page'=>'10',
			'order'=>'DESC',
			'orderby'=>'ID'
		);
		$args = array_merge($old_args,$args);
		$offset = 0;
		$this->houses_per_page = $args['per_page'] ;
		$args = array_filter($args);//过滤空数组
		/*初始化查询条件*/
		$where = $this->parse_where($args['query']);
		$wpdb->show_errors();
		$oldcount = $count = $wpdb->get_var("SELECT count(*) FROM ".$this->house_table_name." WHERE $where");
		if($count > $this->houses_per_page){
			$count =$this->houses_per_page;//当获取到的数量比设定的分页数量要大，则设置显示数量为分页数量
		}
		$count = $count * $this->current_page;
		/*初始偏移量*/
		$offset = ($this->current_page - 1)*$this->houses_per_page;
		for($offset ; $offset < $count; $offset++){
			$house[] = $wpdb->get_row("SELECT * FROM ".$this->house_table_name." WHERE $where ORDER BY $args[orderby] $args[order]",ARRAY_A,$offset);
		}
		$house['pages'] = ceil($oldcount/$args['per_page']);
		return $house;
		//return $where;
	}


}

//echo '<pre>';
//$wp_house = new WP_house();

/*DEBUG TEST
	 $args = array(
		'project_name'=>'name',
		'project_type'=>'type',
		'house_number'=>'322123',
		'house_level'=>'3',
		'building_levels'=>'1',
		'sold'=>'true',
		'bedroom'=>'1',
		'bath'=>'2',
		'car_park'=>'3',
		'int_m2'=>'50',
		'ext_m2'=>'10',
		'price'=>'100000',
		'bedroom_windows'=>'true',
		'towards'=>'west',
		'tram'=>'2',
		'train'=>'1',
		'bus'=>'10',
		'school_5km'=>'2',
		'hospital_5km'=>'1',
		'shopping_5km'=>'10',
		'gym'=>'2',
		'swimming_pool'=>'true',
		'height'=>'123',
		'study_room'=>'2',
		'storage_room'=>'2',
		'garden'=>'true',
		'floor_plan'=>'http://www.domain.com/img.jpg'
	 );
$wp_house->insert_house($args);

$wp_house = new WP_house();
	 $args = array(
		'project_name'=>'new name',
		'project_type'=>'type',
		'house_number'=>'322123',
		'house_level'=>'3',
		'building_levels'=>'1',
		'sold'=>'true',
		'bedroom'=>'1',
		'bath'=>'2',
		'car_park'=>'3',
		'int_m2'=>'50',
		'ext_m2'=>'10',
		'price'=>'100000',
		'bedroom_windows'=>'true',
		'towards'=>'west',
		'tram'=>'2',
		'train'=>'1',
		'bus'=>'10',
		'school_5km'=>'2',
		'hospital_5km'=>'1',
		'shopping_5km'=>'10',
		'gym'=>'2',
		'swimming_pool'=>'true',
		'height'=>'123',
		'study_room'=>'2',
		'storage_room'=>'2',
		'garden'=>'true',
		'floor_plan'=>'http://www.domain.com/img.jpg'
	 );
$wp_house->update_house($args,1);
*/
//WP_house::delete_house(1);
//print_r(WP_house::get_house(2));
/*测试查询结果*/
//$wp_house->houses_per_page=1;
//print_r($wp_house->get_all_houses(3));
/*print_r(
	$wp_house->get_houses_by(
		array('price'=>'22-30'))
	);
echo '</pre>';*/
?>