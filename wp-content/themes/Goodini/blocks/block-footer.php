	<footer id="footer">
		<div class="container-fluid">
			<div class="row">			
				<div class="col-lg-2 col-ml-3 col-sm-4 col-12 col">
					<div class="footer-logo <?php echo !get_field('logos','option')['footer']? "no-logo" : "" ; ?>">
						<a href="<?php echo HOME_URI; ?>" class="img_link">
							<img src="<?php echo get_field('logos','option')['footer']? get_field('logos','option')['footer'] : get_field('logos','option')['header'] ; ?>" alt="Логотип <?php echo get_field('company', 'option')['brand']; ?>" />
						</a>
					</div>
					<div class="descriptor">
						<?php the_field('descriptor', 'option'); ?>
					</div>
					<div id="copyright" class="copy-white">
						<? 
						/*доступные классы: 
							copy-black - черные буквы и белая подложка 
							copy-white - белые буквы и черная подложка 
							copy-inline - display: inline-block
							copy-link - без подложки
							copy-right - позиционирование справа
						*/?>
						<?php get_template_part('template-parts/copyright');?>
					</div>
				</div>
				<div class="col-lg-3 col-ml-3 col-sm-4 col-12 col main">
					<? if ( has_nav_menu( 'footer_menu-1' ) ){?>
					<div class="footer-head">
						<?php 
						$id = get_nav_menu_locations()['footer_menu-1'];
						$menu = wp_get_nav_menu_object( $id );
						echo get_field('menu-name-1', $menu);
						?>
					</div>
					<div class="footer-menu">
						<?php wp_nav_menu( array(
							'theme_location' => 'footer_menu-1',
							'fallback_cb' => ''
						) ); ?>
					</div>
					<? } ?>
				</div>
				<div class="col-lg-4 col-ml-3 col-sm-8 col-12 col">
					<? if ( has_nav_menu( 'footer_menu-2' ) ){?>
					<div class="footer-head">
						<?php 
						$id = get_nav_menu_locations()['footer_menu-2'];
						$menu = wp_get_nav_menu_object( $id );
						echo get_field('menu-name-2', $menu);
						?>
					</div>
					<div class="footer-menu">
						<?php wp_nav_menu( array(
							'theme_location' => 'footer_menu-2',
							'fallback_cb' => ''
						) ); ?>
					</div>
					<? } ?>
				</div>
				<div class="col-lg-3 col-ml-3 col-sm-8 col-12 col" itemscope itemtype="http://schema.org/Organization">
					<div class="footer-head">
						Контакты
					</div>
					<ul class="footer-contacts">
						<li itemprop="name"><?php echo get_field('company', 'option')['brand']; ?></li>
						<li itemprop="telephone"><?php echo do_shortcode('[phone]') ?> <span data-src="#popup-call" class="link" data-fancybox="">Обратный звонок</span>	</li>
						<li itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<?php if ( is_plugin_active( 'multycity/multycity.php' ) ) { ?>
							<span itemprop="addressLocality">г. <?php echo do_shortcode( '[city_i]'); ?>, </span>
							<?php  } ?>
							<span itemprop="streetAddress"><?php echo do_shortcode('[adress]'); ?></span></li>
						<li><?php echo do_shortcode('[email]'); ?></li>
					</ul>
					<?php get_template_part('template-parts/social-icons');?>
				</div>
			</div>
		</div>
	</footer>
	
	<footer id="footer-2">
		<div class="container-fluid">
			<div class="b2b-copy-inline">
			</div>
			<?php echo get_field('company', 'option')['name'] ? get_field('company', 'option')['name'].'<span class="sepa">/</span>' : "" ; ?> 
			<?php echo get_field('company', 'option')['ogrn'] ? 'ОГРН '.get_field('company', 'option')['ogrn'].'<span class="sepa">/</span>' : "" ; ?> 
			<?php echo get_field('company', 'option')['inn'] ? 'ИНН '.get_field('company', 'option')['inn'].'<span class="sepa">/</span>' : "" ; ?> 
			Сайт не является публичной офертой. <nobr><?php echo date('Y'); ?>г.</nobr><span class="sepa">/</span>
			<a href="<?php echo get_privacy_policy_url(); ?>">Политика конфиденциальности</a>
		</div>
	</footer>