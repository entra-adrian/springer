<?php get_header(); ?>

	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'contents/content', get_post_type() );
			endwhile;
		else :
			get_template_part( 'contents/content', 'none');
		endif;
	?>

<?php get_footer(); ?>