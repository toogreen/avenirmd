<?php
/**
 * Template Name: FAQs
 */

get_header(); ?>
<div id="full-width">
	<div id="content">
  <article>
  	<div class="inside">
		<h2><?php the_title(); ?></h2>
  <?php
  $temp = $wp_query;
  $wp_query= null;
  $wp_query = new WP_Query();
  $wp_query->query('post_type=faq&showposts=-1');
  ?>
  <dl class="faq_list">
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
  	<dt><span class="marker">Q?</span><?php the_title(); ?></dt>
    <dd id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<span class="marker">A.</span><?php the_content(); ?>
    </dd>
  <?php endwhile; ?>
  </dl>
  
  <?php $wp_query = null; $wp_query = $temp;?>
	</div>
  </article>

</div><!--#content-->
</div>
<?php get_footer(); ?>
