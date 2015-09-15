<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class categorie extends Model {

    protected $fillable = ['name'];

	public function subcategories(){
        return $this->hasMany('App\subcategorie');
    }

    public function products(){
        return $this->hasMany('App\product');
    }

    public function setSlugAttribute($value){
        $this->attributes['slug'] = str::slug($value);
    }
}