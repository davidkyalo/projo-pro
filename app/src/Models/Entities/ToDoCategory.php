<?php
namespace Models\Entities;
use Models\Entities\ToDoTask;

class ToDoCategory extends BaseEntity {


	protected $table = 'todo_categories';
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
        return $this->hasMany('Models\Entities\ToDoTask', 'categoryId');
    }

}