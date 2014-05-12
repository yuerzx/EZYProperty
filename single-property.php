<?php
/**
 * Template Name: Property Display Page
 * Created by PhpStorm.
 * User: yuerzx
 * Date: 11/04/14
 * Time: 7:21 PM
 */

?>

<?php get_header();?>

<!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
<div class="content">
    <div class="red_line">
        <img src="<?php echo get_template_directory_uri().'/framework/img/logo.png'; ?>" class="logo" style="margin: 0px 10px 5px 10px ; ">
    </div>

    <div style="padding-bottom: 10px;">
        <center><img src="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );echo $url; ?>"></center>
    </div>

    <div id="wp_content" class="content-padded" style="margin-bottom: 53px;">
        <?php if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile; endif;?>

    </div>


</div>

</body>
<footer>
    <nav class="bar bar-tab">
        <a class="tab-item" href="http://www.maifang.com.au/projects/alphalynx/?page_id=12">
            <span class="icon icon-person"></span>
            <span class="tab-label">销售团队</span>
        </a>
        <a class="tab-item" href="#">
            <span class="icon icon-star-filled"></span>
            <span class="tab-label">热门房产</span>
        </a>
        <a class="tab-item" href="http://www.maifang.com.au/alpha/social/">
            <span class="icon icon-info"></span>
            <span class="tab-label">关注澳发</span>
        </a>
    </nav>
</footer>
</html>