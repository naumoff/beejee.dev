<?php
/**
 * Post Model file
 * @package App\Models
 */

namespace App\Models;
use PDO;

/**
 * Class Post
 * @package App\Models
 */
class Post extends \Core\Model
{
	/**
	 * This method return arrays of all posts.
	 *
	 * @return array associative array of all posts
	 */
	public static function getAll()
	{
		try{
			$db = static::getDB();
			$sql = "SELECT * FROM posts ORDER BY date";
			$statement = $db->query($sql);
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $error){
			$error->getMessage();
		}
		return $results;
	}
}