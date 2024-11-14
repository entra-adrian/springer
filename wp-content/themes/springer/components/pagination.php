<?php if( show_posts_nav() ) : ?>
	<nav class="pagination" aria-label="Pagination Navigation">
		<?php if( function_exists('wp_pagenavi') ) : ?>

			<?php wp_pagenavi(); ?>

		<?php else : ?>

			<div class="leftnav floatleft"><?php next_posts_link( __( '&larr; Older posts', 'xtheme' ) ); ?></div>
			<div class="rightnav floatright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'xtheme' ) ); ?></div>

		<?php endif; ?>
	</nav>
<?php endif; ?>