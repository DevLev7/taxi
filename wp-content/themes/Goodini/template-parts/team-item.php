					<div class="<? echo $class2; ?>">
						<div <? echo $progress ? 'class="item fancybox autoheight" data-fancybox data-src="#popup-team-'.$team_num.'"': 'class="item autoheight" ' ;?>>
							<div class="team">
								<div class="avatar">
									<img src="<?php echo get_field("avatar")['sizes']['team'];?>">
								</div>
								<div class="body">
									<div class="name">
										<?php the_title();?>
									</div>
									<div class="position">
										<?php the_field('position');?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				<?php if($progress){ ?>
					<div id="popup-team-<? echo $team_num; ?>" class="popup-team">
						<div class="team">
							<div class="avatar">
								<img src="<?php echo get_field("avatar")['sizes']['team'];?>">
							</div>
							<div class="name-block">
								<div class="name">
									<?php the_title();?>
								</div>
								<div class="position">
									<?php the_field('position');?>
								</div>
								<div class="progress">
									<?php echo $progress ;?>
								</div>
							</div>
						</div>
					</div>
				<?php }?>