<?php get_header(); ?>
<?php 
if ( !is_page_template(get_option( 'page_on_front' )) ) {
$hero_bg = get_field('group', get_option( 'page_on_front' ))['hero-bg']['url'];
$hero_bg_micro = get_field('group', get_option( 'page_on_front' ))['hero-bg']['sizes']['micro-item'];
?>
	<section id="hero" 
	class="<?php echo get_field('group', get_option( 'page_on_front' ))['hero-image'] ? "hero-image" : ""; ?>" 
	<?php echo $hero_bg ? 'style="background-image: url('.$hero_bg.'), url('.$hero_bg_micro.')"' : '' ; ?>
	>
<?php }else{ ?>
	<section id="hero" 	class="hero-image">	
<?php } ?>	
<img class="taxi lazy" data-src="<?php echo THEME_IMAGES; ?>/taxi.png"  >
		<div class="container-fluid">
			<div class="row">
				<div class=" col-12">
					<div class="main">
						<div class="wrap">
							<div class="header list">
								<h1>Спасибо <span class="white">за зявку</span> </h1>
								<h4>Ожидайте звонка менеджера</h4>
							</div>
							<div class="button border">
                        <a href="<?php echo home_url().'/';?>" class="btn" class="ct">
							<div class="btn-rad-f">
								<span>Перейти на главную</span>
								<div class="btn_icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="20.687" height="20.687" viewBox="0 0 20.687 20.687">
											<path id="Контур_1" data-name="Контур 1" d="M13.128,0V13.128H0" transform="translate(0 10.343) rotate(-45)" fill="none" stroke="#f9c14a" stroke-width="3"/>
											</svg>
								</div>							
							
						</div>
                    </a>
                </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>