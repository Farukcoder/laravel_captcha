<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subctegory;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
use File;
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
        $data = Post::all();

        return view('admin.post.index', compact('data'));
    }

    public function create()
    {
        $category = Category::all();

        return view('admin.post.create', compact('category'));
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $validated = $request->validate([
            'title' => 'required',
            'subcategory_id' => 'required',
            'post_date' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        // dd($request->all());
        $category_id = DB::table('subcategoris')->where('id',$request->subcategory_id)->first()->category_id;

        $slug = Str::of($request->title)->slug('-');
        // dd($category_id);

        $data = array();

        $data['category_id']= $category_id;
        $data['subcategory_id']= $request->subcategory_id;
        $data['title']= $request->title;
        $data['post_date']= $request->post_date;
        $data['description']= $request->description;
        $data['tags']= $request->tags;
        $data['user_id']= Auth::id();
        $data['status']= $request->status;

        $photo = $request->image;

        if($photo){
            $photo_name = $slug.'.'. $photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,400)->save('public/assets/images/'.$photo_name);

            $data['image'] = 'public/assets/images/'.$photo_name;

            DB::table('post')->insert($data);
            $notification = array('messege' => 'Post Created', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }

        DB::table('post')->insert($data);
        $notification = array('messege' => 'Post Created', 'alert-type' => 'success');
        return redirect()->route('post.index')->with($notification);
        // return response()->json($data);


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

        $post = Post::find($id);
        if(File::exists($post->image)){
            File::delete($post->image);
        }
        $post->delete();

        $notification = array('messege' => 'post Deleted', 'alert-type' => 'success');
        return redirect()->route('post.index')->with($notification);
    }
}
