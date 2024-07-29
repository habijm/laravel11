<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Livewire Blog';
        return view('livewireblog', compact('title'));
    }
}
