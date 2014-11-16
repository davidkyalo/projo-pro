<?php
namespace PRP\Entities;

class Project extends BaseEntity {


	protected $table = 'projects';

	public function jsAssets()
    {
        return $this->hasMany('JsAsset', 'projectId');
    }

    public function cssAssets()
    {
        return $this->hasMany('cssAssets', 'projectId');
    }

    public function getUrlsAttribute($value)
    {
        $value = is_null($value) ? array() : $value;
        return $this->getArrayAttribute($value);
    }

    public function setUrlsAttribute(Array $value)
    {
        return $this->setArrayAttribute('urls', $value);
    }

}
