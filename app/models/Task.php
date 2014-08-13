<?php

class Task extends Eloquent  {

	//public $timestamps = false;

    protected $fillable = array('content', 'urgent', 'important', 'tomorrow', 'later', 'created_at', 'updated_at');

    public static function getTodays() {
        $today = new DateTime('today');
        $tasks = Task::where('tomorrow', 0)->where('later', 0)->get();

        //$relativeToday = Task::where('tomorrow', '1')->get();
        //$tasks = array_merge($purelyToday, $relativeToday);

        return $tasks;
    }

    public static function getTomorrows() {
    	$tasks = Task::where('tomorrow', '1')->get();
    	return $tasks;
    }

    public static function getLaters() {
    	$tasks = Task::where('later', '1')->get();
    	return $tasks;
    }
    
}
