<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConnectionProvider extends BaseModel
{
    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_provider');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer', 'connection_provider_id');
    }
}
