<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_category() ) {
		echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo 'Error 404 Not Found | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	} ?></title>
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<!-- The HTML5 Shim is required for older browsers, mainly older versions IE -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" &nbsp;alt="" /></a>
    </div>
  <![endif]-->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" />
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  
  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu, nav.primary .menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout 
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>',height:'<?php echo of_get_option('sf_sl_animation'); ?>'}, // fade-in and slide-down animation 
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed 
				onHide		: function(){Cufon.refresh()}
			});
			
			// prettyphoto init
			jQuery("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				theme:'facebook',
				slideshow:5000,
				autoplay_slideshow: false
			});
			
			// easyTooltip init
			jQuery("a.tooltip, .social-networks li a").easyTooltip();
			
			//kwicks image hover
			jQuery(".kwicks.horizontal li").hover(function(){
				jQuery(this).find(".colorImage").fadeIn();
			},function(){
				jQuery(this).find(".colorImage").fadeOut();
			});
			
			//kwicks excerpt hover
			jQuery(".kwicks.horizontal li").hover(function(){
				jQuery(this).find(".excerpt").stop().animate({right:"75px"},"slow");
			},function(){
				jQuery(this).find(".excerpt").stop().animate({right:"-280px"},"medium");
			});
			
			//kwicks button hover
			jQuery(".kwicks.horizontal li").hover(function(){
				jQuery(this).find(".kwick-button").stop().animate({bottom:"5px"},"slow");
			},function(){
				jQuery(this).find(".kwick-button").stop().animate({bottom:"-24px"},"medium");
			});
			
			jQuery(".patient-sidebar .widget.widget_links li:nth-child(5n)").addClass("border");
			
			jQuery("body.archive.author").find("#sidebar").removeClass("maxheight");
			
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
  </script>
  
  <script type="text/javascript">
		jQuery(document).ready(function() {
			//kwicks begin
			jQuery('.kwicks').kwicks({
				spacing : 1,
				sticky : false,
				event : 'mouseover',
				max : 470
			});
		});
	</script>
  <!-- Custom CSS -->
	<?php if(of_get_option('custom_css') != ''){?>
  <style type="text/css">
  	<?php echo of_get_option('custom_css' ) ?>
  </style>
  <?php }?>
  
  
  
  
  <style type="text/css">
		/* Body styling options */
		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>
		
  	/* Header styling options */
		<?php $header_styling = of_get_option('header_color'); 
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>
		
		/* Links and buttons color */
		<?php $links_styling = of_get_option('links_color'); 
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>
		
		/* Body typography */
		<?php $body_typography = of_get_option('body_typography'); 
			if($body_typography) {
				echo 'body {font-family:'.$body_typography['face'].'; color:'.$body_typography['color'].'}';
				echo '#main {font-size:'.$body_typography['size'].'; font-style:'.$body_typography['style'].';}';
			}
		?>
  </style>
</head>

<body <?php body_class(); ?>  onLoad="new ElementMaxHeight();">

<div id="main"><!-- this encompasses the entire Web site -->
	<header id="header">
		<div class="splash">
			<div class="container">
      	   <div class="logo">
      	      
      	      <?php if(of_get_option('logo_type') == 'text_logo'){?>
      	      
      	      <?php if( is_front_page() || is_home() || is_404() ) { ?>
      	      <h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
               <?php } else { ?>
      	      <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
               <?php } ?>
      	      
      	      <?php } else { ?>
      	      
      	      <?php if(of_get_option('logo_url') != ''){ ?>
      	      <a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
      	      <?php } else { ?>
      	      <a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
      	      <?php } ?>
      	      
      	      <?php }?>
             </div>
		    <nav class="primary">
          <?php wp_nav_menu( array(
            'container'       => 'ul', 
            'theme_location' => 'primary' 
            )); 
          ?>
        </nav><!--.primary-->

<!-- Boutons pour changer de langue -->
<!-- <div class="change-langue">
	<?php echo qtrans_generateLanguageSelectCode('text'); ?>
