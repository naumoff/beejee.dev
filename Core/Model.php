<?php
/**
 * Base Model Class File
 */

namespace Core;

use PDO;
use \App\Config;

/**
 * Class Model
 * @package Core
 */
abstract class Model {
	
	protected static function getDB()
	{
		static $db = null;
		if($db === null){
			$host = Config::DB_HOST;
			$dbname = Config::DB_NAME;
			$username = Config::DB_USER;
			$password = Config::DB_PASS;
			try{
				$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $db;
			}catch (PDOException $error){
				echo $error->getMessage();
			}
		}
	}
	
}