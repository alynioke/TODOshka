<?php

class TodoController extends \BaseController {


	public function index()
	{
		return Response::json(Task::getTodays());
	}

	public function store() {

		$task = new Task();
		$task->content = Input::get('content');
		$task->save();

		return Response::json(array('success' => true));
	}

	public function update($id) {
		$task = Task::find($id);
		foreach (Input::get() as $key => $value) {
			$task->$key = $value=='true'?1:0;
		}
		$task->save();
		return Response::json(array('success' => true));
	}



}
