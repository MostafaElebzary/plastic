<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Post::orderBy('id','desc')->with('category')->get();
        $query['categories'] = Category::with('children')->orderBy('id','desc')->get();
        return view('admin.post.index',$query);
    }

    public function show($id)
    {
        $query['data'] = Post::with('Category')->find($id);
        return view('admin.post.show',$query);
    }

    public function create()
    {
        $query['data'] = Category::with('children')->orderBy('name', 'asc')->whereNull('parent')->get();
        return view('admin.post.create', $query);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'content' => 'required|string',
            'title_en' => 'required|string',
            'content_en' => 'required|string',
            'cat_id' => 'required|numeric',
            'unique' => 'required|numeric',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
            'photo2' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads/posts'), $name);
            $photo = $name;
        } else {
            $photo = NULL;
        }

        if ( $img2 = $request->file('photo2') ) {
            $name2 = 'img2_' .time() . '.' .$img2->getClientOriginalExtension();
            $img2->move(public_path('uploads/posts'), $name2);
            $photo2 = $name2;
        } else {
            $photo2 = NULL;
        }

        if ( $img3 = $request->file('icon_img') ) {
            $name3 = 'img3_' .time() . '.' .$img3->getClientOriginalExtension();
            $img3->move(public_path('uploads/posts'), $name3);
            $photo3 = $name3;
        } else {
            $photo3 = NULL;
        }

        $data = new Post;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->title_en = $request->title_en;
        $data->content_en = $request->content_en;
        $data->cat_id = $request->cat_id;
        $data->unique = $request->unique;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->photo = $photo;
        $data->photo2 = $photo2;
        $data->icon_img = $photo3;
        $data->save();

        return redirect('admin/posts')->with('msg', 'Success');
    }

    public function edit($id)
    {
        $query['data'] = Post::find($id);
        $query['categories'] = Category::with('children')->orderBy('name', 'asc')->whereNull('parent')->get();
        return view('admin.post.edit', $query);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'title_en' => 'required|string',
            'content_en' => 'required|string',
            'cat_id' => 'required|numeric',
            'unique' => 'required|numeric',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
            'photo2' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $row = Post::find($request->id);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads/posts/'), $name);
            $photo = $name;
        } else {
            $photo = $row->photo;
        }

        if ( $img2 = $request->file('photo2') ) {
            $name2 = 'img2_' .time() . '.' .$img2->getClientOriginalExtension();
            $img2->move(public_path('uploads/posts/'), $name2);
            $photo2 = $name2;
        } else {
            $photo2 = $row->photo2;
        }

        if ( $img3 = $request->file('icon_img') ) {
            $name3 = 'img3_' .time() . '.' .$img3->getClientOriginalExtension();
            $img3->move(public_path('uploads/posts/'), $name3);
            $photo3 = $name3;
        } else {
            $photo3 = $row->icon_img;
        }

        $data = Post::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'cat_id' => $request->cat_id,
            'unique' => $request->unique,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'photo' => $photo,
            'icon_img' => $photo3,
            'photo2' => $photo2
        ]);

        return redirect('admin/posts')->with('msg', 'Success');
    }

    public function delete(Request $request)
    {

        try{
            Post::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Failed']);
        }
        return response()->json(['msg'=>'Success']);
    }

}
