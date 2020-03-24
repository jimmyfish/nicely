<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'first_name' => 'required|string|max:255|min:3',
        ]);

        try {

            $user = new User();
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->roles_id = 5;

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }
}
