<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{

    public $search = '';
    public function render()
    {
        return view(
            'livewire.blog',
            [
                'posts' => Post::where('title', 'like', '%'.$this->search. '%')->paginate(10)
            ]
        );
    }
}
