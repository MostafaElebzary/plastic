<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Sample;
use App\Models\Blog;
use App\Models\Documentary;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Subscriber;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::orderBy('sort', 'asc')->get();
        $about = Page::find(1);
        $contact = Page::find(2);
        $services = Post::orderBy('id', 'asc')->get();
        $partners = Partner::orderBy('id', 'asc')->get();
        $products = Blog::orderBy('id', 'asc')->get();
        return view('front.home', compact('sliders', 'about', 'services', 'partners', 'products','contact'));
    }

    public function about ($id = 1) {
        $query['data'] = Page::find($id);
        return view('front.pages.about',$query);
    }

    public function contact_Us(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required|string',
        ]);

        $data = new Contact;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->msg = $request->message;
        $data->save();

        if ($data) {
            return redirect('contact-us')->with('msg', 'Success');
        } else {
            return redirect('contact-us')->with('msg', 'Failed');
        }
    }


    public function PullRequest(Request $request)
    {

        $data = $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'comp_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'appointment' => 'required',
            'products' => 'required',
            'type' => 'required',
        ]);

        $sample = new Sample();
        $sample->name = $request->name;
        $sample->phone = $request->phone;
        $sample->comp_name = $request->comp_name;
        $sample->address = $request->address;
        $sample->email = $request->email;
        $sample->appointment = $request->appointment;
        $sample->products = implode(',', $request->products);
        $sample->type = $request->type;
        $sample->comments = $request->comments;
        $sample->save();

        if ($sample) {
            return redirect('home-sample-collection-request')->with('msg', 'Success');
        } else {
            return redirect('home-sample-collection-request')->with('msg', 'Failed');
        }
    }


    public function AllService()
    {
        $posts = Post::orderBy('id', 'asc')->get();
        return view('front.pages.allservice', compact('posts'));

    }

    public function Service($id)
    {
        $service = Post::findOrFail($id);
        return view('front.pages.service', compact('service'));

    }

    public function LabEquipment($id)
    {
        $service = Blog::findOrFail($id);
        return view('front.pages.lab_equipment', compact('service'));

    }
    public function ContactUs()
    {
        $contact = Page::findOrFail(2);
        return view('front.pages.contact', compact('contact'));

    }

    public function Gallery()
    {
        $galleries = Blog::orderBy('id','desc')->get();
        return view('front.pages.gallery', compact('galleries'));

    }

    public function documentary()
    {
        $documentary = Documentary::orderBy('id','desc')->get();
        return view('front.pages.documentary', compact('documentary'));

    }

}
