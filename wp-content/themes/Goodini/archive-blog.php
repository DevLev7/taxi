<?php 
	get_header(); 
?>
	<section id="blog">
		<div class="container-fluid">
			<div class="header">
				<h1><?
					if ( is_post_type_archive() ) {
						echo post_type_archive_title( '', false );
					} elseif ( is_tax() || is_category() || is_tag() ) {
						echo single_term_title( '', false );
					}			
				?></h1>
			</div>
			<div class="row">
				<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => array('blog'),
					'showposts' => -1,
					'paged' => $paged
				);
				$the_query = new WP_Query( $args );
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
				
					// Формирование звездного рейтинга статьи
					$leight_header = mb_strlen(get_the_title(),'UTF-8');
					$leight_date = date("d",strtotime(get_the_date()));
					$leight = $leight_header * $leight_date / 4.3;
					$leight_2 = round($leight , 2);
					$leight_0 = floor($leight);
					$ratings = ($leight_2 - $leight_0)+4;
				?> 
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<a href="<?php the_permalink(); ?>" class="item autoheight" title="<?php echo get_the_title(); ?>">
					
					   <div class="image">
							<img src="<?php echo get_field('image')['sizes']['item']; ?>"  alt="<?php echo get_the_title(); ?>" />
					   </div>
						
						<div class="body">
							<div class="info_content">
								<div id="date">
								<?php 
									$d1 = strtotime(get_the_date());
									$dCurrent = strtotime(date('d-m-Y'));
									$d2 = floor((($dCurrent - $d1)/1000)*$leight_header/round($leight_header, -1)); ;
									setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');  
									echo $date_format = strftime("%e %B %Y&nbsp;г.", $d1);
								 ?>
								</div>
								<div class="ratings">
									<div class="ratings-stars"><div class="ratings-stars-active" style="width: <? echo floor($ratings*20); ?>%"></div></div>
									<? echo $ratings; ?>
								</div>
							</div>
							<div class="title">
								<?php the_title(); ?>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	
	<?php get_template_part('blocks/block','pagination');?>
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