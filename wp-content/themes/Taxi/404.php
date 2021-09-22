<?php get_header(); ?>

	<section id="hero" >
	<div class="circle1"></div>
	<div class="circle2 "></div>
	<img class="error_img lazy" data-src="<?php echo THEME_IMAGES; ?>/error.png">  
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 col-lg-8 col-ml-9 col-sm-10">
					<div class="main">
						<div class="wrap">
							<div class="header list">
								<h4>Ой, что-то пошло не так.</h4>
							</div>
							<div class="button border">
                        <a href="<?php echo home_url().'/';?>" class="btn" class="ct">
							<div class="btn-rad-f">
								<span>Перейти на главную</span>
								<div class="btn_icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="20.687" height="20.687" viewBox="0 0 20.687 20.687">
											<path id="Контур_1" data-name="Контур 1" d="M13.128,0V13.128H0" transform="translate(0 10.343) rotate(-45)" fill="none" stroke="#f9c14a" stroke-width="3"/>
											</svg>
								</div>							
							
						</div>
                    </a>
                </div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>