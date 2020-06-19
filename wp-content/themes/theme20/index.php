<?php get_header(); ?>
	<div id="content">
		<?php
  $temp = $wp_query;
  $wp_query= null;
  $wp_query = new WP_Query();
  $wp_query->query("post_type=post&paged=".$paged);
  ?>
   <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
   <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   	<div class="inside">
		<header>
         <div class="title wrapper">
			<div class="fleft">
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php $post_meta = of_get_option('post_meta'); ?>
				<?php if ($post_meta=='true' || $post_meta=='') { ?>
				    <div class="post-meta">
					  <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><strong><?php the_time('F j, Y'); ?></strong> <?php the_time() ?></time> - Posted by <?php the_author() ?>
				    </div><!--.post-meta-->
				    <?php } ?>
			</div>
			<?php if ($post_meta=='true' || $post_meta=='') { ?>
				<div class="fright post-meta"><?php comments_popup_link('0', '1', '%', 'comments-link', 'Comments are closed'); ?></div>	
			<?php } ?>	
		</div>	
      </header>
            
      <div class="post-content">
	 	<?php $post_image_size = of_get_option('post_image_size'); ?>
      <?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
      <?php if(has_post_thumbnail()) {
          echo '<a href="'; the_permalink(); echo '" class="featured-thumbnail">';
          the_post_thumbnail();
          echo '</a>';
          }
        ?>
      <?php } else { ?>
      <?php if(has_post_thumbnail()) {
          echo '<a href="'; the_permalink(); echo '" class="featured-thumbnail">';
          the_post_thumbnail('post-thumbnail-xl');
          echo '</a>';
          }
        ?>
      <?php } ?>
	 
         <?php $post_excerpt = of_get_option('post_excerpt'); ?>
         <?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
         <div class="excerpt"><?php the_excerpt(); ?></div>
         <?php } ?>
         <div class="wrapper"><a href="<?php the_permalink() ?>" class="button"><?php _e('Read more','theme20');?></a></div>      </div>
	</div>   
   </article>
   
   <?php endwhile; else: ?>
   <div class="no-results">
      <p><strong>There has been an error.</strong></p>
      <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
      <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
         </div>
   <!--noResults-->
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
   
   <?php $wp_query = null; $wp_query = $temp;?>
	</div><!--#content-->
<?php //get_sidebar(); ?>
<?php //get_sidebar('extra'); ?>
<?php get_footer(); ?>