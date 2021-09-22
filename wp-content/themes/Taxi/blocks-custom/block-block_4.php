<div id="block_4" >
	<div class="circle5"></div>
	<div class="circle6"></div>
	<div class="circle7"></div>
	
		<div class="block_4">
			<div class="row">
				<div class="col-12">
					<div class="content">
					<div class="container-fluid">
							<?php echo get_field('bl4_title'); ?>
					</div>
					<div class="prog_wrap">
					<div class="container-fluid">
							<div class="prog_head">
						<div class="project-slider-arrow-th"></div>
							<div class="tabs_prog">
									<?php 
										$item_num1 = 0;
										while( have_rows('tabs') ): the_row(); 
															
										$item_num1 ++;
										$name = get_sub_field('name');
										
										$id = $item_num1;
													
								?>
							<div class="progwrap">
							<div class="prog_headding" data-el="<?php echo $id; ?>">
											<span><?php echo $name; ?></span>
										</div>
										</div>
									<?php 
										endwhile;
										wp_reset_query();
										?>
								
							
							</div>
							</div>
						</div>
						<div class="bg_main">
						<div class="container-fluid">
						<div class="prog_main">
						
							<div class="tabs_cont_prog">
								<?php 
										$item_num2 = 0;
										while( have_rows('bl4_ content') ): the_row(); 
											$item_num2 ++;
											$img = get_sub_field('img');
											$name = get_sub_field('name');
											$text = get_sub_field('text');
											$id = $item_num2;

											$video_desc =  get_sub_field('video-desc'); // Описание в записи с ID $video_id
											$YouTube_link =  get_sub_field('YouTube_link'); // Ссылка на видео с YouTube в записи с ID $video_id
											$YouTube_ID =  get_sub_field('YouTube_ID') ; // ID видео с YouTube
										?>
									<div class=" prog_el " data-el="<?php echo $id; ?>">
										<div class="item_wrap">
											<div class="item">
												<div class="item_text">
														<div class="name"><?php echo $name; ?></div>
														<div class="text"><?php echo $text; ?></div>
												</div>
<!-- 
												<div class="image">
																	
	
													<?php if(get_sub_field('YouTube_link')){ ?>
														<div class="video">
														<a class="video__link" href="https://youtu.be/<? echo $YouTube_ID; ?>" id="<? echo $YouTube_ID; ?>">
														<picture>
															<source class="lazy" data-src="https://i.ytimg.com/vi_webp/<? echo $YouTube_ID; ?>/maxresdefault.webp" type="image/webp">
															<img class="video__media lazy" data-src="https://i.ytimg.com/vi/<? echo $YouTube_ID; ?>/maxresdefault.jpg" alt="<? echo $video_desc ? $video_desc : $alt.' — '.$video_num.' / '.get_field('company', 'option')['brand'] ; ?>">
														</picture>
														</a>
														<button class="video__button" aria-label="Запустить видео">
															<svg width="68" height="48" viewBox="0 0 68 48"><path class="video__button-shape" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path><path class="video__button-icon" d="M 45,24 27,14 27,34"></path></svg>
														</button>
													</div>
														
														
														<?php }else{ ?>

															<img class="lazy" data-src="<?php echo $img; ?>" alt="">
														<?php } ?>
												</div> -->
											</div>
										</div>
									</div>
										<?php 
										endwhile;
										wp_reset_query();
										?>
									</div>
						</div>
						</div>
					
						</div>
					</div>
				</div>
			</div>
		
	</div>
</div>
</div>

<script>
// function prog_tab(elem){
//  	$('.prog_headding').removeClass('active');
//  	$('.prog_el').removeClass('active');
 	
// 	$('.prog_headding[data-el="'+elem+'"]').addClass('active');
// 	$('.prog_el[data-el="'+elem+'"]').addClass('active');
// }
// prog_tab('1');

// $('.prog_headding').click(function(){
// 	if(!$(this).hasClass('active')){
// 		elem = $(this).attr('data-el');
// 		prog_tab(elem);	
// 	}
// });

// $('.tabs_cont_prog .my_btn').click(function(){
// 	var name_prog = $(this).attr('data-prog')+'. '+$(this).parent().parent().find('p:nth-child(1)').text()+'.';
// 	$('#popup-zakaz .dop_input').val(name_prog);
// });

</script>
<script>
		$('.tabs_prog').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		slidesToShow: 7,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
		asNavFor: '.tabs_cont_prog',
		responsive: [
      {
        breakpoint: 1154,
        settings: {
          slidesToShow: 6
         
        }},
		{
        breakpoint: 1023,
        settings: {
          slidesToShow: 4
         
        }},
		{
        breakpoint: 767,
        settings: {
          slidesToShow: 3
         
        }},
		{
        breakpoint: 413,
        settings: {
          slidesToShow: 2
         
        }}
        
		],
		//centerPadding: '1rem',
		//adaptiveHeight: true,
		
        appendArrows:$(".project-slider-arrow-th"),
		prevArrow:'<button id="prev" type="button" class="slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="33.534" height="33.534" viewBox="0 0 33.534 33.534"><path id="Контур_19" data-name="Контур 19" d="M21.261,21.895,21.507,0,0,.25" transform="translate(16.622 32.112) rotate(-135)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg></button>',
        nextArrow:'<button id="next" type="button" class="slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="33.534" height="33.534" viewBox="0 0 33.534 33.534"><path id="Контур_19" data-name="Контур 19" d="M25.83,4.57l.246,21.895L4.57,26.214" transform="translate(-5.032 16.63) rotate(-45)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg></button>',
		
	});



	$('.tabs_cont_prog').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		asNavFor: '.tabs_prog',
		arrows: false,
	
		//centerPadding: '1rem',
		//adaptiveHeight: true,
		
      
		prevArrow:'<button id="prev" type="button" class="slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="33.534" height="33.534" viewBox="0 0 33.534 33.534"><path id="Контур_19" data-name="Контур 19" d="M21.261,21.895,21.507,0,0,.25" transform="translate(16.622 32.112) rotate(-135)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg></button>',
        nextArrow:'<button id="next" type="button" class="slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="33.534" height="33.534" viewBox="0 0 33.534 33.534"><path id="Контур_19" data-name="Контур 19" d="M25.83,4.57l.246,21.895L4.57,26.214" transform="translate(-5.032 16.63) rotate(-45)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg></button>',
		
	});
	</script>