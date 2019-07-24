<?php

namespace App\Http\Controllers;

use App\Category;
use App\subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Category::paginate(2);
        $subcategories =subcategory::all();
        return view('category',compact('categories','subcategories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|unique:categories' ,
            'image'=>'required|image' ,
        ]);
        $image = $request->file('image');
        $imagename=uniqid().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('categories'),$imagename); 
        $category =  new Category;
        $category->name=$request->name;
        $category->image=$imagename;
        $category->save();
        $category->subcategories()->sync($request->subcategory);
        return back()->with('message','Category Added Successfully');

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $subcategories=subcategory::all();
        return view('edit',compact('category','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>'required' ,

        ]);
        if ($request->hasfile('image')) {
           $image = $request->file('image');
           $imagename=uniqid().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('categories'),$imagename);  
           $category->image=$imagename;
       } 
       $category->name=$request->name;
       $category->save();
       $category->subcategories()->sync($request->subcategory);
       return back()->with('message','Category Edited Successfully');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function createsubcategory(Request $request)
    {
     return view('createsubcategory');
 } 

 public function storesubcategory(Request $request)
 {
    $this->validate($request,[
        'name'=>'required|unique:subcategories' ,

    ]);
    subcategory::create($request->all());
    return back()->with('message','SubCategory Added Successfully');
}

}
