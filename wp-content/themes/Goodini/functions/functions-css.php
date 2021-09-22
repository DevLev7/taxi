<?
$favicon_url = get_field('logos','option')['favicon'];
$favicon_info = new SplFileInfo($favicon_url);
$favicon_extension = $favicon_info->getExtension();
?>	
	<link rel="canonical" href="<?php echo home_url( $_SERVER['REDIRECT_URL'] ); ?>" />
	<link type="image/<?php echo $favicon_extension; ?>" href="<?php echo $favicon_url; ?>" rel="icon">
	<link type="image/<?php echo $favicon_extension; ?>" href="<?php echo $favicon_url; ?>" rel="shortcut icon">


<?php
if(get_field('fonts','option')['f1']['myseo'] && get_field('fonts','option')['f1']['font'] && get_field('fonts','option')['f1']['font-custom']){ 
	echo "Выберите шрифт для текста";
}
if(get_field('fonts','option')['f2']['myseo'] && get_field('fonts','option')['f2']['font'] && get_field('fonts','option')['f2']['font-custom']){ 
	echo "Выберите шрифт для заголовков";
}
?>
<?php if(get_field('fonts','option')['google_fonts']){ echo get_field('fonts','option')['google_fonts'];} ?>

<!-- Стили для ключевых элементов сайта-->
<style><?php
if(get_field('fonts','option')['f1']['myseo'] || get_field('fonts','option')['f2']['myseo']){ ?>
@font-face{font-family:"Museo Sans Cyrl";src:url("<?php echo THEME_FONTS_GOODINI; ?>/museo/museosanscyrl300.woff2") format("woff2"),url("<?php echo THEME_FONTS_GOODINI; ?>/museo/museosanscyrl300.woff") format("woff");font-weight:300;font-style:normal}@font-face{font-family:"Museo Sans Cyrl";src:url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_500.eot?#iefix");src:url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_500.eot?#iefix") format("eot"),url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_500.woff2") format("woff2"),url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_500.woff") format("woff"),url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_500.ttf") format("truetype");font-weight:500;font-style:normal}@font-face{font-family:"Museo Sans Cyrl";src:url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_700.eot?#iefix");src:url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_700.eot?#iefix") format("eot"),url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_700.woff2") format("woff2"),url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_700.woff") format("woff"),url("<?php echo THEME_FONTS_GOODINI; ?>/museo/MuseoSansCyrillic_700.ttf") format("truetype");font-weight:700;font-style:normal}
<?php } ?>

<?php 
# Шрифт текста
if(get_field('fonts','option')['f1']['myseo']){ 
	$f1 = '"Museo Sans Cyrl"';
	$f1w = get_field('fonts','option')['f1']['weight'];
	if(get_field('fonts','option')['f1']['weight-semi']){
		$f1ws = get_field('fonts','option')['f1']['weight-semi'];
	}else{
		$f1ws = get_field('fonts','option')['f1']['weight-bold'];
	}
	$f1wb = get_field('fonts','option')['f1']['weight-bold'];
}elseif(get_field('fonts','option')['google_fonts'] && get_field('fonts','option')['f1']['font']){ 
	$f1 = '"'.get_field('fonts','option')['f1']['font'].'"';
	$f1w = get_field('fonts','option')['f1']['weight'];
	if(get_field('fonts','option')['f1']['weight-semi']){
		$f1ws = get_field('fonts','option')['f1']['weight-semi'];
	}else{
		$f1ws = get_field('fonts','option')['f1']['weight-bold'];
	}
	$f1wb = get_field('fonts','option')['f1']['weight-bold'];
}elseif(get_field('fonts','option')['f1']['font-custom']){ 
	$f1 = '"'.get_field('fonts','option')['f1']['font-custom'].'"';
	$f1w = get_field('fonts','option')['f1']['weight'];
	if(get_field('fonts','option')['f1']['weight-semi']){
		$f1ws = get_field('fonts','option')['f1']['weight-semi'];
	}else{
		$f1ws = get_field('fonts','option')['f1']['weight-bold'];
	}
	$f1wb = get_field('fonts','option')['f1']['weight-bold'];
}else{ 
	$f1 = '"Source Sans Pro"';
	$f1w = '400';
	$f1wb = '600';
}

# Шрифт для заголовков
if(get_field('fonts','option')['f2']['myseo']){ 
	$f2 = '"Museo Sans Cyrl"';
	$f2wh1 = '500';
	$f2w = '700';
}elseif(get_field('fonts','option')['google_fonts'] && get_field('fonts','option')['f2']['font']){ 
	$f2 = '"'.get_field('fonts','option')['f2']['font'].'"';
	if(get_field('fonts','option')['f2']['weight-h1']){
		$f2wh1 = get_field('fonts','option')['f2']['weight-h1'];
	}else{
		$f2wh1 = get_field('fonts','option')['f2']['weight'];
	}
	$f2w = get_field('fonts','option')['f2']['weight'];
}elseif(get_field('fonts','option')['f2']['font-custom']){ 
	$f2 = '"'.get_field('fonts','option')['f2']['font-custom'].'"';
	if(get_field('fonts','option')['f2']['weight-h1']){
		$f2wh1 = get_field('fonts','option')['f2']['weight-h1'];
	}else{
		$f2wh1 = get_field('fonts','option')['f2']['weight'];
	}
	$f2w = get_field('fonts','option')['f2']['weight'];
}else{ 
	$f2 = '"Source Sans Pro"';
	$f2wh1 = '400';
	$f2w = '600';
}
if(get_field('fonts','option')['font-size']){
	$font_size = get_field('fonts','option')['font-size'].'px !important';
}else{
	$font_size = '18px !important';
}

# Кнопка
$btn_style 					= get_field('btn','option')['style'];
$btn_color_1 				= get_field('btn','option')['color-1'];
$btn_color_2 				= get_field('btn','option')['color-2'];
$btn_deg 					= get_field('btn','option')['deg'];
$btn_radius 				= get_field('btn','option')['radius'];
$btn_optionally_shadow	 	= false;
$btn_optionally_border 		= false;
$btn_color_shadow 			= get_field('btn','option')['color-shadow'];
$btn_color_border 			= get_field('btn','option')['color-border'];
$btn_color_text 			= get_field('btn','option')['color-text'];
$btn_weight 				= get_field('btn','option')['weight'];

if($btn_style=='linear'){
	$background = 'linear-gradient('.$btn_deg.'deg, '.$btn_color_1.', '.$btn_color_2.')';
}elseif($btn_style=='radial'){
	$background = 'radial-gradient(at top, '.$btn_color_1.', '.$btn_color_2.')';
}else{
	$background = $btn_color_1;
}

if($btn_radius=='circle'){
	$radius = '80';
}elseif($btn_radius=='round'){
	$radius = '7';
}else{
	$radius = '0';
}

if(in_array('shadow', get_field('btn','option')['optionally']) ) {
	$btn_optionally_shadow = true;
}
if(in_array('border', get_field('btn','option')['optionally']) ) {
	$btn_optionally_border = true;
}

$btn_after_style = '.btn::after{content:"";position:absolute;bottom:0;left:50%;width:80%;height:1px;transform:translateX(-50%);background:radial-gradient(ellipse at center,#ffffff,#ffffff00)}';
$btn_span_after_style = '.btn span::after{content:"";position:absolute;top:1px;left:50%;width:30%;height:1px;transform:translateX(-50%);background:radial-gradient(ellipse at center,#ffffffcf,#ffffff00)}';

$btn_after = '';
$btn_span_after = '';

if($btn_optionally_shadow && $btn_color_shadow && $btn_optionally_border && $btn_color_border){
	$shadow = '0 15px 30px -10px '.$btn_color_shadow.', 0 5px 0 '.$btn_color_border;
	$shadow_hover = '0 10px 30px -12px '.$btn_color_shadow.', 0 5px 0 '.$btn_color_border;
	$shadow_active = '0 10px 30px -15px '.$btn_color_shadow.', 0 5px 0 '.$btn_color_border;
	$btn_after = $btn_after_style;
	$btn_span_after = $btn_span_after_style;
}elseif($btn_optionally_shadow && $btn_color_shadow){
	$shadow = '0 15px 30px -10px '.$btn_color_shadow;
	$shadow_hover = '0 10px 30px -12px '.$btn_color_shadow;
	$shadow_active = '0 10px 30px -15px '.$btn_color_shadow;
}elseif($btn_optionally_border && $btn_color_border){
	$shadow = '0 4px 0 '.$btn_color_border;
	$shadow_hover = '0 4px 0 '.$btn_color_border;
	$shadow_active = '0 4px 0 '.$btn_color_border;
	$btn_after = $btn_after_style;
	$btn_span_after = $btn_span_after_style;
}else{
	$shadow = 'none';
	$shadow_hover = 'none';
	$shadow_active = 'none';
}

# Цвета
$dark 		= get_field('color','option')['dark'];
$dark_60	= get_field('color','option')['dark']."99";
$dark_80	= get_field('color','option')['dark']."cc";
$color 		= get_field('color','option')['color'];
$color_30	= get_field('color','option')['color']."4d";
$color2 	= get_field('color','option')['color2'];
$color_bg_1	= get_field('color','option')['color_bg-1'];
$color_bg_2	= get_field('color','option')['color_bg-2'];
$gray 		= get_field('color','option')['gray'];
$light 		= get_field('color','option')['light'];
$accent 	= get_field('color','option')['accent'];

?>
:root{ --f1: <?php echo $f1; ?>, sans-serif; --f2: <?php echo $f2; ?>, sans-serif; --f3: georgia, serif; --f1w: <?php echo $f1w; ?>; --f1ws: <?php echo $f1ws; ?>; --f1wb: <?php echo $f1wb; ?>; --f2w: <?php echo $f2w; ?>; --f2wh1: <?php echo $f2wh1; ?>; --dark: <?php echo $dark; ?>; --dark_60: <?php echo $dark_60; ?>; --dark_80: <?php echo $dark_80; ?>; --color: <?php echo $color; ?>; --color_30: <?php echo $color_30; ?>; --color2: <?php echo $color2; ?>; --gray: <?php echo $gray; ?>; --light: <?php echo $light; ?>; --accent: <?php echo $accent; ?>; --color_bg_1: <?php echo $color_bg_1 ? $color_bg_1 : $color ; ?>; --color_bg_2: <?php echo $color_bg_2 ? $color_bg_2 : $color2 ; ?>; --btn_color_1: <?php echo $btn_color_1 ; ?>; --btn_color_text: <?php echo $btn_color_text ; ?>; } html{font-size:<?php echo $font_size; ?>;font-family:<?php echo $f1; ?>;} body{font-family:<?php echo $f1; ?>;}h1,h2,h3,h4,h5,h6{font-family:<?php echo $f2; ?> !important;}.bombbtn {background: <? echo $background; ?>;box-shadow: 0 15px 30px -10px <?php echo $btn_color_1; ?>;}.btn, .btn:visited, .btn:focus, .btn:active { background: <? echo $background; ?>; box-shadow: <? echo $shadow; ?>; border-radius: <? echo $radius; ?>px; color: <? echo $btn_color_text; ?>; font-weight: <? echo $btn_weight; ?>; border: 0;} <?php echo $btn_after; ?> <?php echo $btn_span_after; ?> .btn:hover { box-shadow: <? echo $shadow_hover; ?>; color: <? echo $btn_color_text; ?>; font-weight: <? echo $btn_weight; ?>; } .btn:active { box-shadow: <? echo $shadow_active; ?>; color: <? echo $btn_color_text; ?>; } .button svg {fill:<? echo $btn_color_text; ?>;} blockquote { background: <?php echo $accent; ?>; } .style-bg-light, #catalog, #manager { background-color: <?php echo $light; ?>; } #footer, .style-bg-dark, .active.mobile-icon, #footer-2 { background-color: <?php echo $dark; ?>; } .form-wrap .form-head, .slick-arrow { background: <?php echo $color; ?>; } a, a:focus, a:active { color: <?php echo $color; ?>; border-bottom-color: <?php echo $color; ?>; } .list ul li::before { border: 2px solid <?php echo $color; ?>; } .text_color, #header.header-1 .menu .menu-item a:hover, #header.header-1 .menu .current-menu-item a, #header.header-1 .menu .current-menu-parent a, #header.header-1 .menu .current-menu-ancestor a, .mobile .menu .menu-item .sub-menu .menu-item a { color: <?php echo $color; ?>; } .agreement-check input:checked + .agreement-label .check::before { border: 2px solid <?php echo $color; ?>; } .js-keyboard-active *:focus {outline: 2px solid <?php echo $color_30; ?>;transition-duration: 0s !important;}
</style>