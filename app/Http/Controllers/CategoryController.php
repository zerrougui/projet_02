<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('categories',Category::all());
    }

    
    public function create()
    {
        return view('categories.create');
    }

    
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        $request->session()->flash('success','Categorie ajouter avec succeés');
        return redirect(route('categories.index'));
    }

    
    public function show(Category $category)
    {
        return view('categories.show')->with('categorie', $category);
    }

    
    public function edit(Category $category)
    {
        return view('categories.create')->with('categorie', $category);
    }

    
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name'=> $request->get('name')
        ]);

        $request->session()->flash('success','le nom du categorie est modifier avec succeés');
        return redirect(route('categories.index'));
    }

   
    public function destroy(Category $category)
    {

        $name = $category->name;
        $category->delete();
        session()->flash('success','la  categorie '.$name.' est suprimmer avec succeés');
        return redirect(route('categories.index'));

    }
}
