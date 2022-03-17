<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
class CatagoryController extends Controller
{
    public function index()
    {
        $catagories = Catagory::get();
        return view('admin.catagory',compact('catagories'));
    }

    public function store(Request $request)
    {
        Catagory::create([
            'cat_name' => $request->input('cat_name')
        ]);
        return redirect()->back()->with('success', 'Catagory Add Successfully !!');
    }

    public function update(Request $request, $id)
    {
        Catagory::find($id)->update([
            'cat_name' => $request->input('cat_name')
        ]);
        return redirect()->back()->with('success','Catagory Updated Successfully !!');
    }


    public function destroy($id)
    {
        Catagory::destroy($id);
        return redirect()->back()->with('success','Catagory Deleted Successfully !!');
    }
}
