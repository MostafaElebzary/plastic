<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\ClientAnalysisResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\PartenerResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\SliderResource;
use App\Model\Sample;
use App\Models\Blog;
use App\Models\ClientAnalysis;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function Slider()
    {
        $Slider = SliderResource::collection(Slider::orderBy('sort', 'asc')->get());
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $Slider]);

    }

    public function Settings()
    {
        $settings = Setting::first();
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $settings]);

    }

    public function Posts()
    {
        $posts = PostResource::collection(Post::orderBy('id', 'asc')->get());
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $posts]);

    }

    public function Post($id)
    {

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:posts',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 404, 'msg' => $validator->messages()->first(), 'data' => (object)[]]);
        }
        $post = new PostResource(Post::find($id));
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $post]);


    }

    public function Blogs()
    {
        $posts = BlogResource::collection(Blog::orderBy('id', 'asc')->get());
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $posts]);

    }

    public function Blog($id)
    {

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:blogs',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 404, 'msg' => $validator->messages()->first(), 'data' => (object)[]]);
        }
        $post = new BlogResource(Blog::find($id));
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $post]);


    }

    public function partners()
    {
        $posts = PartenerResource::collection(Partner::orderBy('id', 'asc')->get());
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $posts]);

    }

    public function aboutUs()
    {
        $post = new PageResource(Page::find(1));
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $post]);

    }

    public function ContactUs(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'msg' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 401, 'msg' => $validator->messages()->first(), 'data' => (object)[]]);
        }
        $post = Contact::create($request->all());
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $post]);

    }

    public function sample(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'comments' => 'required',
            'image' => 'nullable|image',
            'lat' => 'nullable',
            'lng' => 'nullable',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 401, 'msg' => $validator->messages()->first(), 'data' => (object)[]]);
        }
        if ($img = $request->file('image')) {
            $name = 'img_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads'), $name);
            $photo = $name;
        } else {
            $photo = NULL;
        }
        $sample = new Sample();
        $sample->name = $request->name;
        $sample->age = $request->age;
        $sample->phone = $request->phone;
        $sample->address = $request->address;
        $sample->comments = $request->comments;
        $sample->image = $photo;
        $sample->lat = $request->lat;
        $sample->lng = $request->lng;
        $sample->save();
        return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => (object)[]]);

    }

    public function ClientLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'item_code' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 401, 'msg' => $validator->messages()->first(), 'data' => (object)[]]);
        }

        $subscriber = Subscriber::where('item_code', $request->item_code)->first();

        if ($subscriber) {
            if (Hash::check($request->password, $subscriber->password)) {
                $subscriber->api_token = Str::random(60);
                $subscriber->save();

                $subscriber->points = $subscriber->Points->sum('points');
                return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $subscriber]);

            } else {
                $subscriber->api_token = null;
                $subscriber->save();
                return response()->json(['status' => 401, 'msg' => "رقم العميل او الرقم السري غير صحيح", 'data' => (object)[]]);

            }

        }
        return response()->json(['status' => 401, 'msg' => "رقم العميل او الرقم السري غير صحيح", 'data' => (object)[]]);

    }

    public function ClientAnalyses(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'api_token' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 405, 'msg' => "برجاء تسجيل الدخول ", 'data' => (object)[]]);
        }
        if ($request->api_token != null) {
            $subscriber = Subscriber::where('api_token', $request->api_token)->first();
            if ($subscriber) {
                $results = ClientAnalysisResource::collection(ClientAnalysis::where('subscriber_id', $subscriber->id)->get());
                return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $results]);

            }
        }
        return response()->json(['status' => 405, 'msg' => "برجاء تسجيل الدخول", 'data' => (object)[]]);

    }
 
    public function DoctorLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'item_code' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 401, 'msg' => $validator->messages()->first(), 'data' => (object)[]]);
        }

        $subscriber = Service::where('item_code', $request->item_code)->first();

        if ($subscriber) {
            if (Hash::check($request->password, $subscriber->password)) {
                $subscriber->api_token = Str::random(60);
                $subscriber->save();
                return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $subscriber]);

            } else {
                $subscriber->api_token = null;
                $subscriber->save();
                return response()->json(['status' => 401, 'msg' => "رقم الطبيب او الرقم السري غير صحيح", 'data' => (object)[]]);

            }

        }
        return response()->json(['status' => 401, 'msg' => "رقم الطبيب او الرقم السري غير صحيح", 'data' => (object)[]]);

    }

    public function DoctorClientAnalyses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'api_token' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 405, 'msg' => "برجاء تسجيل الدخول ", 'data' => (object)[]]);
        }
        if ($request->api_token != null) {
            $subscriber = Service::where('api_token', $request->api_token)->first();
            if ($subscriber) {
                $client_ids = Note::where('doctor_id', $subscriber->id)->pluck('subscriber_id')->toArray();
                $results = ClientAnalysisResource::collection(ClientAnalysis::whereIn('subscriber_id', $client_ids)->get());
                return response()->json(['status' => 200, 'msg' => "تم بنجاح", 'data' => $results]);
            }
        }
        return response()->json(['status' => 405, 'msg' => "برجاء تسجيل الدخول", 'data' => (object)[]]);
    }
}
