		<div class="form form-style-1 hideLabels">
			<?php if($formTitle){ ?>
			<div class="form-header">
				<div class="form-head animate-top">
					<?php echo $formTitle; ?>
				</div>
				<?php if($formDesk){ ?>
				<div class="form-desk animate-top">
					<?php echo $formDesk; ?>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			
            <form method="POST" action="<?php echo $formUrl ? $formUrl : get_page_link(get_page_by_title('Страница благодарности'));?>" class="form_block">
				<input type="hidden" name="formid" value="<?php echo $formTitle; ?>">
				<input type="hidden" name="title" value="<?php echo get_the_title(); ?>">
				<input type="hidden" name="url" value="<?php echo get_permalink(); ?>">
				<div class="hidden"><input type="text" name="e-mail"/></div>
				
				<div class="form-group animate-top">
					<input type="text" name="name1" class="form-control "/>
					<label>Ваше имя</label>
				</div>
				
				<div class="form-group animate-top">
					<input type="tel" name="phone" class="form-control required  inp"/>
					<label>Номер телефона</label>
				</div>
				
				<?php if($formEmail){ ?>
					<div class="form-group animate-top">
						<input type="email" name="email" class="form-control "/>
						<label><?php echo $formEmail; ?></label>
					</div>
				<?php } ?>
				
				<?php if($formTextarea){ ?>
				<div class="form-group animate-top">
					<textarea type="text" name="textarea" class="form-control" rows="3"></textarea>
					<label><?php echo $formTextarea; ?></label>
				</div>
				<?php } ?>				
				
				<div class="button animate-top">
					<button type="submit" name="send" class="btn" anim="ripple"><span><?php echo $formBtn; ?></span></button>
				</div>
				
				<div class="agreement-check lt animate-top">
					<input class="agreement" type="checkbox" checked="checked" value="Согласие на обработку данных" name="Agreement">
					<label class="agreement-label">
						<span class="check"></span>Я даю свое согласие на обработку персональных данных и соглашаюсь с <a href="<?php echo get_privacy_policy_url(); ?>" >политикой конфиденциальности</a>
					</label>
				</div>
		
			</form>
			
			<!--div class="phone">
				<div>или позвоните нам:</div>
				<?php echo do_shortcode('[phone]') ?>
			</div-->
		</div>
		