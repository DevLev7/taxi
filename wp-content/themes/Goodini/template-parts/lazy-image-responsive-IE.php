<?php 
if($image && $image['subtype'] != 'svg+xml') { 
if($imageSize){
	$imageHeight = $image['sizes'][$imageSize.'-height'];
	$imageWidth = $image['sizes'][$imageSize.'-width'];
}else{
	$imageHeight = $image['height'];
	$imageWidth = $image['width'];
}
$imagePadding = round($imageHeight / $imageWidth * 100);

if($imagePadding < 80){ // костыль для IE (не поддерживает min() / max())
	$imageStylePadding = round($imagePadding).'%';
}else{
	$imageStylePadding = round($imageHeight).'px';
}

$imageStyle = 'style="
	padding-bottom: '.$imageStylePadding.'; 
	padding-bottom: min('.$imagePadding.'%,'.$imageHeight.'px);
	max-width: '.$imageWidth.'px;
	max-height: '.$imageHeight.'px;
"';
}
?>