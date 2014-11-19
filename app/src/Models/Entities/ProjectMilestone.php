<?php
namespace Models\Entities;
use Models\Entities\ToDoTask;

class ProjectMilestone extends BaseEntity {


	protected $table = 'project_milestones';
    protected $softDelete = true;
    protected $fillable = ['*'];
    protected $guarded = [];
    protected $hidden = array();
    protected $with = array();
    protected $append = array('isParent');
   // protected $dates = array('startedOn', 'deadline', 'finishedOn');

    protected function defaultAttributes(){
        return [
                'parentId'      => 0, 
                'projectId'     => 0, 
                'done'          => 0, 
                'potion'        => 0, 
                'notes'         => array(), 
                'name'          => '', 
                ];
    }


    public function getisParentAttribute($value){
        return $this->parentId == 0;
    }

    public function parent(){
       return $this->belongsTo('ToDoCategory', 'parentId');
    }


    public function children()
    {
        return $this->hasMany('ToDoCategory', 'parentId');
    }


    public function tasks()
    {
        return $this->hasMany('Models\Entities\ToDoTask', 'milestoneId');
    }


    public function project()
    {
        return $this->belongsTo('Models\Entities\Project', 'projectId');
    }

     public function getNotesAttribute($value)
    {
        $value = is_null($value) ? array() : $value;
        return $this->getArrayAttribute($value);
    }

    public function setNotesAttribute(Array $value)
    {
        return $this->setArrayAttribute('notes', $value);
    }
}