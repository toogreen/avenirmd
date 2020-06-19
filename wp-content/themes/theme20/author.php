<?php get_header(); ?>
<div id="content" class=" <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
      else :
      $curauth = get_userdata(intval($author));
    endif;
  ?>
  <div class="author-info">
    <div class="inside">
    	<h1>About: <span><?php echo $curauth->display_name; ?></span></h1>
    <p class="avatar">
      <?php if(function_exists('get_avatar')) { echo get_avatar( $curauth->user_email, $size = '120' ); } /* Displays the Gravatar based on the author's email address. Visit Gravatar.com for info on Gravatars */ ?>
    </p>
    
    <?php if($curauth->description !="") { /* Displays the author's description from their Wordpress profile */ ?>
      <p><?php echo $curauth->description; ?></p>
    <?php } ?>
    </div>
  </div><!--.author-->
  <div id="recent-author-posts">
    <h3 class="title">Recent Posts by <?php echo $curauth->display_name; ?></h3>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /* Displays the most recent posts by that author. Note that this does not display custom content types */ ?>
      <?php static $count = 0;
        if ($count == "5") // Number of posts to display
                { break; }
        else { ?>
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
      <?php $count++; } ?>
      <?php endwhile; else: ?>
        <p>
          No posts by <?php echo $curauth->display_name; ?> yet.
        </p>
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
  </div><!--#recentPosts-->
  <div id="recent-author-comments">
    <h3>Recent Comments by <?php echo $curauth->display_name; ?></h3>
      <?php
        $number=5; // number of recent comments to display
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number");
      ?>
      <ul>
        <?php
          if ( $comments ) : foreach ( (array) $comments as $comment) :
          echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_date(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
        endforeach; else: ?>
                  <p>
                    No comments by <?php echo $curauth->display_name; ?> yet.
                  </p>
        <?php endif; ?>
            </ul>
  </div><!--#recentAuthorComments-->

  
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_sidebar('extra'); ?>
<?php get_footer(); ?>