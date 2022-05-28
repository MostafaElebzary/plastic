<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientAnalysis;
use App\Models\Family;
use App\Models\Point;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Exports\SubscriberExport;
use Excel;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS2DFacade;
use App\Imports\ProductsImport;
use App\Jobs\ImportClient;

class SubscriberController extends Controller
{

    public function index()
    {
        $query['data'] = Subscriber::orderBy('id', 'desc')->paginate(15);
        return view('admin.subscriber.index', $query);
    }

    public function filter(Request $request)
    {

        if ($request->itm_code != null ) {
            $item_code = explode('$', $request->itm_code);
            $query['data'] = Subscriber::where('item_code', $item_code[0])->orderBy('id', 'desc')->paginate(15);
            return view('admin.subscriber.index', $query);
        } else if ($request->phone != null ) {
            $query['data'] = Subscriber::where('phone','like', '%' .$request->phone. '%')->orderBy('id', 'desc')->paginate(15);
            return view('admin.subscriber.index', $query);
        } else if ($request->name != null ) {
            $query['data'] = Subscriber::where('name','like','%' . $request->name. '%')->orderBy('id', 'desc')->paginate(15);
            return view('admin.subscriber.index', $query);
        } else {
            $query['data'] = Subscriber::orderBy('id', 'desc')->paginate(2);
            return view('admin.subscriber.index', $query);
        }

    }

    public function import_products()
    {
        return view('admin.subscriber.import_products');
    }

    public function import_products_store(Request $request)
    {
        $file = $request->file('import_file')->store('import');

        $import = new ProductsImport;
        $import->import($file);

        ImportClient::dispatch($import);

        return back()->withStatus('Import in queue, we will send notification after import finished.');

    }

    public function show($id)
    {
        $query['data'] = Subscriber::find($id);
        return view('admin.subscriber.show', $query);
    }

    public function create()
    {
        $client = Subscriber::get()->last();
        $query['data'] = $client->item_code + 1;

        return view('admin.subscriber.create', $query);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'nullable|string',
            'phone' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'age' => 'nullable|numeric',
            'address' => 'required|string',
            'password' => 'required',
            'item_code' => 'required|numeric|unique:subscribers',

        ]);
        $data['pass'] = $request->password;

        $data['password'] = Hash::make($request->password);
        $client = Subscriber::create($data);

        return redirect('admin/subscribers')->with('msg', 'Success');
    }

    public function edit($id)
    {
        // $query['data'] = Admin::where('id', $id)->get();
        $query['data'] = Subscriber::find($id);
        return view('admin.subscriber.edit', $query);
    }


    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'nullable|string',
            'phone' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'age' => 'nullable|numeric',
            'pass' => 'required|numeric',
            'address' => 'required|string',
            'item_code' => 'required|numeric|unique:subscribers,item_code,' . $request->id,

        ]);


        $client = Subscriber::whereId($request->id)->first();

        if ($request->pass != $client->pass) {
            $data['password'] = Hash::make($data['pass']);
        }

        $data = Subscriber::where('id', $request->id)->update($data);

        return redirect('admin/subscribers')->with('msg', 'Success');
    }


    public function delete(Request $request)
    {

        try {
            Subscriber::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed']);
        }
        return response()->json(['msg' => 'Success']);
    }


    public function deletefamily(Request $request)
    {
        try {
            Family::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed']);
        }
        return response()->json(['msg' => 'Success']);
    }


    public function exportIntoExcel()
    {

        return \Excel::download(new SubscriberExport, 'subscribers1.xlsx');
    }


    public function storeFamily(Request $request)
    {
        $data = $this->validate($request, [
            'subscriber_id' => 'required|exists:subscribers,id',
            'name' => 'required|string',
            'relation' => 'required|string',
            'phone' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'age' => 'required|numeric',
            'address' => 'required|string',

        ]);

        $client = Family::create($data);
        return redirect()->back()->with('msg', 'Success');
    }

    public function EditFamily(Request $request)
    {
        $query['family'] = Family::find($request->id);
        return view('admin.subscriber.familyModel', $query);
    }

    public function updatefamily(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'relation' => 'required|string',
            'phone' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'age' => 'required|numeric',
            'address' => 'required|string',
        ]);


        $data = Family::where('id', $request->id)->update($data);

        return redirect()->back()->with('msg', 'Success');
    }

    public function storeanalysis(Request $request)
    {
        $data = $this->validate($request, [
            'subscriber_id' => 'required|exists:subscribers,id',
            'file' => 'required',

        ]);

        if ($img = $request->file('file')) {
            $name = 'file_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $photo = $name;
        } else {
            return redirect()->back()->with('msg', 'Failed');
        }

        $data['file'] = $photo;
        $client = ClientAnalysis::create($data);
        return redirect()->back()->with('msg', 'Success');
    }

    public function deleteanalysis(Request $request)
    {
        try {
            ClientAnalysis::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed']);
        }
        return response()->json(['msg' => 'Success']);
    }
}
