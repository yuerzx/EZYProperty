<?php
## widget_tabs
add_action( 'widgets_init', 'widget_tabs_box' );
function widget_tabs_box(){
	register_widget( 'widget_tabs' );
}
class widget_tabs extends WP_Widget {
	function widget_tabs() {
		$widget_ops = array( 'description' => 'Popular, Recent, Comments'  );
		$this->WP_Widget( 'widget_tabs','MyPassion - Tabs  ', $widget_ops );
	}
	function widget( $args, $instance ) {
		?>

		<div class="sidebar">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs1"><?php _e( 'Recent' , 'framework' ) ?></a></li>
                    <li><a href="#tabs2"><?php _e( 'Popular' , 'framework' ) ?></a></li>
                    <li><a href="#tabs3"><?php _e( 'Comments' , 'framework' ) ?></a></li>
                </ul>
                <div id="tabs1">
                    <ul>
                        <?php mypassion_recent_posts()?>	
                    </ul>
                </div>
                <div id="tabs2">
                    <ul>
                        <?php mypassion_popular_posts() ?>
                    </ul>
                </div>
                <div id="tabs3">
                    <ul>
                       <?php mypassion_most_commented();?>
                    </ul>
                </div>
            </div>
        </div>
<?php
	}
}
?>
