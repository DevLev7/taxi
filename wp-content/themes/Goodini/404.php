<?php get_header(); ?>

	<section id="hero" >
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 col-lg-8 col-ml-9 col-sm-10">
					<div class="main">
						<div class="wrap">
							<div class="header list">
								<h1>Ошибка 404</h1>
							</div>
							<div class="intro list">
								Материал не найден.<br/>
								Воспользуйтесь поиском или перейдите на главную
							</div>
							<div class="button">
								 <a href="<?php echo home_url().'/';?>" class="btn"><span>Перейти на главную</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-lg-4 col-ml-5 col-md-5">
					<div class="form-wrap">
						<?php 
						$formTitle = "Поделитесь проблемой";
						$formDesk = "Расскажите нам, как вы попали на данную страницу, чтобы мы смогли принять меры и исключить ошибку";
						$formTextarea = "Ваше сообщение";
						$formBtn = "Отправить сообщение";
						include (locate_template('blocks/block-form.php'));
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>