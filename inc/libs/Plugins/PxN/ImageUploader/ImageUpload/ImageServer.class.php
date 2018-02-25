<?php
	namespace PxN\ImageUpload;

	class Server{	
		public static $dir;

		public static function Start(){
			self::$dir = __DIR__.'/../../../files/uploads/images/'.date("dmy");
		if (!file_exists(self::$dir) && !is_dir(self::$dir)) {
			mkdir(self::$dir,0777,true);
			chmod(self::$dir, 0777);
		if (!file_exists(self::$dir."/thumbs") && !is_dir(self::$dir."/thumbs")) {
				mkdir(self::$dir."/thumbs",0777,true);
				chmod(self::$dir."/thumbs", 0777);
				}
		}
	}



		}
