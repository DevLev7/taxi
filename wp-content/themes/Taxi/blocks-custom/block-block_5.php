<div id="block_5" >
	<div class="container-fluid">
	
		<div class="block_5">
			<div class="row">
				<div class="col-12">
				<div class="content" >
					<?php echo get_field('bl5_title'); ?>
					<div class="grid_block">
					<?php 
										$item_num3 = 0;
										while( have_rows('bl5_rep') ): the_row(); 
											$item_num3 ++;
											$img = get_sub_field('img');
											$title = get_sub_field('title');
											$text = get_sub_field('text');
											$link = get_sub_field('link');
											$id = 'item_'.$item_num3;
										?>
											<div class="item <?php echo $id; ?>">
												<div class="title"><?php echo $title; ?></div>
												<div class="text"><?php echo $text; ?></div>
												<div class="details">
													<a >Подробнее</a>
												</div>
												<div class="image">
													<img class="lazy" data-src="<?php echo $img; ?>" alt="">
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
</div>