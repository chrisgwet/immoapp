<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:dashboard');
    }

    public function index(){
        $dernieresVisites = Visite::orderBy('created_at','desc')->limit(10)->get();
        $visitesPlanifiees = Visite::where('isdone',false)->count();
        $visitesTerminees = Visite::where('isdone',true)->count();
        $derniersMessages = Comment::orderBy('created_at','desc')->limit(5)->get();

        $users = User::doesntHave('roles')->limit(7)->get();

        return view('admin.dashboard', compact(
            'visitesPlanifiees',
            'visitesTerminees',
            'dernieresVisites',
            'derniersMessages',
            'users'
        ));
    }
}
