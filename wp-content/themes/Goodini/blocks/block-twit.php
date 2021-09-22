<?php 
$day_current = date('d');
$arr=get_field('twit','option');

for ($i=0; $i < count($arr); $i++)	{
	if($arr[$i]['date'] > $day_current){
		$mounth_current = date("m", strtotime("-1 month"));
	}else{
		$mounth_current = date("m");
	}
	$arr[$i]['date'] =  $arr[$i]['date'].'.'.$mounth_current;
	$arr[$i]['date1'] =  strtotime($arr[$i]['date'].'.2020');
}

?>
	<section id="twit">
		<div class="container-fluid">
			<div class="header">
				<h2>Новости за месяц</h2>
			</div>
			
			<div class="twits">
			<?php 
			function cmp_twit($a, $b)
			{
				return strcmp($b["date1"], $a["date1"]);
			}
			usort($arr, "cmp_twit");

			foreach ($arr as &$value ){ 
				$desc = $value['desc'];
				$date = $value['date'];
			?>
				<div class="wrap ">
					<div class="item autoheight">
						<div class="date">
							<? echo $date; ?>
						</div>
						<div class="desc">
							<? echo $desc; ?>
						</div>
					</div>
				</div>
			
			<?php 
			}
			?>
			</div>
		</div>
	</section>