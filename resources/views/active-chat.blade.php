@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            @livewire('active-chat', ['users' => $users, 'messages' => $messages, 'sender' => $sender]){{-- procceeds to livewire/active-chat.blade with/without messages --}}
        </div>
    </div>
@endsection
