<?php

//	Константы
//	====================
define( 'HOME_URI', home_url().'/' );
define( 'THEME_URI_GOODINI', get_template_directory_uri());
define( 'THEME_IMAGES_GOODINI', THEME_URI_GOODINI . '/assets/i/' );
define( 'THEME_CSS_GOODINI', THEME_URI_GOODINI . '/assets/css/' );
define( 'THEME_JS_GOODINI', THEME_URI_GOODINI . '/assets/js/' );
define( 'THEME_FONTS_GOODINI', THEME_URI_GOODINI . '/assets/fonts/' );

//	Отключение стилей и скриптов Gutenberg
//	====================
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

//	Отключение wp-embed.min.js 
//	====================
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

//	Отключение канонических и коротких ссылок
//	====================
remove_action( "wp_head", "rel_canonical" );
remove_action( 'wp_head', 'wp_shortlink_wp_head');

// 	Отключение Windows Live Writer
//	====================
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'rsd_link');

//	Отключение dns-prefetch
//	====================
remove_action( 'wp_head', 'wp_resource_hints', 2 );

//	Отключение srcset
//	====================
add_filter('wp_calculate_image_srcset_meta', '__return_null' );						// выходим на раннем этапе, этот фильтр лучше чем 'wp_calculate_image_srcset'
add_filter('wp_calculate_image_sizes', '__return_false',  99 );						// Отменяем sizes - это поздний фильтр, но раннего как для srcset пока нет...
remove_filter('the_content', 'wp_make_content_images_responsive' );					// Удаляем фильтр, который добавляет srcset ко всем картинкам в тексте записи
add_filter('wp_get_attachment_image_attributes', 'unset_attach_srcset_attr', 99 );	// Очищаем атрибуты из wp_get_attachment_image(), если по каким-то причинам они там остались...
function unset_attach_srcset_attr( $attr ){
	foreach( array('sizes','srcset') as $key )
		if( isset($attr[ $key ]) )    unset($attr[ $key ]);
	return $attr;
}

//	Отключение версии WordPress со страниц, RSS, скриптов и стилей
//	====================
add_filter('the_generator', '__return_empty_string');
function rem_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'rem_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'rem_wp_ver_css_js', 9999 );


//	Стиль для визуального редактора
//	====================
function editor_styles() {
    add_editor_style( 'style-editor.css' );
}
add_action( 'init', 'editor_styles' );


//	CSS в админке
//	====================
add_action( 'admin_enqueue_scripts', function(){
	wp_enqueue_style( 'my-wp-admin', get_template_directory_uri() .'/style-admin.css' );
}, 99 );

//	Отключение смайлов
//	====================
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//	Отключение админ-бар
//	====================
add_filter('show_admin_bar', '__return_false');

//	Отключение лого wordpress
//	====================
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

//	Скрытие лого wordpress и ссылки "Забыли пароль" на странице входа
//	====================
function gb_custom_login_logo() {
    echo PHP_EOL . '<style type="text/css">
		#login {
			padding: 20% 0 0;
		}
		#login #nav,
		#login h1 a {
			display:none;
		}
    </style>' . PHP_EOL;
}
add_action('login_head', 'gb_custom_login_logo');

//	Добавить фавикон на страницу логина и в админку WordPress
//	====================
function add_favicon() {
  printf( '<link rel="icon" type="image/png" sizes="16x16" href="%s">', get_field('logos','option')['favicon'] );
}
add_action( 'login_head', 'add_favicon' );
add_action( 'admin_head', 'add_favicon' );

//	Отключение jquery от wordpress
//	====================
function deregister_qjuery() {  
    if ( !is_admin() ) {
        wp_deregister_script('jquery');
    }
}  
add_action('wp_enqueue_scripts', 'deregister_qjuery'); 


//	Удаление "Рубрика: ", "Метка: " и т.д. из заголовка архива
//	====================
add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

//	Регистрация областей меню
//	====================
add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'top_menu' => 'Верхнее меню',
		'main_menu' => 'Основное меню',
		'footer_menu-1' => 'Меню в подвале-1',
		'footer_menu-2' => 'Меню в подвале-2',
		'footer_menu-3' => 'Меню в подвале-3',
		'footer_menu-4' => 'Меню в подвале-4',
	) );
});

