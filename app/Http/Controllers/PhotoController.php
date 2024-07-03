<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        // Mengambil data URL dari input form
        $dataURL = $request->input('photo');

        // Mendekode data URL
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataURL));

        // Membuat nama file yang unik
        $filename = 'photo_' . time() . '.png';

        // Menyimpan file ke penyimpanan (storage)
        Storage::put('public/photos/' . $filename, $data);

        // Menyimpan jalur file ke database
        $photo = new Photo;
        $photo->path = 'photos/' . $filename;
        $photo->save();

        // Redirect kembali ke halaman /camera dengan pesan sukses
        return redirect('/camera')->with('success', 'Photo saved successfully!');
    }

    public function index()
    {
        return view('photos.index');
    }

    // public function getPhotos()
    // {
    //     $photos = Photo::all();
    //     return DataTables::of($photos)
    //         ->addColumn('image', function($photo){
    //             return '<img src="'.asset('storage/' . $photo->path).'" alt="Photo" class="w-20 h-20 rounded">';
    //         })
    //         ->rawColumns(['image'])
    //         ->make(true);
    // }
}