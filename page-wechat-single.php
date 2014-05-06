<?php
/**
 * Template Name: Wechat Single
 * Created by PhpStorm.
 * User: yuerzx
 * Date: 11/04/14
 * Time: 7:21 PM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link href="<?php echo get_template_directory_uri().'/framework/ratchet/css/ratchet.min.css' ?>" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri().'/framework/ratchet/css/extend.css' ?>" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="<?php echo get_template_directory_uri().'/framework/ratchet/js/ratchet.js' ?>"></script>
</head>
<body>

<!-- Make sure all your bars are the first things in your <body> -->


<!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
<div class="content">
    <div class="red_line">
        <img src="<?php echo get_template_directory_uri().'/framework/img/logo.png'; ?>" class="logo" style="margin: 0px 10px 5px 10px ; ">
    </div>
    <div style="padding-bottom: 10px;">
        <center><img src="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );echo $url; ?>"></center>
    </div>
    <div class="card">
        <ul class="table-view">
            <li class="table-view-cell">

                <h2 class="pull-left">楼盘看点</h2>

            </li>
            <li class="table-view-cell">
                <a class="push-right" href="#location">
                    <strong>紧邻墨尔本大学的绝佳地理位置</strong>
                </a>
            </li>
            <li class="table-view-cell">
                <a class="push-right" href="#design">
                    <strong>户型多样，内部面积大</strong>
                </a>
            </li>
            <li class="table-view-cell">
                <a class="push-right" href="#price">
                    <strong>价格低廉，投资回报高</strong>
                </a>
            </li>
            <li class="table-view-cell">
                <a class="push-right" href="#sales">
                    <strong>联系专员，立刻订购</strong>
                </a>
            </li>
        </ul>
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