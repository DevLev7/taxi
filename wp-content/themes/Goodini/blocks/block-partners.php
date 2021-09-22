<?
	$type = 'block';
	$logos = 'partners';
	if(get_field('sections-setting','option')['partners-slider']){
		include (locate_template('template-parts/logos-slider.php'));
	}else{
		include (locate_template('template-parts/logos-row.php'));
	}
?>