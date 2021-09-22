<?php
if(get_field('team-setting','option')['slider']){
	$class1 = 'slider';
	$class2 = 'item-wrap';
} else {	
	$class1 = 'row';
	$class2 = 'col-ml-3 col-md-4 col-sm-6 col';
}

?>
	<section id="team">
		<div class="container-fluid">
			<?php if(get_field('team-setting','option')['header']){ ?>
			<div class="header list">
				<?php echo get_field('team-setting','option')['header']; ?>
			</div>
			<? } ?>
			<div class="team-wrap">
				<div class="<? echo $class1; ?>">
					<?
					$args = array(
						'post_type' => array('team'),
						'post__not_in' => get_field('team-setting','option')['exclude'],
						'showposts' => -1,
						//'orderby' => 'rand',
					);
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
			<?php if(get_field('team-setting','option')['footer']){ ?>
			<div class="footer list">
				<?php echo get_field('team-setting','option')['footer']; ?>
			</div>
			<? } ?>
		</div>
	</section>