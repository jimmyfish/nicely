<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json("$user->first_name Deleted", 200);
    }
}
