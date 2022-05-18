<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function trustee(){
        return view('admin.member.trustee.index');
    }

    public function addTrustee(){
        return view('admin.member.trustee.create');
    }
}
