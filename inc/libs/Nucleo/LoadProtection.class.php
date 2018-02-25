<?php

	namespace Nucleo;


		class LoadProtection{

				public static function File($file){
						require_once $file;

							if (isset($PxNCode) and $PxNCode=="6ecab73fcb07eae8af68e9159ce7b65a") return true;
							return false;
				}


		}






?>