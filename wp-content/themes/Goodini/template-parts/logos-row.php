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
	
	<section class="logos-row hor-scroll">
		<div class="container-fluid">
			<? if( $header) { ?>
			<div class="header">
				<? echo $header; ?>
			</div>
			<? } ?>
			<div class="items">
			<?php
			while( have_rows($items,'option') ): the_row(); 
				$logo = get_sub_field('logo');
				$desc = get_sub_field('desc');
				$link = get_sub_field('link');
			?>
				<<? echo $link ? 'a href="'.$link.'"' : 'div'; ?> class="item">
					<?php if($logo){ ?>
					<div class="logo">
						<img src="<?php echo $logo; ?>" alt='<?php echo strip_tags($desc); ?>' >
					</div>
					<?php } ?>
					<div class="desc">
						<?php echo $desc; ?>
					</div>
				</<? echo $link ? 'a' : 'div'; ?>>
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