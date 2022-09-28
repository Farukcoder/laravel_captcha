<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //index methoorder

    public function index(){
        // $category = DB::table('categoris')->get();
        $category = Category::all();

        return view('admin.category.index', compact('category'));
     }

    public function create(){
        // dd('hi');
        return view('admin.category.create');
    }

    public function store (Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        $category = new Category;


        $category->category_name = $request->category_name;

        // dd($category->category_name);
        $category->save();

        // Category::insert([
        //     'category_name' => $request->category_name
        // ]);

        $notification = array('messege' => 'Category Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit ($id){
        $data = Category::find($id);

        return view('admin.category.edit',compact('data'));
    }

    public function update (Request $request, $id){
        $category = Category::find($id);

        $category->update([
            'category_name' => $request->category_name,
        ]);

        $notification = array('messege' => 'Category Updated', 'alert-type' => 'success');
        return redirect()->route('category.index')->with($notification);
    }

    public function destroy ($id){

        // $category = Category::find($id);
        // $category->delete();

        Category::destroy($id);

        $notification = array('messege' => 'Category Deleted','alert-type'=> 'success');
        return redirect()->route('category.index')->with($notification);
    }
}
