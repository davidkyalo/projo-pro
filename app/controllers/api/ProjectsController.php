<?php
use PRP\Repositories\ProjectsRepository;

class ProjectsController extends BaseApiController {

	protected $projectsRepo;

	public function __construct(ProjectsRepository $projectsRepo ){
		$this->projectsRepo = $projectsRepo;
	}

}