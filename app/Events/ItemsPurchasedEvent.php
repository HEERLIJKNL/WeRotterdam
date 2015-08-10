<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class ItemsPurchasedEvent extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public $data;

	public $cart;

	public function __construct($order,$cart)
	{
		$this->order 	= $order;
		$this->cart 	= $cart;
	}

}
