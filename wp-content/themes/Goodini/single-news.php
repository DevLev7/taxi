<?php
get_header();
the_post();
?>	

	<div id="barholder">
		<div id="barline"></div>
	</div>
	<script>
    /*progressbar*/
	$(window).scroll(function(){
		var articleStart = $('#blog-hero').outerHeight() + $('#blog-hero').offset().top;
		var windowScroll = $(window).scrollTop() - articleStart;
		var contentHeight = $('#blog .article').height();
		var barStatus = windowScroll/contentHeight*100;
		console.log(windowScroll);
		
		if(barStatus > 0 && barStatus <= 101){
			$('#barholder #barline').width(barStatus + '%');
			$('#barholder').addClass('visible');
		}else{
			$('#barholder').removeClass('visible');
		}
	})
	</script>
		
	<div itemscope="" itemtype="http://schema.org/Article">
		<meta itemprop="name" content="<?php echo get_the_title(); ?>" />
		<meta itemprop="headline" content="<?php echo get_the_title(); ?>" />
		<meta itemprop="description" content="<?php echo get_field('intro'); ?>" />
		<meta itemprop="datePublished" content="<?php echo get_the_date('Y-m-d'); ?>" />
		<meta itemprop="dateModified" content="<?php echo get_the_date('Y-m-d'); ?>" />
		<meta itemprop="url" content="<?php echo home_url( $_SERVER['REDIRECT_URL'] );?>" />
		<meta itemprop="author" content="<?php echo get_field('form-manager','option')['name']; ?>" />
		<meta itemprop="mainEntityOfPage" content="<?php echo home_url( $_SERVER['REDIRECT_URL'] );?>" />
	
	<section id="blog-hero" class="dark brushtop" style="background-image: url(<?php echo get_field('gallery')[0]['url'] ; ?>)" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
        <meta itemprop="url" content="<?php echo get_field('gallery')[0]['url'] ; ?>" />
		<meta itemprop="width" content="<?php echo get_field('gallery')[0]['width'] ; ?>" />
        <meta itemprop="height" content="<?php echo get_field('gallery')[0]['height'] ; ?>" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-s">
					<div class="left ct">
						<div id="breadcrumbs" class="white-text">
							<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
						</div>
						<div class="header">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="desc list">
							<?php the_field('intro'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
	<section id="blog" class="">
		<div class="container-fluid">
			<div class="row">
				<div class="col-s">
					<div class="article">
						<div class="info-block">
							<div class="info">
								<div class="date">
								<?php 
									$d1 = strtotime(get_the_date());
									$dCurrent = strtotime(date('d-m-Y'));
									$d2 = floor((($dCurrent - $d1)/1000)*$leight_header/round($leight_header, -1)); ;
									setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');  
									echo $date_format = strftime("%e %B %Y&nbsp;г.", $d1);
								 ?>
								</div>
								<div class="autor"><?php echo get_field('form-manager','option')['name']; ?></div>
							</div>
						</div>
						<div class="list">
							<?php the_content(); ?>
						</div>
						<div class="gallery-grid">
							<div class="row">
							<?php							
							// Массив изображений
							$gallery_arr = get_field('gallery');
											
							//	Адаптивное изображение
							$imageSize = 'item';
							include (locate_template('template-parts/lazy-image-responsive-IE.php'));
							
							foreach( $gallery_arr as $image ):
								$imageHeight = $image['sizes']['item-height'];
								$imageWidth = $image['sizes']['item-width'];
								$imagePadding = $imageHeight / $imageWidth * 100;

								if($imagePadding < 80){ // костыль для IE (не поддерживает min() / max())
									$imageStylePadding = round($imagePadding).'%';
								}else{
									$imageStylePadding = round($imageHeight).'px';
								}

								$imageStyle = 'style="
									padding-bottom: '.$imageStylePadding.'; 
									padding-bottom: min('.$imagePadding.'%,'.$imageHeight.'px);
									max-width: '.$imageWidth.'px;
									max-height: '.$imageHeight.'px;
								"';
							?>
								<div class="col-md-4 col-6">
									<div class="image">
										<a href="<?php echo $image['url']; ?>" class="lazy-image" <?php echo $imageStyle; ?> data-fancybox='images-<?php echo $building_row; ?>'>
											<div class=" progressive replace" data-href="<?php echo $image['sizes']['item']; ?>">
												<img src="<? echo $image["sizes"]['micro-item'];?>" class="preview" alt="<?php echo get_the_title(); ?>-<?php echo get_row_index(); ?>" />
											</div>
										</a>
									</div>
								</div>
							<?php 
							endforeach;
							?>
							</div>
						</div>
					</div>
					<div class="autor-block">
						<div class="list">
							<div class="header">
								Другие новости:
							</div>
							<ul>
								<?php 
									
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args = array(
										//'author__in' => array(get_the_author_meta('ID') ),
										'post_type' => 'news',
										'showposts' => 10,
										'post__not_in' => array(get_the_ID()),
										'paged' => $paged
									);
									$the_query = new WP_Query( $args );
									while ( $the_query->have_posts() ) : $the_query->the_post(); 
								?>
								<li>
									<a class="item autoheight" href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
								<?php 
								endwhile;
								wp_reset_query();
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	
	</div>
	
		
<?php 
//	Смежные статьи
if(in_array("similar", get_field('sections','option')) && !in_array(get_the_ID(),get_field('similar-setting','option')['disable'])){ 
	get_template_part('blocks/block','similar');
}
?>
	<?php get_template_part('blocks/block','manager');?>
<?php
get_footer();
?>