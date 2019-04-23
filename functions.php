<?php
/*-------------------------------------------------------------------------*/
/* ENQUEUE CSS AND JS
/*-------------------------------------------------------------------------*/
function theme_scripts() {

	wp_enqueue_style('foundation', get_stylesheet_directory_uri() . '/assets/css/foundation.css');
	wp_enqueue_style('owl', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style('owl-theme', get_stylesheet_directory_uri() . '/assets/css/owl.theme.default.css');
	wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/assets/css/app.css');
	wp_enqueue_style('theme_style', get_stylesheet_uri());

	wp_enqueue_script('jquery');
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.js', array(), 'null', true);
	wp_enqueue_script('what-input', get_template_directory_uri() . '/assets/js/vendor/what-input.js', array(), 'null', true);
	wp_enqueue_script('foundation', get_template_directory_uri() . '/assets/js/vendor/foundation.js', array(), 'null', true);
	wp_enqueue_script('motion-ui', get_template_directory_uri() . '/assets/js/vendor/motion-ui.js', array(), 'null', true);
	wp_enqueue_script('fontawesome', '//use.fontawesome.com/releases/v5.0.10/js/all.js', array(), 'null', true);
	wp_enqueue_script('owlslide', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.min.js', array(), 'null', true);
	wp_enqueue_script('gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js', array(), 'null', true);
	wp_enqueue_script('slider', get_template_directory_uri() . '/assets/js/slider.js', array(), 'null', true);
	wp_enqueue_script('theme_script', get_template_directory_uri() . '/assets/js/app.js', array(), 'null', true);

}
add_action('wp_enqueue_scripts', 'theme_scripts');

/**
 * Filter the HTML script tag of `font-awesome` script to add `defer` attribute.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 *
 * @return   Filtered HTML script tag.
 */
function add_defer_attribute( $tag, $handle ) {
	if ( 'font-awesome-5' === $handle ) {
		$tag = str_replace( ' src', ' data-search-pseudo-elements defer crossorigin="anonymous" src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );

/*-------------------------------------------------------------------------*/
/* REMOVE CSS/JS VERSION
/*-------------------------------------------------------------------------*/
add_filter( 'style_loader_src', 'eudev_remove_version' );
add_filter( 'script_loader_src', 'eudev_remove_version' );

function eudev_remove_version( $url ){
	return remove_query_arg( 'ver', $url );
}

if (!function_exists('eudev_setup')):
	function eudev_setup() {
	/*-------------------------------------------------------------------------*/
	/* TITLE TAG AND FEED LINKS
	/*-------------------------------------------------------------------------*/
	add_theme_support('title-tag');
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*-------------------------------------------------------------------------*/
	/*  Post Thumbnail Support
	/*-------------------------------------------------------------------------*/
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(600, 600, true);
	add_image_size( 'small', 300, 9999 ); // 300px wide unlimited height
    add_image_size( 'medium-small', 450, 9999 ); // 300px wide unlimited height
    add_image_size( 'xl', 1200, 9999 ); // 1200px wide unlimited height
    add_image_size( 'xxl', 2000, 9999 ); // 2000px wide unlimited height
    add_image_size( 'xxxl', 3000, 9999 ); // 3000px wide unlimited height
	add_image_size( 'portfolio_full', 9999, 900 ); // 900px tall unlimited width

	add_filter( 'image_size_names_choose', 'aw_custom_add_image_size_names' );
    function aw_custom_add_image_size_names( $sizes ) {
        return array_merge( $sizes, array(
            'small'             => __( 'Small' ),
            'medium-small'      => __( 'Medium Small' ),
            'xl'                => __( 'Extra Large' ),
            'xxl'               => __( '2x Extra Large' ),
            'xxxl'              => __( '3x Extra Large' ),
            'portfolio_full'    => __( 'Portfolio Full Size' ),
        ) );
    }

	add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
	// Remove default image sizes here.
	function prefix_remove_default_images( $sizes ) {
		// unset( $sizes['small']); // 150px
		// unset( $sizes['medium']); // 300px
		// unset( $sizes['large']); // 1024px
		// unset( $sizes['medium_large']); // 768px
		return $sizes;
	}

	/*-------------------------------------------------------------------------*/
	/* THEME SUPORT
	/*-------------------------------------------------------------------------*/
	add_theme_support( 'custom-logo' );

	/*-------------------------------------------------------------------------*/
	/*  HTML5 SUPORT
	/*-------------------------------------------------------------------------*/
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	/*-------------------------------------------------------------------------*/
	/* TITLE TAG AND FEED LINKS
	/*-------------------------------------------------------------------------*/
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );

	/*-------------------------------------------------------------------------*/
	/*  CUSTOM MENU SUPPORT
	/*-------------------------------------------------------------------------*/
	register_nav_menus( array(
		'header-menu' => 'Header Menu',
	) );

	/*-------------------------------------------------------------------------*/
	/*  CUSTOM MENU WALKER SUPPORT
	/*-------------------------------------------------------------------------*/
	class TOPBAR_MENU_WALKER extends Walker_Nav_Menu {
		// Add vertical menu class and submenu data attribute to sub menus
		function start_lvl(&$output, $depth = 0, $args = array()) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"menu vertical sub-menu\">\n";
		}
	}

	/*-------------------------------------------------------------------------*/
	/*  MENU FALLBACKS
	/*-------------------------------------------------------------------------*/
	function topbar_menu_fallback($args) {
		/*
		* Instantiate new Page Walker class instead of applying a filter to the
		* "wp_page_menu" function in the event there are multiple active menus in theme.
		*/
		$walker_page = new Walker_Page();
		$fallback = $walker_page->walk(get_pages(), 0);
		$fallback = str_replace("<ul class='children'>", '<ul class="menu vertical sub-menu">', $fallback);

		echo '<ul data-dropdown-menu class="menu uppercase dropdown menu-header">'.$fallback.'</ul>';
	}

	/*-------------------------------------------------------------------------*/
	/*  ADD ACTIVE CLASS TO CURRENT MENU ITEM
	/*-------------------------------------------------------------------------*/
	add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
	function special_nav_class($classes, $item){
		if (in_array('current-menu-item', $classes)){
			$classes[] = 'active ';
		}
		return $classes;
	}

}endif; // eudev_setup
add_action('after_setup_theme', 'eudev_setup');


/*-------------------------------------------------------------------------*/
/*  PASSWORD STRENGHT
/*-------------------------------------------------------------------------*/
function eudev_remove_password_strength() {
	if (wp_script_is('wc-password-strength-meter', 'enqueued')) {
		wp_dequeue_script('wc-password-strength-meter');
	}
}
add_action('wp_print_scripts', 'eudev_remove_password_strength', 100);


/*-------------------------------------------------------------------------*/
/*  LOGIN ERRORS
/*-------------------------------------------------------------------------*/
function no_wordpress_errors(){
	return 'Há algo de errado aqui!';
}
add_filter('login_errors', 'no_wordpress_errors');

/*-------------------------------------------------------------------------*/
/*  POST TYPE SUPPORT
/*-------------------------------------------------------------------------*/
function is_post_type($type) {
	global $wp_query;
	if ($type == get_post_type($wp_query->post->ID)) {
		return true;
	}

	return false;
}

/*-------------------------------------------------------------------------*/
/* EXCLUDE PAGE AND CUSTOM POST TYPES FROM SEARCH
/*-------------------------------------------------------------------------*/
function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','SearchFilter');

/*-------------------------------------------------------------------------*/
/* REMOVE YOAST LICENCE
/*-------------------------------------------------------------------------*/
function remove_yoast_license_nag_from_admin_page() {
	echo
	'<style>
		div.yoast-notice-error {
			display: none!important;
		}
	</style>';
}

add_action('admin_head', 'remove_yoast_license_nag_from_admin_page');

/*-------------------------------------------------------------------------*/
/*  *NEW STICKY CLASS NAME
/*-------------------------------------------------------------------------*/
function change_sticky_class($classes) {
	if (in_array('sticky', $classes, true)) {
		$classes = array_diff($classes, array('sticky'));
		$classes[] = 'wp-sticky';
	}
	return $classes;
}
add_filter('post_class', 'change_sticky_class');

/*-------------------------------------------------------------------------*/
/* REMOVE SPAN TAG FROM CONTACT FORM 7
/*-------------------------------------------------------------------------*/
add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

/*-------------------------------------------------------------------------*/
/* CUSTOM ADDS
/*-------------------------------------------------------------------------*/
require get_template_directory() . '/inc/theme_acf_func.php';
require get_template_directory() . '/inc/empresas/empresas.php';


/*-------------------------------------------------------------------------*/
/*  ANALYTICS CODE
/*-------------------------------------------------------------------------*/
add_action('wp_footer', 'add_googleanalytics', 50);
// remove_action('wp_footer', 'add_googleanalytics', 50);
function add_googleanalytics() { ?>
<!-- analytics async -->
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-193420369-1']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<!-- analytics -->
<?php }