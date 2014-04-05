<?php

class AccountController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function authenticateAction()
	{
		$credentials = [
			'email'		=> Input::get('email'),
			'password'	=> Input::get('password'),
		];

		if (Auth::attempt($credentials)) {
			return Response::json([
				'status' 	=> 'ok',
				'account'	=> Auth::user()->toArray(),
			]);
		}

		return Response::json([
				'status' 	=> 'error',
			]);
	}

}