<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurWorkController extends Controller
{
    //
    public function index()
    {
        return view('admin.ourWork.index');
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
                'work_title' => 'required|max:255',
                'workImage' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'workDescription' => 'required',
            ],
            [
                'work_title.required' => 'Work tile is a required field',
                'work_title.max' => 'Work tile can not exceed 255 characters',
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
        return response()->json(["message" => "Work added successfully", "status" => 200]);
    }

    public function edit(Request $request)
    {
        return view('admin.ourWork.edit');
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'work_title' => 'required|max:255',
                'workImage' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'workDescription' => 'required',
            ],
            [
                'work_title.required' => 'Work tile is a required field',
                'work_title.max' => 'Work tile can not exceed 255 characters',
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
        return response()->json(["message" => "Work updated successfully", "status" => 200]);
    }

    public function delete()
    {
        return response()->json(["message" => "Work deleted successfully", "status" => 200]);
    }
}
