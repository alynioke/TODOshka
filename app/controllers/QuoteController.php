<?php

class QuoteController extends \BaseController {

	public static function index() {
		$quotes = DB::table('quotes')->get();
		return Response::json(array('count' => sizeof($quotes)));
	}
	public static function show($id) {
		$quote = Quote::find($id); //Quote not found.. 

		$quote = DB::table('quotes')->where('id', $id)->first();
		return Response::json($quote);
	}

}
