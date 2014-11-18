<?php
namespace Api\Controllers;

use Illuminate\Routing\Controller;
use View;


class BaseController extends Controller {
	
	protected $responses = [

							];

	protected function responseSuccess(Array $data = []){

	}

	protected function responseError(Array $data = []){

	}


/*
	RESTFull
	//GET
	public function index(){}

	//GET
	public function create(){}

	//POST
	public function store(){}

	//GET
	public function show(){}

	//GET
	public function edit(){}

	//PUT/PATCH
	public function update(){}

	//DELETE
	public function destroy(){}
*/

}