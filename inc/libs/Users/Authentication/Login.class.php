<?php

 	namespace Authentication;

 	class Login{

 		public static $tokenid = NULL;
 		public static $tokencontent = NULL;

 		public static function Start($username,$password,$ptokenid, $ptokencontent, $tokenid, $tokencontent){

 			\Authentication\Login::$tokenid = $ptokenid;
 			\Authentication\Login::$tokencontent = $ptokencontent;
 				if (!self::TokenValidation($tokenid,$tokencontent)) {
 					
 			$con = \Nucleo\DB\PCDB::db_connection();
			$stmt = $con->prepare("SELECT * FROM ".\Nucleo\Config::$sqlprefix."users where username = ? and password = ? and suspend = 0 and active = 1 LIMIT 1");
			$stmt->bind_param("ss",$username,$password);
			$stmt->execute();
			$stmt->store_result();
			$result = ($stmt->num_rows == 1) ? TRUE : FALSE;
			$stmt->close();
			return $result;


		}else{
			return true;
		}


		}
		public static function CreateSession($username,$persistent){

			\Nucleo\Config::$cookie_time = ($persistent=="true") ? \Nucleo\Config::$cookie_time * 60 * 60 *365 : \Nucleo\Config::$cookie_time;

			$_SESSION['username'] = $username;
			setcookie("token", self::Token(), time()+\Nucleo\Config::$cookie_time, "/", ".".\Nucleo\Config::$domain);
			$cookiet = md5(time().sha1(time().$username));
			setcookie("id", $cookiet, time()+\Nucleo\Config::$cookie_time,"/",".".\Nucleo\Config::$domain);
			self::SaveCookie(array($username,$cookiet,time()+\Nucleo\Config::$cookie_time));
		}

		public static function TokenValidation($tokenid, $tokencontent){
			if ($tokenid == self::$tokenid and $tokencontent == self::$tokencontent) return true;
			return false;
				

		}
		public static function Token(){
			$token = substr(md5(uniqid()), 0,7)."!".substr(sha1(uniqid().time()), 0,7)."__!".substr(md5(uniqid()),0,6)."__!".substr(md5(sha1(uniqid())), 0,5);
			return $token;
		}

		public static function SaveCookie($sql_data){
			$con = \Nucleo\DB\PCDB::db_connection();
			if($stmt = $con->prepare("INSERT INTO ".\Nucleo\Config::$sqlprefix."cookies (username,cookie,time) VALUES (?,?,?)")) {
 			$stmt->bind_param("ssi", $sql_data[0],$sql_data[1],$sql_data[2]);
			$stmt->execute();
			$stmt->close();
			return true;
			}	
			return false;
		}

 	}







?>