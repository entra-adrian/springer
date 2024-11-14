<div class="footer-widgets">
	<div class="centering">
		<div class="grid">
			<?php dynamic_sidebar( "footer-widget-area" ); ?>

			<div class="grid-xs-12 grid-s-6 grid-m-3">
				<div class="widget">
					<h6 class="widget-title">Follow us</h6>
					<div class="widget-content">
						<?php get_template_part('components/bookmarks'); ?>		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-bottom">
	<div class="centering">	
		<div class="footer-credits">
	        <div class="smallprint">
	            <span>Copyright &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?></span>
	        </div>

	        <?php wp_nav_menu( array('theme_location'  => 'footer', 'container' => false) ); ?>
		</div>
	</div>
</div>