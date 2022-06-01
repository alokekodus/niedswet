<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OurWorkController extends Controller
{
    //
    public function index()
    {
        $data['works'] = OurWork::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
        return view('admin.ourWork.index')->with($data);
    }

    public function create()
    {
        return view('admin.ourWork.create');
    }

    public function post(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'work_title' => 'required|max:100',
                'workImage' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'workDescription' => 'required',
            ],
            [
                'work_title.required' => 'Work tile is a required field',
                'work_title.max' => 'Work tile can not exceed 100 characters',
                'workImage.required' => 'Please upload an featured image',
                'workImage.image' => 'Upload only image',
                'workImage.mimes' => 'Accepts only jpg and png image',
                'workImage.max' => 'Max file size 1MB',
                'workDescription.required' => 'Blog description is a required field',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $document = $request->workImage;
        if ($request->hasFile('workImage')) {
            $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
            $document->move(public_path('uploads/ourwork/'), $new_name);
            $file = 'uploads/ourwork/' . $new_name;
        } else {
            return response()->json(["message" => "Image not found", "status" => 422]);
        }

        $create = OurWork::create([
            'work_title' => $request->work_title,
            'image' => $file,
            'work_details' => $request->workDescription,
        ]);

        if (!$create) {
            return response()->json(["message" => "Something went wrong!", "status" => 422]);
        }
        return response()->json(["message" => "Work added successfully", "status" => 200]);
    }

    public function edit(Request $request, $id)
    {
        $dec_id = Crypt::decrypt($id);
        $data['work'] = OurWork::find($dec_id);
        return view('admin.ourWork.edit')->with($data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'work_title' => 'required|max:100',
                'workImage' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'workDescription' => 'required',
            ],
            [
                'work_title.required' => 'Work tile is a required field',
                'work_title.max' => 'Work tile can not exceed 100 characters',
                'workImage.required' => 'Please upload an featured image',
                'workImage.image' => 'Upload only image',
                'workImage.mimes' => 'Accepts only jpg and png image',
                'workImage.max' => 'Max file size 1MB',
                'workDescription.required' => 'Blog description is a required field',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $dec_id = Crypt::decrypt($request->work_id);
        $workImage = $request->workImage;
        $work = OurWork::find($dec_id);

        if (!$work) {
            return response()->json(['message' => "Data not found", 'status' => 422]);
        }

        if ($workImage->getClientOriginalName() == 'blob') {
            $work->work_title = $request->work_title;
            $work->work_details = $request->workDescription;
        } else {
            if (isset($workImage) && !empty($workImage)) {
                $new_name = date('d-m-Y-H-i-s') . '_' . $workImage->getClientOriginalName();
                $workImage->move(public_path('uploads/ourwork/'), $new_name);
                $file = 'uploads/ourwork/' . $new_name;

                // Delete old image
                $old_image = $work->image;
                File::delete($old_image);
            } else {
                return response()->json(['message' => 'Image not found', 'status' => 422]);
            }
            $work->image = $file;
        }
        $update = $work->save();
        if (!$update) {
            return response()->json(["message" => "Something went wrong!", "status" => 422]);
        }

        return response()->json(["message" => "Work updated successfully", "status" => 200]);
    }

    public function delete(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $blog = OurWork::find($dec_id);
        $delete = $blog->delete();
        if (!$delete) {
            return response()->json(["message" => "Something went wrong !", "status" => 400]);
        }
        $old_image = $blog->image;
        File::delete($old_image);
        return response()->json(["message" => "Work deleted successfully", "status" => 200]);
    }
}
