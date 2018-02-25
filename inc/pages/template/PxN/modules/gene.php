<?php
	/*
	 * PxN Anarchy 
	 * Password Generator
	 * https://howl.pxnanarchy.com
	 * Design by Irwin López
	 */
		namespace Plugins\PxN;
		use \Plugins\PxN\PasswordGenerator as PPG;
			class PasswordGenerator{
				public static $Letters = "ABCDEFGHIJKLMNOPQRSTWXYZ";
				public static $Numbers = "0123456789";
				public static $LettersMin = "abcdefghijklmnopqrstwxyz";
				public static $Symbols ="|@#~$%()=^*+[]{}-_";
				public static $let,$num,$letmin,$symbol = true;
				public static $start = "";
				public static $len = 8;
					public function __construct($let=true,$num=true,$letmin=true,$symbol = true,$start="",$len=8){
						self::Configure($let,$num,$letmin,$symbol,$start,$len);
					}
					public static function Configure($let=true,$num=true,$letmin=true,$symbol = true,$start="",$len=8){
						self::$let = $let;
						self::$num = $num;
						self::$letmin = $letmin;
						self::$symbol = $symbol;
						self::$start = $start;
						self::$len = $len;
					}
					public static function GenerateKey(){
						$str = "";
							for ($i=0; $i < self::$len; $i++) { 
								$letter = substr(PPG::$Letters,rand(0,rand(1,PPG::CountS(PPG::$Letters)-1)),1);
								$num = substr(PPG::$Numbers,rand(0,rand(1,PPG::CountS(PPG::$Numbers)-1)),1);
								$lettermin = substr(PPG::$LettersMin,rand(0,rand(1,PPG::CountS(PPG::$LettersMin)-1)),1);
								$symbols = substr(PPG::$Symbols,rand(0,rand(1,PPG::CountS(PPG::$Symbols)-1)),1);
								$data = array();
								if (self::$let) {
									array_push($data, $letter);
								}
								if (self::$num) {
									array_push($data, $num);
								}
								if (self::$letmin) {
									array_push($data, $lettermin);
								}
								if (self::$symbol) {
									array_push($data, $symbols);
								}
								if (!self::$let and !self::$num and !self::$letmin and !self::$symbol) {
									$data = array($letter,$num,$lettermin,$symbols);
								}
									$str.= $data[rand(0,(count($data)-1))];
							}
							
							return self::$start.$str;
					}
				

					public static function CountS($string){
						return strlen($string);
					}
					
			}

			//Primer True = Letras mayusculas
			//Segundo True = Numeros
			//Tercer True = Letras minusculas
			//Cuarto True = Simbolos
			//25 = Con lo que iniciara la contraseña
			//6 = Longitud de caracteres a generar
			$CantidadAGenerar = 8;

			for ($i=0; $i < $CantidadAGenerar; $i++) { 
			$ic = new PasswordGenerator(false,true,false,false,"25.",6);
			echo $ic->GenerateKey()."<br>";

		}

?>
