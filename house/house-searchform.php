<form class="jqtransform" method="post" action="<?php echo get_option('search_result_page'); ?>" target="_blank">
<table>
	<tr><td><label for="house_num">房间数</label></td>
		<td>
			<p class="clearfix">
				<?php for($i=1;$i<=5;$i++){?>
				<span><input type="radio" name="bedroom" value="<?php echo $i;?>" <?php if($_POST['bedroom']==$i){echo 'checked="checked"';}?>><?php echo $i;?></span>
				<?php }?>
			</p>
		</td>
	</tr>
	<tr><td><label for="price">价格</label></td>
		<td>
			<select name="price">
				<?php $temp_arr = array(''=>'任意','300-350'=>'300-350K','360-400'=>'360-400K','410-450'=>'410-450K','460-500'=>'460-500K','510-550'=>'510-550K','560-600'=>'560-600K','610-650'=>'610-650K','660-700'=>'600-700K');
					foreach($temp_arr as $temp=>$value){ 
				?>
				<option value="<?php echo $temp;?>" <?php if($_POST['price']==$temp){echo 'selected="selected"';}?>><?php echo $value;?></option>
				<?php }?>
			</select>
		</td>
	</tr>
	<tr><td><label for="towards">朝向</label></td>
		<td>
			<p>
			<select name="towards">
				<?php $temp_arr = array(''=>'任意','东'=>'东','西'=>'西','南'=>'南','北'=>'北');
					foreach($temp_arr as $temp=>$value){
				?>
				<option value="<?php echo $temp;?>" <?php if($_POST['towards']==$temp){echo 'selected="selected"';}?>><?php echo $value;?></option>
				<?php }?>
			</select>
			</p>
		</td>
	</tr>
	<tr>
		<td><label for="car_park">车位</label></td>
		<td>
			<p>
				<select name="car_park">
				<?php $temp_arr = array(''=>'任意','1'=>'1','2'=>'2','3'=>'3');
				 foreach($temp_arr as $temp=>$value){?>
				<option value="<?php echo $temp;?>" <?php if($_POST['car_park']==$temp){echo 'selected="selected"';}?>><?php echo $value;?></option>
				<?php }?>
				</select>
			</p>
		</td>
	</tr>
	<tr>
		<td><label for="bath">卫生间</label></td>
		<td>
			<select name="bath">
				<?php $temp_arr = array(''=>'任意','1'=>'1','2'=>'2','3'=>'3');
				 foreach($temp_arr as $temp=>$value){?>
				<option value="<?php echo $temp;?>" <?php if($_POST['bath']==$temp){echo 'selected="selected"';}?>><?php echo $value;?></option>
				<?php }?>
			</select>
		</td>
	</tr>
	<tr>
		<td><label for="house_level">楼层</label></td>
		<td>
			<select name="house_level">
				<option value="">任意</option>
				<?php for($i=1;$i<=30;$i++){?>
				<option value="<?php echo $i;?>" <?php if($_POST['house_level']==$i){echo 'selected="selected"';}?>><?php echo $i?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td><label for="int_m2">内部面积</label></td>
		<td>
			<select name="int_m2">
				<?php $temp_arr = array(''=>'任意','40-50'=>'40-50','51-60'=>'51-60','61-70'=>'61-70','71-80'=>'71-80');
					foreach($temp_arr as $temp=>$value){ 
				?>
				<option value="<?php echo $temp;?>" <?php if($_POST['int_m2']==$temp){echo 'selected="selected"';}?>><?php echo $value;?></option>
				<?php }?>
			</select>
			<input type="hidden" name="project_name" value="<?php echo $project_name;//短代码中设置的变量?>" />
		</td>
	</tr>
	<tr><td></td><td><input type="submit" value="提交"/></td></tr>
</table> 
</form>