<?php
/**
 * Listing page for property
 * Created by PhpStorm.
 * User: xiao
 * Date: 12/05/2014
 * Time: 10:37 PM
 */
get_header();

?>
<script type='text/javascript' src="http://maifang-com-au.qiniudn.com/web_site_js_ratchet.min.js"></script>
<div class="content">
<div class="slider" id="mySlider">
    <div class="slide-group">
<?php
$the_query = new WP_Query("cat='apartment'&posts_per_page=3");
while($the_query->have_posts()) : $the_query->the_post();
?>

    <div class="slide">
        <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'large');?>
        <img src="<?=$large_image_url[0];?>">
    <span class="slide-text">
        <span class="icon icon-left-nav"></span>
        Slide me
    </span>
    </div>




    <?php endwhile;wp_reset_postdata();?></div>
</div></div>

