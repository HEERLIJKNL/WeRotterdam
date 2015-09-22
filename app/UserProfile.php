<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

    protected $fillable = [
        "firstname",
        "subname",
        "lastname",
        "street",
        "street_nr",
        "street_nr_add",
        "postalcode",
        "city",
        "country",
        "email",
        "telephone"
    ];

	public function User(){
        $this->belongsTo('App\User');
    }

}
