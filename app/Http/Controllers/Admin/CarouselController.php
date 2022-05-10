<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    //
    public function index(){
        return view('admin.carousel.index');
    }
    
    public function upload(){
        return response()->json(["message" => "Successfully Uploaded", "status" => 200]);
    }

    public function update(){
        return response()->json(["message" => "Successfully Updated", "status" => 200]);
    }

    public function delete(){
        return response()->json(["message" => "Successfully Deleted", "status" => 200]);
    }
}
