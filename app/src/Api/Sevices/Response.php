<?php
namespace Api\Services;

class Response {

	protected $status = [
					'success' 	=> 'success',
					'error'		=> 'error',
					'bad'		=> 'bad',
					'ok'		=> 'ok'
				];

	public function __construct(){

	}

	public function respond(Array $data = [], $status = 'ok' ){
		$data['$status'] = $status; 
		return $data;
	}

	public function success(Array $data = []){
		return $this->respond($data, 'success');
	}

	public function error(Array $data = []){
		return $this->respond($data, 'error');
	}

	public function bad(Array $data = []){
		return $this->respond($data, 'bad');
	}

	public function ok(Array $data = []){
		return $this->respond($data, 'ok');
	}
}