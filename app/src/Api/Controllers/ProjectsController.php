<?php
namespace Api\Controllers;

use Models\Repositories\ProjectsRepository;
use App;

class ProjectsController extends BaseController {

	protected $projectsRepo;

	public function __construct(){
		$this->projectsRepo = App::make('projectsRepo');
	}

	public function index(){
		return $this->projectsRepo->all()->toJson();
	}

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

}
