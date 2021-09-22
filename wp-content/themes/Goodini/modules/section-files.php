<?php 
// Фон
$stylegroup = get_sub_field('style-group')['style-bg'];
$stylegroup_color = '';
if($stylegroup!='style-bg-none'){
	$stylegroup_color = "bg-color";
} 

// Массив стилей текста
$styletext_arr = get_sub_field('style-group')['style-text'];
foreach ($styletext_arr as $styletext_value) {
	$styletext .= ' '.$styletext_value;
}

if(get_sub_field('desc')){
	$files_class = "col-ml-6";
}else{
	$files_class = "col-ml-12";
}
?>

	<section id="<?php echo $building_row; ?>" class="files content <?php echo $stylegroup_color.' '.$stylegroup.$styletext;?>">
		<div class="container-fluid">
			<div class="row">
				<?php if(get_sub_field('desc')){ ?>
				<div class="col-ml-6">
					<div class="desc list">
						<?php the_sub_field('desc'); ?>
					</div>
				</div>
				<?php } ?>
				<div class="col-ml-6">
					<div class="desc list">
						<?php the_sub_field('header'); ?>
					</div>
					<div class="filelist">
						<ul>
							<?php
							while( have_rows('files-repeater') ): the_row();
								$file = get_sub_field('file');
								$fileurl = $file['url'];
								$filesize = get_sub_field('file')['filesize']/1000;
								$name = get_sub_field('name');
								$info = new SplFileInfo($fileurl);
								$fileextension = $info->getExtension();
					//print("<pre>".print_r($file,true)."</pre>");
							?>
						
							<li>
								<a href="<?php echo $fileurl; ?>" class="filename" title="<?php echo $name; ?>"><?php echo $name.'.'.$fileextension; ?></a>	
								<div class="filesize"><?php echo round($filesize/1000, 1); ?> Мб</div>
							</li>
							
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>