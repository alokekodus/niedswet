<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('web.index');
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
