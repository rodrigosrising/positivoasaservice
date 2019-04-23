<?php

/**
 * Registra o Custom Post Type 'empresas'
 */
add_action( 'init', 'rpt_register_empresa_cpt' );
function rpt_register_empresa_cpt()
{
	register_post_type( 'empresas', array(
		'labels' => array(
			'name'               => 'Empresas',
			'singular_name'      => 'Empresa',
			'menu_name'          => 'Empresas',
			'name_admin_bar'     => 'Empresa',
			'add_new'            => 'Adicionar Nova',
			'add_new_item'       => 'Adicionar Nova Empresa',
			'new_item'           => 'Nova Empresa',
			'edit_item'          => 'Editar Empresa',
			'view_item'          => 'Ver Empresa',
			'all_items'          => 'Todas as Empresas',
			'search_items'       => 'Buscar Empresa',
			'not_found'          => 'Nenhuma Empresa encontrada.',
			'not_found_in_trash' => 'Nenhuma Empresa encontrada na Lixeira.',
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'empresa' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-shield-alt',
		'supports'           => array( 'title', 'thumbnail' )
	) );
}