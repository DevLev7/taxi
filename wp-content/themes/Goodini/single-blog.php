<?php
get_header();
the_post();

// Формирование звездного рейтинга статиь
$leight_header = mb_strlen(get_the_title(),'UTF-8');
$leight_date = date("d",strtotime(get_the_date()));
$leight = $leight_header * $leight_date / 4.3;
$leight_2 = round($leight , 2);
$leight_0 = floor($leight);
$ratings = ($leight_2 - $leight_0)+4;
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
	
	<section id="blog-hero" class="dark brushtop" style="background-image: url(<?php echo get_field('image')['url'] ; ?>)" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
        <meta itemprop="url" content="<?php echo get_field('image')['url'] ; ?>" />
		<meta itemprop="width" content="<?php echo get_field('image')['width'] ; ?>" />
        <meta itemprop="height" content="<?php echo get_field('image')['height'] ; ?>" />
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
							<div class="comments">
								<div class="ratings" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
									<meta itemprop="bestRating" content="5" />
									<meta itemprop="worstRating" content="1" />
									<meta itemprop="ratingValue" content="<? echo $ratings; ?>" />
									<meta itemprop="ratingCount" content="<? echo $d2; ?>" />
									<div class="ratings-stars"><div class="ratings-stars-active" style="width: <? echo floor($ratings*20); ?>%"></div></div>
									<? echo $ratings; ?>
								</div>
								<div class="view"><svg xmlns="http://www.w3.org/2000/svg" ><path d="M12 9a3 3 0 1 1 0 6 3 3 0 1 1 0-6m0-4.5c5 0 9.27 3.1 11 7.5-1.73 4.4-6 7.5-11 7.5S2.73 16.4 1 12c1.73-4.4 6-7.5 11-7.5M3.18 12a9.82 9.82 0 0 0 17.64 0 9.82 9.82 0 0 0-17.64 0z"/></svg><? echo $d2; ?></div>
							</div>
						</div>
						<div class="list">
							<?php the_content(); ?>
						</div>
						<div class="info-block">
							<div class="info">
								<div class="date">
								<?php 
									$d1 = strtotime(get_the_date());
									$dCurrent = strtotime(date('d-m-Y'));
									$d2 = floor((($dCurrent - $d1)/1000)*$leight_header/round($leight_header, -1)); ;
									setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');  
									echo $date_format = strftime("%e %B %Y г.", $d1);
								 ?>
								</div>
								<div class="autor"><?php echo get_field('form-manager','option')['name']; ?></div>
							</div>
							<div class="comments">
								<div class="ratings" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
									<meta itemprop="bestRating" content="5" />
									<meta itemprop="worstRating" content="1" />
									<meta itemprop="ratingValue" content="<? echo $ratings; ?>" />
									<meta itemprop="ratingCount" content="<? echo $d2; ?>" />
									<div class="ratings-stars"><div class="ratings-stars-active" style="width: <? echo floor($ratings*20); ?>%"></div></div>
									<? echo $ratings; ?>
								</div>
								<div class="view"><svg xmlns="http://www.w3.org/2000/svg" ><path d="M12 9a3 3 0 1 1 0 6 3 3 0 1 1 0-6m0-4.5c5 0 9.27 3.1 11 7.5-1.73 4.4-6 7.5-11 7.5S2.73 16.4 1 12c1.73-4.4 6-7.5 11-7.5M3.18 12a9.82 9.82 0 0 0 17.64 0 9.82 9.82 0 0 0-17.64 0z"/></svg><? echo $d2; ?></div>
							</div>
						</div>
					</div>
					<div class="autor-block">
						<div class="autor-info">
							<div class="avatar">
								<img src="<?php echo get_field('form-manager','option')['avatar']['url']; ?>">
							</div>
							<div class="name">
								<?php echo get_field('form-manager','option')['name']; ?>
							</div>
						</div>
						<div class="list">
							<div class="header">
								Другие статьи автора:
							</div>
							<ul>
								<?php 
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args = array(
										//'author__in' => array(get_the_author_meta('ID') ),
										'post_type' => 'blog',
										'showposts' => 10,
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