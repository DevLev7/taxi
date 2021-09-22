<div id="block_6" >
	
	<div class="container-fluid">
		<div class="block_6">
			<div class="row">
				<div class="col-12">
				<?php echo get_field('bl6_title'); ?>
					<div class="favor_wrap " >
							
						<?php 
							while( have_rows('bl6_rep') ): the_row(); 
							$img = get_sub_field('img');
							$text = get_sub_field('text');
							$title = get_sub_field('title');
							
								
						?>
							<div class="favor_item  animate__fadeInUp animate__animated wow animated " data-wow-duration="2s">
								<div class="favor_inner">
									<div class="favor_text">
										<div class="image">
											<div class="image_wrap">
											<img class="lazy" data-src="<?php echo $img; ?>" alt="">
											</div>
										</div>
										<div class="title">	<?php echo $title; ?></div>
										<div class="text">
										<?php echo $text; ?>
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
			</div>
		</div>
	</div>
</div>