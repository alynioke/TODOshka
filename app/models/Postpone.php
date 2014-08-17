<?php

class Postpone extends Eloquent  {

	public $timestamps = false;

    protected $fillable = array('task_id', 'tAmount', 'lAmount');

    
}
