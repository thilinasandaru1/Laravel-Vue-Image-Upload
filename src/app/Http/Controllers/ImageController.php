<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    public function upload(ImageRequest $request)
    {
        if($request->hasFile('image'))
        {
            $imagename = $request->image->getClientOriginalName();
            $request->image->storeAs('public', $imagename);
        }

        $request->user()->avatar = $imagename;
        $request->user()->save();
        return back();
    }

    public function saveImage(ImageRequest $request)
    {
        if($request->hasFile('image'))
        {
            $imagename = $request->image->getClientOriginalName();
            $request->image->storeAs('public', $imagename);
            $request->user()->update(['avatar' => $imagename]);
            return response(null, 202);
        }

    }
}
