<?php get_header(); ?>

	<section class="section">
		<div class="centering">
			<div class="grid">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							echo '<div class="grid-xs-12 grid-s-6 grid-m-4">';
								get_template_part( 'items/item-search', get_post_type() );
							echo '</div>';
						endwhile;
					else :
						echo '<div class="grid-xs-12">';
							get_template_part( 'items/item-empty', 'search' );
						echo '</div>';
					endif;
				?>
			</div>
			<?php get_template_part( 'components/pagination' ); ?>
		</div>
	</section>

<?php get_footer(); ?>


	