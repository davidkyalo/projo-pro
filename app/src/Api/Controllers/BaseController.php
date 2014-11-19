<?php
namespace Api\Controllers;

use Illuminate\Routing\Controller;
use View;
use App;
use Input;

class BaseController extends Controller {
	
	protected $responses = [

							];
	protected $repository;
	protected $repositoryName;
	protected $modelName = '';
	protected $validator;
	protected $response;

	public function __construct(){
		$this->setRepository();
		$this->setValidator();
		$this->setResponse();
	}

	protected function setRepository(){
		if($this->repositoryName)
			$this->repository = App::make($this->repositoryName);

	}

	protected function setValidator(){
		$this->validator = App::make('apiValidator');
	}

	protected function setResponse(){
		$this->response = App::make('apiResponse');
	}

	//GET
	public function index(){
		return $this->response->ok(['models' => $this->repository->all()]);
	}

	//GET
	public function create(){}

	//POST
	public function store(){
		$data = Input::all();
		$isValid = $this->validator->validate($this->modelName, 'create', $data);
		if($isValid){
			$model = $this->repository->create($data);
			return $this->response->success(['model' => $data , 'messages' => $this->modelName . ' saved.']);
		}
		else{
			return $this->response->error(['messages' => $this->validator->getMessages()]);
		}
	}

	//GET
	public function show(){}

	//GET
	public function edit(){}

	//PUT/PATCH
	public function update(){}

	//DELETE
	public function destroy(){}


}