<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use \App\Models\Message;

class InboxController extends Controller
{

    public function index() {

        $users = User::where('id', '!=',auth()->user()->id)->orderBy('id', 'DESC')->get();
        $messages = Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();

        return view('inbox', [
            'users' => $users,
            'messages' => $messages ?? null
        ]);
    }

    public function show($id) {


        $sender = User::findOrFail($id);

        $users = User::with(['message' => function($query) {
            return $query->orderBy('created_at', 'DESC');
        }])->where('id', '!=',auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->get();

        $messages = Message::where('user_id', $sender)->orWhere('receiver', $sender)->orderBy('id', 'DESC')->get();

        return view('active-chat', [
            'users' => $users,
            'messages' => $messages,
            'sender' => $sender,
        ]);
    }

}
