@component('mail::message')
# {{ ___('greeting', ['userName' => $userName]) }}

{{ ___('intro') }}

{{ ___('plan_name', ['planName' => $planName]) }}

{{ ___('body') }}

- {{ ___('list_items')[0] }}
- {{ ___('list_items')[1] }}
- {{ ___('list_items')[2] }}

@component('mail::button', ['url' => config('app.url')])
{{ ___('cta') }}
@endcomponent

{{ ___('thanks') }}<br>
{{ config('app.name') }}
@endcomponent
