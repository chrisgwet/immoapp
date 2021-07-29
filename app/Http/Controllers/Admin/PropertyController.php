<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Property;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class PropertyController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:propriete-list');
        $this->middleware('permission:propriete-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:propriete-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:propriete-delete', ['only' => ['destroy']]);
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
            $data = Property::sortable()
                ->where('name', 'like', '%'.$filter.'%')
                ->paginate(5);
        } else {
            $data = Property::sortable()
                ->orderBy('id','DESC')
                ->paginate(5);
        }

        return view('admin.proprietes.index',compact('data','filter'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $categories = Category::pluck('name','name')->all();
        return view('admin.proprietes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prixvisite' => 'required',
            'town' => 'required',
            'city' => 'required',
            'address' => 'required',
            'rooms' => 'required',
            'bedrooms' => 'required',
            'leavingrooms' => 'required',
            'bathrooms' => 'required',
            'kitchens' => 'required',
            'category' => 'required',
        ]);

        // Stockage de l'image principale
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads/properties'), $imageName);

        $property = new Property();
        $category = Category::where('name', $request->input('category'))->first();
        $property->category_id = $category->id;
        $property->image = $imageName;
        $property->name = $request->input('name');
        $property->description = $request->input('description');
        $property->operation = $request->input('operation');
        $property->prixvisite = $request->input('prixvisite');
        $property->town = $request->input('town');
        $property->city = $request->input('city');
        $property->address = $request->input('address');
        $property->price = $request->input('price');
        $property->rooms = $request->input('rooms');
        $property->bedrooms = $request->input('bedrooms');
        $property->leavingrooms = $request->input('leavingrooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->kitchens = $request->input('kitchens');

        // Je cree la propriete
        $property->save();

        // Upload et Stockage des images secondaires
        foreach($request->file('files') as $file)
        {
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads/properties'), $fileName);
            // $fileNames[] = $fileName;
            $image = new Image();
            $image->path = $fileName;
            $image->property_id = $property->id;
            $image->save();
        }

        return redirect()->route('proprietes.index')->with('success','Propriete cree avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $property = Property::find($id);
        return view('admin.proprietes.show',compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $propriete = Property::find($id);
        $categories = Category::pluck('name','name')->all();
        return view('admin.proprietes.edit', compact('categories','propriete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prixvisite' => 'required',
            'town' => 'required',
            'city' => 'required',
            'address' => 'required',
            'rooms' => 'required',
            'bedrooms' => 'required',
            'leavingrooms' => 'required',
            'bathrooms' => 'required',
            'kitchens' => 'required',
            'category' => 'required',
        ]);

        $imageName = $request->image->getClientOriginalName();

        // Upload de l'image principale
        $imagePath = public_path('uploads/properties'.$imageName);
        if(File::exists($imagePath)){
            File::delete($imagePath);
        }
        $request->image->move(public_path('uploads/properties'), $imageName);

        $property = Property::find($id);
        $category = Category::where('name', $request->input('category'))->first();
        $property->category_id = $category->id;
        $property->image = $imageName;
        $property->name = $request->input('name');
        $property->description = $request->input('description');
        $property->prixvisite = $request->input('prixvisite');
        $property->operation = $request->input('operation');
        $property->town = $request->input('town');
        $property->city = $request->input('city');
        $property->address = $request->input('address');
        $property->price = $request->input('price');
        $property->rooms = $request->input('rooms');
        $property->bedrooms = $request->input('bedrooms');
        $property->leavingrooms = $request->input('leavingrooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->kitchens = $request->input('kitchens');

        $property->update();

        // Je supprime les anciens images de la base de donnees
        foreach ($property->images as $image){
            $image->delete();
        }

        // Upload et Stockage des images secondaires
        foreach($request->file('files') as $file)
        {
            $fileName=$file->getClientOriginalName();

            $filePath = public_path('uploads/properties'.$fileName);
            if(File::exists($filePath)){
                File::delete($filePath);
            }
            $file->move(public_path('uploads/properties'), $fileName);

            // Je cree de nouvelles images
            $image = new Image();
            $image->path = $fileName;
            $image->property_id = $property->id;
            $image->save();
        }

        return redirect()->route('proprietes.index')->with('success','Propriete modifiee avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Property::find($id)->delete();
        return redirect()->route('proprietes.index')->with('success','Propriete supprimee avec succes');
    }
}
