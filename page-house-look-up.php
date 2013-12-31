<?php
	
	/*
	Template Name:Ajax 搜索页面
	*/


get_header(); 
error_reporting(E_ALL ^ E_NOTICE);
// Open the DB connection and select the DB - creates the function getCreativePagerLyte()
include_once('table_display/database.php');



// Gets the data
$id=isset($_POST['id']) ? $_POST['id'] : '';
$search=isset($_POST['search']) ? $_POST['search'] : '';
$multiple_search=isset($_POST['multiple_search']) ? $_POST['multiple_search'] : array();
$items_per_page=isset($_POST['items_per_page']) ? $_POST['items_per_page'] : '';
$sort=isset($_POST['sort']) ? $_POST['sort'] : '';
$page=isset($_POST['page']) ? $_POST['page'] : 1;
$total_items=(isset($_POST['total_items']) and $_POST['total_items']>=0) ? $_POST['total_items'] : '';
$extra_cols=isset($_POST['extra_cols']) ? $_POST['extra_cols'] : array();

// Uses the creativeTable to build the table
include_once('table_display/creativeTable.php');

$ct=new CreativeTable();

// Data Gathering
$params['sql_query']                = "SELECT project_name, house_number, bedroom, bath, int_m2, id FROM wp_house";
$params['search']                   = $search;
$params['multiple_search']          = $multiple_search;
$params['items_per_page']           = $items_per_page;
$params['sort']                   	  = $sort;
$params['page']                     = $page;
$params['total_items']              = $total_items;
$params['display_cols']             = 'ttttttt';   // Not showing the 2º column (ID), but you can still get its the value using #COL2#

// Layout Configurations
$params['header']                   = '&#39033;&#30446;&#21517;&#31216;,&#25151;&#21495;,&#21351;&#23460;,&#28020;&#23460;, &#20869;&#37096;&#38754;&#31215;,&#35814;&#32454;&#20449;&#24687;'; // If you need to use the comma use &#44; instead of ,
$params['width']                    = '90,70,,70,,100';



// ***********************************************************************************
// UNCOMMENT TO TEST THE DIFFERENTS OPTIONS AND SEE THE RESULTS AND TEST SOME YOURSELF

//$params['search_init']            = true;             // the search box will appear and it will search in all 4 fields (id, rating, title, votes)
//$params['search_init']            = false;            // the search box wont appear
//$params['search_init']            = 'ttttttf';           // only search the 3rd field (title) because the string 'fftf' is composed (False, False, True, False)

$params['search_type']              = 'like';           // this is the default option, searches words that looks like the keyword
//$params['search_type']           = '=';              // searches words that are equal to the keyword
//$params['search_type']           = 'beginning_like'; // searches words that the beginning looks like the keyword
//$params['search_type']           = 'end_like';       // searches words that the end looks like the keyword

//$params['search_html']            = '<span id="#ID#_search_value">Search...</span><a id="#ID#_advanced_search" href="javascript: ctShowAdvancedSearch(\'#ID#\');" title="Advanced Search"><img src="images/advanced_search.png" /></a><div id="#ID#_loader"></div>';  // this is the default option, so if you like the way it is you dont need to add this line of code
$params['search_html']              = '<a href="javascript: ctShowAdvancedSearch(\'#ID#\');" style="margin-left: 10px; color: #555555; text-decoration: none;">Show Advanced Search</a>';   // you can insert any html to configure the search input

//$params['multiple_search_init']   = true;             // will show the advanced search for all 4 fields (id, rating, title, votes) from the start
//$params['multiple_search_init']   = false;            // wont show the advanced search
$params['multiple_search_init']      = 'tttttf hide';           // will show the advanced search for all 4 fields (id, rating, title, votes) but in the beginning they are hidden, you may use a javascript function to show them
//$params['multiple_search_init']   = 'fftf';           // only show the advanced search for the 3rd filed (title) because the string 'fftf' is composed (False, False, True, False)
//$params['multiple_search_init']   = 'fftf hide';      // only show the advanced search for the 3rd filed (title) because the string 'fftf' is composed (False, False, True, False) but in the beginning they are hidden, you may use a javascript function to show them

$params['multiple_search_type']     = 'like';           // this is the default option, searches words that's looks like the keyword
//$params['multiple_search_type']   = '=';              // searches words that are equal to the keyword
//$params['multiple_search_type']   = 'beginning_like'; // searches words that the beginning looks like the keyword
//$params['multiple_search_type']   = 'end_like';       // searches words that the end looks like the keyword

// ***********************************************************************************

$ct->table($params);
$ct->pager = getCreativePagerLite('ct',$page,$ct->total_items,$ct->items_per_page);


if($ct->total_items>0){
    foreach($ct->data as $key => $value){
        $ct->data[$key][5]='<a href="http://www.maifang.com.au/house-search-result/?id='.$ct->data[$key][5].'" target="_blank">'.'&#28857;&#20987;&#26597;&#30475;&#35814;&#24773;'.'</a>';
        //$ct->data[$key][2]='<a href="something.php?id=#COL1#">'.$ct->data[$key][2].'</a>'; //you may use also the tags #COL1#, #COL2#, ...
    }
}


// If its an ajax call
if( (isset($_POST['ajax_option'])) && $_POST['ajax_option']!=''){
    echo json_encode($ct->display($_POST['ajax_option'],true));
    exit;
}else{
    $out=$ct->display();
}

?>
<!--<script>
jQuery(document).ready(function($) {
    //find all form with class jqtransform and apply the plugin
    $("form.jqtransform").jqTransform();
});
</script>-->

<script type="text/javascript" src="<?php bloginfo('template_url');?>/table_display/js/creative_table_ajax-1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/table_display/js/jquery-1.4.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/table_display/css/creative.css">


  <div class="container">
		<?php if($admin_data['breadcrumbs'] == true){ ?>
      <div class="breadcrumbs column">
        <?php mypassion_breadcrumbs(); ?>
      </div>
		<?php }?>

                 
<div id="container">


    <h2>房屋搜索</h2>

    <?php echo $out;?>

</div>

		<!-- /Main Content -->
	
	</div>
 
</section>
<!-- / Content -->
<?php get_footer(); ?>