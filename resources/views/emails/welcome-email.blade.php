@component('mail::message')
# Welcome to Instagram

This is a community of fellow developers and we love that you have joind us.

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

All the best
Thanks,<br>
{{ config('app.name') }}
@endcomponent
