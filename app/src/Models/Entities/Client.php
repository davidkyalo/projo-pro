<?php
namespace Models\Entities;

class Client extends BaseEntity {


	protected $table = 'clients';
	protected $softDelete = true;
    protected $fillable = array('*');
    protected $hidden = array();
  	
  	protected function defaultAttributes(){
        return [
                'emails'     => array(),
                'phones'     => array()
                ];
    }

	public function projects()
    {
        return $this->hasMany('Project', 'clientId');
    }

    public function getEmailsAttribute($value)
    {
        $value = is_null($value) ? array() : $value;
        return $this->getArrayAttribute($value);
    }

    public function setEmailsAttribute(Array $value)
    {
        return $this->setArrayAttribute('emails', $value);
    }

    public function getPhonesAttribute($value)
    {
        $value = is_null($value) ? array() : $value;
        return $this->getArrayAttribute($value);
    }

    public function setPhonesAttribute(Array $value)
    {
        return $this->setArrayAttribute('phones', $value);
    }
}