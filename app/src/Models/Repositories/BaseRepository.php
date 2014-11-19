<?php 
namespace Models\Repositories;

abstract class BaseRepository implements IRepository {

	protected $model;

	public function __construct($model){
		$this->model = $model;
	}

    public function all() {
        return $this->model->all();
    }

    public function first() {
        return $this->model->first();
    }

    public function find($id) {
        return $this->model->find($id);
    }

    public function create($inputs) {
        return $this->model->create($inputs);
    }

    public function update($id, $inputs) {
        return $this->model->updateItem($id, $inputs);
    }

    public function delete($id) {
        return $this->model->deleteItem($id);
    }

    public function orderBy($prop, $type = null) {
        return $this->model->orderBy($prop, $type);
    }

    public function where($column, $value) {
        return $this->model->where($column, $value);
    }

    public function newOne($attributes = array()){
        return $this->model->newInstance($attributes);
    }

}