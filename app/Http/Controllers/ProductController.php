<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function detail($slug){

		$product = product::where("slug", "=" , $slug)->with('images','sizes')->first();
		if(!$product) abort(404);

		return view('product.detail',compact('product'));

	}

}
