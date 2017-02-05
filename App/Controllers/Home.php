<?php
/**
 * Home controller
 */

namespace App\Controllers;
use \Core\View;

/**
 * Class Home
 * @package App\Controllers
 */

class Home extends \Core\Controller
{
	/**
	 * Show index page for Home controller.
	 * @return void
	 */
	public function indexAction(){
		View::render('Home/index.php',
			[
				'title'=>'Главная',
			], FALSE);
	}
	
	/**
	 * Before filter.
	 * @return void
	 */
	protected function before()
	{

	}
	
	/**
	 * After filter
	 * @return void
	 */
	protected function after()
	{

	}
}