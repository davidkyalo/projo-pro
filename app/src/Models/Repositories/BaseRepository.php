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

    public function create($data) {
        $model = $this->newOne();
        $modelAttributes =array_keys($model->getAttributes());
        foreach ($data as $attribute => $value) {
            if(in_array($attribute, $modelAttributes))
                $model->$attribute = $value;
        }
        $model->save();
        return $model;
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