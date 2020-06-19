<?php 
/**
 * Template Name: Page with wide sidebar
 */
get_header(); ?>

<div id="content" class="maxheight <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" class="maxheight">
      <article class="maxheight">
        <div class="inside">
        <?php $post_image_size = of_get_option('post_image_size'); ?>
				<?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
          <?php if(has_post_thumbnail()) {
            echo '<a href="'; the_permalink(); echo '">';
            echo '<div class="featured-thumbnail"><div class="img-wrap">'; the_post_thumbnail(); echo '</div></div>';
            echo '</a>';
            }
          ?>
        <?php } else { ?>
          <?php if(has_post_thumbnail()) {
            echo '<a href="'; the_permalink(); echo '">';
            echo '<div class="featured-thumbnail large"><div class="img-wrap"><div class="f-thumb-wrap">'; the_post_thumbnail('post-thumbnail-xl'); echo '</div></div></div>';
            echo '</a>';
            }
          ?>
        <?php } ?>
        <div id="page-content">
          <?php the_content(); ?>
          <div class="pagination">
            <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
          </div><!--.pagination-->
        </div><!--#pageContent -->
	   </div>
      </article>
    </div><!--#post-# .post-->

  <?php endwhile; ?>
</div><!--#content-->
<div class="patient-sidebar maxheight"><?php get_sidebar(); ?></div>
<?php get_footer(); ?>