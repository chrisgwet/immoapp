<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:category-list');
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $data = Category::orderBy('name','ASC')->paginate(5);
        return view('admin.categories.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->image){
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/categories'), $imageName);
        }

        $input = $request->all();
        if($request->image){
            $input['image'] = $imageName;
        }
        $input['slug'] = Str::slug($input['slug'],'-');

        $categorie = Category::create($input);
        return redirect()->route('categories.index')->with('success','Categorie cree avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
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
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->image){
            $imageName = $request->image->getClientOriginalName();

            $imagePath = public_path('uploads/categories'.Category::find($id)->image);
            if(File::exists($imagePath)){
                File::delete($imagePath);
            }
            $request->image->move(public_path('uploads/categories'), $imageName);
        }

        $category = Category::find($id);
        $category->name = $request->input('name');
        if($request->image){
            $category->image = $imageName;
        }
        $category->slug = Str::slug($request->input('slug'),'-');

        $category->update();

        return redirect()->route('categories.index')->with('success','Categorie modifiee avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index')->with('success','Categorie modifie avec succes');
    }
}
