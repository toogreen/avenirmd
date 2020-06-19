<aside id="extra-sidebar">
	<?php if ( ! dynamic_sidebar( 'Extra sidebar' )) : ?>

	
		<div id="sidebar-nav" class="widget menu">
			<h3>Navigation</h3>
			<?php wp_nav_menu( array('menu' => 'Sidebar Menu' )); ?> <!-- editable within the Wordpress backend -->
		</div>
		
		<div id="sidebar-archives" class="widget">
			<ul>
				<?php wp_list_bookmarks('title_li=&category_before=&category_after='); ?>
			</ul>
		</div>

	<?php endif; ?>
</aside><!--sidebar-->