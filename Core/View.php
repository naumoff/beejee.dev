<?php

namespace Core;

use Philo\Blade\Blade;

/**
 * View
 *
 * PHP version 5.4
 */
class View
{

	public static function test()
	{
		$path = dirname(dirname(__File__)).'/App/Views';
		$views = $path;
		$cache = $path.'/cache/';
		
//		var_dump($views);
//		var_dump($cache);
		$blade = new Blade($views, $cache);
//		echo "<pre>";
//		print_r($blade);
		
		echo $blade->view()->make('Test.content')->render();
	}
	
//	/**
//     * Render a view file
//     *
//     * @param string $view  The view file
//     * @param array $args  Associative array of data to display in the view (optional)
//     *
//     * @return void
//     */
//    public static function render($view, $args = [])
//    {
//        extract($args, EXTR_SKIP);
//
//        $file = "../App/Views/$view";  // relative to Core directory
//
//        if (is_readable($file)) {
//            require $file;
//        } else {
//            throw new \Exception("$file not found");
//        }
//    }

}
