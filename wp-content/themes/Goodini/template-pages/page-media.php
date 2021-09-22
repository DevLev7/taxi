<?php /* Template Name: Медиа подборки */?>
<?php get_header(); ?>	
	
	<section id="media">
		<div class="container-fluid">
			<div class="header">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="subheader">
				<?php the_field('intro'); ?>
			</div>
			<div class="row">
				<?php	
				while( have_rows('media-repeater') ): the_row(); 
				?>
				<div class="col-lg-25 col-ml-3 col-md-4 col-6">
					<div class="item">				
						<div class="image autoheight <?php echo get_sub_field('text') ? "text" : "" ;?>">
							<img src="<?php echo get_sub_field('image')['sizes']['team']; ?>">
							<div class="desc list">
								<?php the_sub_field('text'); ?>
							</div>
						</div>
						<div class="body">
							<div class="name">
								<?php the_sub_field('name'); ?>
							</div>
							<div class="year">
								<?php the_sub_field('year'); ?> г.
							</div>
						</div>
					</div>
				</div>
				<?php
				endwhile;
				wp_reset_query();
				?>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>