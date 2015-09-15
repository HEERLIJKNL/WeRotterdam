<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class product_size extends Model {

    protected $fillable = ['size','stored'];

	public function product(){
        $this->belongsTo('App\product');
    }

}
