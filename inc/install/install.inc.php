<?php
  /*
   * PxN Libs
   * Developed by Irwin López
   * Version 2.0
   * Copyright 2018 - 2019 PxN Network
   */

    $steep = empty($_POST['steep']) ? NULL : $_POST['steep'];


      switch ($steep) {
        case '1':
          
          if (isset($_POST['mysqlhost']) and !empty($_POST['mysqlhost']) and isset($_POST['mysqlusername']) and !empty($_POST['mysqlusername']) and 
              isset($_POST['mysqlpass'])  and isset($_POST['mysqlbase']) and !empty($_POST['mysqlbase'])){

                @$mysqli = new \MySQLi($_POST['mysqlhost'], $_POST['mysqlusername'], $_POST['mysqlpass'], $_POST['mysqlbase']);
                  if (mysqli_connect_errno()) { $PxNM="";
                  header("LOCATION: ./install.php?steep=2&msg=No se logro hacer la conexión mysql");
             }else{
$f=fopen("../libs/Nucleo/ConfigDB.class.php","w");
$database_inf='<?php
namespace Nucleo\DB;
class PCDB {
private static $mysql_host = "'.$_POST["mysqlhost"].'";
private static $mysql_user =  "'.$_POST["mysqlusername"].'";
private static $mysql_pass = "'.$_POST["mysqlpass"].'";
public static $mysql_base = "'.$_POST["mysqlbase"].'";
public static function db_connection(){
@$mysqli = new \MySQLi(PCDB::$mysql_host, PCDB::$mysql_user, PCDB::$mysql_pass, PCDB::$mysql_base);
if (mysqli_connect_errno()) { $PxNM="";
echo "Ha habido un problema con la conexion a la base de datos.";
exit(); }
return $mysqli;
}}
?>';
  if (fwrite($f,$database_inf)>0){ fclose($f); }
    header("LOCATION: ./install.php?steep=2");
  }

          }
  break;
        

case '2':

if (isset($_POST['url']) and !empty($_POST['url']) and isset($_POST['domain']) and !empty($_POST['domain']) and
    isset($_POST['title']) and !empty($_POST['title']) and isset($_POST['template']) and !empty($_POST['template']) and 
    isset($_POST['mysqlprefix']) and !empty($_POST['mysqlprefix']) and isset($_POST['dir']) and !empty($_POST['dir'])){


$f=fopen("../libs/Nucleo/Config.class.php","w");
$database_inf='<?php
  namespace Nucleo;
  
  class Config{
    public static $url = "'.$_POST['url'].'";
    public static $domain = "'.$_POST['domain'].'";
    public static $title = "'.$_POST['title'].'";
    public static $apk = "API-48994-4977-5664-78SA-B4521";
    public static $sqlprefix = "'.$_POST['mysqlprefix'].'";
    public static $cachedir;
    public static $dir = "'.$_POST['dir'].'";
    public static $cookie_time = 86400;
    public static $template = "'.$_POST['template'].'";
    public static $currency = "USD";
    public function __construct(){
      self::$cachedir = dirname(__file__)."/../../cache";
    }
  }

  $Config = new Config;
  $config_load = true;';
  if (fwrite($f,$database_inf)>0){ fclose($f); }
    header("LOCATION: ./install.php?steep=3");
  

}
  break;


  case '3':
      require_once __DIR__."/../libs/Init.inc.php";

        $con = \Nucleo\DB\PCDB::db_connection();

        $sql = "CREATE TABLE `".\Nucleo\DB\PCDB::$mysql_base."`.`".\Nucleo\Config::$sqlprefix."users` ( `id_user` INT(255) NOT NULL AUTO_INCREMENT , `username` VARCHAR(150) NOT NULL , `password` VARCHAR(150) NOT NULL , `email` VARCHAR(150) NOT NULL , `ip` VARCHAR(100) NOT NULL , `country` VARCHAR(2) NOT NULL , `active` INT(1) NOT NULL , `rank` INT(3) NOT NULL , `date` VARCHAR(150) NOT NULL , `mobil` VARCHAR(50) NOT NULL , PRIMARY KEY (`id_user`))";
        
          if($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->close();
                //header("LOCATION: ./install.php?steep=3&msg=Exito");

            echo "Finalizado <a href='./install.php?steep=3&msg=Exito'>Ir al final";

      } else{
        header("LOCATION: ./install.php?steep=3&msg=Fallo al crear la base");
      }



    break;



        default:
          # code...
          break;
      }


/*
  */