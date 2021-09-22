<?php 
	get_header(); 
if(get_field('company', 'option')['brand']){
	$brand = get_field('company', 'option')['brand'];
}else{
	$brand = get_bloginfo('name');
}
$args_text = array(
	'post_type' => array('reviews'),
	'showposts' => -1,
	'meta_query'     => [
		[ // Проверяет существование поля у записи
			'key' => 'review',
			'compare' => 'EXISTS'
		],
		[ // Проверяет заполненность поля
			'key' => 'review',
			'compare' => '!=',
			'value' => ''
		]
	]
);

$args_video = array(
	'post_type' => array('reviews'),
	'showposts' => -1,
	'meta_query'     => [
		[ // Проверяет существование поля у записи
			'key' => 'video-id',
			'compare' => 'EXISTS'
		],
		[ // Проверяет заполненность поля
			'key' => 'video-id',
			'compare' => '!=',
			'value' => ''
		]
	]
);
?>
	
	<section id="reviews" class="reviews">
		<div class="container-fluid">
			<div class="row">
				<div class="col-s">
					<div class="utp ct">
						<div class="utp-header">
							<h1>Отзывы о "<? echo $brand; ?>"</h1>
						</div>
						<div class="utp-desc">
							<?php the_archive_description() ; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<? if(get_posts($args_text)) { ?>
				<div class="col-ml-8">
				<?php 
				$the_query = new WP_Query( $args_text );
				$count_reviews = str_pad( $the_query->found_posts, 2, '0', STR_PAD_LEFT);
				$review_num = 0;
				while ( $the_query->have_posts() ) : $the_query->the_post();			
					$review_num++;
					$name 			= get_the_title();
					$avatar 		= get_field('avatar');
					$image 			= get_field('image');
					$reviewcity 	= get_field('city');
					$position 		= get_field('position');
					$review 		= get_field('review');
					$blockquote 	= get_field('blockquote');
				?>
					<div class="item-text">
						<div class="review-top">
							<div class="review-left">
								<? if($avatar){ ?>
								<div class="avatar image_circle">
									<img src="<?php echo $avatar; ?>" alt="<?php echo $name; ?>">
								</div>
								<? } ?>
								<div class="name-block">
									<div class="name">
										<?php echo $name; ?>
									</div>
									<? if($position){ ?>
									<div class="position">
										<?php echo $position; ?>
									</div>
									<? } ?>
									<? if($reviewcity){ ?>
									<div class="city">
										г. <?php echo $reviewcity; ?>
									</div>
									<? } ?>
								</div>
							</div>
							<div class="blockquote">
								<?php echo $blockquote; ?>
							</div>
						</div>
						<div class="review">
							<div class="review-text">
								<?php echo $review; ?>
							</div>
							<?php if($image){ ?>
							<div class="review-image">
								<a href="<?php echo $image['url']; ?>" data-fancybox='review-<? echo $review_num; ?>'>Оригинал отзыва
								</a>
							</div>
							<?php } ?>
						</div>
					</div>
				<?php 
					endwhile; 
					wp_reset_query()
				?>
				</div>
				<? } ?>
				
				<? if(get_posts($args_video)) { ?>
				<? if(get_posts($args_text)) { ?>
				<div class="col-ml-4">
				<? }else { ?>
				<div class="col-ml-12">
				<? } ?>
					<div class="<? echo get_posts($args_text) ? "" : "row"; ?> videos">
					<?php					
					$the_query = new WP_Query( $args_video );
					$count_reviews = str_pad( $the_query->found_posts, 2, '0', STR_PAD_LEFT);
					while ( $the_query->have_posts() ) : $the_query->the_post();
						$video = get_field('video-id');
						$YouTube_ID = YouTubeID($video); // ID видео с YouTube
						$name = get_the_title(get_the_ID());
					?>		
					<? if(!get_posts($args_text)) { ?>
					<div class="col-ml-4">
					<? } ?>	
						<div class="item-video">
							<div class="video">
								<a class="video__link" href="https://youtu.be/<? echo $YouTube_ID; ?>" id="<? echo $YouTube_ID; ?>">
									<picture>
										<source srcset="https://i.ytimg.com/vi_webp/<? echo $YouTube_ID; ?>/mqdefault.webp" type="image/webp">
										<img class="video__media" src="https://i.ytimg.com/vi/<? echo $YouTube_ID; ?>/mqdefault.jpg" alt="<? echo $video_desc ? $video_desc : $alt.' — '.$video_num.' / '.get_field('company', 'option')['brand'] ; ?>">
									</picture>
								</a>
								<button class="video__button" aria-label="Запустить видео">
									<svg width="68" height="48" viewBox="0 0 68 48"><path class="video__button-shape" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path><path class="video__button-icon" d="M 45,24 27,14 27,34"></path></svg>
								</button>
							</div>
							<div class="name">
								<? echo $name; ?>
							</div>
						</div>
					<? if(!get_posts($args_text)) { ?>
					</div>
					<? } ?>	
					<?php 
					endwhile;
					wp_reset_query();
					?>
					</div>
				<? } ?>
			
					<div class="audios">
						<?php
						$alt = get_the_title();
						
						$args = array(
							'post_type' => array('reviews'),
							'showposts' => -1,
							'meta_query'     => [
								[ // Проверяет существование поля у записи
									'key' => 'audio-mp3',
									'compare' => 'EXISTS'
								],
								[ // Проверяет заполненность поля
									'key' => 'audio-mp3',
									'compare' => '!=',
									'value' => ''
								]
							]
						);
						
						$the_query = new WP_Query( $args );
						$count_reviews = str_pad( $the_query->found_posts, 2, '0', STR_PAD_LEFT);
						while ( $the_query->have_posts() ) : $the_query->the_post();
							$audio_mp3 = get_field('audio-mp3');
							$audio_aac = get_field('audio-aac');
							$audio_ogg = get_field('audio-ogg');
							$blockquote = get_field('blockquote');
						?>	
						<div class="item">
							<audio controls="" controlslist="nodownload novolume nomute">
								<source src="<?php echo $audio_mp3; ?>" type="audio/mp4">
								<source src="<?php echo $audio_ogg; ?>" type="audio/ogg">
								<source src="<?php echo $audio_aac; ?>" type="audio/aac">
							</audio>
							<div class="quote">
								<?php echo $blockquote; ?>
							</div>
						</div>
						<?php 
						endwhile;
						wp_reset_query();
						?>
					</div>
				</div>
			</div>
			<div class="button">
				<span data-src="#popup-review" anim="ripple" class="btn" data-fancybox="">
					<span>Оставить свой отзыв</span>
				</span>	
			</div>
		</div>
	</section>
	
	

	
	<?php //get_template_part('blocks/block','pagination');?>
	<?php get_template_part('blocks/block','manager');?>
	
<?php get_footer(); ?>