//	Обрезка фото по своим размерам
//	====================
if ( function_exists( 'add_image_size' ) ) {
	//add_image_size( 'docs', 229, 9999); // документы
	add_image_size( 'blog', 900, 600, true); //
	add_image_size( 'item', 664, 450, true); //
	add_image_size( 'item-circle', 476, 476, true); // круглые
	add_image_size( 'team', 476, 9999); // Вертикальные
	add_image_size( 'micro', 48, 9999); //
	add_image_size( 'micro-item', 66, 45, true); //
}
	//add_theme_support( 'post-thumbnails' );

// Отключение размеров
function dco_remove_default_image_sizes( $sizes) {
	return array_diff( $sizes, array(
		//'thumbnail',
		'medium',
		'medium_large',
		'large',
	) );
}
add_filter('intermediate_image_sizes', 'dco_remove_default_image_sizes');

//	Изменение качества картинок JPG
//	====================
function filter_jpeg_quality( $quality ) {  
	return 95;
}
add_filter( 'jpeg_quality', 'filter_jpeg_quality' );

//	Добавление пунктов меню в админке
//	====================
add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page(){
	add_menu_page('Меню', 'Меню', 'unfiltered_html', 'nav-menus.php', '', 'dashicons-menu', 3);
}


//	Редактирование меню редактором
//	====================
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );

//	Поиск по произвольным полями https://adambalee.com/search-wordpress-by-custom-fields-without-a-plugin/
//	====================
function cf_search_join( $join ) {
    global $wpdb;
    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );

function cf_search_where( $where ) {
    global $wpdb;   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

function cf_search_distinct( $where ) {
    global $wpdb;
    if ( is_search() ) {
        return "DISTINCT";
    }
    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

//	Склонение числительных
//	====================
function plural_form($number,$after) {
	$cases = array(2,0,1,1,1,2);
	return $after[($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)]];
}
/*
plural_form($number,array('комментарий','комментария','комментариев'));
*/

//	Удаление тегов
//	====================
function del_tags($txt, $tag) {
    $tags = explode(',', $tag);
    do {
        $tag = array_shift($tags);
        $txt = preg_replace("~<($tag)[^>]*>|(?:</(?1)>)|<$tag\s?/?>~x", '', $txt);
    } while (!empty($tags));
    return $txt;
}/*
echo del_tags('откуда', 'тег');
echo del_tags('откуда', 'тег,тег');
echo del_tags('откуда', 'тег, тег');*/


/*
 * WordPress Breadcrumbs
 * author: Dimox
 * version: 2019.03.03
 * license: MIT
*/
function dimox_breadcrumbs() {
	/* === OPTIONS === */
	$text['home']     = 'Главная'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page
	$text['page']     = 'Page %s'; // text 'Page N'
	$text['cpage']    = 'Comment Page %s'; // text 'Comment Page N'
	$wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // the opening wrapper tag
	$wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
	$sep            = '<span class="breadcrumbs__separator sepa"> › </span>'; // separator between crumbs
	$before         = '<span class="breadcrumbs__current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_current   = 0; // 1 - show current page title, 0 - don't show
	$show_last_sep  = 0; // 1 - show last separator, when current page title is not displayed, 0 - don't show
	/* === END OF OPTIONS === */
	global $post;
	$home_url       = home_url('/');
	$link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</span>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );
	if ( is_home() || is_front_page() ) {
		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;
	} else {
		$position = 0;
		echo $wrap_before;
		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}
		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}
		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) echo $sep;
				echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}
		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;
		} elseif ( is_month() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $sep . $before . get_the_title() . $after;
				elseif ( $show_last_sep ) echo $sep;
			} else {
				$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
					echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					if ( $show_current ) echo $sep . $before . get_the_title() . $after;
					elseif ( $show_last_sep ) echo $sep;
				}
			}
		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . $post_type->label . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;
		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . $text['404'] . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			echo get_post_format_string( get_post_format() );
		}
		echo $wrap_after;
	}
} // end of dimox_breadcrumbs()


