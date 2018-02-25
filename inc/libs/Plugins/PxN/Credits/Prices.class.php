<?php
	
	namespace Plugins\PxN;

		class Prices{
				public static $price_credit = 0.05;


				public static function Calculate($amount){
					$price = $amount * self::$price_credit;
						if ($amount >= 500) {
					$price = $price - (($price * 5) / 100);
					$price = $price - (((self::$price_credit * $amount) - ($price * 5) /100) / 100);	
						
					if (strlen($amount) <= 4) {
						$price = $price - ($price * ($amount / 1000) / 100);
					}else{
						$price = $price - ($price * 10 / 100);
					}
				}
					$original_price = $amount * self::$price_credit;
					$you_save = 100 - ($price * 100 / $original_price);
					$pric = array("price"=>round($price),"original_price"=>round($original_price),"you_saved"=>$you_save."%");
					return $pric;


				}



		}

?>