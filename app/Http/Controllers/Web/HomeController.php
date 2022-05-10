<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['carousel'] = Carousel::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('web.index')->with($data);
    }

    public function aboutUs()
    {
        return view('web.about.index');
    }

    public function ourTeam()
    {
        return view('web.about.ourTeam');
    }

    public function events()
    {
        return view('web.events.index');
    }

    public function galleryImage()
    {
        return view('web.gallery.images');
    }

    public function blogs($id = null)
    {
        if(!$id){
            return view('web.blogs.index');
        } else{
            return view('web.blogs.blogDetails');
        }
    }

    public function contactForm(Request $request)
    {
        return response()->json(['status' => 'success', 'result' => 1, 'message' => 'Form submitted successfully']);
    }
}
