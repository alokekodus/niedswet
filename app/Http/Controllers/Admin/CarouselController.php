<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CarouselController extends Controller
{
    //
    public function index()
    {
        $data['images'] = Carousel::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('admin.carousel.index')->with($data);
    }

    public function upload(Request $request)
    {
        $document = $request->attachment;
        if ($request->hasFile('attachment')) {
            $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
            $document->move(public_path('uploads/carousel/'), $new_name);
            $file = 'uploads/carousel/' . $new_name;
        } else {
            return response()->json(["message" => "No image found", "status" => 400]);
        }

        $create = Carousel::create([
            'image' => $file
        ]);

        if (!$create) {
            return response()->json(["message" => "Something went wrong !", "status" => 400]);
        }
        return response()->json(["message" => "Successfully Uploaded", "status" => 200]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'image_id' => 'required'
            ],
            [
                'image_id.required' => 'Image ID not found'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $document = $request->attachment;
        if ($request->hasFile('attachment')) {
            $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
            $document->move(public_path('uploads/carousel/'), $new_name);
            $file = 'uploads/carousel/' . $new_name;
        } else {
            return response()->json(["message" => "No image found", "status" => 400]);
        }
        $dec_id = Crypt::decrypt($request->image_id);
        $get_image = Carousel::find($dec_id);

        // Delete the previous image file from storage
        $old_image = $get_image->image;
        File::delete($old_image);

        // Update new image
        $update = Carousel::find($dec_id)->update([
            'image' => $file
        ]);


        if (!$update) {
            return response()->json(["message" => "Something went wrong !", "status" => 400]);
        }
        return response()->json(["message" => "Successfully Updated", "status" => 200]);
    }

    public function delete(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $image = Carousel::find($dec_id);
        $deleted = $image->delete();
        if (!$deleted) {
            return response()->json(["message" => "Something went wrong !", "status" => 400]);
        }
        $old_image = $image->image;
        File::delete($old_image);
        return response()->json(["message" => "Image deleted successfully", "status" => 200]);
    }
}
