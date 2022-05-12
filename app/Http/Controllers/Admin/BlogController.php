<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //
    public function index(Request $request)
    {
        $data['blogs'] = Blog::with('Category')->orderBy('created_at', 'DESC')->paginate(9);
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
            return response()->json(["message" => "Image not found", "status" => 422]);
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
        $dec_id = Crypt::decrypt($id);
        $data['blog'] = Blog::find($dec_id);
        $data['category'] = BlogCategory::where('status', 1)->get();
        return view('admin.blog.edit')->with($data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'blog_id' => 'required',
                'blog_title' => 'required|max:255',
                'blog_category' => 'required|max:255',
                'blogImage' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'blogDescription' => 'required',
            ],
            [
                'blog_id.required' => 'Blog ID not found',
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

        $blogId = Crypt::decrypt($request->blog_id);
        $blogImage = $request->blogImage;
        $blogDetails = Blog::find($blogId);

        if (!$blogDetails) {
            return response()->json(['message' => "Blog not found", 'status' => 422]);
        }

        if ($blogImage->getClientOriginalName() == 'blob') {
            $blogDetails->title = $request->blog_title;
            $blogDetails->category_id = $request->blog_category;
            $blogDetails->description = $request->blogDescription;
        } else {
            if (isset($blogImage) && !empty($blogImage)) {
                $new_name = date('d-m-Y-H-i-s') . '_' . $blogImage->getClientOriginalName();
                $blogImage->move(public_path('uploads/blog/'), $new_name);
                $file = 'uploads/blog/' . $new_name;

                // Delete old image
                $old_image = $blogDetails->image;
                File::delete($old_image);
            } else {
                return response()->json(['message' => 'Image not found', 'status' => 422]);
            }
            $blogDetails->image = $file;
        }
        $update = $blogDetails->save();
        if (!$update) {
            return response()->json(["message" => "Something went wrong!", "status" => 422]);
        }
        return response()->json(["message" => "Blog updated successfully", "status" => 200]);
    }

    public function delete(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $blog = Blog::find($dec_id);
        $delete = $blog->delete();
        if (!$delete) {
            return response()->json(["message" => "Something went wrong !", "status" => 400]);
        }
        $old_image = $blog->image;
        File::delete($old_image);
        return response()->json(["message" => "Blog deleted successfully", "status" => 200]);
    }
}
