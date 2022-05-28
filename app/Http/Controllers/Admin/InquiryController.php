<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Inquiry::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.inquiry.index',$query);
    }

    public function show($id)
    {
        $query['data'] = Inquiry::find($id);
        return view('admin.inquiry.show',$query);
    }

    public function create()
    {
        return view('admin.inquiry.create');
    }

    public function store(Request $request)
    { 
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'msg' => 'required|string',
        ]);

        $data = new Inquiry;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->msg = $request->msg;
        $data->save();

        return redirect('admin/inquires')->with('msg', 'Success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Inquiry::find($id);
        return view('admin.inquiry.edit', $query);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'msg' => 'required|string',
        ]);

        $data = Inquiry::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg
        ]);        
        
        return redirect('admin/inquires')->with('msg', 'Success');
    }

    public function delete(Request $request)
    {   

        try{
            Inquiry::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Failed']);
        }
        return response()->json(['msg'=>'Success']);
    }

}
