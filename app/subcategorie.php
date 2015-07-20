<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategorie extends Model {

	public function products(){
        return $this->hasMany('App\product');
    }

    public function categorie(){
        return $this->belongsTo('App\categorie');
    }

}
