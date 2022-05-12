<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $data['images'] = Gallery::where('status', 1)->orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.gallery.index')->with($data);
    }

    public function upload(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'attachment.*' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'attachment' => 'max:10'
            ],
            [
                'attachment.*.required' => 'Image not found',
                'attachment.*.image' => 'Upload only image',
                'attachment.*.mimes' => 'Upload only jpg or png image',
                'attachment.*.max' => 'Image size should be less than 1MB',
                'attachment.max' => 'Only 10 images are allowed',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }
        
        if ($request->hasFile('attachment')) {
            foreach ($request->attachment as $key => $value) {
                $new_name = date('d-m-Y-H-i-s') . '_' . $value->getClientOriginalName();
                $value->move(public_path('uploads/gallery/'), $new_name);
                $file = 'uploads/gallery/' . $new_name;

                $doc['image'] = $file;
                $doc['status'] = 1;
                $insertPic[] = $doc;
            }
        } else {
            return response()->json(["message" => "No image found", "status" => 400]);
        }

        $upload = Gallery::insert($insertPic);
        if (!$upload) {
            return response()->json(["message" => "Something went wrong!", "status" => 422]);
        }
        return response()->json(["message" => "Images upload successfully", "status" => 200]);
    }

    public function delete(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $image = Gallery::find($dec_id);
        $deleted = $image->delete();
        if (!$deleted) {
            return response()->json(["message" => "Something went wrong !", "status" => 422]);
        }
        $old_image = $image->image;
        File::delete($old_image);
        return response()->json(["message" => "Image deleted successfully", "status" => 200]);
    }
}
