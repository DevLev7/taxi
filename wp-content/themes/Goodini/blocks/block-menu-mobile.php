	<div class="mobile menus">
		<?php if ( is_plugin_active( 'multycity/multycity.php' ) ) { ?>
		<div class="city">
			Ваш город:
			<span class="city_span" title="Изменить город">
				<?php echo do_shortcode( '[city_i]' ) ?>
			</span>
		</div>
		<?php } ?>
		
		<ul class="contacts ct">
			<li><?php echo do_shortcode('[phone]') ?></li>
			<li><span data-src="#popup-call" class="btn" data-fancybox=""><span>Обратный звонок</span></span></li>
			<li><?php echo do_shortcode('[adress]'); ?></li>
			<li><?php echo do_shortcode('[email]'); ?></li>
		</ul>
		
		
		<div class="flex">
			<div class="flexcolumn">
				<nav class="menu__nav">
					<?php wp_nav_menu( array(
						'theme_location' => 'main_menu',
						'fallback_cb' => ''
					) ); ?>
				</nav>	
			</div>
		</div>
			
		<ul class="social ct">
		
		<?php if(get_field('in', 'option')){ ?>
			<li class="soc in"><a href="<?php the_field('in', 'option'); ?>"> <svg xmlns="http://www.w3.org/2000/svg" ><path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" /></svg></a></li>
		<?php } ?>
		
		<?php if(get_field('yt', 'option')){ ?>
			<li class="soc yt"><a href="<?php the_field('yt', 'option'); ?>"> <svg xmlns="http://www.w3.org/2000/svg" ><path d="M10 15l5.2-3L10 9v6m11.56-7.83c.13.47.22 1.1.28 1.9.07.8.1 1.5.1 2.1L22 12c0 2.2-.16 3.8-.44 4.83-.25.9-.83 1.48-1.73 1.73-.47.13-1.33.22-2.65.28-1.3.07-2.5.1-3.6.1L12 19c-4.2 0-6.8-.16-7.83-.44-.9-.25-1.48-.83-1.73-1.73-.13-.47-.22-1.1-.28-1.9-.07-.8-.1-1.5-.1-2.1L2 12c0-2.2.16-3.8.44-4.83.25-.9.83-1.48 1.73-1.73.47-.13 1.33-.22 2.65-.28 1.3-.07 2.5-.1 3.6-.1L12 5c4.2 0 6.8.16 7.83.44.9.25 1.48.83 1.73 1.73z"/></svg></a></li>
		<?php } ?>
		
		<?php if(get_field('fb', 'option')){ ?>
			<li class="soc fb"><a href="<?php the_field('fb', 'option'); ?>"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24"><path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" /></svg></a></li>
		<?php } ?>
		
		<?php if(get_field('vk', 'option')){ ?>
			<li class="soc vk"><a href="<?php the_field('vk', 'option'); ?>"><svg xmlns="http://www.w3.org/2000/svg"><path d="M20.8 7.74c.13-.42 0-.74-.62-.74h-2.02a.87.87 0 00-.88.57s-1.03 2.51-2.49 4.15c-.48.47-.69.62-.95.62-.13 0-.34-.15-.34-.58V7.74c0-.51-.12-.74-.55-.74H9.76c-.32 0-.51.24-.51.47 0 .48.75.6.8 1.97v2.98c0 .66-.12.78-.37.78-.68 0-2.36-2.53-3.35-5.41-.2-.56-.39-.79-.91-.79H3.39c-.57 0-.69.27-.69.57 0 .54.69 3.2 3.2 6.72C7.57 16.7 9.93 18 12.08 18c1.29 0 1.45-.29 1.45-.79v-1.82c0-.57.12-.69.53-.69.3 0 .81.15 2.01 1.3 1.38 1.38 1.6 2 2.38 2h2.02c.58 0 .87-.29.71-.86-.18-.57-.84-1.4-1.71-2.38-.47-.55-1.18-1.15-1.4-1.46-.3-.38-.21-.55 0-.9 0 0 2.47-3.47 2.73-4.66z"/></svg></a></li>
		<?php } ?>
		
		</ul>
	</div>

	<div class="mobile-icon hidden-xl hidden-lg">
		<div class="open">
			<span class="cls"></span>
			<span></span>
			<span class="cls"></span>
		</div>
	</div>