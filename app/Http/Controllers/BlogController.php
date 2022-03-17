<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        return view('admin.blog.index',compact('blogs'));
    }

    public function create()
    {
        $catagories = DB::table('catagories')->get();
        return view('admin.blog.create',compact('catagories'));
    }

    public function store(Request $request)
    {
        $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $test = $request->image->move(public_path('images/blog'),$newImageName);

        Blog::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image'  => $newImageName,
            'author' => $request->input('author'),
            'catagory' => $request->input('catagory'),
            'tags'  => $request->input('tags'),
            'status'  => $request->input('status'),
        ]);


        return redirect('/admin/blogs')->with('success','Blog Created Successfully !!');
    }

    public function show($id)
    {
        $blogs = Blog::find($id);
        return view('admin.blog.show',compact('blogs'));
    }

    public function edit($id)
    {
        $blogs = Blog::find($id);
        $catagories = DB::table('catagories')->get();
        return view ('admin.blog.edit', compact(['blogs','catagories']));
    }

    public function update(Request $request, $id)
    {
        $old_cat = $request->input('old_cat');
        $old_img = $request->input('old_img');
        $test = $request->file('image');
        if(!$test){
            $updateImageName = $old_img;
           
        }else{
            unlink('public/images/blog/'.$old_img);
            $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $dir = $request->image->move(public_path('images/blog'),$newImageName);
            $updateImageName  = $newImageName;
        }
        Blog::find($id)->update([
            'title' => $request->input('title'),
            'body'  => $request->input('body'),
            'image' => $updateImageName,
            'catagory' => $request->input('catagory'),
            'tags'  => $request->input('tags'),
            'status'  => $request->input('status'),
        ]);
        return redirect('/admin/blogs')->with('success', 'Blog Updated Successfully !!');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $image = 'Public/images/blog/'.$blog->image;

        if(file_exists($image)){
            unlink($image);
            $blog->delete();
        }else{
            $blog->delete();
        }
        return redirect()->back()->with('success','Blog Deleted Successfully !!');
    }
}
