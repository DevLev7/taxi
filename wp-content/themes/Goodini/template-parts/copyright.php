<?php 
$current_url = home_url($wp->request).'/';
$current_url_lenght = iconv_strlen($current_url,'UTF-8');
$current_post_type = get_post_type();
$current_domain = $_SERVER['HTTP_HOST'];

if (is_plugin_active('multycity/multycity.php')) {
	if( do_shortcode('[city_lat]')){
		$copy_url = "https://b2b-creative.ru/".do_shortcode('[city_lat]');
	}else{
		$copy_url = "https://b2b-creative.ru";
	}
	$copy_city_name = strip_tags(do_shortcode('[city_gde]'));
}else{
	$copy_url = "https://b2b-creative.ru";
	$copy_city_name = "";
}


	switch (true) {
	case in_array($current_url_lenght, range(0,32)):
		$alt_icon = 'маркетинговое агентство';
		break;
	case in_array($current_url_lenght, range(33,39)):
		$alt_icon = 'digital агентство';
		break;
	case in_array($current_url_lenght, range(40,46)):
		$alt_icon = 'диджитал агентство';
		break;
	case in_array($current_url_lenght, range(47,50)):
		$alt_icon = 'агентство рекламы';
		break;
	case in_array($current_url_lenght, range(51,54)):
		$alt_icon = 'рекламное агентство полного цикла';
		break;
	case in_array($current_url_lenght, range(55,57)):
		$alt_icon = 'маркетинговые услуги';
		break;
	case in_array($current_url_lenght, range(58,60)):
		$alt_icon = 'агентство интернет маркетинга';
		break;
	case in_array($current_url_lenght, range(61,63)):
		$alt_icon = 'маркетинговая компания';
		break;
	case 64:
	case 65:
		$alt_icon = 'сайт рекламного агентства';
		break;
	case 66:
	case 67:
		$alt_icon = 'маркетинговое агентство полного цикла';
		break;
	case 68:
	case 69:
		$alt_icon = 'комплексный маркетинг';
		break;
	case 70:
	case 71:
		$alt_icon = 'маркетинговый консалтинг';
		break;
	case 72:
	case 73:
		$alt_icon = 'маркетинговый отдел';
		break;
	case 74:
	case 75:
		$alt_icon = 'маркетинговое интернет агентство';
		break;
	case 76:
	case 77:
		$alt_icon = 'агентство полного цикла';
		break;
	case 78:
	case 79:
		$alt_icon = 'рекламное агентство в интернете';
		break;
	case 80:
	case 81:
		$alt_icon = 'цифровая реклама';
		break;
	case 82:
	case 83:
		$alt_icon = 'заказать интернет маркетинг';
		break;
	case 84:
	case 85:
		$alt_icon = 'маркетинг под ключ';
		break;
	case in_array($current_url_lenght, range(86,90)):
		$alt_icon = 'услуги маркетингового агентства';
		break;
	case in_array($current_url_lenght, range(91,100)):
		$alt_icon = 'агентство комплексного интернет маркетинга';
		break;
	case in_array($current_url_lenght, range(101,110)):
		$alt_icon = 'агентство современных рекламных технологий';
		break;
	case in_array($current_url_lenght, range(111,120)):
		$alt_icon = 'студия интернет маркетинга';
		break;
	case ($current_url_lenght >120):
		$alt_icon = 'рекламное агентство онлайн';
		break;
	}



if(is_front_page()) {
	$copy_link = '<a href="'.$copy_url.'/site/landing-page/?utm_source=copyright&utm_medium=land&utm_campaign='.$current_domain.'" target="_blank" class="b2b-copy-link">Создание лендинга</a>';
}elseif($current_post_type == "blog" || is_post_type_archive("blog")) {
	$copy_link = '<a href="'.$copy_url.'/seo/?utm_source=copyright&utm_medium=blog&utm_campaign='.$current_domain.'" target="_blank" class="b2b-copy-link">Продвижение сайта</a>';
}elseif($current_post_type == "news" || is_post_type_archive("news")) {
	$copy_link = '<a href="'.$copy_url.'/seo/?utm_source=copyright&utm_medium=news&utm_campaign='.$current_domain.'" target="_blank" class="b2b-copy-link">SEO продвижение</a>';
}elseif($current_post_type == "cases" || is_post_type_archive("cases")) {
	$copy_link = '<a href="'.$copy_url.'/context/?utm_source=copyright&utm_medium=news&utm_campaign='.$current_domain.'" target="_blank" class="b2b-copy-link">Реклама сайта</a>';
}else{
	$copy_link = '<a href="'.$copy_url.'/site/?utm_source=copyright&utm_medium=main&utm_campaign='.$current_domain.'" target="_blank" class="b2b-copy-link">Создание сайта</a>';
}

?>

