		</main> <!-- end content -->
		<footer>
			<div class="footer-social-wrap">
				<h3>Connect</h3>
				<div class="footer-social">
					<div class="footer-social-icon">
						<a href="https://www.linkedin.com/in/olivia-h-orr"><img src="<?php echo get_template_directory_uri() . '/img/linkedin_circle_logo_white.png'; ?>" alt="White LinkedIn logo"></a>
					</div>
					<div class="footer-social-icon">
						<a href="https://www.github.com/oorr90"><img src="<?php echo get_template_directory_uri() . '/img/github_circle_logo_white.png'; ?>" alt="White Github logo"></a>
					</div>
					<div class="footer-social-icon">
						<a href="#"><img src="<?php echo get_template_directory_uri() . '/img/mail_circle_icon_black.png'; ?>" alt="White email logo"></a>
					</div>
				</div>
			</div>
			<div class="footer-wrap add-margin">
				<nav class="secondary-nav-footer">
					<?php wp_nav_menu( array( 'theme_location'=>'secondary' ) ); ?>
				</nav>
				<p>&copy; <?php echo date("Y"); ?> Olivia Heshima Orr</p>
			</div>
		</footer>

	<?php wp_footer(); ?>

	</body>
</html>
