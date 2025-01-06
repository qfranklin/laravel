@component('mail::message')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('storage/images/profile.png') }}" class="logo" alt="{{ config('app.name') }} Logo">
@endcomponent
@endslot

# Reset Password

Click the button below to reset your password.

@component('mail::button', ['url' => url('/password/reset', $token)])
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot
@endcomponent
