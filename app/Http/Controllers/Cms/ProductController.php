<?php namespace App\Http\Controllers\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function index()
	{
		Return product::with('images')->get()->toJson();
	}

	public function store(Request $request)
	{

	}

	public function update(Request $request)
	{
		$product = product::find($request->input('id'));
		$product->fill($request->all());
		$product->save();
	}

	public function delete($id)
	{
		product::destroy($id);
	}

	public function create(Request $request)
	{
		
	}
}
