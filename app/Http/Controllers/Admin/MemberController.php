<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    //
    public function trustee()
    {
        $data['members'] = Member::where('category', 'Trustee')->paginate(15);
        return view('admin.member.trustee.index')->with($data);
    }

    public function advisor()
    {
        $data['members'] = Member::where('category', 'Advisor')->paginate(15);
        return view('admin.member.advisor.index')->with($data);
    }

    public function ca()
    {
        $data['members'] = Member::where('category', 'CA')->paginate(15);
        return view('admin.member.ca.index')->with($data);
    }

    public function pastTrustee()
    {
        $data['members'] = Member::where('category', 'pastMember')->paginate(15);
        return view('admin.member.pastMember.index')->with($data);
    }

    public function addMember(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.member.create');
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:50',
                    'profileImage' => 'image|mimes:jpeg,png,jpg|max:1024',
                    'category' => 'required|max:255',
                    'designation' => 'required|max:50',
                    'from_year' => 'integer|digits:4',
                    'to_year' => 'integer|digits:4',
                    'insta_link' => 'max:255',
                    'fb_link' => 'max:255',
                    'tw_link' => 'max:255',
                    'linkedin_link' => 'max:255',
                ],
                [
                    'name.required' => 'Member name can not be null',
                    'name.max' => 'Member name can not exceed 50 characters',
                    'profileImage.image' => 'Upload only image',
                    'profileImage.mimes' => 'Profile image accepts only jpg and png image',
                    'profileImage.max' => 'Profile image max file size 1MB',
                    'category.required' => 'Please select member category',
                    'category.max' => 'Member category can not exceed 255 characters',
                    'designation.required' => 'Designation can not be null',
                    'designation.max' => 'Designation can not exceed 50 characters',
                    'from_year.integer' => 'Please enter correct FROM(YEAR)',
                    'from_year.digits' => 'Please enter correct FROM(YEAR)',
                    'to_year.integer' => 'Please enter correct TO(YEAR)',
                    'to_year.digits' => 'Please enter correct TO(YEAR)',
                    'fb_link.max' => 'Facebook link can not exceed 255 characters',
                    'insta_link.max' => 'Instagram link can not exceed 255 characters',
                    'tw_link.max' => 'Twitter link can not exceed 255 characters',
                    'linkedin_link.max' => 'Linkedin link can not exceed 255 characters',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
            }

            $document = $request->profileImage;
            if ($request->hasFile('profileImage')) {
                $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
                $document->move(public_path('uploads/members/'), $new_name);
                $file = 'uploads/members/' . $new_name;
            } else {
                $file = '';
            }

            $create = Member::create([
                'name' => $request->name,
                'image' => $file,
                'category' => $request->category,
                'designation' => $request->designation,
                'from_year' => $request->from_year,
                'to_year' => $request->to_year,
                'fb_link' => $request->fb_link,
                'insta_link' => $request->insta_link,
                'tw_link' => $request->tw_link,
                'linkedin_link' => $request->linkedin_link,
                'bio' => $request->memberBio,
            ]);

            if (!$create) {
                return response()->json(['message' => 'Something went wrong!', 'status' => 422]);
            }
            return response()->json(['message' => 'Member added successfully', 'status' => 200]);
        }
    }

    public function editMember(Request $request, $category, $id)
    {
        $dec_id = Crypt::decrypt($id);
        $data['member'] = Member::find($dec_id);
        $data['category'] = $category;
        return view('admin.member.edit')->with($data);
    }

    public function updateMember(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:50',
                'profileImage' => 'image|mimes:jpeg,png,jpg|max:1024',
                'category' => 'required|max:255',
                'designation' => 'required|max:50',
                'from_year' => 'integer|digits:4',
                'to_year' => 'integer|digits:4',
                'fb_link' => 'max:255',
                'insta_link' => 'max:255',
                'tw_link' => 'max:255',
                'linkedin_link' => 'max:255',
            ],
            [
                'name.required' => 'Member name can not be null',
                'name.max' => 'Member name can not exceed 50 characters',
                'profileImage.image' => 'Upload only image',
                'profileImage.mimes' => 'Profile image accepts only jpg and png image',
                'profileImage.max' => 'Profile image max file size 1MB',
                'category.required' => 'Please select member category',
                'category.max' => 'Member category can not exceed 255 characters',
                'designation.required' => 'Designation can not be null',
                'designation.max' => 'Designation can not exceed 50 characters',
                'from_year.integer' => 'Please enter correct FROM(YEAR)',
                'from_year.digits' => 'Please enter correct FROM(YEAR)',
                'to_year.integer' => 'Please enter correct TO(YEAR)',
                'to_year.digits' => 'Please enter correct TO(YEAR)',
                'fb_link.max' => 'Facebook link can not exceed 255 characters',
                'insta_link.max' => 'Instagram link can not exceed 255 characters',
                'tw_link.max' => 'Twitter link can not exceed 255 characters',
                'linkedin_link.max' => 'Linkedin link can not exceed 255 characters',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $dec_id = Crypt::decrypt($request->member_id);
        $image = $request->profileImage;
        $details = Member::find($dec_id);

        if ($image == '') {
            $details->name = $request->name;
            $details->category = $request->category;
            $details->designation = $request->designation;
            $details->from_year = $request->from_year;
            $details->to_year = $request->to_year;
            $details->fb_link = $request->fb_link;
            $details->insta_link = $request->insta_link;
            $details->tw_link = $request->tw_link;
            $details->linkedin_link = $request->linkedin_link;
            $details->bio = $request->memberBio;
            $details->image = '';
        } else {
            if ($image->getClientOriginalName() == 'blob') {
                $details->name = $request->name;
                $details->category = $request->category;
                $details->designation = $request->designation;
                $details->fb_link = $request->fb_link;
                $details->insta_link = $request->insta_link;
                $details->tw_link = $request->tw_link;
                $details->linkedin_link = $request->linkedin_link;
                $details->bio = $request->memberBio;
            } else {
                if (isset($image) && !empty($image)) {
                    $new_name = date('d-m-Y-H-i-s') . '_' . $image->getClientOriginalName();
                    $image->move(public_path('uploads/members/'), $new_name);
                    $file = 'uploads/members/' . $new_name;

                    $details->name = $request->name;
                    $details->category = $request->category;
                    $details->designation = $request->designation;
                    $details->fb_link = $request->fb_link;
                    $details->insta_link = $request->insta_link;
                    $details->tw_link = $request->tw_link;
                    $details->linkedin_link = $request->linkedin_link;
                    $details->bio = $request->memberBio;

                    // Delete old image
                    $old_image = $details->image;
                    File::delete($old_image);
                    $details->image = $file;
                }
            }
        }

        $update = $details->save();
        if (!$update) {
            return response()->json(['message' => 'Something went wrong!', 'status' => 422]);
        }
        return response()->json(['message' => 'Member details updated successfully', 'status' => 200]);
    }

    public function deleteMember(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $member = Member::find($dec_id);
        $delete = $member->delete();
        if (!$delete) {
            return response()->json(["message" => "Something went wrong !", "status" => 400]);
        }
        $old_image = $member->image;
        File::delete($old_image);
        return response()->json(['message' => 'Member deleted successfully', 'status' => 200]);
    }

    public function view($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data['member'] = Member::find($dec_id);
        return view('admin.member.view')->with($data);
    }
}
