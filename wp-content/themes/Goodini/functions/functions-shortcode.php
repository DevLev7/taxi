<?php	
// https://misha.blog/wordpress/shortcodes.html
//	Выделение цветом
//	============================================================
	function shortcode_text_color ($atts, $content) {
		return '<span>'.$content.'</span>';
	}
	add_shortcode('text_color', 'shortcode_text_color');
	
//	Шорткод кнопки
//	============================================================
	function shortcode_popup_btn ($atts, $content) {
		extract(shortcode_atts(array(
		"center" => '',
		"link" => 'popup-order',
		), $atts));
		return '
		<div class="button '.$center.'">
			 <button data-src="#'.$link.'" data-fancybox class="btn" anim="ripple">
				<span>'.$content.'</span>
			</button>
		</div>
		';
	}
	add_shortcode('popup_btn', 'shortcode_popup_btn');

//	Телефон
//	============================================================
	function city_phone() {
		if (function_exists('city_ph')) {
			return '<a href="tel:+7'.substr(preg_replace('#[^\d]#','',city_ph()), 1).'" class="phone-content">'.city_ph().'</a>';
		} else {
			return '<a href="tel:+7'.substr(preg_replace('#[^\d]#','',get_field('phone', 'option')), 1).'" class="phone-content">'.get_field('phone', 'option').'</a>';
		}
	}
	add_shortcode('phone', 'city_phone');

//	Телефон дополнительный
//	============================================================
	function phone_second() {
		if (get_field('phone-second', 'option')) {
			return '<a href="tel:+7'.substr(preg_replace('#[^\d]#','',get_field('phone-second', 'option')), 1).'" class="phone-content">'.get_field('phone-second', 'option').'</a>';
		}
	}
	add_shortcode('phone_second', 'phone_second');

//	Телефон WhatsApp
//	============================================================
	function phone_wa($atts, $content) {
		if (get_field('wa', 'option')) {
			return '<a href="https://api.whatsapp.com/send?phone=7'.substr(preg_replace('#[^\d]#','',get_field('wa', 'option')), 1).'&text='.$content.'" class="phone-content">'.get_field('wa', 'option').'</a>';
		}
	}
	add_shortcode('phone_wa', 'phone_wa');
	
//	Адрес
//	============================================================
	function city_adress() {
		if (function_exists('city_adr')) {
			return city_adr();
		} else {
			return get_field('adress', 'option');
		}
	}
	add_shortcode('adress', 'city_adress');
	
//	Email
//	============================================================
	function city_mail() {
		if (function_exists('city_email')) {
			return '<a href="mailto:'.city_email().'">'.city_email().'</a>';
		} else {
			return '<a href="mailto:'.get_field('email', 'option').'">'.get_field('email', 'option').'</a>';
		}
	}
	add_shortcode('email', 'city_mail');
	
//	Координаты
//	============================================================
	function city_coordinate() {
		if (function_exists('city_coor')) {
			return city_coor();
		} else {
			return get_field('coordinate', 'option');
		}
	}
	add_shortcode('coordinate', 'city_coordinate');
	
//	Прайс-лист
//	============================================================
	function price_list($atts, $content) {
		return '<div class="price-list">'.$content.'</div>';
	}
	add_shortcode('price-list', 'price_list');
	
	// удалить теги <p> у шорткодов
	//add_filter( 'the_content', 'wpautop' , 99);
	//add_filter( 'acf_the_content', 'wpautop' , 100);
	
//	Добавление кнопок html-редактор
//	============================================================
// Хуки
add_filter( 'mce_external_plugins', 'true_add_tinymce_script' );
add_filter( 'mce_buttons', 'true_register_mce_button' ); 
// В этом функции указываем ссылку на JavaScript-файл кнопки
function true_add_tinymce_script( $plugin_array ) {
	$plugin_array['city'] = 
	$plugin_array['popup_buttons'] = 
	$plugin_array['contacts_short'] =
	$plugin_array['text_color'] = 
	$plugin_array['price-list'] = 
	THEME_JS_GOODINI .'buttons.js';
	return $plugin_array;
}
 
// Регистрируем кнопку в редакторе
function true_register_mce_button( $buttons ) {
	array_push( $buttons, 'text_color', 'city', 'popup_buttons', 'contacts_short', 'price-list' );
	return $buttons;
}