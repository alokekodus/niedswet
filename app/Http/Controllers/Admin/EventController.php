<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    //
    public function index()
    {
        $data['events'] = Event::where('status', 1)->orderBy('event_date', 'DESC')->get();
        return view('admin.event.index')->with($data);
    }

    public function add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'event_title' => 'required|max:255',
                'event_date' => 'required|date',
                'attachment' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ],
            [
                'event_title.required' => 'Event title can not be null',
                'event_title.max' => 'Event title can not exceed 255 characters',
                'event_date.required' => 'Event date can not be null',
                'attachment.required' => 'Please upload an image',
                'attachment.image' => 'Upload only image file',
                'attachment.mimes' => 'Image accepts only jpg and png file',
                'attachment.max' => 'Image max size 1MB',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $document = $request->attachment;
        if ($request->hasFile('attachment')) {
            $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
            $document->move(public_path('uploads/events/'), $new_name);
            $file = 'uploads/events/' . $new_name;
        } else {
            return response()->json(["message" => "Image not found", "status" => 422]);
        }
        $create = Event::create([
            'title' => $request->event_title,
            'event_date' => $request->event_date,
            'image' => $file,
        ]);

        if (!$create) {
            return response()->json(["message" => "Something went wrong!", "status" => 400]);
        }
        return response()->json(["message" => "Event added successfully", "status" => 200]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'edit_event_title' => 'required|max:255',
                'edit_event_date' => 'required|date',
                'attachment' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ],
            [
                'edit_event_title.required' => 'Event title can not be null',
                'edit_event_title.max' => 'Event title can not exceed 255 characters',
                'edit_event_date.required' => 'Event date can not be null',
                'attachment.required' => 'Please upload an image',
                'attachment.image' => 'Upload only image file',
                'attachment.mimes' => 'Image accepts only jpg and png file',
                'attachment.max' => 'Image max size 1MB',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }
        return response()->json(["message" => "Event updated successfully", "status" => 200]);
    }

    public function delete(Request $request)
    {
        $dec_id = Crypt::decrypt($request->id);
        $data = Event::find($dec_id);
        $deleted = $data->delete();
        if (!$deleted) {
            return response()->json(["message" => "Something went wrong !", "status" => 422]);
        }
        $old_image = $data->image;
        File::delete($old_image);
        return response()->json(["message" => "Event deleted successfully", "status" => 200]);
    }
}
