<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SetPrivilegeController extends Controller
{
    const ROLES = [
        'Admin'    => 1,
        'Finance'  => 2,
        'Building' => 3,
        'Article'  => 4,
        'Guest'    => 5
    ];

    public function __invoke(Request $request, $id)
    {
        $this->validate($request, [
            'roles' => [
                'required',
                Rule::in(self::ROLES)
            ]
        ]);

        $user = User::find($id);

        return response()->json($user);
    }
}
