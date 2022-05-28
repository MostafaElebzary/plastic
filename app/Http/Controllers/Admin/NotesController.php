<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Subscriber;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Note::orderBy('created_at', 'desc');
        if ($request->from) {
            $data->whereBetween('created_at', [$request->from, $request->to]);
        }
        if ($request->subscriber_id) {
            $data->where('subscriber_id', $request->subscriber_id);
        }
        if ($request->doctor_id) {
            $data->where('doctor_id', $request->doctor_id);
        }
        $query['data1'] = $data->paginate(15);
        return view('admin.notes.index', $query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $client = Subscriber::whereId($request->subscriber_id)->first();
        if ($request->type == 0) {
            if ($request->points > $client->Points->sum('points')) {
                return redirect()->back()->with('msg', 'Failed');
            }
            $total_before_points = $client->Points->sum('points');
            Point::where('subscriber_id', $request->subscriber_id)->delete();
            $total_after_points = $total_before_points - $request->points;
            Point::create([
                'subscriber_id' => $request->subscriber_id,
                'points' => $total_after_points
            ]);

            Note::create([
                'title' => "خصم نقاط",
                'subscriber_id' => $request->subscriber_id,
                'doctor_id' => $request->doctor_id,
                'admin_id' => Auth::user()->id,
                'description' => $request->description,
                'points' => $request->points,
            ]);

        } else {
            $total_before_points = $client->Points->sum('points');
            Point::where('subscriber_id', $request->subscriber_id)->delete();
            $total_after_points = $total_before_points + $request->points;
            Point::create([
                'subscriber_id' => $request->subscriber_id,
                'points' => $total_after_points
            ]);

            Note::create([
                'title' => "اضافة نقاط",
                'subscriber_id' => $request->subscriber_id,
                'doctor_id' => $request->doctor_id,
                'admin_id' => Auth::user()->id,
                'description' => $request->description,
                'points' => $request->points,
            ]);
        }

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
