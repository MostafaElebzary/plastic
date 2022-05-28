<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Page::orderBy('id', 'desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.page.index', $query);
    }

    public function show($id)
    {
        $query['data'] = Page::find($id);
        return view('admin.page.show', $query);
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'title_en' => 'required|string',
            'content_en' => 'required|string'
        ]);

        $data = new Page;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->title_en = $request->title_en;
        $data->content_en = $request->content_en;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->save();

        return redirect('admin/pages')->with('msg', 'Success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Page::find($id);
        return view('admin.page.edit', $query);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'title_en' => 'required|string',
            'content_en' => 'required|string'
        ]);

        $row = Page::find($request->id);

        if ($img = $request->file('photo')) {
            $name = 'img_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $photo = $name;
        } else {
            $photo = $row->photo;
        }

        if ($img = $request->file('photo2')) {
            $name = 'img2_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $photo2 = $name;
        } else {
            $photo2 = $row->photo2;
        }

        $data = Page::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'mission' => $request->mission,
            'vision' => $request->vision,
            'why' => $request->why,
            'mission_en' => $request->mission_en,
            'vision_en' => $request->vision_en,
            'why_en' => $request->why_en,
            'photo' => $photo,
            'photo2' => $photo2,
        ]);

        return redirect('admin/pages')->with('msg', 'Success');
    }

    public function delete(Request $request)
    {

        try {
            Page::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed']);
        }
        return response()->json(['msg' => 'Success']);
    }

}
