<?php

	$functions_path = TEMPLATEPATH . '/functions/';
	$includes_path = TEMPLATEPATH . '/includes/';
	
	//Loading jQuery and Scripts
	require_once $includes_path . 'theme-scripts.php';
	
	//Widget and Sidebar
	require_once $includes_path . 'sidebar-init.php';
	require_once $includes_path . 'register-widgets.php';
	
	//Theme initialization
	require_once $includes_path . 'theme-init.php';
	
	//Additional function
	require_once $includes_path . 'theme-function.php';
	
	//Shortcodes
	require_once $includes_path . 'theme_shortcodes/shortcodes.php';
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/alert.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/tabs.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/toggle.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/html.php');
	
	//tinyMCE includes
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/tinymce/tinymce_shortcodes.php');
	
	//Wordpress importer
	require_once $includes_path . 'importer/wordpress-importer.php';
	require_once $includes_path . 'importer/parsers.php';
	
	
	/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
	*/
	function theme01_page_menu_args( $args) {
		$args['show_home'] = false;
		return $args;
	}
	add_filter( 'wp_page_menu_args', 'theme01_page_menu_args' );
	
	
	function add_menuid ($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass = $matches[1];
	$toreplace = array('<div class="'.$divclass.'">', '</div>');
	$new_markup = str_replace($toreplace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
	return $new_markup; }

	add_filter('wp_page_menu', 'add_menuid');

	
	
	
	
	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	if ( !function_exists( 'optionsframework_init' ) ) {
	
	
	/*-----------------------------------------------------------------------------------*/
	/* Options Framework Theme
	/*-----------------------------------------------------------------------------------*/
	
	/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */
	
	if ( STYLESHEETPATH == TEMPLATEPATH ) {
		define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('stylesheet_directory') . '/admin/');
	}
	
	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
	
	}
		
	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
  
	
	// enable shortcodes in sidebar
	add_filter('widget_text', 'do_shortcode');
	
	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	
	
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');


	// CI-BAS TRUCS AJOUTÉ PAR DAVID DE SOFTVOYAGE
    /**
     * Fonction permettant de traduire plus facilement le text ne faisant pas partie des widgets
     * ou des postes
     */
    function chooseText($fr, $en = '') {
        //On detecte la language courante
        switch (qtrans_getLanguage()) {
            case 'en':
                $result = $en;
                break;
            default:
                $result = $fr;
        }
        //Si le text n'est pas definie en englais, on envoi celui en français
        if ($result == '')
            echo $fr;
        else
            echo $result;
    }

    // Fonction pour activer menus et ajouter dans autres pages php
    function register_my_menus(){
    	register_nav_menus(
    		array(
    			'sous-menu-1' => __( 'sous-menu-1' ),
    			'sous-menu-2' => __( 'sous-menu-2' ),
    			'sous-menu-3' => __( 'sous-menu-3' ),
    			'sous-menu-4' => __( 'sous-menu-4' ),
    			'sous-menu-5' => __( 'sous-menu-5' )
    		)
    	);
    }
    add_action( 'init', 'register_my_menus' );

?>