<?php get_header(); ?>
<div id="content" class=" <?php echo of_get_option('blog_sidebar_pos') ?>">
  <h1 class="title">Search results for: <span>"<?php the_search_query(); ?>"</span></h1>
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
				<div class="fright post-meta"><?php comments_popup_link('0', '1', '%', 'comments-link', 'Off'); ?></div>	
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
      <h2>No Results</h2>
      <p>Please feel free try again!</p>
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

</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_sidebar('extra'); ?>
<?php get_footer(); ?>
