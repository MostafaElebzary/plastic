<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Blog::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.blog.index',$query);
    }

    public function show($id)
    {
        $query['data'] = Blog::find($id);
        return view('admin.blog.show',$query);
    }

    public function create()
    {
        return view('admin.blog.create');
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

        $data = new Blog;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->title_en = $request->title_en;
        $data->content_en = $request->content_en;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->photo = $photo;
        $data->save();

        return redirect('admin/blogs')->with('msg', 'Success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Blog::find($id);
        return view('admin.blog.edit', $query);
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

        $row = Blog::find($request->id);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads/posts/'), $name);
            $photo = $name;
        } else {
            $photo = $row->photo;
        }

        $data = Blog::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'photo' => $photo
        ]);

        return redirect('admin/blogs')->with('msg', 'Success');
    }

    public function delete(Request $request)
    {

        try{
            Blog::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Failed']);
        }
        return response()->json(['msg'=>'Success']);
    }

}
