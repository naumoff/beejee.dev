<?php
/**
 * Base view file
 */

namespace Core;

/**
 * Central Class View.
 * Provides function to render html files
 * @todo decide what to do with customPath variable
 * @package Core
 */

class View {
	/**
	 * @var string $customPath path to custom templates in views folder
	 */
	private static $customPath;
	/**
	 * @var string $header path to header template
	 */
	private static $header;
	/**
	 * @var string $topMenu path to topMenu template
	 */
	private static $topMenu;
	/**
	 * @var string $footer path footer template
	 */
	private static $footer;
	
	/**
	 * Render a view file.
	 * @param string $view the path to view file
	 * @param array $args arguments passed to view
	 * @return void
	 */
	public static function render($view, $args=[], $menu = TRUE)
	{
		self::$customPath = dirname(__DIR__).'\App\Views\\'.$view;
		$pattern = '/\/.*/i';
		self::$customPath = preg_replace($pattern, '', self::$customPath);
		
		// header, top menu and footer assigning
		self::$header = dirname(__DIR__).'\App\Views\Layouts\header.php';
		self::$topMenu = dirname(__DIR__).'\App\Views\Layouts\topmenu.php';
		self::$footer = dirname(__DIR__).'\App\Views\Layouts\footer.php';
		
		extract($args,EXTR_SKIP);
		$file = "../App/Views/{$view}"; // relative to core directory
		if(is_readable($file)){
			include self::$header;
			if($menu) {
				include self::$topMenu;
			}
			include $file; // html content from view folder gen by controller
			include self::$footer;
		}else{
			echo "{$file} not found!";
		}
	}
}