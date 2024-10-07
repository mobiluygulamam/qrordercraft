<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ ___('_join_final_step', ['app_name' => config('app.name')]) }}</title>

</head>
<body>
    <h1>{{ ___('welcome_message', ['app_name' => config('app.name')]) }}</h1>

    <p>{{ ___('_activate_message') }}</p>
    <a href="{{ $inviteUrl }}">{{ ___('_click_here') }}</a>

    <p>{{ ___('_ignore_if_not_subscribed') }}</p>
    
    <p>{{ ___('_regards') }},<br>{{ config('app.name') }} Team</p>
</body>
</html>
