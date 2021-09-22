<div id="block_2" >
	
	<div class="container-fluid">
		<div class="block_2">
			<div class="row">
				<div class="col-12">
					<div class="favor_wrap animate__fadeInUp animate__animated wow animated" data-wow-duration="1s">
						<div class="circle3"></div>
						<div class="circle4"></div>
					<?php 
						while( have_rows('bl2_rep') ): the_row(); 
						$title = get_sub_field('title');
						$subtitle = get_sub_field('subtitle');
						
							
					?>
						<div class="favor_item ">
							<div class="favor_inner">
								<div class="favor_text">
									<div class="title">
									<?php echo $title; ?>
									</div>
									<div class="subtitle">
									<?php echo $subtitle; ?>
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