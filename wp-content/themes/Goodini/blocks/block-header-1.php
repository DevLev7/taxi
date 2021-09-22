
	<header id="header">
		<div class="container-fluid">
			<div class="row mainrow">
				<div class="logo">
					<a href="<?php echo HOME_URI; ?>" class="img_link">
						<img src="<?php echo get_field('logos','option')['header']; ?>" alt="Логотип <?php echo get_field('company', 'option')['brand']; ?>" />
					</a>
				</div>
				<div class="content">
					<div class="row">
						<div class="col descriptor">
							<div class="text">
								<?php the_field('descriptor', 'option'); ?>
							</div>
						</div>
						<?php if ( is_plugin_active( 'multycity/multycity.php' ) ) { ?>
						<div class="col hidden-sm hidden-xs">
							<?php get_template_part('template-parts/multycity'); ?>
						</div>
						<? } ?>
						<div class="col contacts">
							<?php echo do_shortcode('[phone]') ?>
						</div>
						<div class="col button">
							<button data-src="#popup-call" class="btn" data-fancybox="" anim="ripple" title="Оставьте свой номер и мы перезвоним вам">
								<svg viewBox="0 0 24 24">
									<path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"></path>
								</svg>
								<span>Заказать звонок</span>
							</button>
						</div>
					</div>
					<div class="menu_block">
						<?php wp_nav_menu( array(
							'theme_location' => 'main_menu',
							'fallback_cb' => ''
						) ); ?>
					</div>	
				</div>
			</div>
		</div>
	</header>