@component('mail::message')
{{ $mailInfo['title'] }}

Congratulations! Your Mail submitted.

@component('mail::button', ['url' => $mailInfo['url']])
Go to!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent