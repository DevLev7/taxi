<?php
get_header();
the_post(); 
$customer = get_field('detail')['customer'];
$town = get_field('detail')['town'];
$year = get_field('detail')['year'];
$intro = get_field('detail')['intro'];
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
					<div class="left">
						<div id="breadcrumbs" class="white-text">
							<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
						</div>
						<div class="header">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="desc list">
							<?php echo $intro; ?>
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
						<?php if($customer || $town || $year){ ?>
						<div class="info-block">
							<div class="info">
								<?php if($customer){ ?>
								<div class="detail">
									<svg viewBox="0 0 24 24">
										<path d="M20,6H16V4A2,2 0 0,0 14,2H10C8.89,2 8,2.89 8,4V6H4C2.89,6 2,6.89 2,8V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V8A2,2 0 0,0 20,6M10,4H14V6H10V4M12,9A2.5,2.5 0 0,1 14.5,11.5A2.5,2.5 0 0,1 12,14A2.5,2.5 0 0,1 9.5,11.5A2.5,2.5 0 0,1 12,9M17,19H7V17.75C7,16.37 9.24,15.25 12,15.25C14.76,15.25 17,16.37 17,17.75V19Z" />
									</svg>
									<?php echo $customer; ?>
								</div>
								<?php } ?>
								<?php if($town){ ?>
								<div class="detail">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano"><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.5 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5L406.23 251.687c13.375-24.76 20.438-52.77 20.438-81.02C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.28-85.333-85.333S208.948 85.334 256 85.334s85.333 38.28 85.333 85.333S303.052 256 256 256z"/></svg>
									<?php echo $town; ?>
								</div>
								<?php } ?>
								<?php if($year){ ?>
								<div class="detail">
									<svg viewBox="0 0 24 24">
										<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M17 13H11V7H12.5V11.5H17V13Z" />
									</svg>
									<?php echo $year; ?> г.
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						<div class="list">
							<?php the_content(); ?>
						</div>
						<?php if(get_field('gallery')){ ?>
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
						<?php } ?>
					</div>
					<div class="autor-block">
						<div class="list">
							<div class="header">
								Другие проекты:
							</div>
							<ul>
								<?php 
									
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args = array(
										//'author__in' => array(get_the_author_meta('ID') ),
										'post_type' => 'cases',
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