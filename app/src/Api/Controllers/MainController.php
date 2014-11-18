<?php
namespace Api\Controllers;
use Config;
use Response;

class MainController extends BaseController {

	public function appConfig(){
		$config = json_encode(Config::get('javascript.config'));
		$content = 'var $appConfig = '. $config .';';
		$response = Response::make($content);
		$response->header('Content-Type', 'text/javascript');

		return $response;
	}

}