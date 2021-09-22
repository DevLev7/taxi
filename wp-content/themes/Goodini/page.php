<?php get_header(); ?>
<?php 
$hero_bg = get_field('group')['hero-bg']['url'];
$hero_bg_micro = get_field('group')['hero-bg']['sizes']['micro-item'];
?>

<?php 
	// Определение мобильного устройства
	// Подключение и иниализация
	get_template_part('functions/Mobile_Detect');
	$detect = new Mobile_Detect;
?>
<?php if( !$detect->isMobile() && !$detect->isTablet() ){ ?>

	<section 
	id="hero" 
	class="<?php echo get_field('group')['hero-image'] ? "hero-image" : ""; ?>" 
	<?php echo $hero_bg ? 'style="background-image: url('.$hero_bg.'), url('.$hero_bg_micro.')"' : '' ; ?>
	>
	
<?php }else{ ?>

	<?php if(get_field('group')['hero-bg-sm']){ ?>
	
		<section id="hero">
		
	<?php }else{ ?>
	
		<section 
		id="hero" 
		class="2<?php echo get_field('group')['hero-image'] ? "hero-image" : ""; ?>" 
		<?php echo $hero_bg ? 'style="background-image: url('.$hero_bg.'), url('.$hero_bg_micro.')"' : '' ; ?>>
		
	<?php } ?>
	
<?php } ?>

		<?php if(get_field('group')['hero-image']){ ?>
		<div class="hero-image-sm" style="background-image: url(<?php echo get_field('group')['hero-bg']; ?>)">
			<div class="image">
				<img src="<?php echo get_field('group')['hero-image']; ?>">
			</div>
			<?php if(get_field('group')['hero-name']){ ?>
			<div class="name-block">
				<div class="name"><?php echo get_field('group')['hero-name']; ?></div>
				<div class="position"><?php echo get_field('group')['hero-position']; ?></div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 col-lg-8 col-ml-7 col-12">
					<div class="main">
						<div class="wrap">
						
							<? if ( has_nav_menu( 'main_menu' ) ){?>
							<div id="breadcrumbs">
								<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
							</div>
							<? } ?>
							
							<?php if( $detect->isMobile() || $detect->isTablet() ){ ?>
							<div class="image">
								<img src="<?php echo get_field('group')['hero-bg-sm']; ?>">
							</div>
							<?php } ?>
						
							<div class="header list ml3">
								<?php the_field('hero-header'); ?>
							</div>
							
							<?php if(get_field('hero-desc')){ ?>
							<div class="intro list <?php echo get_field('group')['hero-btn'] ? "" : "none-hero-btn" ; ?>">
								<?php the_field('hero-desc'); ?>
							</div>
							<?php } ?>
							
							<?php if(get_field('benefits')){ 
							$benefits_count = count(get_field('benefits'));	?>
							<ul class="benefits benefits-<?php echo $benefits_count; ?> ">
							<?php 					
							while( have_rows('benefits') ): the_row(); 
								$icon = get_sub_field('icon');
								$text = get_sub_field('text');
								?>	
								<li>
									<?php if($icon){ ?>
									<span class="icon"><img src="<?php echo $icon; ?>" alt="<?php echo $text; ?>"></span>
									<?php } ?>
									<span class="text"><?php echo $text; ?></span>
								</li>
							<?php 
							endwhile;
							wp_reset_query();
							?>
							</ul>
							<?php } ?>
							
							<?php if(get_field('group')['hero-btn']){ ?>
							<div class="button">
								 <div data-src="#popup-order" data-fancybox class="btn" anim="ripple"><span><?php echo get_field('group')['hero-btn']; ?></span></div>
								 <div class="hero-btn-desc"><?php echo get_field('group')['hero-btn-desc']; ?></div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php if(get_field('group')['hero-image']){ ?>
				<div class="col-xl-5 col-lg-4 col-ml-5 col-md-5 hidden-sm hidden-xs">
					<div class="hero-image">
						<div class="image">
							<img src="<?php echo get_field('group')['hero-image']; ?>">
						</div>
						<?php if(get_field('group')['hero-name']){ ?>
						<div class="name-block">
							<div class="name"><?php echo get_field('group')['hero-name']; ?></div>
							<div class="position"><?php echo get_field('group')['hero-position']; ?></div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	
<?

//	Формирует массив $building_rows названий используемых секций
$building_rows = array();
foreach( get_field('building') as $building_row ):
	$building_rows[] = $building_row['acf_fc_layout'];
endforeach;


//	Клиенты
if (!in_array("clients", $building_rows) && in_array("clients", get_field('sections','option')) && get_field('sections-setting','option')['clients'] && get_field('sections-setting','option')['clients-top']){ 
	get_template_part('blocks/block','clients');
}

//	Партнёры
if (!in_array("partners", $building_rows) && in_array("partners", get_field('sections','option')) && get_field('sections-setting','option')['partners'] && get_field('sections-setting','option')['partners-top']){ 
	get_template_part('blocks/block','partners');
}

//	Твиты
if (in_array("twit", get_field('sections','option'))){ 
	get_template_part('blocks/block','twit');
}

?>

<script>
// Добавляет элемент #undo_header_abs в случае отстутствия первого экрана с id="hero" и шапки с абсолютным позиционированием
//==============	

	var header_abs = $(".header-absolute");
	if(header_abs.length){
		
		var header_abs_height = header_abs.outerHeight();
		var header_abs_height_padding = 0;
		var search_hero = $("#hero").length;
		if(header_abs_height > 0){
			if(search_hero == 0){
				$('#header-wrapper').after('<div id="undo_header_abs"></div>');
				$('#undo_header_abs').css('height',header_abs_height+'px');
			}else{
				$('#hero').css('padding-top',header_abs_height+'px');
			}
		}
	
	}
	
// Определение цвета #hero и #undo_header_abs
//==============	

	var header_white = $("#header-wrapper.header-white").length;
	if(header_white > 0){
		$('#hero').addClass('hero-white');
		$('#undo_header_abs').addClass('black');
	}
</script>
	
	<div id="modules">

<?php

if (have_posts()) : while (have_posts()) : the_post();

	// Конструктор страниц
	if( have_rows('building') ): 
	$rows = 1;
		// Циклы конструктора
		while ( have_rows('building') ) : the_row(); 
		$building_row = 'sec-'.$rows++;
		set_query_var( 'building_row', $building_row );

			// Баннеры-карточки
			if( get_row_layout() == 'banner-cart' ) {
				get_template_part('modules/section', 'banner-cart');
			}

			// Содержимое
			if( get_row_layout() == 'columns' ) {
				get_template_part('modules/section', 'columns');
			}

			// Буллиты
			if( get_row_layout() == 'bullets' ) {
				get_template_part('modules/section', 'bullets');
			}

			// Списки
			if( get_row_layout() == 'lists' ) {
				get_template_part('modules/section', 'lists');
			}
			
			// Карточки
			if( get_row_layout() == 'cards' ) {
				get_template_part('modules/section', 'cards');
			}

			// Спойлеры
			if( get_row_layout() == 'faq' ) {
				get_template_part('modules/section', 'spoiler');
			}

			// Файлы
			if( get_row_layout() == 'files' ) {
				get_template_part('modules/section', 'files');
			}
			
			// Директор
			if( get_row_layout() == 'boss' ) {
				get_template_part('modules/section', 'boss');
			}
			
			// Фото
			if( get_row_layout() == 'gallery' ) {
				get_template_part('modules/section', 'gallery');
			}

			// Видео
			if( get_row_layout() == 'videos' ) {
				get_template_part('modules/section', 'videos');
			}
			
			// Каталог
			if( get_row_layout() == 'catalog' ) {
				get_template_part('modules/section', 'catalog');
			}
			
			// Отзывы
			if( get_row_layout() == 'reviews' ) {
				get_template_part('modules/section', 'reviews');
			}
			
			// Партнёры
			if( get_row_layout() == 'partners' ) {
				get_template_part('modules/section', 'partners');
			}
			
			// Клиенты
			if( get_row_layout() == 'clients' ) {
				get_template_part('modules/section', 'clients');
			}
			
			// Кейсы
			if( get_row_layout() == 'cases' ) {
				get_template_part('modules/section', 'cases');
			}

			// Сотрудники
			if( get_row_layout() == 'team' ) {
				get_template_part('modules/section', 'team');
			}

			// FAQ
			if( get_row_layout() == 'faq-list' ) {
				get_template_part('modules/section', 'faq');
			}

			// Контакты
			if( get_row_layout() == 'contacts' ) {
				get_template_part('modules/section', 'contacts');
			}

			// Диалоги
			if( get_row_layout() == 'dialogs' ) {
				get_template_part('modules/section', 'dialogs');
			}

			// Произвольные блоки
			if( get_row_layout() == 'custom' ) {
				get_template_part('modules/section', 'custom');
			}

			// Произвольные секции
			if( get_row_layout() == 'custom-section' ) {
				get_template_part('modules/section', 'custom-section');
			}

		endwhile;
	endif;

endwhile; endif;
?>

	</div>

	<div id="not_modules">
<? 

//	Отзывы
if (!in_array("reviews", $building_rows) && (get_field('reviews-setting','option')['every']==true) && in_array("reviews", get_field('sections','option')) && !in_array(get_the_ID(),get_field('reviews-setting','option')['disable'])){ 
	get_template_part('blocks/block','reviews');
}

//	Директор
if (!in_array("boss", $building_rows) && get_field('boss-image','option') && get_field('boss-desc','option')['text'] && !in_array(get_the_ID(),get_field('boss-setting','option')['exclude'])){ 
	get_template_part('blocks/block','boss');
}

//	Сотрудники
if (!in_array("team", $building_rows) && (get_field('team-setting','option')['every']==true) && in_array("team", get_field('sections','option')) && !in_array(get_the_ID(),get_field('team-setting','option')['disable'])){ 
	get_template_part('blocks/block','team');
}

//	Диалоги
if (!in_array("dialogs", $building_rows) && (get_field('dialogs-setting','option')['every']==true) && in_array("dialogs", get_field('sections','option')) && !in_array(get_the_ID(),get_field('dialogs-setting','option')['disable'])){ 
	get_template_part('blocks/block','dialogs');
}

//	Документы
if (in_array("docs", get_field('sections','option')) && !in_array(get_the_ID(),get_field('docs-setting','option')['exclude'])){ 
	get_template_part('blocks/block','docs');
}

//	Клиенты
if (!in_array("clients", $building_rows) && in_array("clients", get_field('sections','option')) && get_field('sections-setting','option')['clients'] && !get_field('sections-setting','option')['clients-top']){ 
	get_template_part('blocks/block','clients');
}

//	FAQ
if (!in_array("faq-list", $building_rows) && in_array("faq", get_field('sections','option')) && get_field('sections-setting','option')['faq']){ 
	get_template_part('blocks/block','faq');
}

//	Партнёры
if (!in_array("partners", $building_rows) && in_array("partners", get_field('sections','option')) && get_field('sections-setting','option')['partners'] && !get_field('sections-setting','option')['partners-top']){ 
	get_template_part('blocks/block','partners');
}

//	Филиалы
if(get_field('offices', 'option') && get_field('offices-header', 'option')){ 
	get_template_part('blocks/block','offices');
}

//	Менеджер
	get_template_part('blocks/block','manager');

//	Смежные статьи
if(in_array("similar", get_field('sections','option')) && !in_array(get_the_ID(),get_field('similar-setting','option')['disable'])){ 
	get_template_part('blocks/block','similar');
}

?>
	</div>
			

<?php get_footer(); ?>