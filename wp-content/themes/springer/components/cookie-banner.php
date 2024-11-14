<?php if( !isset($_COOKIE['site-cookie-status']) || $_COOKIE['site-cookie-status'] !== 'dismissed' ) : ?>
	<div class="cookie-notification">
		<div class="cookie-notification-title">
			<h2>Cookie use</h2>
		</div>
		<div class="cookie-notification-content">
			<p>The default cookie policy on this website is set to "allow all cookies". However, you can change your settings at any time by clicking on Change Settings in your browser. Our cookies do not contain any personal or sensitive information and we only use them to improve the customer experience of the website. If you are happy to continue using the website without changing these settings you consent to our default cookie policy.</p>
		</div>
		<div class="cookie-notification-actions">
			<a href="<?php echo get_bloginfo('url'); ?>/privacy-policy">Cookie Policy</a>
			<a href="#" class="cookie-notification-dismiss">Accept</a>
		</div>
	</div>
<?php endif; ?>