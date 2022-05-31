<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Gallery;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    // Album
    public function album()
    {
        $data['albums'] = Album::with('photos')->latest()->get();
        return view('admin.gallery.album')->with($data);
    }

    public function createAlbum(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'album_name' => 'required|max:50',
            ],
            [
                'album_name.required' => 'Please enter album name',
                'album_name.max' => 'Album name can not exceed 50 characters',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $create = Album::create([
            'album_title' => $request->album_name
        ]);

        if(!$create){
            return response()->json(["message" => "Something went wrong !", "status" => 422]);
        }
        return response()->json(["message" => "Album created successfully", "status" => 200]);
    }

    public function updateAlbum(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'album_id' => 'required',
                'edit_album_name' => 'required|max:50',
            ],
            [
                'album_id.required' => 'Album not found',
                'edit_album_name.required' => 'Please enter album name',
                'edit_album_name.max' => 'Album name can not exceed 50 characters',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $dec_id = Crypt::decrypt($request->album_id);
        $update = Album::find($dec_id)->update([
            'album_title' => $request->edit_album_name
        ]);

        if(!$update){
            return response()->json(["message" => "Something went wrong !", "status" => 422]);
        }

        return response()->json(["message" => "Album updated successfully", "status" => 200]);
    }

    public function deleteAlbum(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $album = Album::find($dec_id);
        $deleted = $album->delete();
        if (!$deleted) {
            return response()->json(["message" => "Something went wrong !", "status" => 422]);
        }
        return response()->json(["message" => "Album deleted successfully", "status" => 200]);
    }

    public function changeAlbumStatus(Request $request){
        $dec_id = Crypt::decrypt($request->album_id);
        $album = Album::find($dec_id);
        $album->status = $request->active;
        $album->save();
        return response()->json(['message' => 'Success', 'status' => 200]); 
    }

    // Photos
    public function photos(Request $request, $id)
    {
        $dec_id = Crypt::decrypt($id);
        $data['images'] = Gallery::where('album_id', $dec_id)->latest()->paginate(15);
        $data['album'] = Album::find($dec_id);
        return view('admin.gallery.photos')->with($data);
    }

    public function upload(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'album_id' => 'required',
                'attachment.*' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'attachment' => 'max:10'
            ],
            [
                'album_id.required' => 'Album not found',
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

        $dec_id = Crypt::decrypt($request->album_id);

        if ($request->hasFile('attachment')) {
            foreach ($request->attachment as $key => $value) {
                $new_name = date('d-m-Y-H-i-s') . '_' . $value->getClientOriginalName();
                $value->move(public_path('uploads/gallery/'), $new_name);
                $file = 'uploads/gallery/' . $new_name;

                $doc['image'] = $file;
                $doc['album_id'] = $dec_id;
                $doc['status'] = 1;
                $doc['created_at'] = date('Y-m-d H:i:s');
                $doc['updated_at'] = date('Y-m-d H:i:s');
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

    // Videos
    public function video()
    {
        $data['videos'] = Video::where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
        return view('admin.gallery.video')->with($data);
    }

    public function addVideo(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'video_id' => 'required|max:255',
            ],
            [
                'video_id.required' => 'Please enter youtube Video ID',
                'video_id.max' => 'Video ID can not exceed 255 characters',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $create = Video::create([
            'video_id' => $request->video_id
        ]);

        if (!$create) {
            return response()->json(["message" => "Something went wrong!", "status" => 422]);
        }
        return response()->json(["message" => "Video added successfully", "status" => 200]);
    }

    public function updateVideo(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'link_id' => 'required',
                'edit_video_id' => 'required|max:255',
            ],
            [
                'link_id.required' => 'Video not found',
                'edit_video_id.required' => 'Please enter youtube Video ID',
                'edit_video_id.max' => 'Video ID can not exceed 255 characters',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $dec_id = Crypt::decrypt($request->link_id);
        $update = Video::find($dec_id)->update([
            'video_id' => $request->edit_video_id
        ]);

        if (!$update) {
            return response()->json(["message" => "Something went wrong!", "status" => 422]);
        }
        return response()->json(["message" => "Video updated successfully", "status" => 200]);
    }

    public function deleteVideo(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $video = Video::find($dec_id);
        $delete = $video->delete();
        if (!$delete) {
            return response()->json(["message" => "Something went wrong !", "status" => 400]);
        }
        return response()->json(["message" => "Video deleted successfully", "status" => 200]);
    }
}
