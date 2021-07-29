<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use App\Models\Visite;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:visits-list');
        $this->middleware('permission:visits-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:visits-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:visits-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        if (!empty($filter)) {
            // Je recupere toutes les visites faite par l'utilisateur dont le nom est entre dans le filtre
            $data = Visite::select('visites.*')
                ->join('users', 'users.id', '=', 'visites.user_id')
                ->where('users.name', 'like', '%'.$filter.'%')
                ->orderBy('users.name')
                ->paginate(10);
        } else {
            $data = Visite::sortable()
                ->orderBy('id','desc')
                ->paginate(10);
        }
        return view('admin.visites.index',compact('data','filter'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $properties = Property::orderBy('id','asc')->get();
        $clients = User::doesntHave('roles')->orderBy('id','asc')->get();
        return view('admin.visites.create', compact('properties','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $visite = new Visite();
        // Je recupere la date de la visite et je la formate
        $date = $this->getDateAttribute($request->input('datevisite'));
        $date = str_replace('T',' ',$date);
        // Je parametre la visite
        $visite->dateVisite = $date;
        $visite->property_id = $request->input('property');
        $visite->user_id = $request->input('user');

        // je sauvegarde ma visite
        $visite->save();
        return redirect(route('visites.index'))->with('success','Visite planifiee avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $visite = Visite::find($id);
        $properties = Property::orderBy('id','asc')->get();
        $clients = User::doesntHave('roles')->orderBy('id','asc')->get();
        $visite->dateVisite = str_replace(' ','T',$visite->dateVisite);
        return view('admin.visites.edit',compact('visite','properties','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'datevisite' => 'required'
        ]);
        // Je recupere la date de la visite et je la formate
        $date = $this->getDateAttribute($request->input('datevisite'));
        $date = str_replace('T',' ',$date);
        // Je mets à jour la visite
        $visite = Visite::find($id);
        $visite->dateVisite = $date;
        $visite->isdone = $request->boolean('isdone');
        $visite->isread = true;
        $visite->property_id = $request->input('property');
        $visite->user_id = $request->input('user');
        $visite->update();
        return redirect(route('visites.index'))->with('success','Visite modifiée avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $visite = Visite::find($id);
        $visite->delete();
        return redirect(route('visites.index'))->with('success','Visite supprimee avec succes');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
