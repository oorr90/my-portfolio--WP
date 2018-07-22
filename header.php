<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php wp_title('|', true, 'right'); ?></title>

		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />

		<?php wp_head(); ?>
	</head>
	<body>
		<header>
			<nav class="primary-nav-top add-margin">
				<div class="nav-top-icon">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/header_initials.png'; ?>" alt="block letter initials">
					<p>Olivia Heshima Orr</p>
				</div>
				<div class="nav-wrap">
					<div id="toggle">
					<img src="http://localhost/olivia-orr/wp-content/themes/myportfolio/assets/images/menu.png" alt="Show" /></div>
					<div id="popout">
					<?php wp_nav_menu( array( 'theme_location'=>'primary' ) ); ?>
					</div>
				</div>
			</nav>
		</header>

		<main>
