<?php 
	get_header(); 
?>
	
	<section class="faq">
		<div class="container-fluid"> 
			<div class="row">
				<div class="col-s">
					<div class="header ct">
						<h1>Ответы на частые вопросы</h1>
					</div>
					<div class="spoilers">
						<?php
						$item = 0;
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array(
							'post_type' => array('faq'),
							'showposts' => -1,
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
					<div class="button ct">
						 <div data-src="#popup-question" data-fancybox="" class="btn" anim="ripple"><span>Задайте свой вопрос</span></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php 
	get_footer(); 
?>