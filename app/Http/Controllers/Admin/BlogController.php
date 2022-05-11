<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //
    public function index(Request $request)
    {
        $data['blogs'] = Blog::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.index')->with($data);
    }

    public function create(Request $request)
    {
        $data['category'] = BlogCategory::where('status', 1)->get();
        return view('admin.blog.create')->with($data);
    }

    public function post(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'blog_title' => 'required|max:255',
                'blog_category' => 'required|max:255',
                'blogImage' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'blogDescription' => 'required',
            ],
            [
                'blog_title.required' => 'Blog title is a required field',
                'blog_category.required' => 'Select blog category',
                'blogImage.required' => 'Please upload an featured image',
                'blogImage.image' => 'Upload only image',
                'blogImage.mimes' => 'Accepts only jpg and png image',
                'blogImage.max' => 'Max file size 1MB',
                'blogDescription.required' => 'Blog description is a required field',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $document = $request->blogImage;
        if ($request->hasFile('blogImage')) {
            $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
            $document->move(public_path('uploads/blog/'), $new_name);
            $file = 'uploads/blog/' . $new_name;
        } else {
            return response()->json(["message" => "Image ot found", "status" => 422]);
        }
        $create = Blog::create([
            'title' => $request->blog_title,
            'category_id' => $request->blog_category,
            'image' => $file,
            'description' => $request->blogDescription,
        ]);

        if (!$create) {
            return response()->json(["message" => "Something went wrong!", "status" => 400]);
        }
        return response()->json(["message" => "Blog posted successfully", "status" => 200]);
    }

    public function edit(Request $request, $id)
    {
        $data['category'] = BlogCategory::where('status', 1)->get();
        return view('admin.blog.edit')->with($data);
    }

    public function delete(Request $request)
    {
        return response()->json(["message" => "Blog deleted successfully", "status" => 200]);
    }
}
