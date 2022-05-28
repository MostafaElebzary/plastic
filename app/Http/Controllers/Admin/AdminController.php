<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Admin::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.admin.index',$query);
    }

    public function show($id)
    {
        $query['data'] = Admin::find($id);
        return view('admin.admin.show',$query);
    }

    public function create()
    {
        $query['data'] = Role::orderBy('id','desc')->get();
        return view('admin.admin.create', $query);
    }

    public function store(Request $request)
    { 
        // return $request;
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'string|email|unique:admins',
            'phone' => 'required|string|unique:admins',
            'role_id' => 'required|integer',
            'profile' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ( $img = $request->file('profile') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $profile = $name;
        } else {
            $profile = NULL;
        }

        $data = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password1),
            'photo' => $profile,
            'is_active' => $request->is_active,
        ]);

        return redirect('admin/admins')->with('msg', 'Success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Admin::find($id);
        $query['roles'] = Role::orderBy('id','desc')->get();
        return view('admin.admin.edit', $query);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'role_id' => 'required|integer',
            'profile' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $row = Admin::find($request->id);
        

        if(password_verify($request->password1, $row->password)) {
            $password = $row->password ;
        } else {
            $password = Hash::make($request->password1) ;
        }

        if ( $img = $request->file('profile') ) {
            $name = 'img_' .time() . '.' .$img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $profile = $name;
        } else {
            $profile = $row->photo;
        }

        $data = Admin::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'password' => $password,
            'photo' => $profile,
            'is_active' => $request->is_active,
        ]);        
        
        return redirect('admin/admins')->with('msg', 'Success');
    }

    public function delete(Request $request)
    {   

        try{
            Admin::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Failed']);
        }
        return response()->json(['msg'=>'Success']);
    }

}
