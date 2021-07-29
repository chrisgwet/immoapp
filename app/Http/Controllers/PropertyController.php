<?php

namespace App\Http\Controllers;

use App\Events\MessageReceivedEvent;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Property;
use App\Models\Visite;
use App\Notifications\MessageReceived;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function indexForHome(Request $request){

        // Recuperer les categories de proprietes
        $categories = Category::all();

        $address = $request->query('address');
        $operation = $request->query('operation');
        if (!empty($address)) {
            $properties = Property::sortable()
                ->where('address', 'like', '%'.$address.'%')
                ->where('operation', '=', $operation)
                ->paginate(12);
        } else {
            $properties = Property::sortable()
                ->paginate(12);
        }
        return view('front.properties.index', compact('properties','categories'));
    }

    public function index(Request $request){

        // Recuperer les categories de proprietes
        $categories = Category::all();

        $address = $request->query('address');
        $operation = $request->query('operation');
        $categorie = $request->query('categorie');
        $price = $request->query('price');
        if (!empty($address) && !empty($price)) {
            $properties = Property::sortable()
                ->where('address', 'like', '%'.$address.'%')
                ->whereBetween('price', [0, $price])
                ->where('operation', '=', $operation)
                ->where('category_id', '=', Category::where('name', $categorie)->first()->id)
                ->paginate(12);
        }elseif(!empty($address) && empty($price)){
            $properties = Property::sortable()
                ->where('address', 'like', '%'.$address.'%')
                ->where('operation', '=', $operation)
                ->where('category_id', '=', Category::where('name', $categorie)->first()->id)
                ->paginate(12);
        }
        elseif(empty($address) && !empty($price)){
            $properties = Property::sortable()
                ->whereBetween('price', [0, $price])
                ->where('operation', '=', $operation)
                ->where('category_id', '=', Category::where('name', $categorie)->first()->id)
                ->paginate(12);
        }
        elseif(empty($address) && empty($price) && !empty($categorie) && !empty($operation)){
            $properties = Property::sortable()
                ->where('operation', '=', $operation)
                ->where('category_id', '=', Category::where('name', $categorie)->first()->id)
                ->paginate(12);
        }
        else {
            $properties = Property::sortable()
                ->paginate(12);
        }
        return view('front.properties.index', compact('properties','categories'));
    }

    public function show(int $id){
        $property = Property::find($id);
        // Je recupere les commentaires lies a la maison
        $comments = $property->comments()->get();
        return view('front.properties.show', compact('property','comments'));
    }

    public function toComment(int $idProperty, Request $request){

        $comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id,
            'property_id' => $idProperty
        ]);

        return redirect(route('front.properties.show',$idProperty))->with('success','Message laissé avec succes');
    }

    public function toPlanVisit(int $idProperty, Request $request){
        $date = $this->getDateAttribute($request->input('datevisite'));
        $date = str_replace('T',' ',$date);

        Visite::create([
            'dateVisite' => $date,
            'property_id' => $idProperty,
            'user_id' => Auth::user()->id,
            'isdone' => false,
        ]);
        return redirect(route('front.properties.show',$idProperty))->with('success','Demande de visite enregistrée avec succès');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
