<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('image'))
        {
            $imagename = $request->image->getClientOriginalName();
            $request->image->storeAs('public', $imagename);
        }
    }
}