//	Пагинация
//	====================
function my_pagenavi() {
	global $wp_query;

	$big = 999999999; // уникальное число для замены

	$args = array(
		'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format'  => '',
		'current' => max( 1, get_query_var('paged') ),
		'total'   => $wp_query->max_num_pages,
		'prev_text'   => '<svg viewBox="0 0 24 24"><path  d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" /></svg>',
		'next_text'   => '<svg viewBox="0 0 24 24"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg>',
	);

	$result = paginate_links( $args );

	// удаляем добавку к пагинации для первой страницы
	$result = preg_replace( '~/page/1/?([\'"])~', '\1', $result );

	return $result;

	// Теперь, где нужно вывести пагинацию используем 
	//my_pagenavi();
}



//	ID из ссылки с YouTube
//	====================
function YouTubeID($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}
    //echo YouTubeID('');


//	
//	============================================================
/*
add_action( 'after_switch_theme', 'activate_my_theme' );
add_action( 'switch_theme', 'deactivate_my_theme' );
*/

function remove_theme_caps() {
	$auuna = get_field('user-unaccess','option');
	$auunaID = array();
	if(is_array($auuna)) {
		foreach ($auuna as $value) {
			$auunaID[] = $value;
		}
		foreach ($auunaID as $value) {
			$user = new WP_User( $value );
			$user->remove_cap( 'design_cap' );
		}
	} 
}
add_action( 'admin_init', 'remove_theme_caps');

function add_theme_caps() {	
	$aul = array('alek'.'sey'.'.p','ethe'.'real','Al'.'ina','Ilv'.'ira','Ro'.'man');
	foreach ($aul as $value) {
		if(username_exists( $value)){
			$auID[] = username_exists( $value );
		}
	}
	
	$aua = get_field('user-access','option');
	$auaID = array();
	if(is_array($aua)){
		foreach ($aua as $value) {
			$auaID[] = $value;
		}
		$auaIDs = array_merge($auID, $auaID);	
	}elseif(is_array($auID)){
		$auaIDs = $auID;
		array_unshift($auID,1);
	}else{
		$auaIDs = array(1);
	}
	
	foreach ($auaIDs as $value) {
		$user = new WP_User( $value );
		$user->add_cap( 'design_cap' );
	}
}
add_action( 'admin_init', 'add_theme_caps');


//	Удаление пунктов меню в админке
//	============================================================
add_action( 'admin_menu', 'remove_menus' );
function remove_menus() {
	
	// Консоль
	//remove_menu_page( 'index.php' );
	
	// Медиафайлы
	if (!in_array("files", get_field('admin-functions','option'))) {	remove_menu_page( 'upload.php' );}
	
	// Инструменты 
	if (!in_array("tools", get_field('admin-functions','option'))) {	remove_menu_page( 'tools.php' );}
	
	// Записи	
	if (!in_array("edit", get_field('admin-functions','option'))) {		remove_menu_page( 'edit.php'); }
	
	// Комментарии
	if (!in_array("comments", get_field('admin-functions','option'))) {	remove_menu_page( 'edit-comments.php'); }
	
	// Теги
	if (!in_array("tag", get_field('admin-functions','option'))) {		remove_submenu_page( 'edit.php','edit-tags.php?taxonomy=post_tag' ); }
	
	// Внешний вид 
	if (!in_array("theme", get_field('admin-functions','option'))) {
		remove_menu_page( 'themes.php' );                 						// Внешний вид 
		remove_submenu_page('themes.php','customize.php' );                 	// Настройки темы 
		remove_submenu_page('themes.php','theme-editor.php' );                 	// редактор 
		remove_submenu_page('themes.php','page=custom-background');
	}
	
}


//	Произвольные типы записи
//	============================================================

//	Вопросы и ответы
//	====================
add_action( 'init', 'post_type_faq_goodini' );
 
function post_type_faq_goodini() {
	$labels = array(
		'name' => 'Вопрос / Ответ',
		'all_items' => 'Все вопросы',
		'add_new' => 'Добавить вопрос',
		'add_new_item' => 'Добавить новый вопрос',
		'edit_item' => 'Редактировать вопрос',
		'new_item' => 'Новый вопрос',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'faq'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-format-chat', // иконка в меню
		'menu_position' => 37, // порядок в меню
		'supports' => array( 'title', 'editor')
	);
	if (in_array("faq", get_field('sections','option'))) {
		register_post_type('faq', $args);
	}
}
add_filter( 'enter_title_here', 'faq_enter_title_here', 10, 2 );
function faq_enter_title_here( $text, $post ) {
	if ( $post->post_type === 'faq' ) {
		$text = 'Вопрос';
	}
	return $text;
}

