<?php


namespace App\Http\Traits;


use Illuminate\Http\Request;

trait AjaxTrait
{
    public function getAjax(Request $request, $model, $search)
    {
        $items = [];
        if($request->ajax()) {
            $q = $request['q'] ? $request['q'] : '';
            $items = $model::where("$search", 'like', '%' . $q . '%')->select('id', "$search as text")->get()->toJson(JSON_PRETTY_PRINT);
        }
        return $items;
    }
}