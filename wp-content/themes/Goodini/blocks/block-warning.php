<?php 
$mail_order = get_field('order','option');
$mail_parts = explode("@", $mail_order);
$mail_part_0 = $mail_parts[0];
$mail_part_1 = $mail_parts[1];


// Сайт закрыт от индексации
if (get_option('blog_public') == '0') {
	$no_index = "<li>Сайт закрыт от индексации</li>";
}

// Проверка версии php
if(phpversion()<7){
	$phpversion = "<li>Старая версия PHP: ".phpversion()."</li>";
}

// Проверка на почту
if(!$mail_order){
	$message = "<li>Почта не прописана</li>";
}elseif($mail_order != 'multy@b2b-c.ru' && $mail_order != 'info@b2b-c.ru' && ($mail_part_1 == 'b2b-c.ru' || $mail_part_1 == 'kp16.ru' || $mail_part_0 == 'skwisgard') ){ 
	$message = "<li>Прописана почта разработчика: ".$mail_order.'</li>';
}

// Наименование бренда
if(!get_field('company', 'option')['brand']){
if(!get_bloginfo('name')){
	$brand = "<li>Название компании не прописано</li>";
}
}

// Картинка мессенджеров
if(!get_field('group')['hero-bg-sm']){
if(!get_field('logos','option')['messenger']){
	$ogimage = "<li>Нет картинки для мессенджеров</li>";
}
}

// Favicon
if(!$favicon_url = get_field('logos','option')['favicon']){
	$favicon = "<li>Нет favicon</li>";
}

$page_ID_privacy = get_page_by_title('Политика конфиденциальности')->ID;
get_the_content(3);
?>
	<?php if($no_index || $message || $phpversion || $brand || $ogimage || $favicon){ ?>
	<section id="warning">
		<div class="container-fluid">
			<div class="list">
				<ul>
					<?php echo $no_index ? $no_index : "" ; ?>
					<?php echo $message ? $message : "" ; ?>
					<?php echo $phpversion ? $phpversion : "" ; ?>
					<?php echo $brand ? $brand : "" ; ?>
					<?php echo $ogimage ? $ogimage : "" ; ?>
					<?php echo $favicon ? $favicon : "" ; ?>
				</ul>
			</div>
		</div>
	</section>
	<?php } ?>