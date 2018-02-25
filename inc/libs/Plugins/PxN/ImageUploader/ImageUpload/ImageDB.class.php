<?php

	namespace PxN\ImageUpload;

		class DB{

			public static function Upload($img){

				$con = \Nucleo\DB\PCDB::db_connection();

			if($stmt = $con->prepare("INSERT INTO ".\Nucleo\Config\Get::$sqlprefix."imgs (file_img,date_img,date_dir_img,broker_img) VALUES (?,?,?,?)")) {
 			$stmt->bind_param("ssss", $img[0],$img[1],$img[2],$img[3]);
			$stmt->execute();
			$stmt->close();
			return true;
			}	
			return false;
		}



			}
		