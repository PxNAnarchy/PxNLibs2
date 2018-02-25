<?php

	namespace Plugins\PxN;

		class FA{

			public static function Show($msg,$br="<br>"){
				if (ob_get_level() == 0) ob_start();
				echo $msg.$br;
				@ob_flush();
				@flush();
				ob_end_flush();
			}


		}