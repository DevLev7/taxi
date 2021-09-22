<div id="block_7" >
	
	<div class="container-fluid">
		<div class="block_7">
			<div class="row">
				<div class="col-12">
				<?php echo get_field('bl7_title'); ?>
					<div class="favor_wrap " >
							
						<?php 
							while( have_rows('bl7_rep') ): the_row(); 
							
							$text = get_sub_field('text');
							$title = get_sub_field('title');
							
								
						?>
							<div class="favor_item ">
								<div class="favor_inner">
									<div class="favor_text">
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