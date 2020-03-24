<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetFinanceController extends Controller
{
    public function __invoke()
    {
        return response()->json("This is finance page");
    }
}
