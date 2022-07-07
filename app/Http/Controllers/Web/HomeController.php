<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Carousel;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Member;
use App\Models\OurWork;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['carousel'] = Carousel::where('status', 1)->orderBy('created_at', 'DESC')->limit(5)->get();
        $data['events'] = Event::where('status', 1)->orderBy('event_date', 'ASC')->limit(3)->get();
        $data['blogs'] = Blog::where('status', 1)->whereHas('Category', function ($q) {
            $q->where('status', 1);
        })->orderBy('created_at', 'DESC')->limit(3)->get();
        $data['images'] = Gallery::where('status', 1)->whereHas('album', function ($q) {
            $q->where('status', 1);
        })->orderBy('created_at', 'DESC')->limit(6)->get();
        $data['videos'] = Video::where('status', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
        $data['testimonials'] = Testimonial::where('status', 1)->orderBy('created_at', 'DESC')->limit(6)->get();
        $data['works'] = OurWork::where('status', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
        return view('web.index')->with($data);
    }

    public function aboutUs()
    {
        return view('web.about.index');
    }

    public function ourWork($id = null)
    {
        if (!$id) {
            $data['works'] = OurWork::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
            return view('web.ourWork.index')->with($data);
        } else {
            $dec_id = Crypt::decrypt($id);
            $data['work'] = OurWork::find($dec_id);
            return view('web.ourWork.details')->with($data);
        }
    }

    public function ourTeam()
    {
        $data['trustees'] = Member::where('category', 'Trustee')->get();
        $data['advisors'] = Member::where('category', 'Advisor')->get();
        $data['ca'] = Member::where('category', 'CA')->get();
        $data['pastMembers'] = Member::where('category', 'PastMember')->get();
        return view('web.about.ourTeam')->with($data);
    }

    public function getMemberDetails(Request $request)
    {
        $dec_id = Crypt::decrypt($request->member_id);
        $details = Member::find($dec_id);
        if (!$details) {
            return response()->json(['message' => 'error', 'status' => 422]);
        }
        $data = [
            'name' => $details->name,
            'image' => $details->image,
            'designation' => $details->designation,
            'fb_link' => $details->fb_link,
            'tw_link' => $details->tw_link,
            'linkedin_link' => $details->linkedin_link,
            'bio' => $details->bio,
        ];

        return response()->json(['message' => 'success', 'member' => $data, 'status' => 200]);
    }

    public function events()
    {
        $now = Carbon::now();
        $data['upcoming_events'] = Event::where('event_date', '>=', $now)->orderBy('event_date', 'ASC')->get();
        $data['past_events'] = Event::where('event_date', '<', $now)->orderBy('created_at', 'DESC')->paginate(12);
        return view('web.events.index')->with($data);
    }

    public function albums(Request $request, $id = null)
    {
        if (!$id) {
            $data['albums'] = Album::where('status', 1)->has('photos')->with('photos')->get();
            return view('web.gallery.albums')->with($data);
        } else {
            $dec_id = Crypt::decrypt($id);
            $data['images'] = Gallery::where(['status' => 1, 'album_id' => $dec_id])->orderBy('created_at', 'DESC')->paginate(15);
            $data['album'] = Album::find($dec_id);
            if($data['album']->status != 1){
                return redirect()->route('site.gallery.album');
            }
            return view('web.gallery.images')->with($data);
        }
    }

    public function galleryImage()
    {
        $data['images'] = Gallery::where('status', 1)->orderBy('created_at', 'DESC')->paginate(15);
        return view('web.gallery.images')->with($data);
    }

    public function galleryVideos()
    {
        $data['videos'] = Video::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
        return view('web.gallery.videos')->with($data);
    }

    public function blogs($id = null)
    {
        if (!$id) {
            $data['blogs'] = Blog::where('status', 1)->whereHas('Category', function ($q) {
                $q->where('status', 1);
            })->paginate(9);
            return view('web.blogs.index')->with($data);
        } else {
            $dec_id = Crypt::decrypt($id);
            $data['blog'] = Blog::find($dec_id);
            $data['categories'] = BlogCategory::where('status', 1)->whereHas('Blogs')->get();
            return view('web.blogs.blogDetails')->with($data);
        }
    }

    public function contactForm(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'fname' => 'required|max:255',
                'lname' => 'required|max:255',
                'phone' => 'required|numeric|digits:10',
                'email' => 'required|email',
                'message' => 'required',
            ],
            [
                'fname.required' => 'Please enter your first name',
                'fname.max' => 'First name can not exceed 255 characters',
                'lname.required' => 'Please enter your last name',
                'lname.max' => 'Last name can not exceed 255 characters',
                'phone.required' => 'Please enter your phone number',
                'phone.numeric' => 'Please enter valid phone number',
                'phone.digits' => 'Please enter 10 digit phone number',
                'email.required' => 'Please enter your email',
                'email.email' => 'Please enter valid email',
                'message.required' => 'Please enter your message',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $details = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to(env('MAIL_TO'))->send(new \App\Mail\ContactMail($details));
        if (Mail::failures()) {
            return response()->json(["message" => "Mail not sent!", "status" => 400]);
        } else {
            return response()->json(["message" => "Message sent successfully.", "status" => 200]);
        }
    }

    public function privacy()
    {
        return view('web.documents.privacy');
    }

    public function terms()
    {
        return view('web.documents.terms');
    }
}
