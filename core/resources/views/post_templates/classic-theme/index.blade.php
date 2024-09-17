

@extends('post_templates.layout')

@push('style_at_top')
    <link rel="stylesheet" href="{{ asset('assets/templates/classic/css/style.css?ver='.config('appinfo.version')) }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/classic/css/color.css?ver='.config('appinfo.version')) }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        prefix: "tw-",
        corePlugins: {
            preflight: false,
        }
    };
    @if(current_language()->direction == 'rtl')
        <link rel="stylesheet"
              href="{{ asset('assets/templates/classic/css/rtl.css?ver='.config('appinfo.version')) }}">
    @endif
@endpush

@section('content')

    <div class="single-page-header restaurant-header detail-header"
         data-background-image="{{ asset('storage/restaurant/cover/'.$post->cover_image) }}">
        <div class="container">
     
          @if (!$hasqr_id)
          <div class="tw-bg-slate-100 tw-h-15 tw-w-auto"><span>Sipariş vermek için lütfen  masa qr kodunu okutun.</span> </div>
          @endif
            <div class="row">
          
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image">
                     
                                <img class="lazy-load"
                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                     data-original="{{ asset('storage/restaurant/logo/'.$post->main_image) }}"
                                     alt="{{$post->title}}">
                            </div>
                      
                            <div class="header-details ">
                           
                                <h3>{{$post->title}}  <span>{{$post->sub_title}}</span>
                               
                                   @if (!is_null($getUserBusinessTable))                      
    <div class="m-0 tw-flex-2 bg-red-500 w-auto text-center rounded-md text-white"> 
        {{ ___("table") }} {{$getUserBusinessTable->table_id}}
    </div>
