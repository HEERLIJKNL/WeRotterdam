<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    protected $fillable = ['product_id','size','amount','price'];

    public function Order(){
        return $this->belongsTo('App\Order');
    }

    public function Product(){
        return $this->belongsTo('App\Product');
    }

}
