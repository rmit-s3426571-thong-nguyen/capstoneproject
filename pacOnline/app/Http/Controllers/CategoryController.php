<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;


class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display all categories 
        // also have a form on the same page

        $categories = Category::orderBy('name')->where('parent_id', '=', 0)->get();
        $allCategories = Category::orderBy('name')->get();

        return view('categories.index',compact('allCategories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //Store all categories in the database
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|unique:categories|max:255'));

        $input = $request->all();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Category::create($input);


        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCategories = Category::orderBy('name')->get();
        $category = Category::whereId($id)->first();        
        return view('categories.edit', compact('category','allCategories'));
    }

    //Update user's old categories with newest one
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'unique:categories|max:255'));

        $input = $request->all();

        $category = Category::whereId($id)->first();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        $category->fill($input)->save();

        return redirect()->route('categories.index');
    }

    //Remove user's categories in the database
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::whereId($id)->first();

        $category->delete();

        return redirect()->route('categories.index');
    }

}
