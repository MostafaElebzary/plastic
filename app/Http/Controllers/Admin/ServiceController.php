<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS2DFacade;

class ServiceController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Service::orderBy('id', 'desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);
        return view('admin.service.index', $query);
    }

    public function show($id)
    {
        $query['data'] = Service::find($id);
        return view('admin.service.show', $query);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'password' => 'required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($img = $request->file('photo')) {
            $name = 'img_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/posts'), $name);
            $photo = $name;
        } else {
            $photo = NULL;
        }

        $pass = rand(00000,99999);

        $data = new Service;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->phone = $request->phone;
        $data->phone2 = $request->phone2;
        $data->address = $request->address;
        $data->item_code = $request->item_code;
        $data->pass = $pass;
        $data->password = Hash::make($pass);
        $data->desc_en = $request->desc_en;
        $data->desc = $request->desc;
        $data->title_en = $request->title_en;
        $data->content_en = $request->content_en;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        $data->photo = $photo;
        $data->password = Hash::make($request->password);
        $data->save();

        $qr_image_name = 'doctor' . $request->item_code . '.png';
        $idString = (string)$request->item_code.'$'.(string)$pass;
        Storage::disk('public')->put($qr_image_name, base64_decode(DNS2DFacade::getBarcodePNG($idString, "QRCODE", 12, 12)));

        return redirect('admin/services')->with('msg', 'Success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Service::find($id);
        return view('admin.service.edit', $query);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'pass' => 'required|numeric',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $row = Service::find($request->id);

        if ($img = $request->file('photo')) {
            $name = 'img_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/posts/'), $name);
            $photo = $name;
        } else {
            $photo = $row->photo;
        }


        if ($request->item_code != $row->item_code) {
            $qr_image_name = 'doctor' . $request->item_code . '.png';
            $idString = (string)$request->item_code.'$'.(string)$request->pass;
            Storage::disk('public')->put($qr_image_name, base64_decode(DNS2DFacade::getBarcodePNG($idString, "QRCODE", 12, 12)));
        }

        if ($request->pass != $row->pass) {
            $password = Hash::make($request->pass);
        } else {
            $password = $row->password;
        }

        $data = Service::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'phone' => $request->phone,
            'phone2' => $request->phone2,
            'address' => $request->address,
            'item_code' => $request->item_code,
            'pass' => $request->pass,
            'password' => $password,
            'desc_en' => $request->desc_en,
            'desc' => $request->desc,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'photo' => $photo
        ]);

        if ($request->password) {
            $row = Service::find($request->id);
            $row->password = Hash::make($request->password);
            $row->save();
        }


        return redirect('admin/services')->with('msg', 'Success');
    }

    public function delete(Request $request)
    {

        try {
            Service::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed']);
        }
        return response()->json(['msg' => 'Success']);
    }

}
