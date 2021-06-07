<div>
    <div class="row justify-content-center" wire:poll="mount">


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(isset($clicked_user)) {{ $clicked_user->name }}
                        Select a user to see the chat
                        <i class="fa fa-circle text-success"></i> Chat online
                    @else
                        Messages
                    @endif
                </div>
                    <div class="card-body message-box">
                        @if(!$messages)
                            No messages to show
                        @else
                            @if(isset($messages))
                                @foreach($messages as $message)
                                    <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
                                        <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>
                                        <p class="my-0">{{ $message->message }}</p>
                                        @if (isPhoto($message->file)) {{--To edit out the functions go to app/helpers.php--}}
                                            <div class="w-100 my-2">
                                                <img class="img-fluid rounded" loading="lazy" style="height: 250px" src="{{ $message->file }}">
                                            </div>
                                        @elseif (isVideo($message->file))
                                            <div class="w-100 my-2">
                                                <video style="height: 250px" class="img-fluid rounded" controls>
                                                    <source src="{{ $message->file }}">
                                                </video>
                                            </div>
                                        @elseif ($message->file)
                                            <div class="w-100 my-2">
                                                <a href="{{ $message->file}}" class="bg-light p-2 rounded-pill" target="_blank"><i class="fa fa-download"></i>
                                                    {{ $message->file_name }}
                                                </a>
                                            </div>
                                        @endif
                                        <small class="text-muted w-100">Sent <em>{{ $message->created_at }}</em></small>
                                    </div>
                                @endforeach
                            @else
                                No messages to show
                            @endif

                            Click on a user to see the messages

                        @endif
                    </div>

            </div>
        </div>

        <div class="col-md-4" wire:init> {{-- Users Section --}}
            <div class="card ">
                <div class="card-header ">
                    Inbox
                </div>
                <div class="card-body chatbox p-0">
                    <ul class="list-group list-group-flush" wire:poll="render">
                        @foreach($users as $user)
                            @php
                                $not_seen = \App\Models\Message::where('user_id', $user->id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null
                            @endphp
                            <a href="{{ route('inbox.show', $user->id) }}" class="text-dark link">
                                <li class="list-group-item" wire:click="getUser({{ $user->id }})" id="user_{{ $user->id }}">
                                    <img class="img-fluid avatar" src="https://img.icons8.com/cotton/2x/gender-neutral-user--v2.png">
                                    @if($user->is_online)
                                        <i class="fa fa-circle text-success online-icon"></i>
                                    @endif
                                    {{ $user->name }}

                                    @if(filled($not_seen))
                                        <div class="badge badge-success rounded">{{ $not_seen->count() }}</div>
                                    @endif
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
