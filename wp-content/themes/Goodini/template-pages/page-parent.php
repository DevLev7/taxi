<?php /* Template Name: Страница "Родительская" */?>
<?php get_header(); ?>	
<?php 
	// Определение мобильного устройства
	// Подключение и иниализация
	get_template_part('functions/Mobile_Detect');
	$detect = new Mobile_Detect;
?>
	
	<section id="pages">
		<div class="container-fluid">
			<div class="row">
				<div class="col-m">
					<h1><?php the_title(); ?></h1>
				<?php	
				$stati_children = new WP_Query(array(
						'post_type' => 'page',
						//'orderby' => 'name',
						//'order' => 'ASC',
						'post_parent' => get_the_ID(),
						'post__not_in' => array(516),
					)
				);	
				while($stati_children->have_posts()): $stati_children->the_post();
				?>
					<?php if( !$detect->isMobile() && !$detect->isTablet() ){ ?>
					<a href="<?php the_permalink(); ?>" class="item" style="background-image: url(<?php echo get_field('group')['hero-bg']['url']; ?>)">
					<?php }else{ ?>
					<a href="<?php the_permalink(); ?>" class="item">				
						<div class="image">
							<img src="<?php echo get_field('group')['hero-bg-sm']; ?>">
						</div>
					<?php } ?>
						<div class="body">
							<div class="title">
								<?php echo str_replace("h1","h2",get_field('hero-header')); ?>
							</div>
							<div class="desc list">
								<?php the_field('hero-desc'); ?>
							</div>
							<div class="button">
								 <span class="btn"><span>Подробнее...</span></span>
							</div>
						</div>
					</a>
				<?php
				endwhile;
				wp_reset_query();
				?>
			</div>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>