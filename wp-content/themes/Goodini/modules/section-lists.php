<?php 
//	Расположение списка [left, center, right]
$type = get_sub_field('style')['type'];

//	Фон (цвет)
$bg_color = get_sub_field('style')['bg_color'];

//	Фоновая картинка
$bg_image = get_sub_field('style')['bg-image'];
$bg_image_style = "";
if($bg_image && $bg_color=='style-bg-image'){
	$bg_image = 'style="background-image: url('.$bg_image.');"';
}

//	Картинка
$image = get_sub_field('style')['image'];

//	Вертикальное выравнивание [top, center, bottom]
$align = get_sub_field('style')['align'];

//	Тип иконки [none, only, unique]
$icons = get_sub_field('style')['icons'];
$icons_class = "";
if($icons != "none"){ 
	$icons_class = "icon-".$icons;
}

//	Единая иконка для всех пунктов
$icon_only = get_sub_field('style')['icon-only'];

//	Белый текст
$text_white = get_sub_field('style')['text_white'];
?>
	<section id="<?php echo $building_row; ?>" class="lists lists-<?php echo $type; ?> align-<?php echo $align; ?> <?php echo $bg_color; ?> <?php echo $icons_class; ?> <?php echo $text_white ? "text_white" : "" ; ?>" <?php echo $bg_image; ?>>
		<div class="container-fluid">
			<div class="row">
			
				<?
				//	Расположение списка слева или справа
				//	==========
				if($type != "center"){
					// Определение классов секций и порядка отображения
					if($type == "left"){
						$type_col_1 = 'col-lg-7 col-ml-7 col-md-8 col-xs-12 order-1';
						$type_col_2 = 'col-lg-5 col-ml-5 col-md-4 col-xs-12 order-2';
					}else{
						$type_col_1 = 'col-lg-7 col-ml-7 col-md-8 col-xs-12 order-2';
						$type_col_2 = 'col-lg-5 col-ml-5 col-md-4 col-xs-12 order-1';
					}
				?>
				<div class="<?php echo $type_col_1; ?>">
				
					<?php if(get_sub_field('header')){ ?>
					<div class="header">
						<?php the_sub_field('header'); ?>
					</div>
					<?php } ?>
					<div class="list-block">
						<div class="item list-1 <?php echo get_sub_field('list-2') ? "" : "only" ; ?>">
							<ul>
							<?php 
							while( have_rows('list-1') ): the_row(); 
								$text = get_sub_field('text');
								?>	
								<li>
									<?php if($icons != "none"){ ?><span class="icon"><img src="<?php echo $icon_only ? $icon_only : get_sub_field('icon') ; ?>" alt="<?php echo $text; ?>"></span><?php } ?>
									<span class="text"><?php echo $text; ?></span>
								</li>
							<?php 
							endwhile;
							wp_reset_query();
							?>
							</ul>
						</div>
						<div class="item list-2">
							<ul>
							<?php 
							while( have_rows('list-2') ): the_row(); 
								$text = get_sub_field('text');
								?>	
								<li>
									<?php if($icons != "none"){ ?><span class="icon"><img src="<?php echo $icon_only ? $icon_only : get_sub_field('icon') ; ?>" alt="<?php echo $text; ?>"></span><?php } ?>
									<span class="text"><?php echo $text; ?></span>
								</li>
							<?php 
							endwhile;
							wp_reset_query();
							?>
							</ul>
						</div>
					</div>
					<?php if(get_sub_field('footer')){ ?>
					<div class="footer list">
						<?php the_sub_field('footer'); ?>
					</div>
					<?php } ?>
					
				</div>
			
				<div class="<?php echo $type_col_2; ?>">
				<?php if($image){ ?>
					<div class="image">
						<img src="<?php echo $image; ?>" alt="<?php echo strip_tags(get_sub_field('header')); ?>">
					</div>
				<?php } ?>
				</div>
				
				<?
				//	Расположение списка по краям от картинки в центре
				//	==========
				}else{
				?>
				<?php } ?>
				
			</div>
		</div>
	</section>