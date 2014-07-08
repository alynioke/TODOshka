<?php

class TodoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$today = Task::getTodays();
		$tomorrow = Task::getTomorrows();
		$later = Task::getLaters();

		return View::make('index')->withToday($today)->withTomorrow($tomorrow)->withLater($later);
	}

	public function store() {
		$task = new Task();
		$task->content = Input::get('content');

		$task->save();

		return Redirect::route('index');
	}


}
