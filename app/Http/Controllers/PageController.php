<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        return view('admin.pages.index',compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        Page::create([
            'name' => $request->name,
            'slug' => strtolower(str_replace('','-',$request->name)),
            'link' => $request->link,
            'body' => $request->body,
        ]);
        return redirect('admin/pages')->with('success', 'Page Add Successfully !!');
    }

    public function show($id)
    {
        $page = Page::find($id);
        return view('admin.blog.show',compact(['page']));
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.blog.edit',compact(['page']));
    }

    public function update(Request $request, $id)
    {
        Page::find($id)->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace('','-',$request->name)),
            'link' => $request->link,
            'body' => $request->body,
        ]);
        return redirect('admin/pages')->with('success', 'Page Update Successfully !!');
    }

    public function destroy($id)
    {
        $page = Page::find($id)->delete();
        return redirect()->back()->with('success', 'Page Delete Successfully !!');
    }

    public function pageStatus($id){
        $check = Page::find($id);
        if($check->status == '1'){
            Page::find($id)->update([
                'status' => '0',
            ]);
        }elseif($check->status == '0'){
            Page::find($id)->update([
                'status' => '1',
            ]);
        }
        return redirect()->back();
    }
}
