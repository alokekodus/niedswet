<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    //
    public function index()
    {
        $data['testimonials'] = Testimonial::orderBy('created_at', 'DESC')->get();
        return view('admin.testimonial.index')->with($data);
    }

    public function add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'profilePic' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'message' => 'required',
            ],
            [
                'name.required' => 'Name can not be null',
                'name.max' => 'Name can not exceed 255 characters',
                'profilePic.required' => 'Please upload profile image',
                'profilePic.image' => 'Upload only image file',
                'profilePic.mimes' => 'Profile image accepts only jpg and png image',
                'profilePic.max' => 'Profile image max file size 1MB',
                'message.required' => 'Message cannot be null',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $document = $request->profilePic;
        if ($request->hasFile('profilePic')) {
            $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
            $document->move(public_path('uploads/testimonial/'), $new_name);
            $file = 'uploads/testimonial/' . $new_name;
        } else {
            return response()->json(["message" => "Image not found", "status" => 422]);
        }
        $create = Testimonial::create([
            'name' => $request->name,
            'image' => $file,
            'message' => $request->message,
        ]);

        if (!$create) {
            return response()->json(["message" => "Something went wrong!", "status" => 400]);
        }
        return response()->json(["message" => "Testimonial added successfully", "status" => 200]);
    }

    public function getData(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $get_data = Testimonial::find($dec_id);
        if (!$get_data) {
            return response()->json(["message" => "Data not found", "status" => 422]);
        }
        return response()->json(["message" => "Update successful", "name" => $get_data->name, "image" => $get_data->image, "details" => $get_data->message, "id" => Crypt::encrypt($get_data->id), "status" => 200]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'edit_name' => 'required|max:255',
                'profilePic' => 'image|mimes:jpeg,png,jpg|max:1024',
                'edit_message' => 'required',
            ],
            [
                'edit_name.required' => 'Name can not be null',
                'edit_name.max' => 'Name can not exceed 255 characters',
                'profilePic.image' => 'Upload only image file',
                'profilePic.mimes' => 'Profile image accepts only jpg and png image',
                'profilePic.max' => 'Profile image max file size 1MB',
                'edit_message.required' => 'Message cannot be null',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $dec_id = Crypt::decrypt($request->testimonial_id);
        $getData = Testimonial::find($dec_id);

        $document = $request->profilePic;
        if ($request->hasFile('profilePic')) {
            $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
            $document->move(public_path('uploads/testimonial/'), $new_name);
            $file = 'uploads/testimonial/' . $new_name;
            // Delete old image
            $old_image = $getData->image;
            File::delete($old_image);

            $getData->image = $file;
        }

        $getData->name = $request->edit_name;
        $getData->message = $request->edit_message;
        $update = $getData->save();

        if (!$update) {
            return response()->json(["message" => "Something went wrong!", "status" => 400]);
        }
        return response()->json(["message" => "Testimonial updated successfully", "status" => 200]);
    }

    public function delete(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $data = Testimonial::find($dec_id);
        $deleted = $data->delete();
        if (!$deleted) {
            return response()->json(["message" => "Something went wrong !", "status" => 422]);
        }
        $old_image = $data->image;
        File::delete($old_image);
        return response()->json(["message" => "Testimonial deleted successfully", "status" => 200]);
    }
}
