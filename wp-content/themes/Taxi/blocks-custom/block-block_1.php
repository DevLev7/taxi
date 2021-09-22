<div id="hero" >
	<div class="circle1"></div>
	<div class="circle2 "></div>
	<div class="podloj">
	<?php 
						while( have_rows('icon_rep') ): the_row(); 
							$img = get_sub_field('img');
							
							
					?>
					<div class="image">
					<img class="lazy" data-src="<?php echo $img; ?>" alt="">
					</div>
					<?php 
							endwhile;
							wp_reset_query();
							?>
	</div>
	<img class="taxi lazy" data-src="<?php echo THEME_IMAGES; ?>/taxi.png"  >
	<div class="container-fluid">

		<div class="block_1">
			<div class="row">
				<div class="col-12">
				<div class="content " >
					<?php echo get_field('bl1_text'); ?>
					<div class="text"><?php echo get_field('bl1_text_under_btn'); ?></div>
									
						<div class="button border">
                        <span class="btn" data-fancybox data-src="#popup-order" class="popup ct">
							<div class="btn-rad-f">
								<span><?php the_field('bl1_name_btn'); ?></span>
								<div class="btn_icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="20.687" height="20.687" viewBox="0 0 20.687 20.687">
											<path id="Контур_1" data-name="Контур 1" d="M13.128,0V13.128H0" transform="translate(0 10.343) rotate(-45)" fill="none" stroke="#f9c14a" stroke-width="3"/>
											</svg>
								</div>							
							
						</div>
                    </span>
                </div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>