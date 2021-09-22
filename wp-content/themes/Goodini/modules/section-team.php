<?php
if(get_sub_field('slider')){
	$class1 = 'slider';
	$class2 = 'item-wrap';
} else {	
	$class1 = 'row';
	$class2 = 'col-ml-3 col-md-4 col-sm-6 col';
}

?>
	<section id="team">
		<div class="container-fluid">
			<?php if(get_sub_field('header')){ ?>
			<div class="header list">
				<?php the_sub_field('header'); ?>
			</div>
			<? } ?>
			<div class="team-wrap">
				<div class="<? echo $class1; ?>">
					<?
					if(get_sub_field('team-items')){
						$args = array(
							'post_type' => array('team'),
							'showposts' => -1,
							'post__in' => get_sub_field('team-items'),
							'order' => 'deSC',
						);
					}else{
						$args = array(
							'post_type' => array('team'),
							'showposts' => -1,
							'orderby' => 'rand',
						);
					}	
					$team_num = 0;
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) : $the_query->the_post();
					$team_num++; 
					$progress = get_field('progress');
					?>
					<?php include (locate_template('template-parts/team-item.php')); ?>
					<?php 
						endwhile; 
						wp_reset_query()
					?>
				</div>
				<div class="team-arrow"></div>
			</div>
			<?php if(get_sub_field('footer')){ ?>
			<div class="footer list">
				<?php the_sub_field('footer'); ?>
			</div>
			<? } ?>
			<div class="button ct">
				<button data-src="#popup-consultation" data-fancybox="" class="btn" anim="ripple">
					<span>Бесплатная консультация</span>
				</button>
			</div>
		</div>
	</section>