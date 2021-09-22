<div id="block_10" >
	<div class="container-fluid">
		<div class="block_10">
	
			<div class="row">
				<div class="col-12">
					<div class="content">
                    <?php echo get_field('bl10_title'); ?>
                        <div class="slider-block">
                            <div class="slider-arrow"></div>
                            <div class="slider-recal">
                            <?php 
											while( have_rows('slider_recal') ): the_row(); 
												$avatar = get_sub_field('avatar');
												$name = get_sub_field('name');
												$date = get_sub_field('date');
											
												$thesis = get_sub_field('thesis');
												$text_recal = get_sub_field('text_recal');
												
											?>
                                <div class="item_wrap">
                                <div class="item">
                                   <div class="info">
                                       <div class="avatar image_circle">
                                           <img class="lazy" src="<?php echo $avatar; ?>" alt="">
                                       </div>
                                       <div class="detail">
                                           <div class="name"><?php echo $name; ?></div>
                                           <div class="date"><?php echo $date; ?></div>
                                       </div>
                                   </div>
                                   <div class="icon">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="43.906" height="35.974" viewBox="0 0 43.906 35.974">
                                        <g id="Сгруппировать_73" data-name="Сгруппировать 73" transform="translate(-778.942 -10240.098)">
                                            <path id="Контур_25" data-name="Контур 25" d="M2.63,29.891v7.514a5.325,5.325,0,0,0,1.958-.356c1.07-.365,16.375-3.969,16.734-22.787-.036-3,0-11.216,0-11.216s.357-1.7-1.6-1.424C17.689,1.757,3.7,1.444,3.7,1.444S2.31,1.17,2.452,3.224c.08,1.981.178,18.871.178,18.871a1.261,1.261,0,0,0,1.6,1.424c1.155-.175,3.548-1.255,2.848.89C6.313,26.162,4.579,29.334,2.63,29.891Z" transform="translate(776.5 10238.666)" fill="#737D91" fill-rule="evenodd"/>
                                            <path id="Контур_26" data-name="Контур 26" d="M2.63,29.891v7.514a5.325,5.325,0,0,0,1.958-.356c1.07-.365,16.375-3.969,16.734-22.787-.036-3,0-11.216,0-11.216s.357-1.7-1.6-1.424C17.689,1.757,3.7,1.444,3.7,1.444S2.31,1.17,2.452,3.224c.08,1.981.178,18.871.178,18.871a1.261,1.261,0,0,0,1.6,1.424c1.155-.175,3.548-1.255,2.848.89C6.313,26.162,4.579,29.334,2.63,29.891Z" transform="translate(801.5 10238.666)" fill="#737D91" fill-rule="evenodd"/>
                                        </g>
                                        </svg>
                                   </div>
                                   <div class="tezis"><?php echo $thesis; ?></div>
                                   <div class="recal_text example"><?php echo $text_recal; ?></div>
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


	<script>
		$('.slider-recal').slick({
    
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	dots: false,
	arrows: true,
	centerMode: false,
	responsive: [
	  {
		breakpoint: 1023,
		settings: {
		  slidesToShow: 2
		 
		}},
		{
		  breakpoint: 767,
		  settings: {
			slidesToShow: 1
		   
		  }},			
	],
  
	
	//centerPadding: '1rem',
	//adaptiveHeight: true,
	
	appendArrows:$(".slider-arrow"),
	prevArrow:'<button id="prev" type="button" class="slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="33.534" height="33.534" viewBox="0 0 33.534 33.534"><path id="Контур_19" data-name="Контур 19" d="M21.261,21.895,21.507,0,0,.25" transform="translate(16.622 32.112) rotate(-135)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg></button>',
    nextArrow:'<button id="next" type="button" class="slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="33.534" height="33.534" viewBox="0 0 33.534 33.534"><path id="Контур_19" data-name="Контур 19" d="M25.83,4.57l.246,21.895L4.57,26.214" transform="translate(-5.032 16.63) rotate(-45)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg></button>',
	
  });

  $(".example").elimore({
  maxLength: 120,
  moreText: 'Развернуть',
lessText: 'Свернуть'
});

  
	</script>