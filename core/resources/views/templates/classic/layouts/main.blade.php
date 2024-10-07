
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



@yield('content')

@include($activeTheme.'layouts.includes.footer')
@include($activeTheme.'layouts.includes.addons')
@include($activeTheme.'layouts.includes.scripts')
{!! $integrationHelper->getBodyScripts() !!}
</body>

</html>
