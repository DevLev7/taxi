
				<div class="item">
					<div class="row">
						<div class="col-ml-4">
							<div class="leftbar">
								<div class="slider-navigation">
									<button class="slick-prev slick-arrow" aria-label="Prev" type="button" tabindex="0"><svg viewBox="0 0 24 24"><path  d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" /></svg></button>
									<span class="slider-page"><span class="js-slider-cur-page">01</span> <span class="sepa">/</span> <?php echo $count_reviews;?></span>
									<button class="slick-next slick-arrow" aria-label="Next" type="button" tabindex="0"><svg viewBox="0 0 24 24"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg></button>
								</div>
								<div class="blockquote">
									<?php echo $blockquote; ?>
								</div>
								<div class="blockquote-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39 32"><path id="_" d="M35.48 0C30.65 4.7 22 13.23 22 22.6c0 6.84 4.25 9.4 8.5 9.4 5 0 8.5-3.4 8.5-8 0-4.84-3.66-8.1-8.35-8.1a1.7 1.7 0 0 1-.44-1.3c0-2.83 3.38-8.8 7.34-12.5zM13.34 0C8.5 4.7 0 13.23 0 22.6 0 29.45 4.25 32 8.5 32c4.84 0 8.5-3.4 8.5-8 0-4.84-3.66-8.1-8.35-8.1a1.7 1.7 0 0 1-.44-1.3c0-2.83 3.38-8.8 7.34-12.5z"/>
								</svg>
								</div>
								<div class="name-block">
									<? if($avatar){ ?>
									<div class="avatar image_circle">
										<img src="<?php echo $avatar; ?>" alt="<?php echo $name; ?>">
									</div>
									<? } ?>
									<div class="name-detail">
										<div class="name">
											<?php echo $name; ?>
										</div>
										<div class="detail">
											<? if($position){ ?>
												<span><?php echo $position; ?></span>
											<? } ?>
											<? if($city){ ?>
												<span><?php echo $city; ?></span>
											<? } ?>
										</div>
									</div>
								</div>
								<div class="button">
									<span data-src="#popup-review" data-fancybox  anim="ripple" class="btn">
										<span>Оставить свой отзыв</span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-ml-8">
							<div class="review">
								<div class="review-text">
									<?php echo $review; ?>
								</div>
								<?php if($image){ ?>
								<div class="review-image">
									<a href="<?php echo $image['url']; ?>" data-fancybox='review'>Оригинал отзыва
									</a>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>