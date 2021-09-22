<?php 
$type = get_sub_field('style')['type'];

//	Цвет фона
$bg_color = get_sub_field('style')['bg_color'];
$bg_color_color = '';
if($bg_color!='style-bg-none'){
	$bg_color_color = "bg-color";
} 

//	Цвет фона буллитов
$itembg_color = get_sub_field('style')['item-bg-color'];

// Дополнительный класс
$add_class = get_sub_field('style')['class'];

// Проверка и вывод классов оформления секции
$design_arr = get_sub_field('style')['design'];				// массив блока Внешний вид
if( $design_arr ){
	$design="";
	foreach( $design_arr as $design_key ){ $design .=' design-'.$design_key; }
}
$design_circle = in_array ('circle', $design_arr);			// проверяет, влючено ли оформление круглой картинки
$design_text = in_array ('text', $design_arr);			// проверяет, влючен ли текст в картинке
if($design_circle && !$design_text){
	$design_circle_img = "-circle";
}

?>
	<section id="<?php echo $building_row; ?>" class="bullets bullets-<?php echo $type; ?> <?php echo $bg_color_color.' '.$bg_color; ?> <?php echo $design; ?> <?php echo $itembg_color; ?> <?php echo $add_class; ?> ">
		<div class="container-fluid">
			<?php if(get_sub_field('header')){ ?>
			<div class="header list">
				<?php the_sub_field('header'); ?>
			</div>
			<?php } ?>
			<div class="row ">
			<?php 
			// Общее количество буллитов
			$count = count( get_sub_field( 'repeater' ) );
			$item_num = 0;
			while( have_rows('repeater') ): the_row(); 
				$image = get_sub_field('icon');
				$num = get_sub_field('num');
				$head = get_sub_field('head');
				$desc = get_sub_field('desk');
				$link = get_sub_field('link');
				$item_num++;			
				
				//	Проверим, крупные ли блоки
				if(in_array ('big', $design_arr)) {
					if($count==2) {
						$count_class = "col-sm-6 col-12 full-columns-2";
					}elseif ($count % 5 == 0){
						$count_class = "col-lg-4 col-md-6 col-sm-12 col-12 full-columns-5";
					}elseif ($count % 4 == 0){
						$count_class = "col-ml-6 col-md-6 col-sm-12 col-12 full-columns-4";
					}else{
						$count_class = "col-ml-4 col-md-6 col-sm-12 col-12";
					}
				}else{
					
					if($count==2) {
						$count_class = "col-sm-6 col-6 full-columns-2";
					}elseif ($count % 5 == 0){
						$count_class = "col-ml-25 col-md-4 col-sm-6 col-6 full-columns-5";
					}elseif ($count % 4 == 0){
						$count_class = "col-ml-3 col-md-6 col-sm-6 col-6 full-columns-4";
					}else{
						$count_class = "col-ml-4 col-md-4 col-sm-6 col-6";
					}
				}
				if($link){
					$item_start = '<a data-asd="asd" href="'.get_category_link($link[0]).'" class="item link autoheight">';
					$item_end = '</a>';
				} else {
					$item_start = '<div class="item autoheight">';
					$item_end = '</div>';
				}
				
				//	Адаптивное изображение
				$imageSize = 'item';
				include (locate_template('template-parts/lazy-image-responsive-IE.php'));
				
				?>	
				<div class="<?php echo $count_class; ?> col bul">
					<?php echo $item_start; ?>
					
						<?php // Картинка ?>
						<?php if(($type=='image') && ($image)){ ?>
						<div class="image">
							<div class="lazy-image" <?php echo $imageStyle; ?> >
								<div class=" progressive replace" data-href="<?php echo $image['sizes']['item'.$design_circle_img]; ?>">
									<img src="<? echo $image["sizes"]['micro-item'];?>" class="preview" alt="<?php echo $head; ?>" />
								</div>
							</div>
						</div>
						<?php } ?>
						
						<?php // Иконка ?>
						<?php if(($type=='icon') &&($image)){ ?>
						<div class="icon">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $head; ?>">
						</div>
						<?php } ?>
						
						<?php // Цифры ?>
						<?php if(($type=='nums') && ($num)){ ?>
						<div class="num">
							<?php echo $num; ?>
						</div>
						<?php } ?>
						
						<?php // Этапы ?>
						<?php if($type=='steps'){ ?>
						<div class="steps">
							<?php echo sprintf("%02d",$item_num); ?>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 430.41 24.98">
								<path class="cls-1" d="M.2 24l5.88-1.19"/>
								<path d="M17.89 20.49C84.52 7.76 148.76 1 215.2 1c67.16 0 135.16 7.15 203.22 20.61" stroke-dasharray="12.03 12.03" fill="none" stroke-miterlimit="10" stroke-width="2"/>
								<path class="cls-1" d="M424.32 22.79L430.2 24"/>
							</svg>
						</div>
						<?php } ?>
						
						<?php // Плюс ?>
						<?php if($type=='plus'){ ?>
						<div class="plus">
							<svg viewBox="0 0 24 24">
								<path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"></path>
							</svg>
						</div>
						<?php } ?>
						
						<div class="body">
						<?php if($head){ ?>
							<?php if($desc){ ?>
							<div class="head bottom-margin">
							<?php }else{ ?>
							<div class="head">
							<?php } ?>
								<?php echo $head; ?>
							</div>
						<?php } ?>
							<?php if($desc){ ?>
							<div class="desc list">
								<?php echo $desc; ?>
							</div>
							<?php } ?>
						</div>
						<?php if($link){ ?>
						<div class="link-desc">
							Подробнее
						</div>
						<?php } ?>
					<?php echo $item_end; ?>
					<?php if(($type=='steps')&&($item_num==$count)){ ?>
					<div id="check">
						<svg viewBox="0 0 24 24">
							<path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"></path>
						</svg>
					</div>
					<?php } ?>
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