<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //
    public function submitNewsletter(Request $request){
        return response()->json(["message" => "Subscribed successfully", "status" => 200]);
    }
}
