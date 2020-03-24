<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::find($request->id);

        foreach ($request->except(['id', 'password', 'password_confirmation', 'roles_id']) as $key => $value) {
            $user->{$key} = $value;
        }

        if ($request->password) {
            $this->validate($request, [
                'password' => 'confirmed'
            ]);

            $user->password = Hash::make($request->password);
        }

        try {
            $user->save();
            return response()->json(['user' => $user, 'message' => "UPDATED"], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'FAILED', 'message' => $e->getMessage()], 409);
        }
    }
}
