@extends($activeTheme.'layouts.app')
@section('title', ___('my_tables'))
@section('content')
    <div class="container">
     <form method="post" action="{{ route('restaurants.qrbuilder', $restaurant->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="d-flex align-items-center submit-field">
           
          <button name="submit" type="submit" class="button">{{ ___('Save Settings') }}</button>
      </form>
</div>


<div class="col-md-4 sticky-sidebar">
     <div class="dashboard-box">
         <div class="headline">
             <h3><i class="icon-feather-grid"></i> {{ ___('QR Code') }}</h3>
         </div>
         <div class="content with-padding">
             <div id="qr-code-wrapper" class="margin-bottom-20" data-url="{{ route('publicView', $restaurant->slug). '?qr-id=' . urlencode(coffecraft_xor_encrypt($restaurant->slug, )) }}"></div>
             <button class="button gray ripple-effect ico qr-code-downloader"><i class="icon-feather-download"></i> </button>
         {{$routename}}
          </div>
     </div>
 </div>
    @push('scripts_vendor')
    <script>
        var LANG_COPIED = @json(___('Copied successfully'))
    </script>
    <link rel="stylesheet" href="{{ asset($activeThemeAssets.'css/color-picker.min.css') }}">
    <script src="{{ asset($activeThemeAssets.'js/color-picker.es5.min.js') }}"></script>
    <script src="{{ asset($activeThemeAssets.'js/sticky-sidebar.js') }}"></script>
    <script src="{{ asset($activeThemeAssets.'js/jquery-qrcode.min.js') }}"></script>
    <script src="{{ asset($activeThemeAssets.'js/qr_script.js?ver='.config('appinfo.version')) }}"></script>
@endpush
    @endsection