<?php

//	Константы
//	Константы родительской темы без 
//	====================
define( 'THEME_URI', get_stylesheet_directory_uri());
define( 'THEME_IMAGES', THEME_URI . '/assets/i' );
define( 'THEME_CSS', THEME_URI . '/assets/css' );
define( 'THEME_JS', THEME_URI . '/assets/js' );
define( 'THEME_FONTS', THEME_URI . '/assets/fonts' );


//	Подключение стилевого файла CSS и кастомного JS
//	====================
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	//wp_enqueue_script( 'script-name', THEME_JS . '/custom.js', array(), '', true );
}
?>
