<?php

class ProductController extends BaseController {

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

	public function indexAction()
	{
		$query 		= Product::with(['category']);
		$category 	= Input::get('category');

		if ($category) {
			$query->where('category_id', $category);
		}

		return $query->get();
	}

}