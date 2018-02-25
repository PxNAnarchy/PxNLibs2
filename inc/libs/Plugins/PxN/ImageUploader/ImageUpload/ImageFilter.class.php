<?php

	namespace PxN\ImageUpload;



		class Filter{

			public static $MIMEAvailable = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			public static $peso_mb = 8;
			public static $img;
			public static $position;
			public static $result = array();
				public static function FilterImageType(){
					if (in_array(self::$img['type'][self::$position], self::$MIMEAvailable)) return true;
					return false;
				}

				public static function ImageError(){
					if (self::$img['error'][self::$position] == 0) return true;
					return false;
				}

				public static function FilterImageSize(){
					if (self::$img['size'][self::$position] < self::$peso_mb) return true;
					return false;
				}
				public static function FilterImageM(){
					if(getimagesize(self::$img['tmp_name'][self::$position])) return true;
					return false;
				}

				public static function FilterImagesArray($imgs){
					$imgxs = count($imgs['name']);


					for ($i=0; $i <$imgxs ; $i++) { 
						self::$position = $i;
						
						array_push(self::$result,self::Filter($imgs));
					}

					return self::$result;
				}

				public static function Filter($img){
					self::$peso_mb = self::$peso_mb * 1024 * 1024;
					self::$img = $img;


					if (self::ImageError()) {
					
						if (self::FilterImageType()) {
							
							if (self::FilterImageM()) {
								
								if (self::FilterImageSize()) {

									

											 if(Upload::Upload(self::$position)){

								return array("status"=>1, "position"=>self::$position, "msg"=>"La imagen se subio con exito", "img"=>self::$img['name'][self::$position]);
										}else{
								return array("status"=>0, "position"=>self::$position, "msg"=>"No se logro subir la imagen", "img"=>self::$img['name'][self::$position]);
										}

								}else{
									return array("status"=>0, "position"=>self::$position, "msg"=>"El archivo es demasiado grande", "img"=>self::$img['name'][self::$position]);							

								}


							}else{
								return array("status"=>0, "position"=>self::$position, "msg"=>"El archivo no parece una imagen", "img"=>self::$img['name'][self::$position]);
							}

						}else{
						return array("status"=>0, "position"=>self::$position,"msg"=> "Archivo no aceptado. Archivo detectado: ".$img['type'][self::$position], "img"=>self::$img['name'][self::$position]);
						}


					}else{
								return array("status"=>0, "position"=>self::$position, "msg"=>"La imagen contiene un error", "img"=>self::$img['name'][self::$position]);
					}

						

				}


		}


?>