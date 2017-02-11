<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


class RouterFactory
{
	/**
	 * @return Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList;
		$router[] = new Route('dokonceniregistrace/<token>', array('module' => 'Admin', 'presenter' => 'Sign', 'action' => 'finalregister', 'token' => NULL));
		$router[] = new Route('administrace/<presenter>/<action>/<id>', array('module' => 'Admin', 'presenter' => 'Homepage', 'action' => 'default', 'id' => NULL));
		$router[] = new Route('news/<id>', array('module' => 'Front','presenter' => 'Blog', 'action' => 'post', 'id' => NULL));
        $router[] = new Route('<presenter>/<action>/<id>', array('module' => 'Front','presenter' => 'Homepage', 'action' => 'default', 'id' => NULL));
		return $router;
	}

}
