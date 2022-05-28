<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use Illuminate\Http\Request;

class AssistantController extends Controller
{

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'doctor_id' => 'required|exists:services,id',
        ]);

        Assistant::create($data);
        return redirect()->back()->with('msg', 'Success');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $query['data'] = Assistant::find($request->id);
        return view('admin.service.model', $query);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'id' => 'required',
        ]);

        Assistant::whereId($request->id)->update($data);
        return redirect()->back()->with('msg', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        try {
            Assistant::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed']);
        }
        return response()->json(['msg' => 'Success']);
    }
}
