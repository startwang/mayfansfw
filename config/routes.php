<?php
/*======================================================================================================================
 *   ProjectName: mayfansfw
 *      FileName: routes.php
 *          Desc: 路由配置
 *        Author: start
 *         Email: start_wang@qq.com
 *      HomePage: 
 *       Version: 0.0.1
 *           IDE: PhpStorm
 *    CreateTime: 2017/1/8 17:02
 *    LastChange: 2017/1/8 17:02
 *       History:
 =====================================================================================================================*/

$klein = new \Klein\Klein();


$klein->respond('GET', '/[:controller]?/[**:action]?', function ($request, $response, $service, $app) {
	$controller_class = ucfirst($request->controller).'Controller';
	$action = $request->action;
	if (class_exists($controller_class)) {
		$app->controller = new $controller_class();
		$app->controller->$action();
	} else{
		echo 'no';
	}
});

$klein->dispatch();