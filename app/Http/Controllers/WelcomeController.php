<?php namespace App\Http\Controllers;

use App\categorie;
use App\product;
use App\Src\Buckaroo\Buckaroo;

class WelcomeController extends Controller {


	public function __construct(){

		parent::__construct();

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(Buckaroo $buckaroo)
	{
		$categories = categorie::with('products','products.images','products.sizes')->get();
		return view('home',compact('categories'));
	}

}
