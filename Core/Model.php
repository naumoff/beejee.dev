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
	
	private static $host = Config::DB_HOST;
	private static $dbname = Config::DB_NAME;
	private static $username = Config::DB_USER;
	private static $password = Config::DB_PASS;
	protected static $db;
	
	protected static function getDB()
	{
		static::$db = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname.";charset=utf8",self::$username,self::$password);
		static::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return static::$db;
	}
	
}