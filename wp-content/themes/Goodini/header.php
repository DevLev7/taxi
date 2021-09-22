<?
get_template_part('blocks/block', 'head');

// Вычисление Internet Explorer
if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || preg_match('~Trident/7.0(.*)?; rv:11.0~', $_SERVER['HTTP_USER_AGENT'])) {
	$ie = 'ie';
}

// Определение поддержки WEBP
if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) == true || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) == true ) {
	$webp = 'webp';
} else {
	$webp = 'no-webp';
}
$classBrowser = $webp.' '.$ie;
?>
<body <?php body_class($classBrowser); ?>>

	<script>
		if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
			window.location = 'microsoft-edge:' + window.location;
			setTimeout(function() {
				window.open('https://go.microsoft.com/fwlink/?linkid=2135547');
			}, 1);
		}
	</script>
	
	<script src="<?php echo THEME_JS_GOODINI; ?>jquery-3.5.1.min.js"></script>
	
	<script>
	document.addEventListener('DOMContentLoaded', function () {
    'use strict';
		$('body').addClass('body_load');
		setTimeout(function(){
			$('#modules').addClass('modules_load');
		}, 1000);
	});

	function displayWindowSize(){
		
		var windowWidth = window.innerWidth;
		var windowHeight = window.innerHeight;
		var ratio_default = 1.98; // Width = 1920
		var ratio_current = windowWidth / windowHeight;
		var coef_ratio = (ratio_default / ratio_current).toFixed(2);
		var coef_height = (Math.max(windowHeight / 775, 0.78)).toFixed(2);
		var coef_width = (Math.min(coef_ratio*1.07, 0.95)).toFixed(2);
		
		if(coef_ratio<1){		
			document.querySelector(":root").style.setProperty('--coef_r', coef_ratio);
		}
		if(coef_height<1){	
			document.querySelector(":root").style.setProperty('--coef_h', coef_height);
		}
		if(coef_width<1){	
			document.querySelector(":root").style.setProperty('--coef_w', coef_width);
		}
	}

    window.addEventListener("resize", displayWindowSize);
    
    displayWindowSize();
	</script>

	<?php the_field('script-body-start', 'option'); ?>
	
	<noindex>
	<div id="browser_support"><div class="wrap"><strong>Сайт может отображаться некорректно</strong>, поскольку вы просматриваете его <strong>с устаревшего браузера</strong> Internet Explorer (<span id="browser"></span>), который больше не поддерживается Microsoft.<br/>Рекомендуем обновить браузер на любой из современных: <a href="https://www.google.com/chrome" target="_blank" rel="nofollow">Google Chrome</a>, <a href="https://browser.yandex.ru/" target="_blank" rel="nofollow">Яндекс.Браузер</a>, <a href="https://www.mozilla.org/firefox/" target="_blank" rel="nofollow">Mozilla FireFox</a>.<div id="browser_support-close" title="Скрыть  предупреждение"><svg id="cancel" viewBox="0 0 129 129" width="28" height="28"><path d="M7.6 121.4c.8.8 1.8 1.2 2.9 1.2s2.1-.4 2.9-1.2l51.1-51.1 51.1 51.1c.8.8 1.8 1.2 2.9 1.2 1 0 2.1-.4 2.9-1.2 1.6-1.6 1.6-4.2 0-5.8L70.3 64.5l51.1-51.1c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0L64.5 58.7 13.4 7.6C11.8 6 9.2 6 7.6 7.6s-1.6 4.2 0 5.8l51.1 51.1-51.1 51.1c-1.6 1.6-1.6 4.2 0 5.8z"></path></svg></div></div></div>
	</noindex>
	
	<?	
	$header_type = get_field('header','option')['type']; 
	$header_design_arr = get_field('header','option')['design']; 
	$header_design = false;
	foreach( $header_design_arr as $header_design_key ){ $header_design .= $header_design_key.' '; };
	$main_menu = "";
	if ( has_nav_menu( 'main_menu' ) ){$main_menu = "main_menu";}
	?>
	
	<div class="page-frame <?php echo 'btn-effect-'.get_field('btn','option')['effect']; ?>">
		<div id="header-wrapper" class="type-<? echo $header_type; ?> <? echo $header_design; ?> <? echo $main_menu; ?>">
			<?php get_template_part('blocks/block',get_field('header','option')['type']);?>
			<?php get_template_part('blocks/block','menu-mobile');?>
		</div>
