<?php
/**
 * Posts Controller
 */

namespace App\Controllers;
use \Core\View;
use \App\Models\Post;

/**
 * Class Posts
 * @package App\Controllers
 */
class Posts extends \Core\Controller
{
	/**
	 * Show index page.
	 * @return void
	 */
	public function indexAction()
	{
		$posts = Post::getAll();
		View::render('Posts/index.php',
			[
				'title'=>'Posts',
				'posts'=>$posts
			]);
	}
	
	/**
	 * Show add new Post Page.
	 * @return void
	 */
	public function addNewAction()
	{
		View::render('Posts/index.php',
			[
				'title'=>'Posts'
			]);
	}
	
	/**
	 * Show the edit page.
	 * @return void
	 */
	public function editAction()
	{
		echo '<pre>';
		echo "Hello from edit action in the Post Controller\n";
		echo "Route parameters:\n";
		echo htmlspecialchars(print_r($this->route_params));
	}
}