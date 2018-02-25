<?php


	namespace PxN\ImageUpload;



	class ListImages{



			public static function GetImages(){
				$con = \Nucleo\DB\PCDB::db_connection();
            $result=array();
            $stmt = $con->prepare("SELECT id_img,file_img,date_img,date_dir_img,broker_img FROM ".\Nucleo\Config\Get::$sqlprefix."imgs ORDER BY id_img DESC");
            $stmt->execute();
            $stmt->bind_result($id_img,$file_img,$date_img,$date_dir_img,$broker_img);
            $stmt->store_result();
            $rest="";
            while ($stmt->fetch()){
                $rest =  array($id_img,$file_img,$date_img,$date_dir_img,$broker_img);
                array_push($result, $rest);
            
          }
            return $result;


			}








	}