  </div><!--.container-->
	<footer id="footer">
		<div class="container clearfix">
          	<div class="left-indent">
				<?php if ( of_get_option('footer_menu') == 'true') { ?>  
           <nav class="footer">
          <?php wp_nav_menu( array(
            'container'       => 'ul', 
            'theme_location' => 'secondary' 
            )); 
          ?>
        </nav><!--.primary-->
          <?php } ?>
          <?php $myfooter_text = of_get_option('footer_text'); ?>
          
          <?php if($myfooter_text){?>
            <?php echo of_get_option('footer_text'); ?>
            <?php } else { ?>
            <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php bloginfo('name'); ?></a><br />
is proudly powered by <a href="http://wordpress.org">Wordpress</a>&nbsp; <a href="<?php echo of_get_option('feed_url'); ?>" rel="nofollow" title="Entries (RSS)">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow">Comments (RSS)</a><br />
            More <a rel="nofollow" href="http://www.templatemonster.com/category/medical-wordpress-templates/" target="_blank">Medical WordPress Templates at TemplateMonster.com</a>
            <?php } ?>
			</div>
          </div>
		<!--.container-->
	</footer>
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work proporly -->
<script type="text/javascript"> Cufon.now(); </script>
<?php echo stripslashes(of_get_option('ga_code')); ?><!-- Show Google Analytics -->
</body>
</html>