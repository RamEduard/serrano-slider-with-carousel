<?php 

namespace SerranoSliderWithCarousel;

/**
 * Description of Custom Post Type Area de Negocios
 *
 * @author Ramón Serrano <ramon.calle.88@gmail.com>
 */
class AreaNegociosPostType
{
	
	/**
	 * Register Custom Post Type Area de Negocios - Logos
	 */
	static function customPostTypeRegister()
	{
		register_post_type('areas-negocios',
	    // CPT Options
	        array(
	        	'has_archive' => true,
	            'labels' => array(
	                'name' => __('Area de Negocios - Logos'),
	                'singular_name' => __('Logo')
	           	),
	            'public' => true,
	            'rewrite' => array('slug' => 'areas-negocios'),
	            'supports' => array(
	            	//'custom-fields',
	            	'editor',
	            	'revisions',
	            	'thumbnail',
	            	'title',
            	)
	       	)
	   	);
	}

	/**
	 * Register Custom Categories for Area de Negocios
	 */
	static function customCategoriesRegister()
	{
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => 'Categorias de Carousel',
			'singular_name'     => 'Categoria de Carousel',
			'search_items'      => 'Buscar Categorias de Carousel',
			'all_items'         => 'Todas las Categorias de Carousel',
			'parent_item'       => 'Parent Carousel Category',
			'parent_item_colon' => 'Parent Carousel Category:',
			'edit_item'         => 'Editar Categoria de Carousel',
			'update_item'       => 'Editar Categoria de Carousel',
			'add_new_item'      => 'Agregar nueva Categoria de Carousel',
			'new_item_name'     => 'Nueva Categoria de Carousel',
			'menu_name'         => 'Categoria de Carousel',
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'categoria-carousel'),
		);

  		register_taxonomy('categoria-carousel', 'areas-negocios', $args);
	}
}