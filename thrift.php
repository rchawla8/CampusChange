<?php
include 'response.php';
class Request {

	public static $request_type;
	public static $uri;
	public static $parameters;

	public static $list;

	public function init() {
		self::$uri = $_SERVER['REQUEST_URI'];
		self::$request_type = $_SERVER['REQUEST_METHOD'];
		self::handleRequest();
	}

	public function handleRequest() {
		
		switch(self::$request_type) {
			case 'GET': 
				self::handleGet();
				break;
			case 'POST': 
				self::handlePost();
				break;
			case 'PUT':
				self::handlePut();
				break;
			case 'DELETE': 
				self::handleDelete();
				break;
			default:
				self::sendError400();
		}

	}

	public function handleGet() {

		if(isset($_GET['list'])) {
			self::$list = $_GET['list'];
			
			switch(self::$list) {
				case 'users':
					self::querySendUsers();
					break;
				case 'items':
					self::querySendItems();
					break;
				default:
					self::sendError400();
			}

		}

		else {
			self::sendError400();
		}

	}

	public function sendError400(){
		$response = Response::createResponse(400);
		echo $response;
	}

	public function querySendUsers() {
		$users = array('Person a', 'Person b', 'Person c', 'Person d', 'Person e');
		echo json_encode($users);
	}

	public function querySendItems() {

	}


	public function handlePost() {

	}

	public function handlePut() {

	}

	public function handleDelete() {

	}
}

Request::init();