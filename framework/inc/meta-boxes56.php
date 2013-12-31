<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
/* 
	---------------------- META TYPES
    checkbox_list
    checkbox
    color
    date
    datetime
    file
    hidden
    image
    password
    plupload_image
    radio
    select
    slider
    taxonomy
    text
    textarea
    thickbox_image
    time
    wysiwyg

*/
$prefix = 'mypassion_';

global $meta_boxes;

$meta_boxes = array();

global $admin_data;

/* ----------------------------------------------------- */



/* ----------------------------------------------------- */
//  Post Formats
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'postformat',
	'title' => 'Post Options',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		
		array(
			'name'		=> 'Featured Post?',
			'desc'		=> 'Appears as featured post in the category page(which is it belongs)',
			'id'		=> $prefix . 'featured_post',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'std'		=> false
		),
		array(
			'name'		=> 'Add to Main Slider on Homepage',
			'desc'		=> 'Appears in the SLIDER on HOMEPAGE.',
			'id'		=> $prefix . 'mainslider',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'std'		=> false
		),
		array(
			'name'		=> 'Appear on HOTSTUFF area',
			'desc'		=> 'Appears on HOTSTUFF area.',
			'id'		=> $prefix . 'hotstuff',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'std'		=> false
		),
		
		
		array(
			'name'		=> 'Post Format',
			'id'		=> $prefix . "postformat",
			'type'		=> 'select',
			'options'	=> array(
				'standart'	=> 'Standart',
				'apartment'	=> 'Apartment',
				'gallery'	=> 'House',
				'video'		=> 'Video',
				'audio'		=> 'Audio'
			),
			'multiple'	=> false,
			'desc'		=> 'Choose post format style. ("Standart" is default, "featured image" will use)',
			'std'		=> array( 'Standart' )
		),
		array(
			'name' 		=> 'Apartment',
			'id'		=> $prefix. 'postapartment',
			'desc'		=> 'A page which specially designed for apartment',
			'type'		=> '',
		),
		array(
			'name'		=> 'House',
			'id'		=> $prefix . 'postgallery',
			'desc'		=> 'Upload more images for a slideshow.',
			'type'		=> ''
		),
		array(
			'name'		=> 'Vimeo Video',
			'id'		=> $prefix . 'postvideo_v',
			'desc'		=> 'Enter Vimeo Video ID. For example: 62959319 ',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Youtube Video',
			'id'		=> $prefix . 'postvideo_y',
			'desc'		=> 'Enter Youtube Video ID. For example: 8F7UOBIT4Vk ',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Dailymotion Video',
			'id'		=> $prefix . 'postvideo_d',
			'desc'		=> 'Enter Dailymotion Video ID. For example: xzq6yf ',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Soundcloud Audio',
			'id'		=> $prefix . 'audio_soundcloud',
			'desc'		=> 'Enter Soundcloud URL. For example: https://soundcloud.com/mjimmortal/sets/immortal',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		)
		
	)
);

/* ----------------------------------------------------- */
//  Page Options
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'pageoption',
	'title' => 'Page Options',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> 'Post Format',
			'id'		=> $prefix . "pagestyle",
			'type'		=> 'select',
			'options'	=> array(
				'mprs'		=> 'Right Sidebar',
				'mpls'		=> 'Left Sidebar',
				'mpfw'		=> 'Full Width'
			),
			'multiple'	=> false,
			'desc'		=> 'Choose page style. ("Right Sidebar" is default)',
			'std'		=> array( 'Right Sidebar' )
		)
	)
);

/* ----------------------------------------------------- */
//  Page Options 2
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'pageoption',
	'title' => 'Page Options',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> 'Post Format',
			'id'		=> $prefix . "pagestyle2",
			'type'		=> 'select',
			'options'	=> array(
				'mprs2'		=> 'Right Sidebar',
				'mpls2'		=> 'Left Sidebar'
			),
			'multiple'	=> false,
			'desc'		=> 'Choose page style. ("Right Sidebar" is default. Fulwidth is not supported )',
			'std'		=> array( 'Right Sidebar' )
		)
	)
);


