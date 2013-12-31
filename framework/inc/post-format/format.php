<?php 
if ( has_post_thumbnail() ) {?>
<div class="post-type-wrapper">
	<?php the_post_thumbnail('full'); ?>
</div>
<?php }
?>