<?php get_header(); ?>
<div id="content" class=" <?php echo of_get_option('blog_sidebar_pos') ?>">
  <h1 class="title">
    <?php if ( is_day() ) : /* if the daily archive is loaded */ ?>
      <?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
    <?php elseif ( is_month() ) : /* if the montly archive is loaded */ ?>
      <?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
    <?php elseif ( is_year() ) : /* if the yearly archive is loaded */ ?>
      <?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
    <?php else : /* if anything else is loaded, ex. if the tags or categories template is missing this page will load */ ?>
      Blog Archives
    <?php endif; ?>
  </h1>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="inside">
	 	<div class="title wrapper">
			<div class="fleft">
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php if ($theme20_post_meta=='') { ?>
				    <div class="post-meta">
					  <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><strong><?php the_time('F j, Y'); ?></strong> <?php the_time() ?></time> - Posted by <?php the_author() ?>
				    </div><!--.post-meta-->
				    <?php } ?>
			</div>
			<?php if ($theme20_post_meta=='') { ?>	
				<div class="fright post-meta"><?php comments_popup_link('0', '1', '%', 'comments-link', 'Comments are closed'); ?></div>	
			<?php } ?>	
		</div>
	<?php if ( has_post_thumbnail()) { ?>	
	      <?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
	<?php } ?>	 
      
      <div class="post-content">
         <?php $post_excerpt = of_get_option('post_excerpt'); ?>
         <?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
         <div class="excerpt"><?php the_excerpt(); ?></div>
         <?php } ?>
         <div class="wrapper"><a href="<?php the_permalink() ?>" class="button"><?php _e('Read more','theme20');?></a></div>
	    	</div>   
	 </div>
    </article>
    
  <?php endwhile; else: ?>
    <div class="no-results">
      <p><strong>There has been an error.</strong></p>
      <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
      <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
    </div><!--noResults-->
  <?php endif; ?>
    
  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav class="oldernewer">
      <div class="older">
        <?php next_posts_link('Older entries') ?>
      </div><!--.older-->
      <div class="newer">
        <?php previous_posts_link('Newer entries') ?>
      </div><!--.newer-->
    </nav><!--.oldernewer-->
  <?php endif; ?>
  
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_sidebar('extra'); ?>
<?php get_footer(); ?>