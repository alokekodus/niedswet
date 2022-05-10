<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(Request $request){
        return view('admin.blog.index');
    }

    public function create(Request $request){
        return view('admin.blog.create');
    }

    public function edit(Request $request, $id){
        return view('admin.blog.edit');
    }

    public function delete(Request $request)
    {
        return response()->json(["message" => "Blog deleted successfully", "status" => 200]);
    }
}
