<?php

class Task extends Eloquent  {

	public $timestamps = false;

    protected $fillable = array('content', 'urgent', 'important', 'tomorrow', 'later', 'created_at', 'updated_at');

    public static function updateFormerTomorrows() {
        $today = new DateTime('today');
        Task::where('tomorrow', '1')
        ->whereNotNull('updated_at')
        ->where('updated_at', '<', $today)
        ->update(array('tomorrow' => 0));
    }

    public static function getTodays() {
        //Task::updateFormerTomorrows();
        $tasks = Task::where('tomorrow', 0)
        ->where('later', 0)
        ->where('tomorrow', 0)
        ->get();
        return $tasks;
    }

    public static function getTomorrows() {
        $today = new DateTime('today');
        $tomorrow = new DateTime('tomorrow');
    	$tasks = Task::where('tomorrow', '1')
        ->where('updated_at', '<', $tomorrow)
        ->where('updated_at', '>', $today)
        ->get();
    	return $tasks;
    }

    public static function getLaters() {
    	$tasks = Task::where('later', '1')->get();
    	return $tasks;
    }


    // public function setUpdatedAt($value) {
        
    // }
    
}
