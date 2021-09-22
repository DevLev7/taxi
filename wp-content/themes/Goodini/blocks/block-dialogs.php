	<section class="dialogs">
		<div class="container-fluid">
			<div class="row">
				<div class="col-s">
					<div class="header list ct">
						<h2><?php echo get_field('dialogs-setting','option')['header']; ?></h2>
					</div>
					<?php
					
					$args = array(
                        'post_type' => array('dialogs'),
                        'showposts' => -1,
                        'fields' => 'ids',
                    );
					$dialogs_query = get_posts( $args );
					$arr = [];
					$arr_k = -1;

					foreach ($dialogs_query as $key1 => $post_id) {
						$arr_k++;
						$arr[$arr_k] = [
							"question" => get_field('question', $post_id),
							"answer" => get_field('answer', $post_id),
						];
						$arr[$arr_k]['question']['text'] = get_the_title( $post_id);
					}
					

					
					$arr_date = [];
					$k = 0;
				
					// Создание массива с датой
					foreach ($arr as $key => $value) {
						$k++;
						// Количество символов вопроса
						$length_question_text = mb_strlen($value['question']['text'],'UTF-8').'<br>'; 
						// Количество символов ответа
						$length_answer_text = mb_strlen($value['answer']['text'],'UTF-8'); 
						// Рейтинг вопроса
						$voite_question = round(date("m")*($length_question_text+$length_answer_text)*$k/300); 
						// Рейтинг ответа
						$voite_answer = round((date("m")*($length_question_text*$length_answer_text/5000)+$length_question_text)/$k); 
						// текущая дата в микросекундах
						$date_current = strtotime(date('Y-m-d')); 
						// формирование сдвига времени
						$date_offset = ($length_question_text * $voite_question + $length_answer_text * $voite_answer ) * 100 * $k;
						// новая дата
						$date_new = $date_current - $date_offset;
						$date_new_d = date("d",$date_new);
						$date_new_m = date("m",$date_new);
						$date_new_y = date("Y",$date_new);
						
						// генерируем дату
						$date_generate = ($voite_question*$k/3);
						if($date_generate > 84){
							$date_generate = 84;
							$date_generate = $date_generate / 3.8;
						}elseif($date_generate > 56){
							$date_generate = $date_generate / 3.2;
						}elseif($date_generate > 28){
							$date_generate = $date_generate / 1.9;
						}
						$date_generate_day = round($date_generate);
						
						if($date_generate_day>$date_new_d){
							$date_new_m = $date_new_m - 1;
						}
						
						$date_new_generate = $date_generate_day.'.'.$date_new_m.'.'.$date_new_y;
						$d1 = strtotime($date_new_generate); // переводит из строки в дату
						//$date_new_generate_format = date("d.m.Y", $d1); // переводит в новый формат
						
						//Формат даты
						setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');  
						$date_format = strftime("%e %B %Y", $d1);
						
						$voite_gen_question = round((($date_generate_day*$date_new_m*$length_question_text)/(680))+$date_new_m);
						$voite_gen_answer = round((($date_new_m*($length_answer_text-$length_question_text))/(75)));
						
						$arr_date[$k] = [
							"question" => $value['question'],
							"answer" => $value['answer'],
							"date" => $d1,
							"date-question" => $date_format,
							"question-voite" => $voite_gen_question,
							"answer-voite" => $voite_gen_answer,
						];
					}
					// пересортировка массива с сформированной датой по полю даты в милесекундах
					function cmp_dialogs ($a, $b) {
						return strcmp($b["date"], $a["date"]);
					}
					usort($arr_date, "cmp_dialogs");
					//print("<pre>".print_r($arr_date,true)."</pre>");
					$j=0;
					// Основной цикл вывода
					foreach ($arr_date as &$value ){ 
						$j++;
						$date_question = $value['date-question'];					
					
						$question_text = $value['question']['text'];
						$question_name = $value['question']['name'];
						$question_position = $value['question']['position'];
						$question_avatar = $value['question']['avatar'];
						$question_voite = $value['question-voite'];
						if($question_voite==0){
							$question_voite = 1;
						}

						$answer_text = $value['answer']['text'];
						$answer_manager = $value['answer']['manager'];
						$answer_voite = $value['answer-voite'];
						if($answer_voite==0){
							$answer_voite = 1;
						}
						
						// Генерация времени ответа
						$answer_minute = abs(round(mb_strlen($answer_text,'UTF-8') * $answer_voite / 10));
						
						if($answer_minute<100000 && $answer_minute>=10000){
							$answer_minute = round($answer_minute / 2000);
						}elseif($answer_minute<10000 && $answer_minute>=1000){
							$answer_minute = round($answer_minute / 200);
						}elseif($answer_minute<1000 && $answer_minute>=100){
							$answer_minute = round($answer_minute / 20);
						}elseif($answer_minute<60){
							$answer_minute = $answer_minute;
						}
						
						$answer_minute_suffix = plural_form($answer_minute,array('минута','минуты','минут'));
						$date_answer = 'ответил(а) через '.$answer_minute.' '.$answer_minute_suffix;
						
					?>	
					<? if($j>2) {?>
					<div class="dialogs-item-spoiler">
					<? } ?>
					<div class="item">							
						<div class="question">
							<div class="con">
								<div class="avatar">
									<img src="<?php echo $question_avatar; ?>" alt="<?php echo $question_name; ?>">
								</div>
								<div class="name-block">
									<div class="name">
										<?php echo $question_name; ?>
									</div>
									<div class="date">
										<?php echo $date_question; ?> г.
									</div>
								</div>
								<div class="reply" data-src="#popup-signin" data-fancybox >
									Ответить
								</div>
								<div class="voite <?php echo $question_voite>=0 ? 'plus': 'minus'; ?>" data-src="#popup-signin" data-fancybox >
									<?php echo $question_voite; ?>
								</div>
							</div>
							<div class="text">
								<?php echo $question_text; ?>
							</div>
						</div>
						<div class="answer">
							<div class="con">
								<div class="avatar">
									<img src="<?php echo get_field('avatar',$answer_manager)['sizes']['team']; ?>" alt="<?php echo get_the_title($answer_manager); ?>">
								</div>
								<div class="name-block">
									<div class="name">
										<?php echo get_the_title($answer_manager); ?>
									</div>
									<div class="date">
										<?php echo $date_answer; ?>
									</div>
								</div>
								<div class="reply" data-src="#popup-signin" data-fancybox >
									Ответить
								</div>
								<div class="voite <?php echo $answer_voite>=0 ? 'plus': 'minus'; ?>" data-src="#popup-signin" data-fancybox >
									<?php echo $answer_voite; ?>
								</div>
							</div>
							<div class="text">
								<?php echo $answer_text; ?>
							</div>					
						</div>					
					</div>
					<? if($j>2) {?>
					</div>
					<? } ?>
					
					<?php 
					}
					?>
					
					<? if(count($arr_date)>2) {?>
					<div class="ct">
						<div class="link">
							Ещё комментарии
						</div>
					</div>
					<? } ?>
					<?php if(get_sub_field('form')){ ?>
					<div class="dialog-form form hideLabels ">
						<form method="POST" action="<?php echo $formUrl ? $formUrl : get_page_link(get_page_by_title('Страница благодарности'));?>" class="form_block row">
							<input type="hidden" name="formid" value="<?php echo $formTitle; ?>">
							<input type="hidden" name="title" value="<?php echo get_the_title(); ?>">
							<input type="hidden" name="url" value="<?php echo get_permalink(); ?>">
							<div class="hidden"><input type="text" name="e-mail"/></div>
							
							<div class="col-md-8">							
								<div class="form-group animate-top">
									<textarea type="text" name="textarea" class="form-control" rows="10"></textarea>
									<label>Ваш вопрос</label>
								</div>
							</div>
							
							<div class="col-md-4">	
								<div class="form-group animate-top">
									<input type="text" name="name1" class="form-control "/>
									<label>Ваше имя</label>
								</div>
								
								<div class="form-group animate-top">
									<input type="tel" name="phone" class="form-control required  inp"/>
									<label>Номер телефона</label>
								</div>
								
								<div class="button animate-top">
									<button type="submit" name="send" class="btn" anim="ripple"><span>Задать вопрос</span></button>
								</div>
								
								<div class="agreement-check lt animate-top">
									<input class="agreement" type="checkbox" checked="checked" value="Согласие на обработку данных" name="Agreement">
									<label class="agreement-label">
										<span class="check"></span>Я даю свое согласие на обработку персональных данных и соглашаюсь с <a href="<?php echo get_privacy_policy_url(); ?>" >политикой конфиденциальности</a>
									</label>
								</div>
							</div>
					
						</form>
					</div>
					<?php }else{ ?>
					<div class="button ct">
						 <button data-src="#popup-question" data-fancybox class="btn" anim="ripple">
							<span>Задать вопрос</span>
						</button>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>