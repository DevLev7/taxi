	<section id="custom-<?php echo get_sub_field('custom-name'); ?>">
		<div class="container-fluid">
			<div class="header list">
				<?php the_sub_field('header'); ?>
			</div>
			<?php get_template_part('blocks-custom/block-'.get_sub_field('custom-name')); ?>
			<div class="footer list">
				<?php the_sub_field('footer'); ?>
			</div>
		</div>
	</section> 