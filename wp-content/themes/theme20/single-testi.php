<?php get_header(); ?>
<div id="full-width">
	<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php 
    $custom = get_post_custom($post->ID);
    $testiname = $custom["testimonial-name"][0];
    ?>
    <blockquote class="testi-single" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="post-content">
        <?php echo '<div class="testi-pic">'; the_post_thumbnail('testi-thumbnail'); echo '</div>'; ?>
        <?php the_content(); ?>
        <span class="name-testi single-testi">
          <span class="user"><?php echo $testiname; ?></span>
        </span>
      </div>
    </blockquote>
    
  <?php endwhile; else: ?>
    <div class="no-results">
      <p><strong>There has been an error.</strong></p>
      <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
      <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
    </div><!--noResults-->
  <?php endif; ?>
  <?php wp_reset_query(); ?>
  
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
</div>
<?php get_footer(); ?>