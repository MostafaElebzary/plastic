<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
// use App\Models\Category;

class RoleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        // $query['data'] = Parents::orderBy('id','desc')->with('Category')->get();
        $query['data'] = Role::orderBy('id','desc')->get();
        // $query['data'] = Admin::orderBy('id','desc')->paginate(10);
        return view('admin.Role.index',$query);
    }

    public function show($id)
    {
        // $query['data'] = Parents::with('Category')->find($id);
        $query['data'] = Role::find($id);
        return view('admin.Role.show',$query);
    }

    public function create()
    {
        $query['data'] = Role::orderBy('id','desc')->get();
        return view('admin.Role.create', $query);
    }

    public function store(Request $request)
    { 
        // return $request;
        $this->validate($request,[
            'name' => 'required|string',
            'permissions' => 'required|array|min:1'
        ]);

        try {
            $data = $this->process(new Role, $request);
            if($data) {
                return redirect('admin/roles')->with('msg', 'Success');
            } else {
                return redirect('admin/roles')->with('msg', 'Failed');
            }

        } catch (\Exception $ex) {
            return $ex;
            return redirect('admin/roles')->with('msg', 'Failed');
        }
    }

    public function edit(Request $request)
    {
        $query['data'] = Role::find($request->id);

        return view('admin.role.edit', $query);
    }

    public function update(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'permissions' => 'required|array|min:1'
        ]);

        try {

            $data = Role::find($request->id);
            $data = $this->process($data, $request);
            if($data) {
                return redirect('admin/roles')->with('msg', 'Success');
            } else {
                return redirect('admin/roles')->with('msg', 'Failed');
            }

        } catch (\Exception $ex) {
            return $ex;
            return redirect('admin/roles')->with('msg', 'Failed');
        }
    }

    public function delete(Request $request)
    {   

        try{
            Role::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Failed']);
        }
        return response()->json(['msg'=>'Success']);
    }

    protected function process(Role $data, Request $r) {
        $data->name = $r->name;
        $data->permissions = json_encode($r->permissions);
        $data->save();
        return $data;
    }

}