<style>
#copyright.copy-inline{display:inline-block}
#copyright.copy-white .b2b-copy{background:rgba(0,0,0,.2)}
#copyright.copy-white .b2b-copy:hover{background:rgba(0,0,0,.4)}
#copyright.copy-white .b2b-copy-link{color:#fff;text-decoration:none!important}
#copyright.copy-white .b2b-copy #b2b{fill:#fff}
#copyright.copy-black .b2b-copy{background:rgba(255,255,255,.9);border:1px solid #eee}
#copyright.copy-black .b2b-copy:hover{background:rgba(255,255,255,.4)}
#copyright.copy-black .b2b-copy-link{color:#1D1A24;text-decoration:none!important}
#copyright.copy-black .b2b-copy #b2b{fill:#1D1A24}
#copyright.copy-link .b2b-copy{background:transparent!important;border:0;margin:0}
#copyright.copy-link .b2b-copy-link{border:0!important}
#copyright.copy-link.copy-black .b2b-copy-link::before{background:#000}
#copyright.copy-link.copy-white .b2b-copy-link::before{background:#fff}
.b2b-copy{display:flex;align-items:center;flex-wrap:nowrap;border-radius:5px;padding:3px 10px;min-width:180px;width:fit-content;transition:all .15s ease;margin-top:1rem}
.b2b-copy-link{position:relative;white-space:nowrap;font-weight:300;font-size:12px;transition:all .15s ease;letter-spacing:.5px}
.b2b-copy-link::before{content:"";position:absolute;bottom:0;left:0;height:1px;width:100%;opacity:.3;transition:all .15s ease 0}
.b2b-copy:hover .b2b-copy-link::before{opacity:0}
.b2b-copy svg{width:60px;height:20px;margin-left:.5rem;transition:all .15s ease}
.b2b-copy-svg{height:20px;border:0!important;text-decoration:none!important}
#copyright .b2b-copy:hover .b2b-copy-link{color:#fa0;opacity:1}
#copyright .b2b-copy:hover svg{opacity:1}
</style>

<div class="b2b-copy">
	<?php echo $copy_link; ?>
	<a href="https://b2b-creative.ru/?utm_source=copyright&utm_medium=link&utm_campaign=<?php echo $current_domain ; ?>" target="_blank" class="b2b-copy-svg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 316.1 99" role="img"><title><?php echo $alt_icon.' '.$copy_city_name; ?></title><circle cx="49.5" cy="49.5" r="49.5" fill="#fa0"/><path fill="#1D1A24" d="M53.2 46.9l-2.8-9.6L9.5 78.7l16.4-11.9 20-14.5 2.3 7.8 41.4-39.6-36.4 26.4zm29.2-3.5L66.7 58.7l15.5-10.8 7.5 5.8-7.3-10.3zm-55.9 0l-19.3 20L26.4 49l9.8 7.1-9.7-12.7z"/><path id="b2b" d="M239 79.6h10.3v-9.8L239 79.6zm7-11.1l-25.9.1c.1-3.8 6-6.9 12.9-11.1 7.6-4.5 15.8-10.4 15.8-20.2 0-11.9-9.5-17.2-21.3-17.2-7.2-.1-14.2 2-20.1 6.2v12c6.2-4.7 13-6.9 18.9-6.9s9.7 2.2 9.7 6.5c0 5.6-5.2 7.9-11.3 11.4-8.6 5.1-19.2 10.5-19.2 24.6v5.7h25.3L246 68.5zM140.3 22.2l4.1 14.2 23.1-16.8c-.3 0-.7 0-1 0h-26.3l.1 2.6zm37.9 25.6c5.3-1.8 9.1-6.1 9.1-13.1 0-8-4.9-12.8-13.2-14.5L163.8 30h1.6c5.7 0 9.1 2.1 9.1 6.9s-3.5 6.9-8.4 6.9h-12.9v-3.5l-12.9 12.3v27h25.8c10.5 0 23.6-3.2 23.6-16.8 0-8.9-5.6-13.3-11.5-15zm-12.3 21.3H153V53.7h13.5c5.1 0 10.2 1.4 10.2 7.7.1 6.5-5 7.7-10.8 7.7zm100.8-46.9l4.1 14.2L294 19.6c-.3 0-.7 0-1 0h-26.3v2.6zm37.9 25.6c5.3-1.8 9.1-6.1 9.1-13.1 0-8-4.9-12.8-13.2-14.5L290.2 30h1.6c5.7 0 9.1 2.1 9.1 6.9s-3.5 6.9-8.4 6.9h-12.9v-3.5l-12.9 12.3v27h25.8c10.5 0 23.6-3.2 23.6-16.8 0-8.9-5.6-13.3-11.5-15zm-12.3 21.3h-12.9V53.7H293c5.1 0 10.2 1.4 10.2 7.7 0 6.5-5.1 7.7-10.9 7.7z"/></svg></a>
</div>