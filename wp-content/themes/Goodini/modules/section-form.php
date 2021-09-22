<?php 
// Фон
$style_bg = get_sub_field('col-2')['bg'];
?>
	
	<section id="<?php echo $building_row; ?>" class="section-form" style="background-image: url(<?php echo $style_bg; ?>);">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-ml-7 col-md-6">	
					<div class="header">
						<?php echo get_sub_field('col-1')['header']; ?>
					</div>
					<div class="desc list">
						<?php echo get_sub_field('col-1')['desc']; ?>
					</div>
				</div>
				<div class="col-lg-4 offset-lg-2 col-ml-5 col-md-6">					
					<div  class="form-wrap">
						<?php 
						$formTitle = "Записать ребёнка в лагерь";
						$formDesk = "Заполните форму и мы ответим на все волнующие вопросы";
						$formTextarea = "";
						$formBtn = "Записаться";
						include (locate_template('blocks/block-form.php'));
						?>
					</div>
				</div>
			</div>
		</div>
	</section>