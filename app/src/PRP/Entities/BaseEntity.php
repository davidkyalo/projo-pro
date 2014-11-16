<?php
namespace PRP\Entities;
use Illuminate\Database\Eloquent\Model;

abstract class BaseEntity extends Model {

	public static $snakeAttributes = false;

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
