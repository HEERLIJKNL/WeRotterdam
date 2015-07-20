<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	public function Items(){
        return $this->hasMany('App\OrderItem');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