</div> -->
<!-- Fin des boutons pour changer de langue -->

	        <?php if ( of_get_option('g_search_box_id') == 'yes') { ?>  
		   <div id="top-search">
		      <form method="get" action="<?php echo get_option('home'); ?>/" class="searchform">
		         <input type="text" name="s"  class="searching"/><input type="submit" value="" class="submit">
	           </form>
             </div>
		   <?php } ?>
	        <div id="widget-header">
	           <?php if ( ! dynamic_sidebar( 'Header' ) ) : ?>
	           <ul class="social-networks">
			<li><a href="<?php echo of_get_option('facebook_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icons/facebook.png" alt="" /></a></li>
			<li><a href="<?php echo of_get_option('twitter_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icons/twitter.png" alt="" /></a></li>
			<li><a href="<?php echo of_get_option('flickr_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icons/flickr.png" alt="" /></a></li>
			<li><a href="<?php echo of_get_option('delicious_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icons/delicious.png" alt="" /></a></li>
		   </ul>
	           <?php endif; ?>
               </div>
		   <!--#widget-header-->
	       </div>
		<!--.container-->
		</div>
	</header>
  <section id="slider-wrapper">
    <div class="container">
      	<?php include_once(TEMPLATEPATH . '/slider.php'); ?>
    </div>
  </section><!--#slider-->
	<div class="container primary_content_wrap clearfix">

<!-- AJOUTS CUSTOM PAR DAVID DE SOFTVOYAGE -->

<!-- Bouton pour prendre un rendez-vous -->
<div class="prenez-rendez-vous">
	<a href="/contact/"><img class="btn-rollover" src="wp-content/themes/theme20/images/prenez-rendez-vous-off.png" alt=""></a>
</div>

<!-- Boutons de droite dans page layout -->
<div class="menu-droite">
	<a href="?page_id=32"><img class="btn-rollover" src="wp-content/themes/theme20/images/menu-droite/btn-droite-1-off.png" alt=""></a>
	<a href="?page_id=112"><img class="btn-rollover" src="wp-content/themes/theme20/images/menu-droite/btn-droite-2-off.png" alt=""></a>
	<a href="?page_id=114"><img class="btn-rollover" src="wp-content/themes/theme20/images/menu-droite/btn-droite-3-off.png" alt=""></a>
	<a href="?page_id=116"><img class="btn-rollover" src="wp-content/themes/theme20/images/menu-droite/btn-droite-4-off.png" alt=""></a>
</div>

					<!-- <div class="sous-sections"> -->
						<?php
						// for ($i=1; $i<=5; $i++) {
						// 	$sousMenu = 'sous-menu-'.$i;
						// 	wp_nav_menu( array( 'menu' => $sousMenu) ); 
						// // wp_nav_menu( array( 'menu' => 'sous-menu-1', 'items_wrap' => '<ul id="%1$s" class="sous-sections">%3$s</ul>' ) );
						
						// }
						?>  					
					<!-- </div>				 -->


<!-- Fonctions pour ajouter couleur sur rollover -->
  <script type="text/javascript">
    jQuery(document).ready(function() {
      	//Make left-bg plus haut quand on hover sur grosse photo
        $(".kwicks.horizontal li").hover(
      	function(){
      		// On enlève le filtre noir et blanc sur la classe bg qui est l'image du fond et on crop la photo
        	$(this).find('.bg:first-child')
        		.removeClass("bw").css("height","250px");

        	// On rapetisse le layer "thumb" qui est derrière la photo pour faire place aux menus de sous-sections
        	$(this).find('.thumb')
        		.css({"height":"250px"});

        	// On agrandit le rectangle rouge pour faire place aux sous-sections
        	$(this).find('.left-bg:first-child')
        		.css({"height":"122px"});

        	// On affiche le menu de sous-section correspondant
        	$(this).find('.menus-sous-sections:first-child').show();
    	},
    	function(){
    		// On remet le filtre noir et blanc sur la classe bg qui est l'image du fond et on lui redonne sa taille normale
    		$(this).find('.bg:first-child')
    			$('.bg').addClass("bw").css("height","318px");

    		// On replace et agrandit le rectangle rouge pour faire place aux menus de sous-sections
        	$(this).find('.thumb')
        		.css({"height":"305px"});

        	// On rapetisse le rectangle rouge pour faire place aux sous-sections
        	$(this).find('.left-bg:first-child')
        		.css({"height":"67px"});

        	// On cache le menu de sous-section correspondant
        	$(this).find('.menus-sous-sections:first-child').hide();
    	});

    	// Boutons en image rollover
		$(".btn-rollover").hover( 
			function() { this.src = this.src.replace("off", "over"); 
			}, 
			function() { this.src = this.src.replace("over", "off"); 
		});

		$(".sous-sections").removeClass(all);
     });
  </script>
