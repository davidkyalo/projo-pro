<?php 
namespace Models\Repositories;

interface IRepository {

	public function all();

    public function first();

    public function find($id);

    public function create($inputs);

    public function update($id, $inputs);

    public function delete($id);

    public function orderBy($prop, $type = null);

    public function where($column, $value);

    public function newOne($attributes = array());

}