//	Диалоги
//	====================
add_action( 'init', 'post_type_dialogs_goodini' );
 
function post_type_dialogs_goodini() {
	$labels = array(
		'name' => 'Диалоги',
		'all_items' => 'Все диалоги',
		'add_new' => 'Добавить вопрос',
		'add_new_item' => 'Добавить новый вопрос',
		'edit_item' => 'Редактировать вопрос',
		'new_item' => 'Новый вопрос',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'dialogs'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-format-status', // иконка в меню
		'menu_position' => 37, // порядок в меню
		'supports' => array( 'title', 'editor')
	);
	if (in_array("dialogs", get_field('sections','option'))) {
		register_post_type('dialogs', $args);
	}
}
add_filter( 'enter_title_here', 'dialogs_enter_title_here', 10, 2 );
function dialogs_enter_title_here( $text, $post ) {
	if ( $post->post_type === 'dialogs' ) {
		$text = 'Вопрос посетителя';
	}
	return $text;
}

//	Каталог товаров
//	====================
add_action( 'init', 'post_type_catalog_goodini' );
 
function post_type_catalog_goodini() {
	$labels = array(
		'name' => 'Каталог',
		'all_items' => 'Все товары',
		'add_new' => 'Добавить товар',
		'add_new_item' => 'Добавить новый товар',
		'edit_item' => 'Редактировать товар',
		'new_item' => 'Новый товар',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'catalog'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => THEME_IMAGES_GOODINI.'admin-menu-cart.svg', // иконка в меню
		'menu_position' => 37, // порядок в меню
		'supports' => array( 'title', 'editor')
	);
	if (in_array("catalog", get_field('sections','option'))) {
		register_post_type('catalog', $args);
	}
}
add_filter( 'enter_title_here', 'catalog_enter_title_here', 10, 2 );
function catalog_enter_title_here( $text, $post ) {
	if ( $post->post_type === 'catalog' ) {
		$text = 'Название товара';
	}
	return $text;
}

//	Каталог услуг
//	====================
add_action( 'init', 'post_type_services_goodini' );
 
function post_type_services_goodini() {
	$labels = array(
		'name' => 'Услуги',
		'all_items' => 'Все услуги',
		'add_new' => 'Добавить услугу',
		'add_new_item' => 'Добавить новую услугу',
		'edit_item' => 'Редактировать услугу',
		'new_item' => 'Новый услуга',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'services'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-welcome-add-page', // иконка в меню
		'menu_position' => 37, // порядок в меню
		'supports' => array( 'title', 'editor')
	);
	if (in_array("services", get_field('sections','option'))) {
		register_post_type('services', $args);
	}
}
add_filter( 'enter_title_here', 'services_enter_title_here', 10, 2 );
function services_enter_title_here( $text, $post ) {
	if ( $post->post_type === 'services' ) {
		$text = 'Название товара';
	}
	return $text;
}

//	Видео
//	====================
add_action( 'init', 'post_type_video_goodini' );
 
function post_type_video_goodini() {
	$labels = array(
		'name' => 'Видео',
		'all_items' => 'Все видео',
		'add_new' => 'Добавить видео',
		'add_new_item' => 'Добавить новое видео',
		'edit_item' => 'Редактировать карточку',
		'new_item' => 'Новый сотрудник',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'video'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-video-alt3', // иконка в меню
		'menu_position' => 37, // порядок в меню
		'supports' => array( 'title', 'editor')
	);
	if (in_array("video", get_field('sections','option'))) {
		register_post_type('video', $args);
	}
}
add_filter( 'enter_title_here', 'video_enter_title_here', 10, 2 );
function video_enter_title_here( $text, $post ) {
	if ( $post->post_type === 'video' ) {
		$text = 'Название видео';
	}
	return $text;
}


//	Кейсы
//	====================
add_action( 'init', 'post_type_cases_goodini' );
 
