<!DOCTYPE html>
<html <?php language_attributes() ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>

<body <?php body_class('body') ?>>
	<!--header-->
	<div class="pre-loader">
		<div class="spinner">
			<div class="ball"></div>
			<p>Carregando</p>
		</div>
	</div>
	<div data-sticky-container>
		<header data-sticky data-sticky-on="small" data-options="marginTop:0;" style="width:100%" class="header sticky">
			<div class="header-container">
				<div class="header-content">
					<!-- <a href="#" title="title" class="custom-logo-link">
						<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt="" class="custom-logo">
					</a> -->
					<?php
					if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						};
					?>
					<div class="nav-icon">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<nav class="site-menu show-for-large">
						<?php
							wp_nav_menu(array(
								'container' 		=> false,
								'theme_location' 	=> 'header-menu',
								'menu' 				=> 'Header Menu',
								'menu_class' 		=> 'menu',
								'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'walker' 			=> new TOPBAR_MENU_WALKER(),
								'fallback_cb' 		=> 'topbar_menu_fallback',
							));
						?>
					</nav>
				</div>
			</div>
		</header>
	</div>
	<nav id="menu-mobile" class="site-menu-mobile hide-for-large">
		<?php
			wp_nav_menu(array(
				'container' 		=> false,
				'theme_location' 	=> 'header-menu',
				'menu' 				=> 'Header Menu',
				'menu_class' 		=> 'menu',
				'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'walker' 			=> new TOPBAR_MENU_WALKER(),
				'fallback_cb' 		=> 'topbar_menu_fallback',
			));
		?>
	</nav>
	<!--header-->
<!--main-->
<main class="main">