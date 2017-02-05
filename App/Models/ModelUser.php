<?php
/**
 * User Model
 * @package \App\Models
 */

namespace App\Models;
use Core\Model;
use PDO;

/**
 * Class ModelUser
 * @package App\Models
 */
class ModelUser extends \Core\Model{

	public static $userID;
	public static $userName;
	
	/**
	 * function return logged in user id.
	 * if static $usderID is empty in checks $_SESSION['userID']
	 * @return bool | integer
	 */
	public static function getUserID() {
		if(empty(self::$userID) && isset($_SESSION['userID'])){
			self::$userID = $_SESSION['userID'];
			return self::$userID;
		}else if(!empty(self::$userID)){
			return self::$userID;
		}else{
			return false;
		}
	}
	
	/**
	 * function returns logged in user name.
	 * if static $usderName is empty in checks $_SESSION['userName']
	 * @return bool | string
	 */
	public static function getUserName()
	{
		if(empty(self::$userName) && !empty($_SESSION['userName'])){
			self::$userName = $_SESSION['userName'];
			return self::$userName;
		}else if(!empty(self::$userName)){
			return self::$userName;
		}else{
			return false;
		}
	}
	
	/**
	 * function checks new user login uniqueness.
	 * @param $data
	 * @return bool|string
	 */
	public static function checkUserName($data)
	{
		$sql1 = "SELECT id
					FROM user
					WHERE user = :user";
		
		$db = static::getDB();
		$statement = $db->prepare($sql1);
		$statement->bindParam(':user', $data['user']);
		$statement->execute();
		$userID = $statement->fetch(PDO::FETCH_ASSOC);
		if($userID !== FALSE){
			$errorMessage = "User with name <b>{$data['user']}</b> already exists!";
			return $errorMessage;
		}else{
			return FALSE;
		}
	}
	
	/**
	 * function checks new user email uniqueness.
	 * @param $data
	 * @return bool|string
	 */
	public static function checkUserEmail($data)
	{
		$sql = "SELECT id
					FROM user
					WHERE email = :email";
		
		$statement = \Core\Model::$db->prepare($sql);
		$statement->bindParam(':email', $data['email']);
		$statement->execute();
		$userID = $statement->fetch(PDO::FETCH_ASSOC);
		if($userID !== FALSE){
			$errorMessage = "User with email <b>{$data['email']}</b> already exists!";
			return $errorMessage;
		}else{
			return false;
		}
	}
	
	/**
	 * function register new user in database
	 * @param $data
	 * @return mixed
	 */
	public static function userRegistration($data)
	{
		$sql = "INSERT INTO user 
					(user,email,pass,created)
					VALUES (:user,:email,:pass,NOW())";
		$statement = \Core\Model::$db->prepare($sql);
		$userAddStatus = $statement->execute(array(
			':user'=>$data['user'],
			':email'=>$data['email'],
			':pass'=>$data['pass']
		));
		return $userAddStatus;
	}
	
	/**
	 * function performs new user authorization.
	 * @param $data
	 * @return bool
	 */
	public static function userLogin($data)
	{
		$sql = "SELECT id, user 
				FROM user 
				WHERE email = :email	
				AND pass = :pass";
		$db = static::getDB();
		$statement = $db->prepare($sql);
		$statement->bindParam(':email',$_POST['email']);
		$statement->bindParam(':pass',$_POST['pass']);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		
		if(!empty($result)){
			$_SESSION['userID'] = $result['id'];
			$_SESSION['userName'] = $result['user'];
			return TRUE;
		}else{
			return FALSE;
		}
	}
}