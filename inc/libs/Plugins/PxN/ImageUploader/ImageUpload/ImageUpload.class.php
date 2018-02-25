<?php

	namespace PxN\ImageUpload;

		class Upload{

			public static function Upload($position){

				$img = Filter::$img['tmp_name'][$position];
				$ext = pathinfo(Filter::$img['name'][$position], PATHINFO_EXTENSION);
				$imgdir = md5($img.time().uniqid()).".".$ext;

				$dir = Server::$dir."/".$imgdir;

				if(move_uploaded_file($img, $dir)){
						WaterMark::SetMark($dir,"Todoal60.com",false,$imgdir);
						Thumb::CreateThumb($dir,$imgdir);
						$img_sql_data = array($imgdir,date("d-m-Y"),date("dmy"),"Gabriel");
						if(DB::Upload($img_sql_data)){
					return true;
				}else{
					return false;
				}
				}else{
					return false;
				}




			}
		}