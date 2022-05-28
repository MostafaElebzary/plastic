<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientAnalysisResource;
use App\Model\Sample;
use App\Models\Blog;
use App\Models\ClientAnalysis;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Service;
use App\Models\Slider;
use App\Note;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public function DoctorLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "item_code" => 'required',
            "password" => 'required',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $logged_in = Auth::guard('doctors')
            ->attempt(['item_code' => $request->item_code, 'password' => $request->password]);
        if ($logged_in) {

            return redirect(url('Doctor-Analysis'));
        } else {
            return redirect()->back()->withErrors([__('خطأ في تسجيل الدخول.تأكد من بيانات التسجيل وأعد المحاولة.')]);
        }
    }


    public function DoctorClientAnalyses()
    {
        $subscriber = Service::where('id', Auth::guard('doctors')->user()->id)->first();
        $title = "نتائج التحاليل";
        $client_ids = Note::where('doctor_id', $subscriber->id)->pluck('subscriber_id')->toArray();
        $results = ClientAnalysis::whereIn('subscriber_id', $client_ids)->get();
        return view('front.pages.analysis', compact('title', 'results'));


    }


    public function ClientLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "item_code" => 'required',
            "password" => 'required',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $logged_in = Auth::guard('subscribers')
            ->attempt(['item_code' => $request->item_code, 'password' => $request->password]);
        if ($logged_in) {
            return redirect(url('Client-Analysis'));
        } else {
            return redirect()->back()->withErrors([__('خطأ في تسجيل الدخول.تأكد من بيانات التسجيل وأعد المحاولة.')]);
        }
    }


    public function ClientAnalyses()
    {
        if (!Auth::guard('subscribers')->check()) {
            return redirect(url('/client-login'));
        }

        $title = trans('lang.Patient_Results');
        $results = ClientAnalysis::where('subscriber_id', Auth::guard('subscribers')->user()->id)->orderBy('id','desc')->get();
        return view('front.pages.analysis', compact('title', 'results'));


    }

}
