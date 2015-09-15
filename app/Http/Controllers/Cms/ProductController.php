<?php namespace App\Http\Controllers\Cms;

use App\categorie;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\product;
use App\product_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller {

	public function index()
	{
		$products = product::with('images','sizes')->get();
		return view('cms.products.products',compact('products'));
	}

	public function edit($id)
	{
		$product = product::findOrFail($id);
		$categories = categorie::all();
		return view('cms.products.edit',compact('product','categories'));
	}

	public function create()
	{
		$product = new product;
		$categories = categorie::all();

		return view('cms.products.create',compact('product','categories'));
	}

	public function addPhoto($id, Request $request){
		$product = product::find($id);

		//var_dump($request->file('photo')->getClientOriginalExtension());
		$image = $product->addImage($request->file('photo'));

		return redirect()->back();
	}

	public function setSize($id,Request $request){
		$product_size = product_size::find($request->input('size_id'));
		$product_size->stored =  $request->input('store_amount');
		$product_size->save();

		return redirect()->back();
	}

	public function store(Request $request)
	{
		$product = new product();
		$product->fill($request->all());
		$product->slug = $request->input('name');

		$categorie = categorie::find($request->input('categorie'));
		$categorie->products()->save($product);

		foreach(Config::get('site_settings.sizes') as $size){
			$product_size = new product_size(["size" => $size,'stored' => 0]);
			$product->sizes()->save($product_size);
		}

		return redirect('/admin/products/'.$product->id.'/edit');
	}

	public function update($id, Request $request)
	{
		$categorie = categorie::find($request->input('categorie_id'));

		$product = product::find($id);
		$product->fill($request->all());

		$categorie->products()->save($product);

		return redirect()->back();
	}

	public function destroy($id)
	{
		product::destroy($id);
		return redirect("/admin/products");
	}
}
