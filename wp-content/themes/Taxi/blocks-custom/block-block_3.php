<div id="block_3" >
	
	<div class="container-fluid">
		<div class="block_3">
			<div class="row">
				<div class="col-12">
					
				<?php echo get_field('bl3_title'); ?>
					<div class="favor_wrap " >
							
						<?php 
							while( have_rows('bl3_rep') ): the_row(); 
							$img = get_sub_field('img');
							$text = get_sub_field('text');
							
								
						?>
							<div class="favor_item ">
								<div class="favor_inner">
									<div class="favor_text">
										<div class="image">
											<div class="image_wrap">
											<?php echo file_get_contents($img);?>
											</div>
										</div>
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