<?php
namespace Models\Entities;
use Illuminate\Database\Eloquent\Model;

abstract class BaseEntity extends Model {

	public static $snakeAttributes = false;

	public function __construct(array $attributes = array())
	{
		$this->setRawAttributes($this->defaultAttributes(), true);
	  	parent::__construct($attributes);
	}

	protected function defaultAttributes(){
		return [];
	}

	protected function getArrayAttribute($value){
		return unserialize($value);
	}

	protected function setArrayAttribute($attribute, Array $value)
    {
        $this->attributes[$attribute] = serialize($value);
    }

    protected function getValueObjectAttribute($value){
		return unserialize($value);
	}

	protected function setValueObjectAttribute($attribute, Array $value)
    {
        $this->attributes[$attribute] = serialize($value);
    }
}
