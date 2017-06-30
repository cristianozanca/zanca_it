<?php
/* Write your awesome functions below */
add_action( 'wp_enqueue_scripts', 'zanca_enqueue_styles' );
function zanca_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/**
* Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'left box',
		'id'            => 'left_box',
		'before_widget' => '<div class="left-box">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="boxi-rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name'          => 'right box',
		'id'            => 'right_box',
		'before_widget' => '<div class="right-box">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="boxi-rounded">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => 'center box',
		'id'            => 'center_box',
		'before_widget' => '<div class="center-box">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="boxi-rounded">',
		'after_title'   => '</h2>',
	));

}
add_action( 'widgets_init', 'arphabet_widgets_init' );




