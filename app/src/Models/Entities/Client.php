<?php
namespace Models\Entities;

class Client extends BaseEntity {


	protected $table = 'clients';
	protected $softDelete = true;
    protected $fillable = array('*');
    protected $hidden = array();

	public function projects()
    {
        return $this->hasMany('Project', 'clientId');
    }
}