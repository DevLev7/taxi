	<div class="popups">
	
	<?php if(!empty(get_field('forms_popup', 'option'))){ ?>
	<?php while( have_rows('forms_popup', 'option') ): the_row(); ?>

    	<div id="popup-<?= get_sub_field('id'); ?>" class="popup ct">
    		<?php 
    			$formTitle = get_sub_field('head');
    			$formDesk = get_sub_field('text');
    			if(get_sub_field('textarea')) {
					$formTextarea = "Ваше сообщение";
				}
    			if(get_sub_field('email')) {
    			$formEmail = "Ваш e-mail";
				}
    			$formBtn = get_sub_field('btn');
    			include (locate_template('blocks/block-form.php'));
    		?>
    	</div>
    
    <?php endwhile; ?>
    <?php } ?>
	
	<div id="popup-call" class="popup ct">
		<?php 
		$formTitle = "Заказать звонок";
		$formDesk = "Оставьте свой номер - наш специалист перезвонит в течение 5 минут (в рабочее время)";
		$formTextarea = "";
		$formBtn = "Перезвоните мне";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-consultation" class="popup">
		<?php 
		$formTitle = "Получить консультацию";
		$formDesk = "Заполните форму, мы свяжемся с вами";
		$formEmail = "";
		$formTextarea = "";
		$formBtn = "Получить консультацию";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-order" class="popup ct">
		<?php 
		$formTitle = "Оставить заявку";
		$formDesk = "Оставьте свой номер - наш специалист перезвонит в течение 5 минут (в рабочее время)";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-price" class="popup ct">
		<?php 
		$formTitle = "Уточнить стоимость";
		$formDesk = "Заполните форму, мы свяжемся с вами и рассчитаем стоимость";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-mess" class="popup">
		<?php 
		$formTitle = "Оставить сообщение";
		$formDesk = "У Вас есть вопросы, предложения или пожелания? Напишите их нам";
		$formTextarea = "Ваше сообщение";
		$formBtn = "Отправить сообщение";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-question" class="popup">
		<?php 
		$formTitle = "Есть вопрос?";
		$formDesk = "Напишите его в форме ниже и мы обязательно на него ответим";
		$formTextarea = "Ваш вопрос";
		$formBtn = "Отправить вопрос";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-review" class="popup">
		<?php 
		$formTitle = "Добавить отзыв";
		$formDesk = "Напишите всем о своих впечатлениях";
		$formEmail = "";
		$formTextarea = "Ваш отзыв";
		$formBtn = "Отправить на публикацию";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-signin" class="popup">
		<?php 
		$formTitle = "Регистрация";
		$formDesk = "Заполните форму. Логин и пароль будут отправлены на вашу почту.";
		$formEmail = "Email";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	</div>