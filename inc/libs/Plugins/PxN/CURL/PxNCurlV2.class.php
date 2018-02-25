<?php
	namespace Plugins\PxN;
	
	class PxNCurlv2{
		public static $httpcode=null,$result=null,$cookie,$proxy_Server=null, $proxy_Type="http", $Status,$error=null,$url,$validateRequest=true,$header_size,$header="VACIO",$body,$getHeader=false,$urlD;

		public static function ValidateRequest($source){
			if (self::$validateRequest) {
			
		if (self::$error != null) {
			self::$error = "Ha ocurrido un error en la peticion, mensaje:".self::$error;
		}elseif (self::$httpcode != 200) {
			self::$error = "El servidor remoto ha enviado una respuesta de error, HTTP ERROR CODE: ".self::$httpcode;
		}else{
			self::$error = null;
		}
		self::StopServer();
		if (self::$error != null) {
			return self::$error;
		}else{
			return $source;
		}
	}else{
		return $source;
	}

	} 
		public static function StopServer(){
			if (self::$error != null or self::$httpcode != 200) {
				\Plugins\PxN\FA::Show(self::$error,"\n");
				//exit();
			}
		}
		public static function PrintResult($print_code = 0){
			$code = ($print_code == 0) ? "NO SOLICITADO" : self::$result;
			echo "<br>[Se ha enviado una peticion: ".self::$Status."; con respuesta http: ".self::$httpcode."; código de respuesta: ".$code." URL: ".urldecode(self::$urlD)."]<br>";
		}

		public static function PGET($URL,$scookie = false, $lcookie = false, $cookie_name=null,$header=null){
			self::$Status = "PGET";
			self::$urlD = $URL;
			self::$cookie = $cookie_name;
			$headers_test=[];
			$ch = curl_init();

			curl_setopt($ch,CURLOPT_URL, $URL);
			if ($header != null) { curl_setopt($ch,CURLOPT_HTTPHEADER, $header); }

			if ($scookie) {

				curl_setopt($ch, CURLOPT_COOKIEJAR, \Nucleo\Config::$cachedir.'/cookies/'.self::$cookie);
				curl_setopt($ch, CURLOPT_COOKIEFILE, \Nucleo\Config::$cachedir.'/cookies/'.self::$cookie);
			}

			if ($lcookie) {
				curl_setopt($ch, CURLOPT_COOKIEJAR, \Nucleo\Config::$cachedir.'/cookies/'.self::$cookie); 
				curl_setopt($ch, CURLOPT_COOKIEFILE, \Nucleo\Config::$cachedir.'/cookies/'.self::$cookie);
			}

			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);

			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36");

			if (!empty(self::$proxy_Server)) {

				//echo "Usando proxy";
			
			if (!empty(self::$proxy_Type)) {
				$hjtopc = self::HJToPC(self::$proxy_Type);
				if($hjtopc != "http"){
				curl_setopt($ch, CURLOPT_PROXYTYPE, $hjtopc);
				curl_setopt($ch, CURLOPT_PROXY, "socks5://".self::$proxy_Server);
			}else{
				
				curl_setopt($ch, CURLOPT_PROXY, self::$proxy_Server);	
			} } }
			curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);        
			$result = curl_exec($ch);

			if($result === false) { self::$error = curl_error($ch); }
			 self::$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			 self::$url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
			if(self::$getHeader){
				          curl_setopt($ch, CURLOPT_HEADER, 1);

				curl_setopt($ch, CURLOPT_HEADERFUNCTION,
  function($curl, $headerDD) use(&$headers_test)
  {
    $len    = strlen($headerDD);
    $headerDD = explode(':', $headerDD, 2);
    if (count($headerDD) < 2)
      return $len;

    $headers_test[strtolower(trim($headerDD[0]))] = trim($headerDD[1]);
    return $len;
  });





			self::$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
			//echo self::$header_size;
			//self::$header = substr($result, 0, self::$header_size);
			//self::$body = substr($result, self::$header_size);
			$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
			$header = substr($result, 0, $header_size);
			$body = substr($result, $header_size);

			echo $URL;
			print_r($headers_test);
		}
			curl_close($ch);
			self::$result = $result;
			

			return self::ValidateRequest($result);
		}

			public static function PPOST($URL,$params, $scookie = false, $lcookie = false, $cookie_name=null,$header=null){
			self::$urlD = $URL;
			self::$Status = "PPOST";
			self::$cookie = $cookie_name;

			$ch = curl_init();
			if ($header != null) { curl_setopt($ch,CURLOPT_HTTPHEADER, $header); }
			curl_setopt($ch,CURLOPT_POST, 1);
			curl_setopt($ch,CURLOPT_POSTFIELDS, $params);

			curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);

			curl_setopt($ch,CURLOPT_URL, $URL);
			
			if ($lcookie) {
				curl_setopt($ch, CURLOPT_COOKIEJAR, \Nucleo\Config::$cachedir.'/cookies/'.self::$cookie); 
				curl_setopt($ch, CURLOPT_COOKIEFILE, \Nucleo\Config::$cachedir.'/cookies/'.self::$cookie);
			}
			if ($scookie) {
				curl_setopt($ch, CURLOPT_URL, $URL);
				curl_setopt($ch, CURLOPT_COOKIEJAR, \Nucleo\Config::$cachedir.'/cookies/'.self::$cookie);
				curl_setopt($ch, CURLOPT_COOKIEFILE, \Nucleo\Config::$cachedir.'/cookies/'.self::$cookie);
			}

			
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);


			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/20100101 Firefox/19.0");

			if (!empty(self::$proxy_Server)) {
			
			if (!empty(self::$proxy_Type)) {
				$hjtopc = self::HJToPC(self::$proxy_Type);
				if($hjtopc != "http"){
				curl_setopt($ch, CURLOPT_PROXYTYPE, $hjtopc);
				curl_setopt($ch, CURLOPT_PROXY, "socks5://".self::$proxy_Server);	



			}else{
				curl_setopt($ch, CURLOPT_PROXY, self::$proxy_Server);	

			}
			}
			

			}
			curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);        
			$result = curl_exec($ch);
			if($result === false) { self::$error = curl_error($ch); }
			self::$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			self::$url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
			if(!self::$getHeader){
			self::$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
			self::$header = substr($result, 0, self::$header_size);
			self::$body = substr($result, self::$header_size);
	
			}

			curl_close($ch);
			self::$result = $result;
			

			return self::ValidateRequest($result);



		}




		public static function HJToPC($sock){

				//\Plugins\PxN\FA::Show("Enviando petición con proxy: ".self::$proxy_Server." | ".self::$proxy_Type." | ".self::$Status);


			if ($sock=="socks5") {
				return CURLPROXY_SOCKS5;
			}else{
				return "http";
			}
		}


	}
	