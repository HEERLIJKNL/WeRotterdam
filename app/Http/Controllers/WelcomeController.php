<?php namespace App\Http\Controllers;

use App\categorie;
use App\product;
use App\Src\Buckaroo\Buckaroo;

class WelcomeController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(Buckaroo $buckaroo)
	{
		/*
		return $buckaroo->fetchForm([
				'price' => 10,
				'payment_method' => 'ideal',
				'return_url' => 'http://local.werotterdam.com',
				'invoice_nr' => '2015AB3423262'
		]);
		*/
		$categories = categorie::with('products','products.images','products.sizes')->get();
		return view('home',compact('categories'));
	}

}
