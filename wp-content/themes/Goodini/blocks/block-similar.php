
	
	<section id="similar">
		<div class="container-fluid">
			<div class="header">
				Также предлагаем
			</div>
			<div class="row">
				<?php
				$post__not_in = array_merge(array(get_page_by_title('Контакты')->ID,get_page_by_title('Политика конфиденциальности')->ID,get_page_by_title('Страница благодарности')->ID,get_page_by_title('О компании')->ID),get_field('similar-setting','option')['exclude']);
				$arr = new WP_Query(array(
					'post_type' => 'page',
					'showposts' => "8",
					'orderby' => 'rand',
					//'order' => 'ASC',
					//'post_parent' => get_the_ID(),
					'post__not_in' => $post__not_in,
				));	
				while($arr->have_posts()): $arr->the_post();
				?>
				<div class="col-ml-3 col-md-4 col-6">
					<a href="<?php the_permalink(); ?>" class="item autoheight">				
						<div class="image">
							<img src="<?php echo get_field('group')['hero-bg-sm']; ?>">
						</div>
						<div class="title">
							<?php 
							/*$alt_text = get_field('hero-header');
							preg_match("~<h1>(.*)</h1>~",$alt_text,$alt_preg);
							echo $alt = strip_tags($alt_preg[1]);*/
							the_title();
							?>
						</div>
					</a>
				</div>
				<?php
				endwhile;
				wp_reset_query();
				?>
			</div>
		</div>
	</section>