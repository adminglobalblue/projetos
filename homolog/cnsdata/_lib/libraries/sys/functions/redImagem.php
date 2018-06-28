<?php

function redImagem($filename, $widthNeed, $heightNeed, $quality = 9) {
	if (!file_exists($filename)) return;
	//$quality = 1;
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	header("Content-type: image/png");

	list($width, $height) = getimagesize($filename);

	$p = $width / $height;
	if ($width > $height) {
		$new_width = $widthNeed;
		$new_height = $new_width/$p;
	} elseif ($width < $height) {
		$new_height = $heightNeed;
		$new_width = $new_height*$p;
	} else {
		$new_height = $new_width = $widthNeed;
	}

	//gerando a a miniatura da imagem
	$image_p = imagecreatetruecolor($new_width, $new_height);
	switch ($ext) {
		case 'png':
			$image = imagecreatefrompng($filename);
		break;
		case 'jpeg':
			$image = imagecreatefromjpeg($filename);
		break;
		case 'jpg':
			$image = imagecreatefromjpeg($filename);
		break;
		default:
			$image = imagecreatefrompng($filename);
		break;
	}
	
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	ob_start();

	switch ($ext) {
		case 'png':
			imagepng($image_p, null, $quality);
		break;
		case 'jpeg':
			imagejpeg($image_p, null, $quality);
		break;
		case 'jpg':
			imagejpeg($image_p, null, $quality);
		break;
		default:
			imagepng($image_p, null, $quality);
		break;
	}
	$data = ob_get_contents();
	imagedestroy($image_p);
	ob_end_clean();

	return "data:image/$ext;base64,".base64_encode($data);
}