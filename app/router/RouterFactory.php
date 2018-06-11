<?php

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
		//$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		//$router[] = new Route('<presenter>/[<category>]/[<name>]-[<id>]', 'Core:Product:default');
        $router[] = new Route('product/add', 'Core:Product:add');
        $router[] = new Route('product/[<id>]/<action>', [
            'presenter' => 'Core:Product',
            'action' => [
                Route::VALUE => 'default',
                Route::FILTER_TABLE => [
                    'detail' => 'default',
                    'edit' => 'edit'
                ],
                Route::FILTER_STRICT => true
            ]
        ]);
        $router[] = new Route('product/', 'Core:Product:list');
		return $router;
	}
}