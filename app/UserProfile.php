<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	public function User(){
        $this->belongsTo('App\User');
    }

}