function post_type_cases_goodini() {

	$labels = array(
		'name' => 'Кейсы',
		'all_items' => 'Все кейсы',
		'add_new' => 'Добавить кейс',
		'add_new_item' => 'Добавить новый кейс',
		'edit_item' => 'Редактировать',
		'new_item' => 'Новый кейс',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'cases'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-archive', // иконка в меню
		'menu_position' => 26, // порядок в меню
		'supports' => array( 'title', 'editor')
	);
	if (in_array("cases", get_field('sections','option'))) {
		register_post_type('cases', $args);
	}
}
add_filter( 'enter_title_here', 'cases_enter_title_here', 10, 2 );
function cases_enter_title_here( $text, $post ) {
	if ( $post->post_type === 'cases' ) {
		$text = 'Название кейса';
	}
	return $text;
}



//	Сотрудники
//	====================
add_action( 'init', 'post_type_team_goodini' );
 
function post_type_team_goodini() {
	$labels = array(
		'name' => 'Сотрудники',
		'singular_name' => 'Специалиcты',
		'menu_name' => 'Сотрудники',
		'all_items' => 'Все сотрудники',
		'add_new' => 'Добавить сотрудника',
		'add_new_item' => 'Добавить нового сотрудника',
		'edit_item' => 'Редактировать',
		'new_item' => 'Новый сотрудник',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'team'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-groups', // иконка в меню
		'menu_position' => 30, // порядок в меню
		'supports' => array( 'title', 'editor')
	);
	if (in_array("team", get_field('sections','option'))) {
		register_post_type('team', $args);
	}
}
add_filter( 'enter_title_here', 'team_enter_title_here', 10, 2 );
function team_enter_title_here( $text, $post ) {
	if ( $post->post_type === 'team' ) {
		$text = 'Введите ФИО сотрудника';
	}
	return $text;
}

//	Отзывы
//	====================
add_action( 'init', 'post_type_reviews_goodini' );
 
function post_type_reviews_goodini() {
	$labels = array(
		'name' => 'Отзывы',
		'all_items' => 'Все отзывы',
		'add_new' => 'Добавить отзыв',
		'add_new_item' => 'Добавить новый отзыв',
		'edit_item' => 'Редактировать',
		'new_item' => 'Новый отзыв',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'reviews'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-format-quote', // иконка в меню
		'menu_position' => 27, // порядок в меню
		'supports' => array( 'title', 'editor')
	);
	if (in_array("reviews", get_field('sections','option'))) {
		register_post_type('reviews', $args);
	}
}
add_filter( 'enter_title_here', 'reviews_enter_title_here', 10, 2 );
function reviews_enter_title_here( $text, $post ) {
	if ( $post->post_type === 'reviews' ) {
		$text = 'Введите имя автора отзыва';
	}
	return $text;
}

//	Новости
//	====================
add_action( 'init', 'post_type_news_goodini' );
 
function post_type_news_goodini() {
	$labels = array(
		'name' => 'Новости',
		'all_items' => 'Все новости',
		'add_new' => 'Добавить новость',
		'add_new_item' => 'Добавить новую новость',
		'edit_item' => 'Редактировать',
		'new_item' => 'Новая новость',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'news'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-format-aside', // иконка в меню
		'menu_position' => 40, // порядок в меню
        'show_in_rest' => true,
		'supports' => array( 'title', 'editor')
	);
	if (in_array("news", get_field('sections','option'))) {
		register_post_type('news', $args);
	}
}

//	Блог 
//	============================================================
add_action( 'init', 'post_type_blog_goodini' );
 
