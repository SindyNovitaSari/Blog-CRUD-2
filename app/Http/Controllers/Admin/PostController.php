<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('admin.post.index', compact('posts'));
    }
    public function create()
    { 
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }
    public function simpanpost(Request $request)
    {
        $post_name = $request->input('title');
        $category_id = $request->input('category_id');
        $description = $request->input('description');
        $status = $request->input('status');
        $image = $request->file('image');
        if($image==""){
            $gbr = "";
            $gbrr = "";
        }else{
            $gbr = $image->getClientOriginalName();
            $gbrr = $image->move(public_path('uploads/post'), $gbr);
        }
        $kecilin = strtolower($post_name);
        $slug = str_replace(" ","-",$kecilin);

        $post = new Post;
        $htg = Post::where('title', $post_name)->count();
        $post->category_id = $category_id;
        if($htg > 0){
            return redirect('admin/posts')->with('message', 'postingan dengan judul ' . $post_name . ' sudah ada!');
        }else{
            $post->title = $post_name;   
        }
        $post->description = $description;
        $post->status = $status;
        $post->image = $gbr;
        $post->slug = $slug;

        $post->save();
        return redirect('admin/posts')->with('message', 'Post berhasil di tambahkan');
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }
    public function update(Request $request, $post){

        $posto = Post::findOrFail($post);

        $post_name = $request->input('title');
        $category_id = $request->input('category_id');
        $description = $request->input('description');
        $status = $request->input('status');
        $image = $request->file('image');
        if($image==""){
            $gbr = "";
            $gbrr = "";
            $path = "";
        }else{
            $gbr = $image->getClientOriginalName();
            $gbrr = $image->move(public_path('uploads/post'), $gbr);
            $path = 'uploads/post/'. $posto->image;
            File::delete($path);
        }
        $kecilin = strtolower($post_name);
        $slug = str_replace(" ","-",$kecilin);

        $htg = Post::where('title', $post_name)->count();
        $posto->category_id = $category_id;
        if($htg > 0){
            return redirect('admin/posts')->with('message', 'postingan dengan judul ' . $post_name . ' sudah ada!');
        }else{
        $posto->title = $post_name;   
        }
        $posto->description = $description;
        $posto->status = $status;
        $posto->image = $gbr;
        $posto->slug = $slug;

        $posto->save();
        return redirect('admin/posts')->with('message', 'Post berhasil di Update');
    }
    public function destroy(int $post_id)
    {
        $post = Post::findOrFail($post_id);
        $path = 'uploads/post/'. $post->image;
            if(File::exists($path)){
                File::delete($path);
            }
        $post->delete();
        return redirect()->back()->with('message', "Post berhasil di Hapus");


    }
}

    
    




