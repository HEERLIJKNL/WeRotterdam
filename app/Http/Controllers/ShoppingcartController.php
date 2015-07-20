<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use App\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class ShoppingcartController
 * @package App\Http\Controllers
 */
class ShoppingcartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('shoppingcart.shoppingcart',['cart' => Cart::class]);
	}

	/**
	 * @return \Illuminate\View\View
     */
	public function account()
	{

		//return view("shoppingcart.account",['cart' => Cart::class]);
		return view("shoppingcart.account-data",['cart' => Cart::class]);
	}
	public function account_update(Request $request)
	{
		return redirect('/shoppingcart/step/2');
	}


	/**
	 * @return \Illuminate\View\View
     */
	public function payment()
	{
		return view("shoppingcart.payment",['cart' => Cart::class]);
	}


	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function add($id){
		$product = product::find($id);

		Cart::add(
			$product->id,
			$product->name,
			1,
			$product->price
		);

		Session::flash('success', "Het product is toegevoegd aan de winkelwagen");
		return redirect()->back();
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function addpost(Request $request){
		$product = product::with('images')->find($request->input('id'));

		Cart::add(
			$product->id,
			$product->name,
			$request->input('amount'),
			$product->price,
			[
				'size' => $request->input('size'),
				'color' => $request->input('color'),
				'image' => $product->images[0]->image
			]
		);

		Session::flash('success', "Het product is toegevoegd aan de winkelwagen");
		return redirect()->back();
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function remove($id){
		Cart::remove($id);

		return redirect()->back();
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request){
		Cart::update($request->input('id'),$request->input('amount'));
		return redirect()->back();
	}
}
