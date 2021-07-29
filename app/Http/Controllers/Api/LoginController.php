<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function infos($id){
        return User::find($id);
    }

    public function login(Request $request){
        $user = DB::table('users')
                ->where('email',$request->input('email'))
                ->where('password',Hash::make($request->input('password')))
                ->first();
        return $user;
    }
}
