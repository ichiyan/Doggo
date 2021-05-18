<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListedPost extends Component
{
    // https://laravel-livewire.com/docs/2.x/rendering-components
    public $post;
    // for PostController2 and shopv4
    public function render()
    {
        return view('livewire.listed-post');
    }
}
