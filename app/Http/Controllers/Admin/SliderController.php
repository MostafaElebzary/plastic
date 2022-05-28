<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Slider::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.slider.index',$query);
    }

    public function show($id)
    {
        $query['data'] = Slider::find($id);
        return view('admin.slider.show',$query);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
            'title1' => 'required|string',
            'title2' => 'required|string',
            'title1_en' => 'required|string',
            'title2_en' => 'required|string',
            'content' => 'nullable|string',
            'sort' => 'required|numeric',
        ]);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $photo = $name;
        } else {
            $photo = NULL;
        }

        $data = new Slider;
        $data->title1 = $request->title1;
        $data->title2 = $request->title2;
        $data->title1_en = $request->title1_en;
        $data->title2_en = $request->title2_en;
        $data->content = $request->content;
        $data->sort = $request->sort;
        $data->photo = $photo;
        $data->save();

        return redirect('admin/sliders')->with('msg', 'Success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Slider::find($id);
        return view('admin.slider.edit', $query);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $row = Slider::find($request->id);

        if ( $img = $request->file('photo') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $photo = $name;
        } else {
            $photo = $row->photo;
        }

        $data = Slider::where('id', $request->id)->update([
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title1_en' => $request->title1_en,
            'title2_en' => $request->title2_en,
            'content' => $request->content,
            'sort' => $request->sort,
            'photo' => $photo
        ]);

        return redirect('admin/sliders')->with('msg', 'Success');
    }

    public function delete(Request $request)
    {

        try{
            Slider::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Failed']);
        }
        return response()->json(['msg'=>'Success']);
    }

}
