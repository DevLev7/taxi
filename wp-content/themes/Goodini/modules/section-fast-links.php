	<section id="<?php echo $building_row; ?>" class="fast-links">
		<div class="container-fluid">
			<div class="row">
			<?php
			$count = count( get_sub_field( 'fast-link' ) );
			while( have_rows('fast-link') ): the_row(); 
				$head = get_sub_field('head');
				$desk = get_sub_field('desk');
				$link = get_sub_field('link');
			?>	
				<?php
				if ($count == 3){
					$col = 'col col-lg-4';
				}elseif($count == 4){
					$col = 'col col-lg-3';
				}else{
					$col = 'col col-lg-6';
				}
				?>	
				<div class="<?php echo $col; ?>">
					<div class="item ct">
						<?php echo $link ? '<a href="'.$link.'" class="head autoheight">' : '<div class="head autoheight">'; ?>
							<?php echo $head; ?>
						<?php echo $link ?  '</a>' : '</div>'; ?>
						<?php if($desk){ ?>
						<div class="desk">
							<p><?php echo $desk; ?></p>
						</div>
						<?php } ?>
					</div>
				</div>
			<?php 
			endwhile;
			wp_reset_query();
			?>
			</div>
		</div>
	</section>