@endif

                            </h3>
                            
                                <ul>
                                    @if(!empty($post->timing))
                                        <li><i class="icon-feather-watch"></i> {{$post->timing}}</li>
                                    @endif
                                    
                                    <li>
                                        <i class="icon-feather-map margin-right-5"></i>
                                        <a target="_blank"
                                           href="https://www.google.com/maps/search/?api=1&amp;query={{$post->address}}">{{$post->address}}</a>
                                    </li>
                                    @if(!empty($post->phone))
                                        <li><i class="icon-feather-phone margin-right-5"></i><a
                                                href="tel:{{$post->phone}}">{{$post->phone}}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                      
                        <div class="user-lang-wrapper d-flex">
                       
                       
                            @if(!empty($menu_languages))
                                <div class="btn-group bootstrap-select user-lang-switcher">
                                    <button type="button" class="btn dropdown-toggle btn-default"
                                            data-toggle="dropdown" title="{{$default_menu_language->name}}">
                                        <span class="filter-option pull-left"
                                              id="user-lang">{{ strtoupper($default_menu_language->code)}}</span>&nbsp;
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu scrollable-menu open">
                                        <ul class="dropdown-menu inner">
                                            @foreach($menu_languages as $lang)
                                                <li data-code="{{$lang->code}}">
                                                    <a role="menuitem" tabindex="-1" rel="alternate"
                                                       href="#">{{$lang->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-xl-12 content-right-offset">

                <!-- Page Content -->
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">{{ ___('About Me') }}</h3>
                    @if(config('settings.restaurant_text_editor'))
                        {!! $post->description !!}
                    @else
                        <p>{{strip_tags($post->description)}}</p>
                    @endif
                </div>

                <div class="gallery-section">
                    <div class="row-filter margin-bottom-20">
                        <!-- filter -->
                        <div class="filter-gallery">
                            <button data-filter="gallery-show-all"
                                    class="filter-button active">{{ ___('All Categories') }}</button>
                            

                                    
                        </div>
                        @foreach($post->menu_categories as $key => $category)
                                {{-- Break loop if category limit exceeded --}}
                                @if($plan->settings->category_limit != "999"
                                        && $key >= $plan->settings->category_limit)
                                    @break
                                @endif
                                <button data-filter="{{$category->id}}" class="filter-button"
                                        data-catid="{{$category->id}}">{{$category->name}}</button>
                            @endforeach
                    </div>

                    @foreach($post->menu_categories as $key => $category)
                        {{-- Break loop if category limit exceeded --}}
                        @if($plan->settings->category_limit != "999"
                                && $key >= $plan->settings->category_limit)
                            @break
                        @endif
                        <div class="boxed-list" data-category-image="{{$category->id}}">
                            <div class="boxed-list-headline">
                                <h3><i class="icon-material-outline-restaurant"></i> {{$category->name}}
                                    @if(@$postOptions->menu_layout == 'both')
                                        <div class="float-right">
                                             <a href="#" class="menu-filter active" data-filter="list"><span
                                                  class="icon-feather-list"></span></a>
                                            <a href="#" class="menu-filter " data-filter="grid"><span
                                                    class="icon-feather-grid"></span></a>
                                        
                                        </div> 
                                    @endif
                                </h3>
                            </div>
                            <div class="box-item">
                                @if(count($category->subcategories))
                                    <div class="js-accordion margin-bottom-20">
                                        @foreach($category->subcategories as $subcategory)
                                            <div class="boxed-list-small js-accordion-item margin-bottom-10">
                                                <div class="boxed-list-headline js-accordion-header">
                                                    <h3>
                                                        <i class="icon-material-outline-restaurant"></i> {{$subcategory->name}}
                                                    </h3>
                                                </div>
                                                <div class="box-item js-accordion-body" style="display: none">
                                                    @include('post_templates.'.$theme.'.includes.menu-item', ['menus' => $subcategory->menus->where('active', '1')])
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                @include('post_templates.'.$theme.'.includes.menu-item', ['menus' => $category->menus->where('active', '1')])
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Spacer -->
    <div class="margin-top-15"></div>
    <!-- Spacer / End-->

    <div id="view-order-wrapper">
        <button id="view-order-button" class="button ripple-effect">{{ ___('View Order') }}</button>
    </div>

    <!-- Your Order -->
    <div id="your-order" class="zoom-anim-dialog mfp-hide dialog-with-tabs popup-dialog">
        <!--Tabs -->
        <div class="sign-in-form">
            <ul class="popup-tabs-nav">
                <li><a class="menu_title">{{ ___('My Order') }}</a></li>
            </ul>
            <div class="popup-tabs-container">
                <!-- Tab -->
                <div class="popup-tab-content">
                    <div class="your-order-content">
                        <div class="your-order-items"></div>
                        <div class="menu_detail order-total margin-bottom-20">
                            <h4 class="menu_post">
                              
                                <span class="menu_title">{{ ___('Total') }}</span>
                                <span class="menu_price"><span class="your-order-price"></span></span>
                            </h4>
                        </div>
                        @if($allow_order && $hasqr_id)
                            <form type="post" action="#" id="send-order-form">
                                @csrf
                              
                          
                       
                                <input id="table-number-field" type="number" class="with-border justify-center" name="table" value="{{$getUserBusinessTable->table_id}}"
                                       placeholder="{{ ___('Table Number') }}" disabled >
                            
                           
                                <small class="form-error"></small>
                            
                            </form>
                        @endif
                    </div>
                    <div class="order-success-message" style="display: none">
                        <i class="icon-feather-check qr-success-icon"></i>
                        <h4>{{ ___('Sent Successfully') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Item Popup -->
    <div id="add-extras" class="zoom-anim-dialog mfp-hide dialog-with-tabs popup-dialog">
        <div class="sign-in-form">
            <ul class="popup-tabs-nav ">
                <li><a class="menu_title"></a></li>
            </ul>
            <div class="popup-tabs-container">
                <div class="popup-tab-content">
                    <div class="menu_detail">
                        <h4 class="menu_post">
                   
                            <span class="menu_title"></span>
                         
                            <span class="menu_price"></span>
                        </h4>
                        <div class="menu_excerpt menu_desc margin-top-20"></div>
                    </div>
                    <!-- Variant Options -->
                    <div id="menu-variants">
                    </div>
                    <!-- Extras -->
                    <div class="menu-data menu-extra-wrapper">
                        <div class="section-headline margin-bottom-12">
                            <h5>{{ ___('Extras') }}</h5>
                        </div>
                        <div id="menu-extra-items">
                        </div>
                    </div>
                    <div class="menu-data">
                        <div class="d-flex">
                            <div class="qr-input-number">
                                <span role="button"
                                      class="qr-input-number__decrease is-disabled ripple-effect ripple-effect-dark"
                                      id="menu-order-quantity-decrease">-</span>
                                <div class="qr-input">
                                    <input type="text" class="qr-input__inner with-border" value="1"
                                           id="menu-order-quantity" readonly>
                                </div>
                                <span role="button" class="qr-input-number__increase ripple-effect ripple-effect-dark"
                                      id="menu-order-quantity-increase">+</span>
                            </div>
                            @if($hasqr_id)
                            <button id="add-order-button" class="button ripple-effect">{{___('Add')}} <span
                                    id="order-price"></span></button>
                                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="feedback-form-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
        <!--Tabs -->
        <div class="sign-in-form">
            <ul class="popup-tabs-nav">
                <li><a>{{___('Feedback')}}</a></li>
            </ul>

            <div class="popup-tabs-container">
                <!-- Tab -->
                <div class="popup-tab-content">
                    <form method="post" id="feedback-form">
    @csrf
    <div class="form-group tw-mb-4">
        <label for="rating" class="tw-font-medium">Puanınız:</label>
        <select id="rating" name="rating" class="form-control tw-w-full tw-mt-1 tw-p-2 tw-border tw-rounded" required>
            <option value="5">5 - Çok İyi</option>
            <option value="4">4 - İyi</option>
            <option value="3">3 - Orta</option>
            <option value="2">2 - Kötü</option>
            <option value="1">1 - Çok Kötü</option>
        </select>
    </div>

    <div class="form-group tw-mb-4">
        <label for="comment" class="tw-font-medium">Yorumunuz:</label>
        <textarea id="comment" name="comment" class="form-control tw-w-full tw-mt-1 tw-p-2 tw-border tw-rounded" rows="4" placeholder="Yorumunuzu buraya yazın..." required></textarea>
    </div>

    <button type="submit" id="savefeedback" class="margin-top-0 button button-sliding-icon ripple-effect">
        Kaydet <i class="icon-material-outline-arrow-right-alt"></i>
    </button>
</form>

                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="footer-bottom-section">
            <div class="container">
                <div class="footer-rows-left">
                    <div class="footer-row padding-atop-0 tw-center">
                         <a href="#" id="getfeedbackForm">Geri bildirim ver</a>
                        {{-- <span class="footer-copyright-text">&copy; {{ date('Y')  }} {{$post->title}} --}}
                            @if(!@$plan->settings->hide_branding)
                                &nbsp; | &nbsp; <a class="color-white" href="{{ route('home') }}"
                                                   target="_blank">{{ ___('Provided by Kabudigital') }}</a>
                            @endif</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts_at_bottom')
    <script>
        $('.user-lang-switcher').on('click', '.dropdown-menu li', function (e) {
            e.preventDefault();
            var code = $(this).data('code');
            if (code != null) {
                $('#user-lang').html(code.toUpperCase());
                $.cookie('Quick_user_lang_code', code, {path: '/'});
                location.reload();
            }
        });
    </script>
    <script src="{{ asset('assets/global/js/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/jquery.cookie.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/md5.min.js') }}"></script>

    <script src="{{ asset('assets/templates/classic/js/chosen.min.js') }}"></script>
    <script src="{{ asset('assets/templates/classic/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/templates/classic/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/templates/classic/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/templates/classic/js/snackbar.js') }}"></script>
    <script src="{{ asset('assets/templates/classic/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/templates/classic/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/templates/classic/js/custom.js?ver='.config('appinfo.version')) }}"></script>


    <script>
    
     $('#getfeedbackForm').off('click').on('click', function (e) {
        e.preventDefault();

        $('#feedback-form-dialog').trigger('reset');

        $.magnificPopup.open({
            items: {
                src: '#feedback-form-dialog',
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            }
        });
    });

    $('#savefeedback').off('click').on('click', function (e) {
        e.preventDefault();
        var form = $('#feedback-form');
        var formData = form.serialize();
        formData += '&postid={{ $post->id }}&tableid={{isset($getUserBusinessTable->table_id)?$getUserBusinessTable->table_id:0}}'; 
        $.ajax({
            type: 'POST',
            url: '{{ route('feedback.sendUserFeedBack') }}',
            data: formData,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {
              
                $.magnificPopup.close();
               }});});

    </script>
@endpush
