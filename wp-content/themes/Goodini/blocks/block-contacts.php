<section id="contacts" class="contacts-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-md-5 ">
				<div class="wrap">
					<div class="header">
						<h2>Контакты</h2>
					</div>
					<?php if (get_field('image_company', 'option')) { ?>
						<div class="image">
							<img src="<?php echo get_field('image_company', 'option'); ?>" alt="Офис <?php echo get_bloginfo("name"); ?>" title="Офис <?php echo get_bloginfo("name"); ?>">
						</div>
					<?php } ?>
					<ul class="main-list">
						<li>
							<span class="head">Телефон</span>
							<?php echo do_shortcode('[phone]') ?>
						</li>
						<?php if (do_shortcode('[email]')) { ?>
							<li>
								<span class="head">Email</span>
								<?php echo do_shortcode('[email]'); ?>
							</li>
						<?php } ?>
						<?php if (do_shortcode('[phone_second]')) { ?>
							<li>
								<span class="head">Телефон (доп.)</span>
								<?php echo do_shortcode('[phone_second]') ?>
							</li>
						<?php } ?>
						<?php if (get_field('mode', 'option')) { ?>
							<li>
								<span class="head">Режим работы</span>
								<?php the_field('mode', 'option') ?>
							</li>
						<?php } ?>
						<?php if (do_shortcode('[phone_wa]')) { ?>
							<li>
								<span class="head">Whats`App</span>
								<?php echo do_shortcode('[phone_wa]') ?>
							</li>
						<?php } ?>
						<li>
							<span class="head">Адрес</span>
							<?php echo do_shortcode('[adress]'); ?>
						</li>
						<?php if (get_field('in', 'option') || get_field('yt', 'option') || get_field('vk', 'option') || get_field('fb', 'option')) { ?>
							<li class="soc-block">
								<span class="head">Мы в соц.сетях</span>
								<?php get_template_part('template-parts/social-icons'); ?>
							</li>
						<?php } ?>
					</ul>
					<?php if (get_field('offices', 'option')) { ?>
						<div class="list">
							<h2 class="head">Филиалы</h2>
							<ul>
								<?php
								while (have_rows('offices', 'option')) : the_row();
								?>
									<li>
										<?php echo get_sub_field('adress'); ?>
									</li>
								<?php
								endwhile;
								wp_reset_query();
								?>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div id="map-3"></div>
</section>

<script type="text/javascript" src="//api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU"></script>

<?php if (get_field('offices', 'option')) { ?>
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
			while (have_rows('offices', 'option')) : the_row();
				$department = get_sub_field('department');
				$phone = get_sub_field('phone');
				$adress = get_sub_field('adress');
				$coordinate = get_sub_field('coordinate');
				$mode = get_sub_field('mode');

				if ($department) {
					$department = $department . '</br>';
				}
				if ($phone) {
					$phone = $phone . '</br>';
				}
			?>
					.add(new ymaps.Placemark([<?php echo $coordinate; ?>], {
						balloonContent: '<?php echo $department . $adress . $phone . $mode; ?>'
					}))
			<?php
			endwhile;
			wp_reset_query();
			?>

		}
	</script>
<?php } else { ?>
	<script type="text/javascript">
		ymaps.ready(init);
		var myMap;

		function init() {

			myMap = new ymaps.Map('map-3', {
					center: [<?php echo do_shortcode('[coordinate]'); ?>],
					zoom: 16,
				}),
				myPlacemark = new ymaps.Placemark([<?php echo do_shortcode('[coordinate]'); ?>]);
			myMap.behaviors.disable('scrollZoom')
			myMap.geoObjects.add(myPlacemark);
		}
	</script>
<?php } ?>