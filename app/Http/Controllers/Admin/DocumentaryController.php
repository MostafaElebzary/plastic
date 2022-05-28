<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Documentary;

class DocumentaryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Documentary::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.documentary.index',$query);
    }

    public function show($id)
    {
        $query['data'] = Documentary::find($id);
        return view('admin.documentary.show',$query);
    }

    public function create()
    {
        return view('admin.documentary.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'content' => 'required|string',
            'title_en' => 'required|string',
            'content_en' => 'required|string',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads/posts'), $name);
            $photo = $name;
        } else {
            $photo = NULL;
        }

        $data = new Documentary;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->title_en = $request->title_en;
        $data->content_en = $request->content_en;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->photo = $photo;
        $data->save();

        return redirect('admin/documentarys')->with('msg', 'Success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Documentary::find($id);
        return view('admin.documentary.edit', $query);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'content' => 'required|string',
            'title_en' => 'required|string',
            'content_en' => 'required|string',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $row = Documentary::find($request->id);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads/posts/'), $name);
            $photo = $name;
        } else {
            $photo = $row->photo;
        }

        $data = Documentary::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'photo' => $photo
        ]);

        return redirect('admin/documentarys')->with('msg', 'Success');
    }

    public function delete(Request $request)
    {

        try{
            Documentary::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Failed']);
        }
        return response()->json(['msg'=>'Success']);
    }

}
