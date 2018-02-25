<?php

	namespace PxN\ImageUpload;



	class Thumb{


		public static function CreateThumb($imgv,$imgdir){
			$img = array();
			list($ow, $oh, $xmime) = getimagesize($imgv);
			$ms = getimagesize($imgv);


			 $imageSize = filesize($imgv);
			 $mime = $ms['mime'];
			 $width = $ms[0]/2;
			 $heigth = $ms[1]/2;
			 			$ext = pathinfo($imgv, PATHINFO_EXTENSION);

if ($ext=="png") {
			 $c =(($width >= 600) || ($heigth >=600)) ? 40: 70;
}else{
				 $c =(($width >= 600) || ($heigth >=600)) ? 4: 9;

}
			 $width =($width >= 600) ? $width / 2 : $width;	
			 $heigth =($heigth >= 600) ? $heigth / 2 : $heigth;	
			 //header('Content-type: '.$mime);
			 $f = fopen($imgv,"r");
			 $imageData = fread($f, $imageSize);
			 fclose($f);
			 $newImage = \Outnet\ImageResizer::resize($imageData, $width, $heigth, $c, $ext, $ow, $oh,$imgdir);




		}
	}



			 
             

?>