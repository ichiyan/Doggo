@extends('layouts.app')

@section('content')
<div class="container">
    @livewire('inbox', ['users' => $users, 'messages' => $messages ?? null]) {{-- procceeds to livewire/inbox.blade with/without messages --}}
</div>
@endsection
