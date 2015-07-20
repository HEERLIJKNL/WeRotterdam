<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\categorie;
use App\image;

class product extends Model {

    use SoftDeletes;

    protected $dates    = ['deleted_at'];

    protected $fillable = ['name','description','price','amount'];

    public function categorie(){
        return $this->belongsTo('App\categorie');
    }

    public function subcategorie(){
        return $this->belongsTo('App\subcategorie');
    }

    public function images(){
        return $this->morphMany('App\image','imageable');
    }
}
