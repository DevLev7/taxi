<?
/*
	==============================
	
	УВАЖАЕМЫЕ РАЗРАБОТЧИКИ!
	Добавляйте код, в том числе: <meta>, метрику, аналитику и прочее, через админку "Код / Виджеты"
	
	==============================
*/
?>
		<?php get_template_part('blocks/block','footer'); ?>
	
		<div class="scrollup"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg></span><span class="tooltip">Наверх</span></div>

	</div>	
	<?php 
	/*
		конец .page-frame
		============================== 
	*/?>

	<?php edit_post_link('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M153.28 448.644L512 89.925 422.075 0 63.356 358.718l-50.86 123.045H.17v29.828L0 512l.64-.266h436.104v-29.97H73.153l80.128-33.12zm268.794-406.26l47.54 47.54-45.983 45.984-47.54-47.54 45.983-45.984zM354.9 109.56l47.54 47.54-22.546 22.546-47.54-47.54L354.9 109.56zm-43.74 43.74l47.54 47.54-205.314 205.312-47.54-47.54L311.16 153.3zM86.364 381.513l44.122 44.122-75.208 31.086 31.086-75.208zm184.544 30.847h160.844v29.97H270.908z"/></svg>', '<button id="edit-button">', '</button>'); ?>
	
	<?php 
	//	Формирует массив $building_rows названий используемых секций
	$building_rows = array();
	if(is_array(get_field('building'))){
		foreach( get_field('building') as $building_row ):
			$building_rows[] = $building_row['acf_fc_layout'];
		endforeach;
	}
	
	//	Подробности карточек товаров каталога
	if (in_array("catalog", $building_rows) && in_array("catalog", get_field('sections','option'))){ 
		get_template_part('template-parts/cart-wrap');
	}
	
	//	Всплывающие окна
	get_template_part('blocks/block','popup');
	
	// Бомбочка
	if (in_array("bomb", get_field('admin-functions','option'))){ 
		get_template_part('blocks/block','bomb');
	?>		
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_CSS_GOODINI; ?>bomb.css" />
	<?php
	}
	
	//	Предупреждения
	if($_SERVER['REMOTE_ADDR'] == "37.77.132.50"){
	get_template_part('blocks/block','warning');
	}
	?>
	
	
	
	<!-- SCRIPTS_dev -->	
	<script defer src="<?php echo THEME_JS_GOODINI; ?>base.min.js"></script>
	<script defer src="<?php echo THEME_JS_GOODINI; ?>validate.min.js"></script>
	<?php 
	// Слайдер для партнеров и клиентов
	if (in_array("partners", $building_rows) || in_array("partners", get_field('sections','option')) || in_array("clients", $building_rows) || in_array("clients", get_field('sections','option'))){  
	?>
	<script src="<?php echo THEME_JS_GOODINI; ?>flickity.pkgd.min.js"></script>
	<script>
		$(".logos-row .slider").flickity({wrapAround:!0,autoPlay:2500,freeScroll:!0,lazyLoad:3,prevNextButtons:!1,pageDots:!1});
	</script>
	<?php } ?>
	<?php echo '<script>var hashCache = "'.strrev(base64_encode($_SERVER['HTTP_HOST'])).'";</script>'; ?>
	
	
	
	<!-- SCRIPTS_wp -->
	
	<?php wp_footer(); ?>
	
	
	<!-- SCRIPTS_custom -->
	
	<?php the_field('script-body-end', 'option'); ?>

</body>
</html>