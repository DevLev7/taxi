<?php 
	get_header(); 
	$posttype = $post->post_type; 
	$obj = get_post_type_object($posttype);
	$postname = $obj->labels->singular_name;
	$class1 = 'row';
	$class2 = 'col-ml-3 col-md-4 col-sm-6';
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
	
	<section id="team">
		<div class="container-fluid">
			<div class="row">
			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => array('team'),
				//'showposts' => "5",
				//'orderby' => "rand",
				'order' => "ASC",
				'showposts' => -1,
				'paged' => $paged
			);
			$the_query = new WP_Query( $args );
			$team_num = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$team_num++; 
			$progress = get_field('progress');
			?>

			<?php include (locate_template('template-parts/team-item.php')); ?>

			<?php 
				endwhile; 
				wp_reset_query()
			?>
			</div>
		</div>
	</section>
	
<?php 
	get_footer(); 
?>