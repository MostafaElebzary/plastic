<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Sample;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Setting;

class SampleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        $query['data'] = Sample::orderBy('id', 'desc')->paginate(15);
        return view('admin.samples.index', $query);

    }

    public function show($id)
    {
        $query['data'] = Sample::find($id);
        return view('admin.samples.show', $query);
    }

    public function delete(Request $request)
    {

        try {
            Sample::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed']);
        }
        return response()->json(['msg' => 'Success']);
    }

}
