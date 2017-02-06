<?php
/**
 * Task Model file
 * @package \App\Models
 */

namespace App\Models;
use \Core\Model;
use PDO;


class ModelTask extends \Core\Model {
	
	public static function getTaskList()
	{
		$db = static::getDB();
		
	}
}