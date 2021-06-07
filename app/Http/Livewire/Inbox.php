<?php

namespace App\Http\Livewire;

use \App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads; 

class Inbox extends Component
{
    use WithFileUploads;

    public $message = '';
    public $users;
    public $clicked_user;
    public $messages;
    public $file;

    public function render()
    {
        return view('livewire.inbox', [
            'users' => $this->users,
        ]);
    }

    public function mount() {
        $this->messages = \App\Models\Message::where('user_id', $this->clicked_user)
                                            ->orWhere('receiver', $this->clicked_user)
                                            ->orderBy('id', 'DESC')
                                            ->get();

        
    }

    public function SendMessage() {
        $new_message = new \App\Models\Message();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();

            $this->user_id = $this->clicked_user->id;
        
        $new_message->receiver = $this->user_id;

        // Deal with the file if uploaded
        if ($this->file) {
            $file = $this->file->store('storage/files');
            $path = url(Storage::url($file));
            $new_message->file = $path;
            $new_message->file_name = $this->file->getClientOriginalName();
        }
        $new_message->save();

        // Clear the message after it's sent
        $this->reset(['message']);
        $this->file = '';
    }

    public function getUser($user_id) 
    {
        $this->clicked_user = User::find($user_id);
        $this->messages = \App\Models\Message::where('user_id', $user_id)->get();
    }

    public function resetFile() 
    {
        $this->reset('file');
    }

}
