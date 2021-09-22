	<section class="cases">
		<div class="container-fluid">
			<div class="header list">
				<?php the_sub_field('header'); ?>
			</div>
			<?php if(get_sub_field('type')== 'slider'){ ?>
			<div class="row">
				<div class="col-m">
					<div class="slider">
					<?php 		
						if(get_sub_field('items')){
							$args = array(
								'post_type' => array('cases'),
								'showposts' => -1,
								'post__in' => get_sub_field('items'),
								'order' => 'ASC',
							);
						}else{
							$args = array(
								'post_type' => array('cases'),
								'showposts' => -1,
								'order' => 'ASC',
							);
						}	
						$the_query = new WP_Query( $args );
						$case_num = "";
						while ( $the_query->have_posts() ) : $the_query->the_post();
							$case_num++;
							$gallery_arr = get_field('gallery');
							$logo = get_field('detail')['logo'];
							$year = get_field('detail')['year'];
							$adress = get_field('detail')['adress'];
							$doc = get_field('detail')['doc'];
						?>
							<div class="item">
								<div class="case">
									<div class="row">
										<div class="col-md-6">
											<div class="case-gallery">
												<?php
												foreach( $gallery_arr as $image ):
												?>
													<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>' class="image" style="background-image: url(<?php echo $image['sizes']['item']; ?>);">
													</a>
												<?php
												endforeach;
												?>
											</div>
											<div class="cases-paging"></div>
										</div>
										<div class="col-md-6">
											<div class="content">
												<div class="title">
													<h3><?php the_title();?></h3>
												</div>
												<div class="desc list">
													<?php the_content();?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php 
						endwhile; 
						wp_reset_query();
						?>
					</div>
					<div class="gallery-arrow"></div>
				</div>
			</div>
			<?php }elseif(get_sub_field('type')== 'grid'){ ?>
			<div class="grid">
			<?php 			
				if(get_sub_field('items')){
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'post__in' =>get_sub_field('items'),
						//'order' => 'ASC',
						'orderby' => 'post__in',
					);
				}else{
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'order' => 'ASC',
					);
				}	
				$the_query = new WP_Query( $args );
				$case_num = "";
				while ( $the_query->have_posts() ) : $the_query->the_post();
					$case_num++;
					$gallery_arr = get_field('gallery');
					$logo = get_field('detail')['logo'];
					$year = get_field('detail')['year'];
					$intro = get_field('detail')['intro'];
					$doc = get_field('detail')['doc'];
					if($case_num <=12){
				?>
					<div class="item item-<?php echo $case_num; ?>">
						<div class="case">
							<div class="images">
								<?php
								$image_item = "";
								foreach( $gallery_arr as $image ):
								$image_item++;
								$image_style = "";
								if($image_item==1){
								?>
									<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>' class="image" <? echo $image_style; ?>>
										<div class=" progressive replace" data-href="<?php echo $image['url']; ?>">
											<img src="<? echo $gallery_arr[0]["sizes"]['micro'];?>" class="preview" alt="<?php the_title();?>" />
										</div>
									</a>
								<?php
								}else{
								?>
									<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>'></a>
								<?php
								}
								endforeach;
								?>
							</div>
							<div class="wrap <?php echo $intro ? "intro-on" : "" ;?>">
								<div class="title">
									<h3><?php the_title();?></h3>
								</div>
								<div class="intro">
									<?php echo $intro;?>
								</div>
							</div>
						</div>
					</div>
				<?php 
					}
				endwhile; 
				wp_reset_query();
				?>
			</div>
			<?php } ?>
			<?php if(get_sub_field('footer')){ ?>
			<div class="footer list">
				<?php the_sub_field('footer'); ?>
			</div>
			<?php } ?>
		</div>
	</section>