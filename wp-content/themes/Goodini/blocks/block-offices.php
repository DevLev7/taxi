

	<section id="offices">
		<div class="container-fluid">
			<div class="row">
				<div class="col-ml-4">
					<div class="header">
						<?php the_field('offices-header', 'option'); ?>
					</div>
					<div class="list">
						<ul>
							<li><?php echo do_shortcode('[adress]'); ?></li>
							<?php 
							while( have_rows('offices', 'option') ): the_row(); 
							?>
							<li>
								<?php echo get_sub_field('adress'); ?>
							</li>
							<?php 
							endwhile;
							wp_reset_query();
							?>
						</ul>
						<h3>Звоните</h3>
						<ul>
							<li>
								<span class="head">Телефон: </span>
								<?php echo do_shortcode('[phone]') ?> 
							</li>
							<?php if(do_shortcode('[phone_wa]')){ ?>
							<li>
								<span class="head">Whats`App: </span>
								<?php echo do_shortcode('[phone_wa]') ?> 
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-ml-8">
					<div class="map">
						<div id="map-3"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<script type="text/javascript" src="//api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU"></script>
	<script type="text/javascript">
		ymaps.ready(init);
		var myMap;
		function init() {
			
			myMap = new ymaps.Map('map-3', {
				center: [<?php echo get_field('offices-center', 'option'); ?>],
				zoom: <?php echo get_field('offices-zoom', 'option'); ?>
			}),
			myMap.behaviors.disable('scrollZoom')			
			
			myMap.geoObjects
			.add(new ymaps.Placemark([<?php echo do_shortcode('[coordinate]'); ?>], {
				balloonContent: 'Головной офис'
			}))
			<?php 
			while( have_rows('offices', 'option') ): the_row(); 
				$department = get_sub_field('department');
				$phone = get_sub_field('phone');
				$adress = get_sub_field('adress');
				$coordinate = get_sub_field('coordinate');
				$mode = get_sub_field('mode');
				
				if($department){
					$department = $department.'</br>';
				}
				if($phone){
					$phone = $phone.'</br>';
				}
			?>	
			.add(new ymaps.Placemark([<?php echo $coordinate; ?>], {
				balloonContent: '<?php echo $department.$adress.$phone.$mode; ?>'
			}))
			<?php 
			endwhile;
			wp_reset_query();
			?>
			
		}
	</script>