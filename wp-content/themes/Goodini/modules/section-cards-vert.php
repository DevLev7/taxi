<?php 
$bg_color = get_sub_field('style')['bg_color'];
$bg_color_color = '';
if($bg_color!='style-bg-none'){
	$bg_color_color = "bg-color";
} 

// Проверка и вывод классов оформления секции
$design_arr = get_sub_field('style')['design'];
if( $design_arr ){
	$design="";
	foreach( $design_arr as $design_key ){ $design .=' design-'.$design_key; }
}
$managerheader = get_sub_field('style')['manager-header'];
?>
	<section id="<?php echo $building_row; ?>" class="card <?php echo $bg_color_color.' '.$bg_color; ?> <?php echo $design; ?>">
		<div class="container-fluid">
			<div class="header list">
				<?php the_sub_field('header'); ?>
			</div>
			<div class="row">
				<?php 
				// Общее количество буллитов
				$count = count( get_sub_field( 'repeater' ) );
				while( have_rows('repeater') ): the_row(); 
					$image = get_sub_field('image');
					$text = get_sub_field('text');
					$btn = get_sub_field('btn');
					$link = get_sub_field('link');
					$rating = get_sub_field('rating');
				?>	
				<div class="col-ml-4 col-md-6 ">
					<div class="item">
						<div class="image">
							<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php 
							preg_match_all('#<h2>(.+?)</h2>#is', $text, $arr);
							echo strip_tags($arr[0][0]);
							?>" />
						</div>
						<div class="text list autoheight">
							<?php if($rating){ ?>
							<div class="rating">
								<div class="rating-line">
									<div class="line" style="width: <?php echo $rating*20; ?>%;"></div>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 115 21.07"><path d="M0,0V21.07H115V0ZM22.82,8.74l-4.47,4.58,1.06,6.47a.63.63,0,0,1-.92.65l-5.49-3-5.49,3a.63.63,0,0,1-.92-.65l1.06-6.47L3.18,8.74a.62.62,0,0,1,.35-1.05l6.15-.94L12.43.88a.65.65,0,0,1,1.13,0l2.76,5.87,6.15.94A.63.63,0,0,1,22.82,8.74Zm23,0-4.47,4.58,1.06,6.47a.63.63,0,0,1-.92.65l-5.49-3-5.49,3a.63.63,0,0,1-.92-.65l1.06-6.47L26.18,8.74a.62.62,0,0,1,.35-1.05l6.15-.94L35.43.88a.65.65,0,0,1,1.13,0l2.76,5.87,6.15.94A.63.63,0,0,1,45.82,8.74Zm22,0-4.47,4.58,1.06,6.47a.63.63,0,0,1-.92.65l-5.49-3-5.49,3a.63.63,0,0,1-.92-.65l1.06-6.47L48.18,8.74a.62.62,0,0,1,.35-1.05l6.15-.94L57.43.88a.65.65,0,0,1,1.13,0l2.76,5.87,6.15.94A.63.63,0,0,1,67.82,8.74Zm22,0-4.47,4.58,1.06,6.47a.63.63,0,0,1-.92.65l-5.49-3-5.49,3a.63.63,0,0,1-.92-.65l1.06-6.47L70.18,8.74a.62.62,0,0,1,.35-1.05l6.15-.94L79.43.88a.65.65,0,0,1,1.13,0l2.76,5.87,6.15.94A.63.63,0,0,1,89.82,8.74Zm22,0-4.47,4.58,1.06,6.47a.63.63,0,0,1-.92.65l-5.49-3-5.49,3a.63.63,0,0,1-.92-.65l1.06-6.47L92.18,8.74a.62.62,0,0,1,.35-1.05l6.15-.94L101.43.88a.65.65,0,0,1,1.13,0l2.76,5.87,6.15.94A.63.63,0,0,1,111.82,8.74Z"/></svg>
								</div>
								<div class="rating-summ">
									<?php echo $rating; ?>
								</div>
							</div>
							<?php } ?>
							<?php echo $text; ?>
							<?php if($link){ ?>
							<div class="button">
								 <a href="<?php echo $link; ?>" class="btn" anim="ripple"><span>Подробнее</span></a>
							</div>
							<?php } elseif($btn){ ?>
							<div class="button">
								 <div data-src="#popup-order" data-fancybox class="btn" anim="ripple"><span><?php echo $btn; ?></span></div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php 
				endwhile;
				wp_reset_query();
				?>
			</div>
			
			<?php if(get_sub_field('footer')){ ?>
			<div class="row">
				<div class="col-s">
					<div class="footer list">
						<?php the_sub_field('footer'); ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>