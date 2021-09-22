<?
	$items = $logos.'-repeater';
	if ($type == 'section'){
		$header = get_sub_field('header');
		$footer = get_sub_field('footer');
	}else{
		$header = get_field($logos.'-header','option');
		$footer = get_field($logos.'-footer','option');
	}
?>
	
	<section class="logos-row">
		<div class="container-fluid">
			<? if( $header) { ?>
			<div class="header">
				<? echo $header; ?>
			</div>
			<? } ?>
			<div class="slider" id="logos-row-slider">
			<?php
			while( have_rows($items,'option') ): the_row(); 
				$logo = get_sub_field('logo');
				$desc = get_sub_field('desc');
				$link = get_sub_field('link');
			?>
				<div class="slide">
					<<? echo $link ? 'a href="'.$link.'" target="_blank" rel="nofollow"' : 'div'; ?> class="item">
						<div class="logo">
							<img src="<?php echo $logo; ?>" alt='<?php echo strip_tags($desc); ?>' >
						</div>
						<div class="desc">
							<?php echo $desc; ?>
						</div>
					</<? echo $link ? 'a' : 'div'; ?>>
				</div> 
			<?php 
			endwhile; 
			?>
			</div> 
			<? if( $footer) { ?>
			<div class="footer list">
				<? echo $footer; ?>
			</div>
			<? } ?>
		</div> 
	</section>