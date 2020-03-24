<?php

namespace App\Http\Controllers\Building;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetBuildingController extends Controller
{
    public function __invoke()
    {
        return response()->json("This is building page");
    }
}
