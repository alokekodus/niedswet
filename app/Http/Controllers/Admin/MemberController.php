<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    //
    public function trustee()
    {
        return view('admin.member.trustee.index');
    }

    public function advisor()
    {
        return view('admin.member.advisor.index');
    }

    public function ca()
    {
        return view('admin.member.ca.index');
    }

    public function addMember(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.member.create');
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:255',
                    'profileImage' => 'image|mimes:jpeg,png,jpg|max:1024',
                    'category' => 'required|max:255',
                    'designation' => 'required|max:255',
                    'fb_link' => 'max:255',
                    'tw_link' => 'max:255',
                    'google_link' => 'max:255',
                    'memberBio' => 'required',
                ],
                [
                    'name.required' => 'Member name can not be null',
                    'name.max' => 'Member name can not exceed 255 characters',
                    'profileImage.image' => 'Upload only image',
                    'profileImage.mimes' => 'Profile image accepts only jpg and png image',
                    'profileImage.max' => 'Profile image max file size 1MB',
                    'category.required' => 'Please select member category',
                    'category.max' => 'Member category can not exceed 255 characters',
                    'designation.required' => 'Designation can not be null',
                    'designation.max' => 'Designation can not exceed 255 characters',
                    'fb_link.max' => 'Member name can not exceed 255 characters',
                    'tw_link.max' => 'Member name can not exceed 255 characters',
                    'google_link.max' => 'Member name can not exceed 255 characters',
                    'memberBio.required' => 'Member bio can not be null',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
            }

            return response()->json(['message' => 'Member added successfully', 'status' => 200]);
        }
    }

    public function editMember($category, $id)
    {
        $data['category'] = $category;
        return view('admin.member.edit')->with($data);
    }

    public function updateMember(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'profileImage' => 'image|mimes:jpeg,png,jpg|max:1024',
                'category' => 'required|max:255',
                'designation' => 'required|max:255',
                'fb_link' => 'max:255',
                'tw_link' => 'max:255',
                'google_link' => 'max:255',
                'memberBio' => 'required',
            ],
            [
                'name.required' => 'Member name can not be null',
                'name.max' => 'Member name can not exceed 255 characters',
                'profileImage.image' => 'Upload only image',
                'profileImage.mimes' => 'Profile image accepts only jpg and png image',
                'profileImage.max' => 'Profile image max file size 1MB',
                'category.required' => 'Please select member category',
                'category.max' => 'Member category can not exceed 255 characters',
                'designation.required' => 'Designation can not be null',
                'designation.max' => 'Designation can not exceed 255 characters',
                'fb_link.max' => 'Member name can not exceed 255 characters',
                'tw_link.max' => 'Member name can not exceed 255 characters',
                'google_link.max' => 'Member name can not exceed 255 characters',
                'memberBio.required' => 'Member bio can not be null',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        return response()->json(['message' => 'Member details updated successfully', 'status' => 200]);
    }

    public function deleteMember()
    {
        return response()->json(['message' => 'Member deleted successfully', 'status' => 200]);
    }
}
