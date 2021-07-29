<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {

        $role = Role::where('name', 'agent')->first();
        if($role != null){
            $agents = $role->users()->get();
        }else{
            $agents = null;
        }

        // Je recupere le nombre de chaque categorie
        $nbreMaisons = Category::where('name','Maisons')->first()->properties()->count();
        $nbreVillas = Category::where('name','Villas')->first()->properties()->count();
        $nbreChambres = Category::where('name','Chambres')->first()->properties()->count();
        $nbreStudios = Category::where('name','Studios')->first()->properties()->count();
        // Les proprietes mis en avant
        $featuredProperties = Property::where('featured',true)->get();
        return view('front.home', compact('nbreMaisons','nbreChambres','nbreVillas','featuredProperties','nbreStudios','agents'));
    }
}
