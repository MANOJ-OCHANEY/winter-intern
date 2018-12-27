<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function red(Request $request){
        $request->session()->forget('blue');
        session(['red' => true]);
        return redirect()->back()->with('success','Theme Changed Successfully');
    }

    public function blue(Request $request){
        $request->session()->forget('red');
        session(['blue' => true]);
        return redirect()->back()->with('success','Theme Changed Successfully');
    }
}
