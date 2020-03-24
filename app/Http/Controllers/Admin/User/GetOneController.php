<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GetOneController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::find($request->id);

        return response()->json($user, 200);
    }
}
