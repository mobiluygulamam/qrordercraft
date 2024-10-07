<!DOCTYPE html>
<html lang="{{ get_lang() }}" dir="{{ current_language()->direction }}">
<head>
     <?php

use App\Http\Helpers\IntegrationHelper;
     use App\Http\Helpers\Integrations\IntegrationInterface;
     use App\Http\Helpers\Integrations\GoogleAnalytics;
     use App\Http\Helpers\Integrations\GoogleTagManager;
     use App\Http\Helpers\Integrations\FacebookPixel;
     $integrationHelper = new IntegrationHelper();
     $integrationHelper->addIntegration(new App\Http\Helpers\Integrations\GoogleTagManager('GTM-XXXXXX'));
$integrationHelper->addIntegration(new App\Http\Helpers\Integrations\GoogleAnalytics('UA-XXXXXX-X'));
$integrationHelper->addIntegration(new App\Http\Helpers\Integrations\FacebookPixel('YOUR_PIXEL_ID'));

    ?>
    @include($activeTheme.'layouts.includes.head')
    @include($activeTheme.'layouts.includes.styles')
    {!! head_code() !!}
</head>
<body class="{{ current_language()->direction }}">
@include($activeTheme.'layouts.includes.header')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>@yield('title')</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="{{ route('home') }}">{{ ___('Home') }}</a></li>
                        <li>@yield('title')</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-5 offset-xl-3">
            <div class="login-register-page">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<div class="margin-top-70"></div>

@include($activeTheme.'layouts.includes.footer')
@include($activeTheme.'layouts.includes.addons')
@include($activeTheme.'layouts.includes.scripts')
{!! $integrationHelper->getBodyScripts() !!}
{!! google_captcha() !!}

@if(session('status'))
    <script>
        Snackbar.show({ text: @json(session('status')) });
    </script>
@endif
</body>

</html>
