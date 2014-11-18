<?php
namespace Models\Entities;

class Asset extends BaseSTHEntity {

	protected $table = 'assets';
	protected $subclassField = 'assetType';
    protected $softDelete = true;
    
	public function project()
    {
        return $this->belongsTo('Project', 'projectId');
    }

    public function files()
    {
        return $this->hasMany('AssetFile', 'assetId');
    }

    public function getConfigAttribute($value)
    {
    	 $value = is_null($value) ? new Object() : $value;
        return $this->getValueObjectAttribute($value);
    }

    public function setConfigAttribute($value)
    {
        return $this->getValueObjectAttribute('config', $value);
    }

    public function getLastCcompilationAttribute($value)
    {
    	 $value = is_null($value) ? new Object() : $value;
        return $this->getValueObjectAttribute($value);
    }

    public function setLastCcompilationAttribute($value)
    {
        return $this->getValueObjectAttribute('lastCcompilation', $value);
    }

    public function setOutputDirAttribute($value)
    {
       $this->attributes['outputDir'] = substr($value, -1) == '/' ? $value : $value . '/';
    }

    public function getOutputPathAttribute($value){
    	return $this->outputDir .  $this->outputFile;
    }
}
