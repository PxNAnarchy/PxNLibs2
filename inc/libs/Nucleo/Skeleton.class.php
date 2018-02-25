<?php

	namespace Nucleo;


	class Skeleton{
		public static $version = "Meteor DB 1.0";
		public static function clear_string($string){
			$string = @trim($string);
			$string = strip_tags($string);
			$string = htmlentities($string);
			return $string;
		}

		public static function u_clear_string($string){
			$string = strip_tags($string);
			$con = \Nucleo\DB\PCDB::db_connection();
			$string = $con->real_escape_string($string);
			return $string;
		}

		public static function mclear_string($string){
			return self::u_clear_string(self::clear_string($string));
		}
		public static function Redir($link="/",$tipo="JS"){
			$link = \Nucleo\Skeleton::u_clear_string($link);
			switch ($tipo) {
				case 'PHP':
					header("LOCATION: ".$link);
				break;
				case 'JS':
					echo '<script>top.location.href="'.$link.'";</script>';
				break;
				default:
						echo "TIPO DE REDIRECCIÓN INVALIDA";
				break;
			}

		}

	}