<?php
	
	namespace Authentication;

	class Encryption{

		private static $Salt = "0101M10E0M1E03MA10";
		public static function Encode($v1=null, $v2=null, $v3=null){

			$encryption_result = sha1(md5(Encryption::$Salt.$v1).$v2);
			$encryption_result = md5(Encryption::PrivateHash().$encryption_result.sha1($encryption_result.$v3));
			$encryption_result = sha1(sha1(Encryption::PrivateHash()).md5($encryption_result));
			$encryption_result = md5($encryption_result);
			$encryption_result = sha1($encryption_result);
			return $encryption_result;



		}

		public static function PrivateHash(){
			$hash = Encryption::$Salt;
			$hash = str_replace(array("0","1","M"), array("1","0","D"), $hash);
			$hash = md5(sha1(\Nucleo\Config\Get::$title).$hash.\Nucleo\Config\Get::$apk);
			return $hash;
		}


	}

?>