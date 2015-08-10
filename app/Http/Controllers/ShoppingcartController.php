<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use App\product;
use App\Src\Buckaroo\Buckaroo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ShoppingcartController extends Controller {

	use AuthenticatesAndRegistersUsers;


	/**
	 * @param Guard $auth
	 * @param Registrar $registrar
     */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Cart $cart)
	{
		return view('shoppingcart.shoppingcart',['cart' => $cart]);
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function login(Request $request)
	{
		if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')])){
			return redirect("/shoppingcart/step/1/adres");
		}

		return redirect("/shoppingcart/step/1");
	}

	/**
	 * @param Cart $cart
	 * @return \Illuminate\View\View
     */
	public function adres(Cart $cart)
	{
		$showAccountFields = true;
		$user = null;

		if(Auth::check()) {
			$showAccountFields = false;
			$user = Auth::user();
		}

		return view("shoppingcart.account-data",['cart' => $cart,'user' => $user ,'showAccountFields' => $showAccountFields]);
	}

	/**
	 * @return \Illuminate\View\View
     */
	public function account(Cart $cart)
	{
		if(Auth::check()) return redirect("shoppingcart/step/1/adres");

		return view("shoppingcart.account",['cart' => $cart]);
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function store_adres(Request $request)
	{
		$order = new Order();
		$order->fill($request->all());

		if($request->input('email') && $request->input('password')) {
			$request->merge(array('name' => $order->Fullname));
			$this->postRegister($request);
		}

		Session::put("order",$order);

		return redirect('/shoppingcart/step/2');
	}

	/**
	 * @return \Illuminate\View\View
     */
	public function payment(Cart $cart, Buckaroo $buckaroo)
	{

		$order = Session::get('order');
		$banks = $buckaroo->banks()->all();
		return view("shoppingcart.payment",compact('cart','banks','order'));
	}


	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function add($id)
	{
		$product = product::find($id);

		Cart::add($product->id,$product->name,1,$product->price);

		Session::flash('success', "Het product is toegevoegd aan de winkelwagen");
		return redirect()->back();
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function addpost(Request $request)
	{
		$product = product::with('images')->find($request->input('id'));

		Cart::add($product->id,$product->name,$request->input('amount'),$product->price,
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
	public function remove($id)
	{
		Cart::remove($id);
		return redirect()->back();
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request)
	{
		Cart::update($request->input('id'),$request->input('amount'));
		return redirect()->back();
	}
}