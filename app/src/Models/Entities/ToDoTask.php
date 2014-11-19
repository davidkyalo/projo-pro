<?php
namespace Models\Entities;
use Models\Entities\ToDoTask;

class ToDoTask extends BaseEntity {


	protected $table = 'todo_tasks';
    protected $softDelete = true;
    protected $fillable = ['*'];
    protected $guarded = [];
    protected $hidden = array();
    protected $with = array();
   // protected $dates = array('startedOn', 'deadline', 'finishedOn');

    protected function defaultAttributes(){
        return [
                'categoryId'    => 0,
                'milestoneId'   => 0, 
                'name'          => '', 
                'notes'         =>array(),
                'start'         => date('Y-m-d H:i:s', strtotime(date('Y-m-d'). ' 00:00:00')),
                'finish'        => date('Y-m-d', strtotime(date('Y-m-d'). ' 00:00:00')),
                'priority'      => 0,
                'status'        => -1

                ];
    }

    public function category(){
       return $this->belongsTo('Models\Entities\ToDoCategory', 'categoryId');
    }


    public function milestone()
    {
        return $this->belongsTo('Models\Entities\ProjectMilestone', 'milestoneId');
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