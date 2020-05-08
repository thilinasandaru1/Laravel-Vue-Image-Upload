<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('image'))
        {
            $request->image->store('public');
        }
    }
}
