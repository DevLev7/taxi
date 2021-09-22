<?
/*
	==============================
	
	УВАЖАЕМЫЕ РАЗРАБОТЧИКИ!
	Добавляйте код, в том числе: <meta>, метрику, аналитику и прочее, через админку "Код / Виджеты"
	
	==============================
*/
?>
<?php 
$posttype = $post->post_type; 
$postslug = $post->post_name; 

// ID страниц
$page_ID_current = get_the_ID();
$page_ID_contacts = get_page_by_title('Контакты')->ID;
$page_ID_privacy = get_page_by_title('Политика конфиденциальности')->ID;

// Наименование бренда
if(get_field('company', 'option')['brand']){
	$brand = get_field('company', 'option')['brand'];
}else{
	$brand = get_bloginfo('name');
}

// Картинка мессенджеров
if(get_field('group')['hero-bg-sm']){
	$ogimage = get_field('group')['hero-bg-sm'];
}elseif(get_field('logos','option')['messenger']){
	$ogimage = get_field('logos','option')['messenger'];
}else {
	$ogimage = '';
}
?>
<!doctype html>
<html lang="ru-RU">
<head>
<?php if (is_plugin_active('multycity/multycity.php')) {
	
	$title = do_shortcode( '[meta_title]' );
	$description = do_shortcode( '[meta_description]' );
	
	if(!$title || $title == "Посмотри в seo") {
		if($page_ID_current == $page_ID_contacts) {
			$title = 'Контакты '.$brand.' '.do_shortcode('[city_gde]');
			$description = 'Контакты '.$brand.' '.do_shortcode('[city_gde]').'. Звоните '.do_shortcode('[city_ph]').', наш адрес '.do_shortcode('[city_adr]');
		}
		if($page_ID_current == $page_ID_privacy) {
			$title = 'Политика конфиденциальности - '.$brand;
			$description = 'Политика конфиденциальности - '.$brand;
		}
	}
	?>	
	<title><?php echo $title ?></title>
	<meta name="description" content="<?php echo $description ?>"/>
		
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo $title ?>" />
	<meta name="twitter:description" content="<?php echo $description ?>" />
	
	<meta property="og:locale" content="ru_RU" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php echo $title ?>" />
	<meta property="og:description" content="<?php echo $description ?>" />
	<meta property="og:url" content="<?php echo home_url( $_SERVER['REDIRECT_URL'] );?>" />
	<meta property="og:site_name" content="<?php echo $brand;?> - <?php echo do_shortcode('[city_ph]');?>" />
	
<?php }else{ ?>	
	<title><?php wp_title(); ?></title>
<?php }	?>
	<meta property="og:image" content="<?php echo $ogimage; ?>">
	
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="cmsmagazine" content="81f3fc50cb9181fe0f99b77b756d5aa0" />
	<?php get_template_part('functions/functions','css');?>


	<link rel="stylesheet" type="text/css" href="<?php echo THEME_CSS_GOODINI; ?>base.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_CSS_GOODINI; ?>modules.css" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_CSS_GOODINI; ?>blocks.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_CSS_GOODINI; ?>anim.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> 
	
	<?php wp_head(); ?>
	
	<?php the_field('script-head', 'option'); ?>
</head>
