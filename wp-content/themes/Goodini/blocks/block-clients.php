<?
	$type = 'block';
	$logos = 'clients';
	if(get_field('sections-setting','option')['clients-slider']){
		include (locate_template('template-parts/logos-slider.php'));
	}else{
		include (locate_template('template-parts/logos-row.php'));
	}
?>