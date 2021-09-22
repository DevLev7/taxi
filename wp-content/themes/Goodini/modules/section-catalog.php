	<section id="catalog">
		<div class="container-fluid">
			<div class="header list">
				<?php the_sub_field('header'); ?>
			</div>
			
			<?php if(get_field('sections-setting','option')['catalog-filter']) {get_template_part('template-parts/cart-parameters-filter');}?>
			
			<div class="carts catalog-wrap">
			<?php 		
				if(get_sub_field('carts')){
					$args = array(
						'post_type' => array('catalog'),
						'showposts' => -1,
						'post__in' => get_sub_field('carts'),
						'order' => 'ASC',
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
					$image = get_field('image')[0];
					$intro = get_field('intro');
					$price = get_field('price');
					$sale = get_field('price-sale');					
					$labels = get_field('labels');
					
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
									
					//	Адаптивное изображение
					$imageSize = 'item';
					include (locate_template('template-parts/lazy-image-responsive-IE.php'));
				?>
					<div class="mix <?php if(get_field('sections-setting','option')['catalog-filter']) {get_template_part('template-parts/cart-parameters-class');}?>">
						<div class="cart" data-cart="cart-wrap-<?php echo get_the_ID() ; ?>">
							<div class="image">
								<div class="lazy-image progressive replace" data-href="<?php echo $image['sizes']['item'.$design_circle_img]; ?>" <?php echo $imageStyle; ?>>
									<img 
									class="preview"
									src="<?php echo $image['sizes']['micro-item']; ?>" 
									alt="<?php echo $head; ?>"
									>
								</div>
								<div class="labels">
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
							<div class="body autoheight">
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
							<?php if($sale || $price){ ?>
							<div class="price">
								Цена: 
								<?php if($sale){ ?>
								<? echo $pricestart_label; ?><span><?php echo number_format($sale, 0, '', '&nbsp;'); ?></span>&nbsp;руб.<? echo $pricearea_label; ?>
								<del><?php echo number_format($price, 0, '', '&nbsp;'); ?>&nbsp;руб.<? echo $pricearea_label; ?></del>
								<?php }else{ ?>
								<? echo $pricestart_label; ?><span><?php echo number_format($price, 0, '', '&nbsp;'); ?></span>&nbsp;руб.<? echo $pricearea_label; ?>
								<?php } ?>
							</div>
							<?php }else{ ?>
							<div class="price">
								По запросу
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
	
<script>
$(document).ready(function(){
	$('#catalog .cart').click(function(){
		$artWrapID = $(this).data("cart");
		$('body').addClass('hiddenbody blur');
		$('#carts-wrap').addClass('show');
		$('#carts-wrap .cart-wrap').removeClass('active');
		$('#carts-wrap #'+$artWrapID).addClass('active');
	});
	$('#carts-wrap #cart-close').click(function(){
		$('body').removeClass('hiddenbody blur');
		$('#carts-wrap').removeClass('show');
		$('#carts-wrap .cart-wrap').removeClass('active');
		return false;
	});
});
</script>