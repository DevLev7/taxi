
	<section class="spoiler-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-ml-4">
					<div class="header">
						<?php the_sub_field('header'); ?>
					</div>
				</div>
				<div class="col-ml-8">
					<div class="spoilers">
						<?php
						$item = 0;
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array(
							'post_type' => array('faq'),
							'showposts' => 5,
							'post__in' => get_sub_field('item'),
							'paged' => $paged
						);
						$the_query = new WP_Query( $args );
						while ( $the_query->have_posts() ) : $the_query->the_post(); 
							$item++;
						?>
						<div class="spoiler <?php echo $active; ?>">
							<div class="spoiler-head">
								<h3><?php the_title();?></h3>
							</div>
							<div class="spoiler-content list">
								<?php the_content();?>
							</div>
						</div>
						<?php  
						endwhile;
						wp_reset_query();
						?>
					</div>
					<div class="link ct">
						 <a href="<?php echo HOME_URI; ?>faq/" class="">Перейти в раздел вопросов и ответов</a>
					</div>
					<div class="footer">
						<?php the_sub_field('footer'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>