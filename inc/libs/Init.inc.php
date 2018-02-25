<?php
	
	/**
	 * 	@package: PxN Network Libs. 
	 *	@version: 2.0
	 *	@author: PxN Netowork Inc.
	 *	@author: Irwin López
	 * 	@copyright: PxN Network Inc. 2018 - 2019.
	 ******************************************
	 *										  *
	 *			PxN Network Libs 2.0		  *
	 *										  *
	 ******************************************
	 *	Requirements:
	 *
	 *		* PHP > 5.3
	 *		* MySQLi
	 *		* CURL 
	 */


	require_once __DIR__."/Nucleo/LoadProtection.class.php";
	require_once __DIR__."/Nucleo/Config.class.php";
	@session_start();
function InitLoad($dir){ 

    if (is_dir($dir)) { 
       if ($dh = opendir($dir)) { 
          while (($file = readdir($dh)) !== false) { 
             if (is_dir($dir . $file) && $file!="." && $file!=".."){ 
                InitLoad($dir . $file . "/"); 
             } else{
            	if($file=="Init.php"){
            			if(\Nucleo\LoadProtection::File($dir.$file)){

            				require_once $dir.$file;
            			}else{
            				echo "<h3>EL ARCHIVO ".$dir.$file." NO HA SIDO VALIDADO POR PXN PROTECTION. ESTE ARCHIVO PUEDE SER PELIGROSO</h3><br>";
            			}
            	}
             }
          } 
       closedir($dh); 
       } 
    }
}
 InitLoad(\Nucleo\Config::$dir."/");

        
        




?> 