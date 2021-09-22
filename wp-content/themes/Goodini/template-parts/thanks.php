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
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 col-lg-8 col-ml-7 col-md-7 col-12">
					<div class="main">
						<div class="wrap">
							<div class="header list">
								<?php the_content(); ?>
							</div>
							<div class="button">
								<button type="button" onclick="history.back();" class="btn"><span>Вернуться назад</span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>