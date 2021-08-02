<?php

namespace App\Http\Controllers;

use App\City;
use App\ConnectionProvider;
use App\Http\Traits\AjaxTrait;
use App\Offer;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function getCities(Request $request)
    {
        $this->validate( $request, [ 'id' => 'required|exists:cities,id' ] );
        $output = [];
        $output['addresses'] = City::find($request->get('id') )->addresses->pluck('address', 'id');
        $output['operators'] = City::find($request->get('id') )->operators->pluck('name', 'id');
        return $output;
    }

    public function getOffers(Request $request)
    {
        $this->validate( $request, [ 'id' => 'required|exists:connection_providers,id' ] );
        $output = [];
        $output['offers'] = ConnectionProvider::find($request->get('id') )->offers()->with('conditions')->get();
        return $output;
    }

    public function getConditions(Request $request)
    {
        $this->validate( $request, [ 'id' => 'required|exists:offers,id' ] );
        $output = [];
        $output['conditions'] = Offer::find($request->get('id') )->conditions->pluck('name');
        return $output;
    }

    public function index()
    {
        return view('connect_request.create');
    }

}
