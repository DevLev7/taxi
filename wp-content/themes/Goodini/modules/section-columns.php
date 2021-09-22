<?php 
// Фон
$stylegroup = get_sub_field('style-group')['style-bg'];
$stylegroup_color = '';
if($stylegroup!='style-bg-none'){
	$stylegroup_color = "bg-color";
} 

// Массив стилей текста
$styletext_arr = get_sub_field('style-group')['style-text'];
foreach ($styletext_arr as $styletext_value) {
	$styletext .= ' '.$styletext_value;
}

// Вертикальное выравнивание
$stylegroup_align = get_sub_field('style-group')['style-align'];

// Количество колонок
$cols = count (get_sub_field('column-repeater')); 

// Сетка
if($cols==1){
	$class_col = "col-s";
}elseif($cols==2){
	$class_col = "col-ml-6";
}else{
	$class_col = "col-ml-4";
}

// Поиск текста и извлечение из него тега h2 для записи в alt изображения
$alt_text = get_sub_field('header').get_sub_field('column-repeater')[0]['text'].get_sub_field('column-repeater')[1]['text'].get_sub_field('column-repeater')[2]['text'];
preg_match("~<h2>(.*)</h2>~",$alt_text,$alt_preg);
$alt = strip_tags($alt_preg[1]);
?>


	<section id="<?php echo $building_row; ?>" class="content <?php echo $stylegroup_color.' '.$stylegroup.$styletext.' '.$stylegroup_align;?>">
		<div class="container-fluid">
			<?php if((get_sub_field('header-switcher'))&&(get_sub_field('header'))){ ?>
			<div class="header list">
				<?php the_sub_field('header'); ?>
			</div>
			<?php } ?>
			<div class="row">
				
				<?php
				
				$order ="";
				while( have_rows('column-repeater') ): the_row();
					$image = get_sub_field('image');
					$zoom = get_sub_field('zoom');
					$YouTube_link = get_sub_field('video');
					$YouTube_ID = YouTubeID($YouTube_link); // ID видео с YouTube
					$text = get_sub_field('text');
					if($image||$video){ $order="order";}
					//	Адаптивное изображение
					//$imageSize = 'blog';
					include (locate_template('template-parts/lazy-image-responsive-IE.php'));
				?>
			
				<div class="<?php echo $class_col; ?> <?php echo $order; ?> order2 cols-<?php echo $cols; ?>">
					
					<?php if($image && !$video){ ?>
					<div class="image">
						<?php if($zoom){ ?>
						<a href="<?php echo $image['url']; ?>" data-fancybox class="" style="padding-bottom:<?php echo $image_padding; ?>%" >
							<div class="lazy-image" <?php echo $imageStyle; ?> >
								<div class=" progressive replace" data-href="<?php echo $image['url']; ?>">
									<img src="<? echo $image["sizes"]['micro'];?>" class="preview" alt="<?php echo $alt; ?>" />
								</div>
							</div>
						</a>
						<?php }else{ ?>
						<div class="lazy-image" <?php echo $imageStyle; ?> >
							<div class=" progressive replace" data-href="<?php echo $image['url']; ?>">
								<img src="<? echo $image["sizes"]['micro'];?>" class="preview" alt="<?php echo $alt; ?>" />
							</div>
						</div>
						<?php } ?>
					</div>
					<?php }elseif($YouTube_link){ ?>
					<div class="video-frame">
						<div class="video">
							<a class="video__link" href="https://youtu.be/<?php echo $YouTube_ID; ?>" id="<? echo $YouTube_ID; ?>">
								<picture>
									<source srcset="https://i.ytimg.com/vi_webp/<?php echo $YouTube_ID; ?>/mqdefault.webp" type="image/webp">
									<img class="video__media" src="https://i.ytimg.com/vi/<?php echo $YouTube_ID; ?>/mqdefault.jpg" alt="<?php echo $alt; ?>">
								</picture>
							</a>
							<button class="video__button" type="button" aria-label="Запустить видео">
								<svg width="68" height="48" viewBox="0 0 68 48"><path class="video__button-shape" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path><path class="video__button-icon" d="M 45,24 27,14 27,34"></path></svg>
							</button>
						</div>
					</div>
					<?php } ?>
					
					<?php if($text){ ?>
					<div class="desc list">
						<?php echo $text; ?>
					</div>
					<?php } ?>
					
				</div>
				
				<?php endwhile; ?>
			</div>
			<?php if((get_sub_field('footer-switcher'))&&(get_sub_field('footer'))){ ?>
			<div class="footer list">
				<?php the_sub_field('footer'); ?>
			</div>
			<?php } ?>
		</div>
	</section>