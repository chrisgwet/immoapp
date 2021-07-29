<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AgentController extends Controller
{
    public function index(){
        $role = Role::where('name', 'agent')->first();
        $usersOfRole = $role->users()->get();
        return view('front.agent', compact('usersOfRole'));
    }
}
