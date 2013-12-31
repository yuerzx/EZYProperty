<div class="search2">
    <form action="<?php echo home_url(); ?>/" method="get">
        <input type="text" value="<?php _e('Search', 'framework');?>..." onblur="if(this.value=='') this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue) this.value='';" class="ft" name="s"/>
        <input type="submit" value="" class="fs">
    </form>
</div>