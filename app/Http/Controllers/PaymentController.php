<?php namespace App\Http\Controllers;

use App\Events\ItemsPurchasedEvent;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use App\Src\Buckaroo\Buckaroo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller {

	public function pay(Buckaroo $buckaroo){

		/** Grab order and set payment method */
		$order = Session::get('order');
		$order->payment_method = Request::input('payment');

		/** Auth check and save */
		if(Auth::check()) {
			Auth::user()->orders()->save($order);
		}else {
			$order->save();
		}

		/** Fetch payment form and submit */
		return $buckaroo->fetchForm([
			'price' => 10,
			'payment_method' => Request::input('payment'),
			'payment_bank' => Request::input('bank'),
			'return_url' => 'http://local.werotterdam.com/shoppingcart/payment/success',
			'invoice_nr' => $order->id
		]);

	}

	public function success(Buckaroo $buckaroo, Request $request){


		$order = Order::find($buckaroo->invoice_nr(Request::all()));
		$order->payed = 1;
		$order->save();

		$event = Event::fire(new ItemsPurchasedEvent($order,Cart::content()));

		Session::forget('order');
		Cart::destroy();

		return view("shoppingcart.payment-success");
	}

	public function failed(){
		$request = Request::all();
		dd($request);
	}

}
