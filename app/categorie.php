<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model {

    protected $fillable = ['name'];

	public function subcategories(){
        return $this->hasMany('App\subcategorie');
    }

    public function products(){
        return $this->hasMany('App\product');
    }
}