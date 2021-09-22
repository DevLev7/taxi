<?php 
	get_header(); 
?>
	<section id="news">
		<div class="container-fluid">
			<div class="header">
				<h1>Новости компании</h1>
			</div>
			<div class="row">
				<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => array('news'),
					//'showposts' => -1,
					'paged' => $paged
				);
				$the_query = new WP_Query( $args );
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
				?> 
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<a href="<?php the_permalink(); ?>" class="item autoheight" title="<?php echo get_the_title(); ?>">
					
						<div class="image">
							<img src="<?php echo get_field('gallery')[0]['sizes']['item']; ?>"  alt="<?php echo get_the_title(); ?>" />				   
							<div class="date">
							<?php 
								$d1 = strtotime(get_the_date());
								$dCurrent = strtotime(date('d-m-Y'));
								$d2 = floor((($dCurrent - $d1)/1000)*$leight_header/round($leight_header, -1)); ;
								setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');  
								echo $date_format = strftime("%e %B %Y&nbsp;г.", $d1);
							 ?>
							</div>
						</div>
						<div class="title">
							<?php the_title(); ?>
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
	<?php //get_template_part('blocks/block','manager'); ?>
	
<?php 
	get_footer(); 
?>