<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('get')){
            return view('admin.auth.login');
        }
        else{
            return redirect()->route('admin.index');
        }
    }

    public function logout(){
        return redirect()->route('site.home');
    }
}
