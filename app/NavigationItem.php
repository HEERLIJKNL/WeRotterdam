<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model {

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

}
