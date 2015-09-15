<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategorie extends Model {

    public function categorie(){
        return $this->belongsTo('App\categorie');
    }

}
