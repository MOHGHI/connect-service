<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends BaseModel
{
    public function conditions()
    {
        return $this->hasMany('App\Condition');
    }
}
