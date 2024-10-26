<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class MainpageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $centers = Center::all();
        $groups  = Center::select('group_number')->get();
        
        return view('layouts.MainLayout',compact('centers','groups'));
    }
}
