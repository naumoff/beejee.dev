<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 08.07.2017
 * Time: 17:08
 */

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Test extends Controller{
	
	public function restAction()
	{
		
		View::test();
//		var_dump($id);
	}
	
	public function before()
	{
//		return false;
	}
}