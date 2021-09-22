<?php
if (have_posts()) : while (have_posts()) : the_post();
	if( have_rows('building') ): 
		while ( have_rows('building') ) : the_row(); 
			if( get_row_layout() == 'catalog' ) {
?>
			<div id="carts-wrap" class="catalog-wrap">
				<div id="cart-close" title="Закрыть">
					<svg id="cancel" viewBox="0 0 129 129" width="28" height="28"><path d="M7.6 121.4c.8.8 1.8 1.2 2.9 1.2s2.1-.4 2.9-1.2l51.1-51.1 51.1 51.1c.8.8 1.8 1.2 2.9 1.2 1 0 2.1-.4 2.9-1.2 1.6-1.6 1.6-4.2 0-5.8L70.3 64.5l51.1-51.1c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0L64.5 58.7 13.4 7.6C11.8 6 9.2 6 7.6 7.6s-1.6 4.2 0 5.8l51.1 51.1-51.1 51.1c-1.6 1.6-1.6 4.2 0 5.8z"></path></svg>
				</div>
			<?php 		
				if(get_sub_field('carts')){
					$args = array(
						'post_type' => array('catalog'),
						'showposts' => -1,
						'post__in' => get_sub_field('carts'),
					);
				}else{
					$args = array(
						'post_type' => array('catalog'),
						'showposts' => -1,
						'order' => 'ASC',
					);
				}	
				$the_query = new WP_Query( $args );
				while ( $the_query->have_posts() ) : $the_query->the_post();
					$image = get_field('image');
					$intro = get_field('intro');
					$price = get_field('price');
					$sale = get_field('sale');
					
					$pricearea = get_field('pricearea');
					$pricearea_label = '';
					if($pricearea){
						$pricearea_label = '/м&sup2;';
					}
					
					$pricestart = get_field('pricestart');
					$pricestart_label = '';
					if($pricestart){
						$pricestart_label = 'от ';
					}
					
					$labels = get_field('labels');
					$label = NULL;
				?>
					<div id="cart-wrap-<?php echo get_the_ID() ; ?>" class="cart-wrap">
						<div class="cart">
							<div class="body">
								<div class="name">
									<?php echo get_the_title();?>
								</div>
								<div class="intro">
									<?php echo $intro;?>
								</div>
								<div class="parameters">
									<?php get_template_part('template-parts/cart-parameters');?>
								</div>
							</div>
							<div class="image">
								<div class="slider">
									<?php
									foreach( $image as $img ):
									?>
									<a href="<?php echo $img['sizes']['large']; ?>" class="" data-fancybox='images-<?php echo get_the_ID() ; ?>'>
										<img src="<?php echo $img['sizes']['item']; ?>" alt="<?php echo get_the_title();?>">
									</a>
									<?php 
									endforeach;
									?>
								</div>
								<div class="labels">
									<?php //echo implode( ', ', $label ); ?>
									<?php 
									foreach( $labels as $label_arr ): 
										echo '<span class="'.$label_arr['value'].'">'.$label_arr['label'].'</span>';
									endforeach;  
									?>
									<?php if($sale){ ?>
									<span class="sale">Акция</span>
									<?php } ?>
								</div>
							</div>
								<div class="full list">
									<?php the_sub_field('full'); ?>
								</div>
							<?php if($sale || $price){ ?>
							<div class="price">
								<?php if($sale){ ?>
								<strong>Итоговая стоимость: </strong>
								<div>
								<del><?php echo number_format($price, 0, '', ' '); ?> руб.<? echo $pricearea_label; ?></del>
								<? echo $pricestart_label; ?><span><?php echo number_format($sale, 0, '', ' '); ?></span> руб.<? echo $pricearea_label; ?>
								</div>
								<?php }else{ ?>
								<strong>Итоговая стоимость: </strong>
								<? echo $pricestart_label; ?><span><?php echo number_format($price, 0, '', ' '); ?></span> руб.<? echo $pricearea_label; ?>
								<?php } ?>
							</div>
							<?php }else{ ?>
							<div class="price">
								По запросу
							</div>
							<?php } ?>
							
							<?php 
							$formTitle = get_sub_field('form-head');
							$formDesk = get_sub_field('form-desc');
							$formEmail = "";
							$formTextarea = "";
							$formBtn = get_sub_field('form-btn');
							include (locate_template('blocks/block-form.php'));
							?>
						</div>
					</div>
				<?php 
				endwhile; 
				wp_reset_query();
				?>
			</div>
<?php 
			}
		endwhile;
	endif;
endwhile; endif;

?>

<script>
$(document).ready(function(){
	$('#carts-wrap .slider').slick({
		lazyLoad: 'ondemand',
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		infinite: false,
		arrows: false,
	});
});
</script>

