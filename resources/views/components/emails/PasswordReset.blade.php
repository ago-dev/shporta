@component('mail::message')
# Reset your password

Please, reset your password

@component('mail::button', ['url' => ''])
Reset
@endcomponent

Thanks,<br>
{{ config('app.name') }} Group
@endcomponent
