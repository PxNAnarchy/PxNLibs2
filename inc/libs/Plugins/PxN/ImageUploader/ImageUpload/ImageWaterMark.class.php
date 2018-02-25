<?php

	namespace PxN\ImageUpload;


		class WaterMark{
			public static function SetMark($imagen, $texto, $copia = true, $imgname)
				{
					list($ancho, $alto, $tipo) = getimagesize($imagen);
						switch ( $tipo ){
							case IMAGETYPE_JPEG: //image/jpg image/jpeg
							$nimg = imagecreatefromjpeg( $imagen );
							break;
							case IMAGETYPE_PNG: //image/png
							$nimg = imagecreatefrompng( $imagen );
							break;
							default:
						return FALSE;
						}


				$color = imagecolorallocate($nimg, 22, 178, 43);
				$color_shadow = imagecolorallocate($nimg, 6, 99, 18);
					
					$size = 150;
					$text_box = imagettfbbox($size,0, __DIR__."/fonts/caricature.ttf", $texto);
					$text_width = $text_box[2]-$text_box[0];
					$text_height = $text_box[7]-$text_box[1];
					$image_width = imagesx($nimg);  
					$image_height = imagesy($nimg);

					$x = ($image_width/2) - ($text_width/2);
					$y = ($image_height/2) - ($text_height/2);



						imagettftext($nimg, $size , 0, $x+1, $y+3, $color_shadow, __DIR__."/fonts/caricature.ttf", $texto );
  						imagettftext($nimg, $size, 0, $x, $y, $color, __DIR__."/fonts/caricature.ttf", $texto );

					$nombre_archivo = $imagen;
				if ( strpos($nombre_archivo, '/') )
					{
						$nombre_archivo = explode('/', $imagen);
						$nombre_archivo = end($nombre_archivo);
					}
				if ( $copia )
						$nombre_archivo = 'copia_'.$nombre_archivo;

					$calidad_imagen = 90;
				switch ( $tipo ){
					case IMAGETYPE_JPEG: //image/jpg image/jpeg
						imagejpeg($nimg, \PxN\ImageUpload\Server::$dir."/".$imgname, $calidad_imagen);
					break;
					case IMAGETYPE_PNG: //image/png
						imagepng($nimg, \PxN\ImageUpload\Server::$dir."/".$imgname, $calidad_imagen/10);
					break;
	
					default:
				return FALSE;
				}
			imagedestroy($nimg);

		}
		}