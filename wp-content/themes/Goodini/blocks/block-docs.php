	<section class="gallery gallery-docs">
		<div class="container-fluid">
			<div class="header list">
				<?php the_field('docs-header','option'); ?>
			</div>
			
			<div class="row">
				<div class="col-m">
					<div class="slider slider-docs">
					<?php
					$gallery_arr = get_field('docs-repeater','option');
					foreach( $gallery_arr as $image ):
					?>
						<div class="image">
							<? if(get_field('docs-setting','option')['zoom']) { ?>
							<a href="<?php echo $image['url']; ?>" class="frame" data-fancybox='docs-<?php echo $building_row; ?>'>
							<? }else{ ?>
							<div class="frame">
							<? } ?>
								<img src="<?php echo $image['sizes']['team']; ?>" >
							<? echo get_field('docs-setting','option')['zoom'] ? '</a>' : '</div>' ; ?>
						</div>
					<?php 
					endforeach;
					?>
					</div>
					<div class="gallery-arrow-docs"></div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-s">
					<div class="footer list">
						<?php the_field('docs-footer','option'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>