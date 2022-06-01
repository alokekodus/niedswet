<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    //
    public function submitNewsletter(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'newsletterEmail' => 'required|email',
            ],
            [
                'newsletterEmail.required' => 'Please enter your email',
                'newsletterEmail.email' => 'Please enter valid email',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }
        return response()->json(["message" => "Subscribed successfully"], 200);
    }
}
