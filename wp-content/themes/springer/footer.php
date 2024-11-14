<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 */
?>
	</main>

	<footer id="site-footer" class="footer" role="contentinfo" aria-label="Main Footer">
		<?php get_sidebar( 'footer' );	?>
	</footer>

    <?php get_template_part('components/cookie-banner'); ?>

<?php wp_footer(); ?>

</body>
</html>