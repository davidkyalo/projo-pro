<?php
namespace Api\Services;

use Validator as Factory;
use Config;

class Validator {

	protected $rules;
	protected $messages;

	public function __construct(){
		$this->rules = Config::get('validators', []);
	}

	public function getMessages(){
		return $this->messages;
	}

	public function validate($model, $event, $data){
		$rules = $this->getRules($model, $event);
		$result = Factory::make($data, $rules);
		$this->messages = $result->messages();
		return $result->passes();
	}

	public function getRules($model, $event){
		if(!isset($this->rules[$model]))
			return [];

		return isset($this->rules[$model][$event]) ? $this->rules[$model][$event] : [];
	}

}