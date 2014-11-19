<?php
namespace Models\Entities;
use Models\Entities\Client;

class Project extends BaseEntity {


	protected $table = 'projects';
    protected $softDelete = true;
    protected $fillable = ['*'];
    protected $guarded = [];
    protected $hidden = array();
    protected $with = array('client');
   // protected $dates = array('startedOn', 'deadline', 'finishedOn');

    protected function defaultAttributes(){
        return [
                'clientId'      => 1, 
                'name'          => '', 
                'details'       => '', 
                'status'        => 'pending',
                'startedOn'     => date('Y-m-d'),
                'deadline'      => date('Y-m-d'),
                'finishedOn'    => null,
                'budget'        => 0, 
                'paid'          => 0, 
                'milestoneId'   => 0,
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

    public function progress()
    {
        return $this->hasOne('Models\Entities\ProjectMilestone', 'milestoneId');
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
