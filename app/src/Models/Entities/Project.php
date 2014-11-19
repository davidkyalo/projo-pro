<?php
namespace Models\Entities;
use Models\Entities\Client;

class Project extends BaseEntity {


	protected $table = 'projects';
    protected $softDelete = true;
    protected $fillable = array('clientId', 'name', 'details', 'startedOn', 'deadline', 'finishedOn', 'done', 'budget', 'paid', 'urls' );
    protected $guarded = [];
    protected $hidden = array();
    protected $with = array('client');
    protected $dates = array('startedOn', 'finishedOn', 'deadline');

    protected function defaultAttributes(){
        return [
                'startedOn'     => date('Y-m-d'),
                'finishedOn'    => Null,
                'urls'          => array()
                ];
    }

    public function client(){
       return $this->belongsTo('Models\Entities\Client', 'clientId');
    }

	public function jsAssets()
    {
        return $this->hasMany('Models\Entities\JsAsset', 'projectId');
    }

    public function cssAssets()
    {
        return $this->hasMany('Models\Entities\cssAssets', 'projectId');
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
