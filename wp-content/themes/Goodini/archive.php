<?php 
	get_header(); 
	$posttype = $post->post_type; 
	$obj = get_post_type_object($posttype);
	$postname = $obj->labels->singular_name;
?>
	<section id="hero-archive"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col-s">
					<div class="utp ct">
						<div class="utp-header">
							<h1><?php echo $postname; ?></h1>
						</div>
						<div class="utp-desc">
							<?php the_archive_description() ; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="category">
		<div class="container-fluid">
			<div class="blog">
			<?php 
			while ( have_posts() ) : the_post();
			?>
				<div class="item autoheight">
					<?php if(get_field('mainimage-blog')){ ?>
					<div class="item-image">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo get_field('mainimage-blog')['sizes']['category']; ?>">
						</a>
					</div>
					<?php } ?>
					<div class="wrap">
						<div class="wrap-left">
							<div class="item-autor">
								<div class="avatar image_circle">
									<img src="<?php echo get_field("avatar",get_field('autor'))['sizes']['thumbnail'];?>">
								</div>
								<div class="name">
									<?php echo get_the_title(get_field('autor'));?>
								</div>
							</div>
							<ul class="item-date">
								<li><a href="<?php echo get_post_type_archive_link($posttype);?>"><?php the_archive_title(); ?></a></li>
								<li><?php echo get_the_date(); ?></li>
							</ul>
						</div>
						<div class="wrap-right">
							<a href="<?php the_permalink(); ?>" class="item-body">
								<div class="item-head">
									<?php the_field('header'); ?>
								</div>
								<div class="item-intro"> 
									<?php the_field('work');?>
								</div>
								<div class="item-link">
									<svg viewBox="0 0 24 24">
										<path d="M22 12L18 8V11H3V13H18V16L22 12Z"></path>
									</svg>
								</div>
							</a>
						</div>
					</div>
				</div>
			<?php 
				endwhile; 
				wp_reset_query()
			?>
			</div>
		</div>
	</section>
	<?php get_template_part('blocks/block','pagination');?>
	
<?php 
	get_footer(); 
?>