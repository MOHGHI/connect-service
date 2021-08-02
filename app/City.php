<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends BaseModel
{
    //
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function operators()
    {
        return $this->belongsToMany('App\ConnectionProvider', 'city_provider');
    }
}
