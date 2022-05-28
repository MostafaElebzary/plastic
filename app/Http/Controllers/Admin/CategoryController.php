<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {

        $query['data'] = Category::orderBy('id','desc')->with('children')->get();
        $query['data1'] = Category::orderBy('id','desc')->with('childrens')->get();
        $query['categories'] = Category::with('children')->orderBy('id','desc')->whereNull('parent')->get();

        return view('admin.category.index',$query);
    }

    public function store(Request $request)
    { 

        $this->validate(request(),[
            'name' => 'required|string',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $photo = $name;
        } else {
            $photo = NULL;
        }

        $data = new Category;
        $data->name = $request->name;
        $data->name_en = $request->name_en;
        $data->parent = $request->parent;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->photo = $photo;

        try {
            $data->save();
        } catch (Exception $e) {
            return redirect('admin/category')->with('msg', 'Failed');
        }

        return redirect()->back()->with('msg', 'Success');
    }

    public function edit(Request $request)
    {
        // $query['data'] = Admin::where('id', $id)->get();

        $query['data'] = Category::find($request->id);
        $query['categories'] = Category::with('children')->orderBy('id','desc')->whereNull('parent')->get();

        return view('admin.category.model', $query);
    }

    public function create()
    {
        // $query['data'] = Admin::where('id', $id)->get();

        $query['data'] = Category::find($request->id);
        $query['categories'] = Category::with('children')->orderBy('id','desc')->whereNull('parent')->get();

        return view('admin.category.model', $query);
    }

    public function update(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required|string',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $row = Category::find($request->id);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $photo = $name;
        } else {
            $photo = $row->photo;
        }

        $data = Category::where('id', $request->id)->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'parent' => $request->parent,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'photo' => $photo
        ]);        

        return redirect()->back()->with('msg', 'Success');
    }

    public function delete(Request $request)
    {   

        try{
            Category::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Failed']);
        }
        return response()->json(['msg'=>'Success']);
    }

}
