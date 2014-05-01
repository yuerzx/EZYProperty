<?php
/**
 * Template Name: Wechat Member Page
 * Created by PhpStorm.
 * User: yuerzx
 * Date: 11/04/14
 * Time: 7:21 PM
 */

?>

<?php get_header();?>

<!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
<div class="content">

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
        <a class="tab-item active" href="#">
            <span class="icon icon-home"></span>
            <span class="tab-label">Home</span>
        </a>
        <a class="tab-item" href="#">
            <span class="icon icon-person"></span>
            <span class="tab-label">Sales</span>
        </a>
        <a class="tab-item" href="#">
            <span class="icon icon-star-filled"></span>
            <span class="tab-label">热门房产</span>
        </a>
        <a class="tab-item" href="#">
            <span class="icon icon-search"></span>
            <span class="tab-label">Search</span>
        </a>
        <a class="tab-item" href="#">
            <span class="icon icon-gear"></span>
            <span class="tab-label">Settings</span>
        </a>
    </nav>
</footer>
</html>