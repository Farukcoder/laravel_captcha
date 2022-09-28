<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subctegory;
use DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        // $category = DB::table('categoris')->get();
        // $category = Subctegory::all();
        $data = Subctegory::all();

        return view('admin.sub_category.index', compact('data'));


    }

    public function create()
    {
        $category = Category::all();

        return view('admin.sub_category.create', compact('category'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:subcategoris|max:255',
        ]);

        // $subcategory = new Subctegory;

        // dd($request->all());


        // $subcategory->name = $request->name;
        // $subcategory->category_id = $request->category_id;

        // dd($subcategory->name);

        // dd($category->category_name);
        // $subcategory->save();

        Subctegory::insert([
            'category_id' => $request->category_id,
            'name' => $request->name
        ]);

        $notification = array('messege' => 'subCategory Inserted', 'alert-type' => 'success');
        return redirect()->route('sub_category.create')->with($notification);
    }

    public function edit($id)
    {
        $categoris = Category::all();
        $data = Subctegory::find($id);

        return view('admin.sub_category.edit', compact('categoris', 'data'));
    }

    public function update(Request $request, $id)
    {
        $sub_category = Subctegory::find($id);

        $sub_category->update([
            'category_id' => $request->category_id,
            'name' => $request->name
        ]);

        $notification = array('messege' => 'Category Updated', 'alert-type' => 'success');
        return redirect()->route('sub_category.index')->with($notification);
    }

    public function destroy($id)
    {

        // $category = Category::find($id);
        // $category->delete();

        Subctegory::destroy($id);

        $notification = array('messege' => 'sub Category Deleted', 'alert-type' => 'success');
        return redirect()->route('sub_category.update')->with($notification);
    }
}
