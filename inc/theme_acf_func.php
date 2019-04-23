<?php
/*-------------------------------------------------------------------------*/
/*  ACF PRO OPTIONS
/*-------------------------------------------------------------------------*/

// HIDE ACF IF NOT ADMIN
add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin( $show ) {

	return current_user_can('manage_options');

}
// // HIDE ACF FOR ALL USERS
// add_filter('acf/settings/show_admin', '__return_false');


// INCLUDE ACF
include_once( get_template_directory() .'/includes/acf-pro/acf.php' );

add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    // update path
	$path = get_stylesheet_directory() . "/includes/acf-pro/";

    // return
	return $path;

}

add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

    // update path
	$dir = get_stylesheet_directory_uri() . '/includes/acf-pro/';


    // return
	return $dir;

}

// CREATE OPTIONS PAGE
if( function_exists('acf_add_options_page') ) {

	 // add parent
	$slides = acf_add_options_page(array(
		'page_title' 	=> 'Slides',
		'menu_title' 	=> 'Slides',
		'redirect' 		=> true,
	));

	$rodape = acf_add_options_page(array(
		'page_title' 	=> 'Rodapé',
		'menu_title' 	=> 'Rodapé',
		'redirect' 		=> true,
	));

	$redesSociais = acf_add_options_page(array(
		'page_title' 	=> 'Redes Sociais',
		'menu_title' 	=> 'Redes Sociais',
		'redirect' 		=> true,
	));

}