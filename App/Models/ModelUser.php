<?php
/**
 * User Model
 */

namespace App\Models;
use PDO;

class ModelUser extends \Core\Model{
	
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
}