function post_type_blog_goodini() {
    
	$labels = array(
		'name' => 'Блог',
		'all_items' => 'Все записи',
		'add_new' => 'Добавить запись',
		'add_new_item' => 'Добавить новую запись',
		'edit_item' => 'Редактировать',
		'new_item' => 'Новая запись',
		'view_item' => 'Посмотреть на сайте',
		'search_items' => 'Искать',
		'not_found' =>  'Не найдено',
		'not_found_in_trash' => 'Корзина пуста',
	);
	$args = array(
		'rewrite' => array('slug' => 'blog'),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => 'dashicons-edit', // иконка в меню
		'menu_position' => 41, // порядок в меню
		'supports' => array( 'title', 'editor'),
        'show_in_rest' => true,
		'taxonomies' => array( 'blog_tags' ),
	);
	if (in_array("blog", get_field('sections','option'))) {
		register_post_type('blog', $args);
		register_taxonomy( 'blog_tags', [ 'blog' ], [ 
			'label'                 => '', // определяется параметром $labels->name
			'labels'                => [
				'name'              => 'Теги',
				'singular_name'     => 'Теги',
				'search_items'      => 'Искать',
				'all_items'         => 'Теги',
				'view_item'         => 'Смотреть тег',
				'parent_item'       => 'Родительский тег',
				'parent_item_colon' => 'Родительский тег:',
				'edit_item'         => 'Редактировать',
				'update_item'       => 'Обновить',
				'add_new_item'      => 'Добавить',
				'new_item_name'     => 'Имя нового тега',
				'menu_name'         => 'Теги',
				'not_found'         => 'Пусто',
			],
			'description'           => '', // описание таксономии
			'public'                => true,
			'hierarchical'          => false,

			'rewrite'               => false,
			'capabilities'          => array(),
			'meta_box_cb'           => 'post_tags_meta_box',
			'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		] );
	}
}

//	Cтраница настроек с произвольными полями
//	====================
add_action('acf/init', 'acf_op_init_goodini');
function acf_op_init_goodini() {
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array( 
		'page_title' => 	'Контакты',
		'icon_url' => 		'dashicons-location',
		'update_button' => __('Обновить', 'acf'),
		'updated_message' => __("Обновления сохранены", 'acf'),
		'position' => 		9,
		'redirect' 	=> 		false
	));
	
	if (in_array("clients", get_field('sections','option'))) {
	acf_add_options_page(array( 
		'page_title' => 	'Клиенты',
		'icon_url' => 		'dashicons-id',
		'update_button' => __('Обновить', 'acf'),
		'updated_message' => __("Обновления сохранены", 'acf'),
		'position' => 		38,
		'redirect' 	=> 		false
	));
	}
	
	if (in_array("partners", get_field('sections','option'))) {
	acf_add_options_page(array( 
		'page_title' => 	'Партнёры',
		'icon_url' => 		'dashicons-id-alt',
		'update_button' => __('Обновить', 'acf'),
		'updated_message' => __("Обновления сохранены", 'acf'),
		'position' => 		38,
		'redirect' 	=> 		false
	));
	}
	
	if (in_array("photo", get_field('sections','option'))) {
	acf_add_options_page(array( 
		'page_title' => 	'Галерея фото',
		'icon_url' => 		'dashicons-format-gallery',
		'update_button' => __('Обновить', 'acf'),
		'updated_message' => __("Обновления сохранены", 'acf'),
		'position' => 		38,
		'redirect' 	=> 		false
	));
	}
	
	if (in_array("twit", get_field('sections','option'))) {
	acf_add_options_page(array( 
		'page_title' => 	'Твиты',
		'icon_url' => 		'dashicons-twitter',
		'update_button' => __('Обновить', 'acf'),
		'updated_message' => __("Обновления сохранены", 'acf'),
		'position' => 		38,
		'redirect' 	=> 		false
	));
	}
	
	if (in_array("cases", get_field('sections','option'))) {
	acf_add_options_page(array( 
		'page_title' => 	'Страница кейсов',
		'icon_url' => 		'dashicons-twitter',
		'update_button' => __('Обновить', 'acf'),
		'updated_message' => __("Обновления сохранены", 'acf'),
		'position' => 		1,
		'parent_slug'	=> 'edit.php?post_type=cases',
		'redirect' 	=> 		false
	));
	}
	
	acf_add_options_page(array( 
		'page_title' => 		'Дизайн',
		'icon_url' => 			'dashicons-admin-appearance',
		'icon_url' => 			'dashicons-admin-customizer',
		'update_button' => 		__('Обновить', 'acf'),
		'updated_message' => 	__("Обновления сохранены", 'acf'),
		'position' => 			5,
		'redirect' 	=> 			false,
		//'parent_slug' => 		$parent['menu_slug'],
        'capability' => 		'design_cap',
	));
	
	acf_add_options_page(array( 
		'page_title' => 		'Код / Виджеты',
		'icon_url' => 			'dashicons-editor-code',
		'update_button' => 		__('Обновить', 'acf'),
		'updated_message' => 	__("Обновления сохранены", 'acf'),
		'position' => 			4,
		'redirect' 	=> 			false,
		//'parent_slug' => 		$parent['menu_slug'],
	));
	
	$parent = acf_add_options_page(array( 
		'page_title' => 		'Формы',
		'menu_title' => 		'Формы',
		'menu_slug' => 			'option',
		'icon_url' => 			'dashicons-email-alt',
		'update_button' => 		__('Обновить', 'acf'),
		'updated_message' => 	__("Обновления сохранены", 'acf'),
		'position' => 			3,
		'redirect' 	=> 			false,
	));
	
	acf_add_options_page(array(
		'page_title' => 		'Настройка заявок',
        'menu_title'    => 		'Настройка заявок',
		'icon_url' => 			'dashicons-admin-generic',
		'update_button' => 		__('Обновить', 'acf'),
		'updated_message' => 	__("Обновления сохранены", 'acf'),
		'position' => 			3,
		'redirect' 	=> 			false,
		'parent_slug' => 		$parent['menu_slug'],
	));
	
	acf_add_options_page(array(
		'page_title' => 		'Менеджер',
        'menu_title'    => 		'Менеджер',
		'icon_url' => 			'dashicons-admin-generic',
		'update_button' => 		__('Обновить', 'acf'),
		'updated_message' => 	__("Обновления сохранены", 'acf'),
		'position' => 			3,
		'redirect' 	=> 			false,
		'parent_slug' => 		$parent['menu_slug'],
	));
	
	if (in_array("bomb", get_field('admin-functions','option'))) {
	acf_add_options_page(array(
		'page_title' => 		'Бомбочка',
        'menu_title'    => 		'Бомбочка',
		'icon_url' => 			'dashicons-buddicons-community',
		'update_button' => 		__('Обновить', 'acf'),
		'updated_message' => 	__("Обновления сохранены", 'acf'),
		'position' => 			59,
		'redirect' 	=> 			false,
	));
	}
	
	if (in_array("docs", get_field('sections','option'))) {
	acf_add_options_page(array(
		'page_title' => 		'Документы',
        'menu_title'    => 		'Документы',
		'icon_url' => 			'dashicons-awards',
		'update_button' => 		__('Обновить', 'acf'),
		'updated_message' => 	__("Обновления сохранены", 'acf'),
		'position' => 			40,
		'redirect' 	=> 			false,
	));
	}
	
	acf_add_options_page(array(
		'page_title' => 		'Директор',
        'menu_title'    => 		'Директор',
		'update_button' => 		__('Обновить', 'acf'),
		'updated_message' => 	__("Обновления сохранены", 'acf'),
		'parent_slug'	=> 'edit.php?post_type=team',
		'position' => 		1,
		'redirect' 	=> 			false,
	));
}
}

