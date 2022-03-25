<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('web.index');
    }

    public function contactForm(Request $request){
        return response()->json(['status'=>'success', 'result'=>1, 'message'=>'Form submitted successfully']);
    }
}
