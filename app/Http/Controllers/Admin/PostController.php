<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subctegory;
use DB;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $category = DB::table('categoris')->get();
        // $category = Subctegory::all();
        $data = Subctegory::all();

        return view('admin.post.index', compact('data'));
    }

    public function create()
    {
        $category = Category::all();

        return view('admin.post.create', compact('category'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'tags' => 'required|max:255',
            // 'title' => 'required|max:255',
        ]);

        dd($request->all());
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
