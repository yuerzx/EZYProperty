<?php
	global $admin_data;
	echo $admin_data['tt_map_category'];
	if(in_category($admin_data['tt_map_category'])){
		include(TEMPLATEPATH.'/single_map.php');
	}else{
		include(TEMPLATEPATH.'/single_normal.php');
	}
?>