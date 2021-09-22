<?php
$col_1_header = get_sub_field('col-1')['header'];
$col_1_image = get_sub_field('col-1')['image'];
$col_1_image_nomargin = get_sub_field('col-1')['image-nomargin'];

$col_2_header = get_sub_field('col-2')['header'];
$col_2_subheader = get_sub_field('col-2')['subheader'];
$col_2_image = get_sub_field('col-2')['image'];


// Сетка
if($col_2_header){
	$class_col_1 = "col-ml-8";
}else{
	$class_col_1 = "col-ml-12";
	$class_section = "full";
}

// Изображение без 
if($col_1_image_nomargin == 1){
	$style_col_1_image_nomargin = 'nomargin-image';
}

// Отсутствие фото
if(!$col_1_image){
	$class_image_1 = 'image_none';
}
if(!$col_2_image){
	$class_image_2 = 'image_none';
}

// Фон секции
$bg_color = get_sub_field('style')['bg_color'];
$bg_color_color = '';
if($bg_color!='style-bg-none'){
	$bg_color_color = "bg-color";
}
$bg_color_col_1 = 'col-'.get_sub_field('col-1')['bg_color'];
$bg_color_col_2 = 'col-'.get_sub_field('col-2')['bg_color'];

// Цвет фона
get_sub_field('col-1')['text_white'] ? $text_white_col_1 = "text_white": ""  ;
get_sub_field('col-2')['text_white'] ? $text_white_col_2 = "text_white": ""  ;

// Поиск текста и извлечение из него тега h2 для записи в alt изображения
preg_match("~<h2>(.*)</h2>~",$col_1_header,$alt_preg);
$alt = strip_tags($alt_preg[1]);
?>



	<section id="<?php echo $building_row; ?>" class="banner-cart <?php echo $class_section; ?> <?php echo $bg_color_color.' cart-'.$bg_color; ?>">
		<div class="container-fluid">
			<div class="header list">
				<?php ; ?>
			</div>
			<div class="row">

				<div class="<?php echo $class_col_1; ?>">
					<div class="cart autoheight <?php echo $style_col_1_color_header; ?> <?php echo $class_image_1; ?> <?php echo $bg_color_col_1; ?> <?php echo $text_white_col_1; ?>">
						<div class="header list">
							<?php echo $col_1_header; ?>
						</div>
						<?php if( $col_1_image){ ?>
						<div class="image <?php echo $style_col_1_image_nomargin; ?>">
						
							<img src="<?php echo $col_1_image['url']; ?>" alt="<? echo $alt; ?>">
						</div>
						<?php } ?>
					</div>
				</div>

				<?php if($col_2_header){ ?>
				<div class="col-ml-4">
					<div class="cart mini autoheight <?php echo $style_col_2_color_header; ?> <?php echo $class_image_2; ?> <?php echo $bg_color_col_2; ?> <?php echo $text_white_col_2; ?>" >
						<div class="header-block">
							<div class="header">
								<h2><?php echo $col_2_header; ?></h2>
							</div>
							<div class="subheader">
								<?php echo $col_2_subheader; ?>
							</div>
						</div>
						<?php if( $col_2_image){ ?>
						<div class="image-block">
							<div class="image">
								<img src="<?php echo $col_2_image['url']; ?>" alt="<?php echo $col_2_header; ?>">
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</section>