<?php

add_action( 'wp_enqueue_scripts',  function () {

    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap');

    wp_enqueue_style( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css');
    wp_enqueue_style( 'lightgallery', 'https://cdn.jsdelivr.net/npm/lightgallery.js@1.4.0/dist/css/lightgallery.min.css');
    wp_enqueue_style( 'accordion', 'https://unpkg.com/accordion-js@3.3.2/dist/accordion.min.css');
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css');
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css');
    
    wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js');

	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'lightgallery', 'https://cdn.jsdelivr.net/npm/lightgallery.js@1.4.0/dist/js/lightgallery.min.js', array(), 'null', true );
    wp_enqueue_script( 'accordion-custom', 'https://unpkg.com/accordion-js@3.3.2/dist/accordion.min.js', array(), 'null', true );
    wp_enqueue_script( 'modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', array('jquery'), 'null', true );
    wp_add_inline_script('modal', 'lightGallery(document.getElementById("ul-li"));');
    wp_add_inline_script('modal', "new Accordion('.accordion-container');");
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), 'null', true );
});



add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}
?>