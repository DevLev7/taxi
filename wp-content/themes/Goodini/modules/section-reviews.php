<?php 
$header = get_sub_field('header'); 
$type = get_sub_field('type'); 
	
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
?>

	<?php if($type == 'video'){ ?>
	<section id="<?php echo $building_row; ?>" class="video-section <?php echo $stylegroup_color.' '.$stylegroup.$styletext;?>">
		<div class="container-fluid">
			<div class="header list">
				<?php echo $header; ?>
			</div>
			<div class="review-video">
				<div class="review-video-slider">
					<?php
					$alt = get_the_title();
					
					$args = array(
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
					
					$the_query = new WP_Query( $args );
					$count_reviews = str_pad( $the_query->found_posts, 2, '0', STR_PAD_LEFT);
					while ( $the_query->have_posts() ) : $the_query->the_post();
						$video = get_field('video-id');
						$YouTube_ID = YouTubeID($video); // ID видео с YouTube
					?>			
					<div class="slide">	
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
					</div>
					<?php 
					endwhile;
					wp_reset_query();
					?>
				</div>			
				<div class="review-video-slider-arrow"></div>
			</div>	
		</div>
	</section>
	<?php }elseif($type == 'audio'){ ?>
	
	<section class="reviews-audio">
		<div class="container-fluid">
			<div class="header list">
				<?php echo $header; ?>
			</div>
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
	</section>
	
	<?php }else{ ?>
	<section id="<?php echo $building_row; ?>" class="reviews <?php echo $stylegroup_color.' '.$stylegroup.$styletext;?>">
		<div class="container-fluid">
			<div class="header list">
				<?php echo $header; ?>
			</div>
            <?php

            $reviews = [];
            // Уникальные отзывы
            if ( get_sub_field( 'reviews' ) ) {

                while (have_rows( 'repeater' )): the_row();
                    $reviews[] = [
                        'name'       => get_sub_field( 'name' ),
                        'review'     => get_sub_field( 'review' ),
                        'city'       => get_sub_field( 'city' ),
                        'position'   => get_sub_field( 'position' ),
                        'blockquote' => get_sub_field( 'blockquote' ),
                    ];
                endwhile;
                //wp_reset_query();

            }

            // отзывы из секции
            if ( get_sub_field( 'reviews-section' ) ) {
                $args = array(
                    'post_type' => array('reviews'),
                    'showposts' => -1,
                    'post__in'  => get_sub_field( 'reviews-section' ),
                    'orderby'   => 'post__in',
                );
            } else {
                $args = array(
                    'post_type'  => array('reviews'),
                    'showposts'  => -1,
                    'meta_query' => [
                        [ // Проверяет существование поля у записи
                            'key'     => 'review',
                            'compare' => 'EXISTS'
                        ],
                        [ // Проверяет заполненность поля
                            'key'     => 'review',
                            'compare' => '!=',
                            'value'   => ''
                        ]
                    ]
                );
            }
            $the_query = new WP_Query( $args );
            while ($the_query->have_posts()) : $the_query->the_post();
                $reviews[] = [
                    'name'       => get_the_title(),
                    'review'     => get_field( 'review' ),
                    'avatar'     => get_field( 'avatar' ),
                    'image'      => get_field( 'image' ),
                    'city'       => get_field( 'city' ),
                    'position'   => get_field( 'position' ),
                    'blockquote' => get_field( 'blockquote' ),
                ];

            endwhile;
            wp_reset_query();

            get_template_part( 'template-parts/review-slider', null, ['reviews' => $reviews] );
            ?>
		</div>
	</section>
	<?php } ?>