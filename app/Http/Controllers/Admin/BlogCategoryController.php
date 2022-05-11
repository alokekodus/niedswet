<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    //
    public function index(){
        $data['categories'] = BlogCategory::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.category.index')->with($data);
    }

    public function create(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'caegory_title' => 'required|max:255'
            ],
            [
                'caegory_title.required' => 'Category title is a required field',
                'caegory_title.max' => 'Category title can not be more than 255 cahracters',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $create = BlogCategory::create([
            'category' => $request->caegory_title
        ]);

        if(!$create){
            return response()->json(["message" => "Something went wrong!", "status" => 422]);
        }        
        return response()->json(["message" => "Category created successfully", "status" => 200]);
    }

    public function getCategory(Request $request){
        $dec_id = Crypt::decrypt($request->category_id);
        $get_data = BlogCategory::find($dec_id);
        if(!$get_data){
            return response()->json(["message" => "Category not found", "status" => 422]);
        }
        return response()->json(["message" => "Category created successfully", "name" => $get_data->category, "id" => Crypt::encrypt($get_data->id) , "status" => 200]);
    }

    public function update(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'edit_category_id' => 'required',
                'edit_caegory_title' => 'required|max:255'
            ],
            [
                'edit_category_id.required' => 'Category ID not found',
                'edit_caegory_title.required' => 'Category title is a required field',
                'edit_caegory_title.max' => 'Category title can not be more than 255 cahracters',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => 422]);
        }

        $dec_id = Crypt::decrypt($request->edit_category_id);
        $get_category = BlogCategory::find($dec_id);
        if(!$get_category){
            return response()->json(['message' => "Category not found", 'status' => 422]);
        }
        $update = $get_category->update([
            'category' => $request->edit_caegory_title
        ]);

        if(!$update){
            return response()->json(["message" => "Something went wrong!", "status" => 422]);
        }        
        return response()->json(["message" => "Category updated successfully", "status" => 200]);
    }

    public function changeStatus(Request $request)
    {
        $dec_id = Crypt::decrypt($request->category_id);
        $category = BlogCategory::find($dec_id);
        $category->status = $request->active;
        $category->save();
        return response()->json(['message' => 'Success', 'status' => 200]);
    }
}
