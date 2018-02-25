<?php
namespace Nucleo\DB;
class PCDB {
private static $mysql_host = "localhost";
private static $mysql_user =  "root";
private static $mysql_pass = "";
public static $mysql_base = "zara";
public static function db_connection(){
@$mysqli = new \MySQLi(PCDB::$mysql_host, PCDB::$mysql_user, PCDB::$mysql_pass, PCDB::$mysql_base);
if (mysqli_connect_errno()) { $PxNM="";
echo "Ha habido un problema con la conexion a la base de datos.";
exit(); }
return $mysqli;
}}
?>