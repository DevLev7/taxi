<?php
	$image = get_sub_field('image');
	//	Адаптивное изображение
	$imageSize = '';
	include (locate_template('template-parts/lazy-image-responsive-IE.php'));
?>
	<section id="faq">
		<div class="container-fluid">
			<div class="row">
				<? if( $image && get_sub_field('header')){ ?>
				<div class="col-ml-5">
					<div class="header">
						<?php the_sub_field('header'); ?>
					</div>
					<div class="lazy-image" <?php echo $imageStyle; ?> >
						<div class=" progressive replace" data-href="<?php echo $image['url']; ?>">
							<img src="<? echo $image["sizes"]['micro'];?>" class="preview" alt="<?php echo get_sub_field('header'); ?>" />
						</div>
					</div>
				</div>
				<div class="col-ml-7">
				<? }else { ?>
				<div class="col-s">
					<? if(get_sub_field('header')){ ?>
					<div class="header ct">
						<?php the_sub_field('header'); ?>
					</div>
					<? } ?>
				<? } ?>
					<div class="spoilers">
						<?php
						$item = 0;
						while( have_rows('repeater') ): the_row(); 
							$item++;
							$head = get_sub_field('faq-f');
							$image = get_sub_field('faq-image');
							$desk = get_sub_field('faq-q');
							/*
							if ($item==1){
								$active = 'active';
							}else{
								$active = '';
							}*/
						?>
						<div class="spoiler <?php echo $active; ?>">
							<div class="spoiler-head">
								<h3><?php echo $head; ?></h3>
							</div>
							<div class="spoiler-content list">
								<?php if($image){ ?>
								<div class="image">
									<img src="<?php echo $image['sizes']['item']; ?>" />
								</div>
								<?php } ?>
								<?php echo $desk; ?>
							</div>
						</div>
						<?php  
							endwhile;
						?>
					</div>
					<?php if(get_sub_field('footer')){ ?>
					<div class="footer">
						<?php the_sub_field('footer'); ?>
					</div>
					<? } ?>
				</div>
			</div>
		</div>
	</section>