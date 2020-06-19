<?php
function elegance_widgets_init() {
        // Sidebar Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'					=> 'Sidebar',
		'id' 						=> 'main-sidebar',
		'description'   => __( 'Located at the right side of pages.'),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Header Widget
	// Location: right after the navigation
	register_sidebar(array(
		'name'					=> 'Header',
		'id' 						=> 'header-sidebar',
		'description'   => __( 'Located at the top of pages.'),
		'before_widget' => '<div class="widget-header %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'					=> 'Extra sidebar',
		'id' 						=> 'extra-sidebar',
		'description'   => __( 'Located at the right side of pages.'),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

}
/** Register sidebars by running elegance_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'elegance_widgets_init' );
?>