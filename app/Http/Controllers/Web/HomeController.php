<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['carousel'] = Carousel::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $data['blogs'] = Blog::where('status', 1)->orderBy('created_at', 'DESC')->get();
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
            $data['blogs'] = Blog::where('status', 1)->get();
            return view('web.blogs.index')->with($data);
        } else{
            $dec_id = Crypt::decrypt($id);
            $data['blog'] = Blog::find($dec_id);
            $data['categories'] = BlogCategory::where('status', 1)->with('Blogs')->get();
            return view('web.blogs.blogDetails')->with($data);
        }
    }

    public function contactForm(Request $request)
    {
        return response()->json(['status' => 'success', 'result' => 1, 'message' => 'Form submitted successfully']);
    }
}
