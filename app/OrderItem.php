<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    public function Order(){
        return $this->belongsTo('App\Order');
    }

}
