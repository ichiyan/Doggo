<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use stdClass;

class PostImage extends Component
{
    public $nthImage, $description, $image, $image_id, $created_at;
    public $ownerId;
    public $post;


    public function mount($postImg, $post)
    {
        $this->image = $postImg->image_location;
        $this->description = $postImg->description;
        $this->image_id = $postImg->id;
        $this->created_at = $postImg->created_at;
        $this->post = $post;
    }

    public function submitForm(Request $request) {
        $dbImage = Image::where('id', $this->image_id)->update(['description' => $this->description]);
    }

    public function canEdit() {
        if ($this->post != NULL)
            return $this->post->user_id == Auth::id();
        else
            return false;
    }

    public function render()
    {
        return view('livewire.post-image');
    }
}
