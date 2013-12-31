<?php

/* ------------------------------------------------------------------------ */
/* Define Sidebars */
/* ------------------------------------------------------------------------ */

if (function_exists('register_sidebar')) {
	
	/* ------------------------------------------------------------------------ */
	/* Sidebar Widgets
	/* ------------------------------------------------------------------------ */
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id'   => 'main-sidebar',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="line"><span>',
		'after_title'   => '</span></h5><span class="liner"></span>'
	));
	
	register_sidebar(array(
		'name' => 'Footer Sidebar 1',
		'id'   => 'footer-sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="line"><span>',
		'after_title'   => '</span></h5><span class="liner"></span>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 2',
		'id'   => 'footer-sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="line"><span>',
		'after_title'   => '</span></h5><span class="liner"></span>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 3',
		'id'   => 'footer-sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="line"><span>',
		'after_title'   => '</span></h5><span class="liner"></span>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 4',
		'id'   => 'footer-sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="line"><span>',
		'after_title'   => '</span></h5><span class="liner"></span>'
	));
	
	
}
    
?>