if($admin_data['review_switcher'] == true){
/* ----------------------------------------------------- */
//  Reviews
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'review',
	'title' => 'Review Setting',
	'pages' => array( 'post'),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> 'Enable Review',
			'id'		=> $prefix . 'review_enable',
			'type'		=> 'select',
			'options'	=> array(
				'disable'	  => 'Disable',
				'enable' => 'Enable'
			),
			'std'		=> 'disable',
		),
		array(
			'name'		=> 'Enable User Ratings?',
			'id'		=> $prefix . 'user_ratings_visibility',
		
			'type'		=> 'checkbox',
			'std'		=> false
		),
		array(
			'name'		=> 'Rating Table Skin',
			'id'		=> $prefix . "review_skin",
			'type'		=> 'select',
			'options'	=> array(
				'white'	  => 'White',
				'black'	  => 'Black'
			),
			'std'		=> 'white',
			'desc'		=> ''
		),
		array(
			'name'		=> 'Rating Type',
			'id'		=> $prefix . "review_type",
			'type'		=> 'select',
			'options'	=> array(
				'stars'	  => 'Stars',
				'heart'	  => 'Heart',
				'thumb'	  => 'Thumb',
				'check'	  => 'Check',
				'smile'	  => 'Smile',
				'percent' => 'Percentage'
			),
			'std'		=> 'stars',
			'desc'		=> ''
		),
		array(
			'name'		=> 'Criteria Header',
			'desc'		=> "Leave empty if you don't want it",
			'class'		=> "mypassion_review_hide ",
			'id'		=> $prefix . "criteria_header",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "4"
		),
		array(
			'name'		=> '<span class="mypassion_get_bold">Criteria 1:</span> Description',       // CRITERIA ONE
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_add_criteria1 mypassion_c1 ",
			'id'		=> $prefix . "c1_description",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Rating(1-5) <em id=mypassion_preview_rating_1></em>',
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_c1",
			'id'		=> $prefix . "c1_rating",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> '<span class="mypassion_get_bold">Criteria 2:</span> Description',        //CRITERIA TWO
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_add_criteria2  mypassion_c2",
			'id'		=> $prefix . "c2_description",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Rating(1-5) <em id=mypassion_preview_rating_2></em>',
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_c2",
			'id'		=> $prefix . "c2_rating",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> '<span class="mypassion_get_bold">Criteria 3:</span> Description',		//CRITERIA THREE
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_add_criteria3  mypassion_c3",
			'id'		=> $prefix . "c3_description",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Rating(1-5) <em id=mypassion_preview_rating_3></em>',
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_c3",
			'id'		=> $prefix . "c3_rating",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> '<span class="mypassion_get_bold">Criteria 4:</span> Description',		//CRITERIA FOUR
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_add_criteria4  mypassion_c4",
			'id'		=> $prefix . "c4_description",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Rating(1-5)  <em id=mypassion_preview_rating_4></em>',
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_c4",
			'id'		=> $prefix . "c4_rating",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> '<span class="mypassion_get_bold">Criteria 5:</span> Description',		//CRITERIA FIVE
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_add_criteria5  mypassion_c5",
			'id'		=> $prefix . "c5_description",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Rating(1-5) <em id=mypassion_preview_rating_5></em>',
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_c5",
			'id'		=> $prefix . "c5_rating",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> '<span class="mypassion_get_bold">Criteria 6:</span> Description',		//CRITERIA SIX
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_add_criteria6  mypassion_c6",
			'id'		=> $prefix . "c6_description",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Rating(1-5) <em id=mypassion_preview_rating_6></em>',
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_c6",
			'id'		=> $prefix . "c6_rating",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> '<span class="mypassion_get_bold">Criteria 7:</span> Description',		//CRITERIA SEVEN
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_add_criteria7  mypassion_c7",
			'id'		=> $prefix . "c7_description",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Rating(1-5) <em id=mypassion_preview_rating_7></em>',
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_c7",
			'id'		=> $prefix . "c7_rating",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),		
		array(
			'name'		=> '<span class="mypassion_get_bold">Criteria 8:</span> Description',		//CRITERIA EIGHT
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_add_criteria8  mypassion_c8",
			'id'		=> $prefix . "c8_description",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Rating(1-5) <em id=mypassion_preview_rating_8></em>',
			'desc'		=> "",
			'class'		=> "mypassion_review_hide mypassion_c8",
			'id'		=> $prefix . "c8_rating",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),				
		array(
			'name'		=> 'Total Score',
			'desc'		=> "Total score is <em>__</em>%",
			'class'		=> "mypassion_review_hide mypassion_fixer",
			'id'		=> $prefix . "final_score",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "1"
		),
		array(
			'name'		=> 'Brief Summary',
			'desc'		=> "Just one or two words( For example: Outstanding! ) ",
			'class'		=> "mypassion_review_hide ",
			'id'		=> $prefix . "brief_summary",
			'type'		=> 'text',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "4"
		),
		array(
			'name'		=> 'Longer Summary',
			'desc'		=> "Longer Summary",
			'class'		=> "mypassion_review_hide ",
			'id'		=> $prefix . "longer_summary",
			'type'		=> 'textarea',
			'std'		=> "",
			'cols'		=> "50",
			'rows'		=> "4"
		),
		array(
			'name'		=> 'Criteria Position',
			'id'		=> $prefix . "criteria_position",
			'type'		=> 'select',
			// Array of 'key' => 'value' pairs for radio options.
			// Note: the 'key' is stored in meta field, not the 'value'
			'options'	=> array(
				'top'		=> 'Top Left - 300px wide',
				'topright'	=> 'Top Right - 300px wide',
				'bottom'	=> 'Bottom - full width'
			),
			'std'		=> 'bottom',
			'desc'		=> 'Where do you want it to display in the post?'
		)
		
	)
);
}

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function mypassion_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'mypassion_register_meta_boxes' );