<?php $post_property_apartment = get_post_meta(get_the_ID(),'mypassion_postapartment', true); global $admin_data; ?>
<?php if($post_property_apartment){ ?>
<div class="post-type-wrapper">
    <div class="audio">
        <h1>This is a property page. Time to have some fun.</h1>
    </div>
</div>
<?php } ?>

