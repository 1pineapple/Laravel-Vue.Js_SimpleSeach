<?php

namespace App\Http\Controllers\API;

use App\Data;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request){
        if ($request->name != null) {
            $data = Data::where('price', $request->price)
                ->orWhere('name', 'LIKE', '%' . $request->name . '%')
                ->orWhere('bedrooms', $request->bedrooms)
                ->orWhere('bathrooms', $request->bathrooms)
                ->orWhere('storeys', $request->storeys)
                ->orWhere('garages', $request->garages)->get();
        } else {
            $data = Data::where('price', $request->price)
                ->orWhere('bedrooms', $request->bedrooms)
                ->orWhere('bathrooms', $request->bathrooms)
                ->orWhere('storeys', $request->storeys)
                ->orWhere('garages', $request->garages)->get();
        }
        return response()->json(['success'=>true,'data'=>$data]);
    }
}
