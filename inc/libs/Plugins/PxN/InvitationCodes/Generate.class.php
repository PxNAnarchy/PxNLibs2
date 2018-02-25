<?php
	/*
	 * PxN Anarchy 
	 * Invitation Code Generator
	 * https://poison.pxnanarchy.com
	 * Design by Irwin López
	 */
		namespace Plugins\PxN;
		use \Plugins\PxN\InvitationCodes as GIC;
			class InvitationCodes{
				public static $Letters = "ABCDEFGHIJKLMNOPQRSTWXYZ";
				public static $Numbers = "0123678549621038579401378524690162537948081236547920135467894231507689104328657973186049250348192657";
					public static function GenerateTIC($rank="Zero"){
						if ($rank==3) { $rank = "RU"; }elseif ($rank==4) {$rank = "VIP";}elseif ($rank==5) {$rank = "GVIP";}
						return "PxN-".GIC::GenerateKey()."-".$rank;
					}
					public static function GenerateKey(){
						$str = "";
						GIC::$Numbers = GIC::PrepareNumbers();
						GIC::$Letters = GIC::PrepareLetters();
						for ($v=0; $v < 4; $v++) { 
							for ($i=0; $i <4 ; $i++) { 
								$key = substr(GIC::$Letters,rand(0,rand(1,GIC::CountS(GIC::$Letters)-1)),1);
								$num = substr(GIC::$Numbers,rand(0,rand(1,GIC::CountS(GIC::$Numbers)-1)),1);
										if (strpos($str, $num)) {
											$num = substr(GIC::$Numbers,rand(0,rand(1,GIC::CountS(GIC::$Numbers)-1)),1);
										}
								$data = array($key,$num);
									$str.= $data[rand(0,1)];
							}
							$str .= "-";
						}
							return substr($str, 0,strlen($str)-2);
					}
					public static function PrepareNumbers(){
							$numbers ="";
							$Azar = GIC::$Numbers;
							for ($i=0; $i < strlen(GIC::$Numbers); $i++) { 
								$num = substr($Azar,rand(0,rand(0,GIC::CountS($Azar)-1)),1);
								$x = (string)$num; 
							if (strpos($Azar, $x) !== false) {
									$Azar = str_replace($x, rand(0,9), $Azar);
								}
							$numbers .= $num;
							}
						return $numbers;
					}

					public static function PrepareLetters(){
							$letters ="";
							$Azar = GIC::$Letters;
							for ($i=0; $i < strlen(GIC::$Letters); $i++) { 
								$lets = substr($Azar,rand(0,rand(0,GIC::CountS($Azar)-1)),1);
								$x = (string)$lets; 
							if (strpos($Azar, $x) !== false) {
									$Azar = str_replace($x, "", $Azar);
								}
							$letters .= $lets;
							}
						return $letters;
					}


					public static function CountS($string){
						return strlen($string);
					}
			}
?>
