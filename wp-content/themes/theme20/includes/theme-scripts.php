<?php
function my_script() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_bloginfo('template_url').'/js/jquery-1.6.1.min.js', false, '1.6.1');
		wp_enqueue_script('jquery');
	
		wp_enqueue_script('modernizr', get_bloginfo('template_url').'/js/modernizr-2.0.js', array('jquery'), '2.0');
		wp_enqueue_script('superfish', get_bloginfo('template_url').'/js/superfish.js', array('jquery'), '1.4.8');
		wp_enqueue_script('prettyPhoto', get_bloginfo('template_url').'/js/jquery.prettyPhoto.js', array('jquery'), '3.1.2');
		wp_enqueue_script('easytooltip', get_bloginfo('template_url').'/js/easyTooltip.js', array('jquery'), '1.0');
		wp_enqueue_script('cufon_yui', get_bloginfo('template_url').'/js/cufon-yui.js', array('jquery'), '1.09i');
		wp_enqueue_script('Kozuka_Gothic_Pro_OpenType_300', get_bloginfo('template_url').'/js/Kozuka_Gothic_Pro_OpenType_300.font.js', array('jquery'), '1.0');
		wp_enqueue_script('Kozuka_Gothic_Pro_OpenType_400', get_bloginfo('template_url').'/js/Kozuka_Gothic_Pro_OpenType_400.font.js', array('jquery'), '1.0');
		wp_enqueue_script('Kozuka_Gothic_Pro_OpenType_700', get_bloginfo('template_url').'/js/Kozuka_Gothic_Pro_OpenType_700.font.js', array('jquery'), '1.0');
		wp_enqueue_script('cufon_replace', get_bloginfo('template_url').'/js/cufon-replace.js', array('jquery'), '1.0');
		wp_enqueue_script('swfobject', get_bloginfo('url').'/wp-includes/js/swfobject.js', array('jquery'), '2.2');
		wp_enqueue_script('cycleAll', get_bloginfo('template_url').'/js/jquery.cycle.all.js', array('jquery'), '2.99');
		wp_enqueue_script('audiojs', get_bloginfo('template_url').'/js/audiojs/audio.js', array('jquery'), '1.0');
		wp_enqueue_script('custom', get_bloginfo('template_url').'/js/custom.js', array('jquery'), '1.0');
		wp_enqueue_script('FF_cash', get_bloginfo('template_url').'/js/FF-cash.js', array('jquery'), '1.0');
		wp_enqueue_script('kwicks', get_bloginfo('template_url').'/js/kwicks-1.5.1.pack.js', array('jquery'), '1.5.1');
		wp_enqueue_script('maxheight', get_bloginfo('template_url').'/js/maxheight.js', array('jquery'), '1.0');
	}
}
add_action('init', 'my_script');
?>