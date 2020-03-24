<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function __invoke()
    {
        return response()->json(User::all());
    }
}
