<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $request = \App\Request::create($request->except('_token'));
        return $request;
    }

    public function show(Request $request)
    {
        $resultedRequest = \App\Request::find($request->get('id') )->get();
        return view('connect_request.show', compact('resultedRequest'));
    }
}
