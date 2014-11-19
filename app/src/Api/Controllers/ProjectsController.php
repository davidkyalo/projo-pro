<?php
namespace Api\Controllers;
use Input;

class ProjectsController extends BaseController {

	protected $repositoryName = 'projectsRepo';
	protected $modelName = 'Project';


	public function store(){
		$data = Input::all();
		$isValid = $this->validator->validate($this->modelName, 'create', $data);
		if($isValid){
			$model = $this->repository->newOne();
			$model->urls = $data['urls'];
			unset($data['urls']);
			$model->fill($data);
			$model->save();
			return $this->response->success(['model' => $model , 'messages' => $this->modelName . ' saved.']);
		}
		else{
			return $this->response->error(['messages' => $this->validator->getMessages()]);
		}
	}

	
}
