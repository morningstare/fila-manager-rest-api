<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResoure;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = $photo->store('photos', 'public');

            // ذخیره عکس در دیتابیس یا انجام عملیات دلخواه

            $name = str_replace('photos/', '', $path);
            $createdPhoto = Photo::create([
                'name' => $name,
                'path' => $path,
                'size' => $photo->getSize(),
            ]);

            return new PhotoResoure($createdPhoto);
        }

        return response()->json(['message' => 'No photo uploaded'], 400);
    }

    public function index()
    {
        $photos = Photo::all();

        return response()->json($photos);
    }

}