add_action( '_user_admin_menu', 'change_menu_order' );
add_action( '_admin_menu', 'change_menu_order' );
function change_menu_order() {
  global $menu;
  $menu[8] = $menu[4];
  $menu[22] = $menu[5];
  unset($menu[4],$menu[5]);
}


add_filter( 'edit_post_link', function( $link, $post_id, $text )
{
    // Add the target attribute 
    if( false === strpos( $link, 'target=' ) )
        $link = str_replace( '<a ', '<a target="_blank" ', $link );

    return $link;
}, 10, 3 );


//	Поддержка изображений webp
//	====================
function webp_upload_mimes( $existing_mimes ) {
	$existing_mimes['webp'] = 'image/webp';
	return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );


//	Сохранение поста (записи) в wordpress при помощи сочетания клавиш ctrl + s
//	====================
add_filter('admin_footer', 'post_save_accesskey');
function post_save_accesskey(){
if( get_current_screen()->parent_base != 'edit' ) return;

?>
<script type="text/javascript">
jQuery(document).ready(function($){

	$(window).keydown(function(e){
		// событие ctrl+s - 83 код s
		if( e.ctrlKey && e.keyCode == 83 ){   
			e.preventDefault();
			$submit = $('[name="save"]').click();
		}
	});

});</script>

<?php } ?>