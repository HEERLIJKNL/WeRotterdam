<?php namespace App\Handlers\Events;

use App\Events\ItemsPurchasedEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class EmailPurchaseConfirmation {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  ItemsPurchasedEvent  $event
	 * @return void
	 */
	public function handle(ItemsPurchasedEvent $event)
	{

		$order 	= $event->order;
		$cart 	= $event->cart;

		Mail::send("emails.order",compact('order','cart'),function($message) use($order){
			$message->to($order->email)->subject('Uw bestelling');
		});

	}

}
