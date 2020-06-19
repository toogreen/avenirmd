<?php $limittext = $limit;?>
<?php global $more;	$more = 0; $sliderCounter=1;?>
<?php query_posts("posts_per_page=5&post_type=slider");?>
<?php if(have_posts()) { ?>
<ul class="kwicks horizontal">
	<?php while (have_posts()) : the_post(); ?>
	
		<?php 
			$custom = get_post_custom($post->ID);
			$custom = get_post_custom($post->ID);
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-post-thumbnail' );
			$url = $thumb['0'];
			$thumb = $custom["thumb"][0];
			$sliderurl = $custom["slider-url"][0];
		?>
									
		<li><span class="shadow"></span>
			<?php echo '<div class="thumb">'; ?>
				<div class="bg bw" style="background-image:url(<?php echo $url; ?>)"></div>	
			<?php echo '</div>'; ?>
			
			<div class="desc color-<?php echo $sliderCounter; ?>">
				<div class="left-bg">
					<?php the_title('<h2>','</h2>'); ?>
 					<div class="excerpt">
						<?php the_excerpt();  ?>
 						<!-- <div class="sous-sections"> -->

						<?php
						// $sousMenu = 'sous-menu-'.$sliderCounter;
						// // wp_nav_menu( array( 'menu' => $sousMenu, 'depth' => 5) ); 
						// $params = array(  
						//     //'theme_location' => 'primary',  
						//     // 'theme_location' => $sousMenu,
						//     //'container' => false,
						//     //'menu' => $sousMenu,
						//     //'container_class' => 'sous-sections'
						// );  
						// wp_nav_menu($params);
						?>
						<!-- </div> -->

					</div><!-- /excerpt -->

					<a href="<?php the_permalink(); ?>" class="kwick-button"><?php chooseText('En savoir plus >>', 'Find out more >>'); ?></a>
				</div>
			</div>
			
		</li>	
	<?php $sliderCounter++; endwhile; ?>
	<?php wp_reset_query(); ?>
</ul>
<?php } else { ?>
		<div id="attention-box">
			<div id="att-box-inner">
			<div class="attention-box alert-box" style="margin: 150px 20px 0 20px;">You don't have any <strong>Slides</strong>. You need to create them using <strong>Slides</strong> custom post type.</div>	
			</div>
		</div>
	<?php } ?>
<?php wp_reset_query();?>