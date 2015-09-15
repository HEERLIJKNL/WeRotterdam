<?php namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = [
        'gender',
        'firstname',
        'lastname',
        'subname',
        'street',
        'street_nr',
        'street_nr_add',
        'lastname',
        'postalcode',
        'city',
        'country',
        'email',
        'telephone',
        'payment_method',
        'payment_total'
    ];

	public function Items(){
        return $this->hasMany('App\OrderItem');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function getAddressAttribute(){
        return $this->attributes['street']." ".$this->attributes['street_nr']." ".$this->attributes['street_nr_add'];
    }
    public function getFullnameAttribute(){
        return ucfirst($this->attributes['firstname'])." ".(isset($this->attributes['subname']) ? $this->attributes['subname']." " : "").$this->attributes['lastname'];
    }

    public function saveitems($items){
        foreach($items AS $item){
            $order_item = new OrderItem(
                [
                    "product_id" => $item->id,
                    "amount" => $item->qty,
                    "price" => $item->price,
                    "size" => $item->options->size
                ]
            );

            $this->Items()->save($order_item);
        }
    }
}
