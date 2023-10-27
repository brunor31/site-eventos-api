<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthValidate
{
    public static function validation(Request $request)
    {
        $rules = [
            'email' => 'required|string|email:rfc:dns',
            'password' => 'required|string|min:6|max:20'
        ];

        return Validator::make($request->all(), $rules, ['useCache' => false]);
    }
}
