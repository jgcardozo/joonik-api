<?php

namespace App\Http\Controllers\API;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function index()
    {
        $data = Location::all();
        return response()->json([
            "success" => true,
            "message" => 'listing locations',
            "data"=> $data,
        ], 200);
    }

}
