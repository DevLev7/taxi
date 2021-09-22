<?php 
$image = get_field('boss-image','option'); 
$quote = get_field('boss-desc','option')['quote']; 
$text = get_field('boss-desc','option')['text']; 
$name = get_field('boss-desc','option')['name']; 
$position = get_field('boss-desc','option')['position']; 
?>
	<section class="boss">
		<div class="container-fluid">
			<div class="item">
				<div class="image progressive replace" data-href="<?php echo $image['url']; ?>">
					<img src="<?php echo $image["sizes"]['micro']; ?>" class="preview" alt="<?php echo $name; ?>. <?php echo strip_tags($position); ?>"/>
				</div>
				<div class="blockquote">
					<div class="blockquote-icon">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39 32"><path id="_" d="M35.48 0C30.65 4.7 22 13.23 22 22.6c0 6.84 4.25 9.4 8.5 9.4 5 0 8.5-3.4 8.5-8 0-4.84-3.66-8.1-8.35-8.1a1.7 1.7 0 0 1-.44-1.3c0-2.83 3.38-8.8 7.34-12.5zM13.34 0C8.5 4.7 0 13.23 0 22.6 0 29.45 4.25 32 8.5 32c4.84 0 8.5-3.4 8.5-8 0-4.84-3.66-8.1-8.35-8.1a1.7 1.7 0 0 1-.44-1.3c0-2.83 3.38-8.8 7.34-12.5z"></path>
						</svg>
					</div>
					<div class="quote">
						<?php echo $quote; ?>
					</div>
					<div class="text list">
						<?php echo $text; ?>
					</div>
					<div class="name-block">
						<div class="name">
							<?php echo $name; ?>
						</div>
						<div class="position">
							<?php echo $position; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>