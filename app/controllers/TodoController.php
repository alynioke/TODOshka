<?php
class TodoController extends \BaseController {

	public function index()
	{
		Task::updateFormerTomorrows();
		return Response::json(array(
			'todays' => Task::getTodays(),
			'tomorrows' => Task::getTomorrows(),
			'laters' => Task::getLaters()
			));
	}

	public function store() {
		$task = new Task();
		$task->content = Input::get('content');
		$task->created_at = time();
		$task->save();

		return Response::json(array('success' => true));
	}

	public function update($id) {
		$task = Task::find($id);
		foreach (Input::get() as $key => $value) {
			$task->$key = $value=='true'?1:0;
			if ($key = "tomorrow") {
				$task->updated_at = time();
			}
			if ($key == "later") {
				$task->tomorrow = 0;
			}
		}
		//$d = $task->updated_at = $task->updated_at->setDate("2014", "01", "01");
		
		//print_R($task->updated_at);
		//print_R($d);


		$task->save();
		return Response::json(array('success' => true));
	}



}
