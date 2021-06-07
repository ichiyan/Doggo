
{{-- This is for editing the email sent for PCCI Verification --}}

@component('mail::message')
    Hello **{{$name}}**,  {{-- use double space for line break --}}
    Thank you for registering as PCCI member in Doggo. 

    Click below to verify your account.

@component('mail::button', ['url' => $link])
    Verify Account
@endcomponent
Sincerely,  
Doggo team.
@endcomponent