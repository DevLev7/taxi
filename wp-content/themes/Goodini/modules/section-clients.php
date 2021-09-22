<?
	$type = 'section';
	$logos = 'clients';
	if(get_sub_field('slider')){
		include (locate_template('template-parts/logos-slider.php'));
	}else{
		include (locate_template('template-parts/logos-row.php'));
	}
?>