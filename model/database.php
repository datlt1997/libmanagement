<?php 
	
class Database{
	private static $dsn='mysql:host=localhost;dbname=libmanagement1';
	private static $username='root';
	private static $password='';
	private static $option=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
	private static $db;
	private function  __construct(){

	} public static function getDB(){
		if(!isset(self::$db)){
			try {
				self::$db=new PDO(self::$dsn,self::$username,self::$password,self::$option);
			} catch (PDOException $e) {
				$error_message=$e->getMessage();
				echo "error_message: $error_message";

			}
		}
		return self::$db;
	} 

}
?>
