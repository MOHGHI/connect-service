<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends BaseModel
{
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo('\App\City', 'city_id');
    }

    public function address()
    {
        return $this->belongsTo('\App\Address', 'address_id');
    }

    public function operator()
    {
        return $this->belongsTo('\App\ConnectionProvider', 'operator_id');
    }

    public function offer()
    {
        return $this->belongsTo('\App\Offer', 'offer_id');
    }

    public function cancel()
    {
        return $this->belongsTo('\App\CancelReason', 'cancel_id');
    }

    public function reason()
    {
        return $this->belongsTo('\App\ContactReason', 'reason_id');
    }
}
