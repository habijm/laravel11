<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $dataURL = $request->input('photo');

        // Decode the data URL
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataURL));

        // Create a unique filename
        $filename = 'photo_' . time() . '.png';

        // Save the file to storage
        Storage::put('public/photos/' . $filename, $data);

        // Save the file path to the database
        $photo = new Photo;
        $photo->path = 'photos/' . $filename;
        $photo->save();

        return redirect('/camera')->with('success', 'Photo saved successfully!');
    }
}