@if(count($menus))
    <div class="cat-menu-items sortable-container" data-reorder-route="{{route('restaurants.reorderMenuItem', $post->id)}}">
        @foreach($menus as $menu)
        @php
        $mImg = "";
        if (str_contains($menu->image, "unsplash") !== false) {
            $mImg = $menu->image;
        } else {
            $mImg = asset('storage/menu/' . $menu->image);
        }
    @endphp
            <div class="dashboard-box margin-top-0 margin-bottom-15" data-id="{{$menu->id}}">
                <div class="headline small">
                    <h3><i class="icon-feather-menu quickad-js-handle"></i>
                        <img class="menu-avatar margin-right-5" src="{{$mImg}}"
                             alt="{{$menu->name}}"> {{$menu->name}}
                    </h3>
                    <div class="margin-left-auto line-height-1">
                        <a href="#" data-id="{{$menu->id}}" data-catid="{{$menu->category_id}}" data-data="{{str($menu)->jsonSerialize()}}"
                           class="button ripple-effect btn-sm edit-menu-item"
                           title="{{___('Edit Menu')}}" data-tippy-placement="top"><i class="icon-feather-edit margin-left-0"></i></a>
                      
                        <a href="{{ route('restaurants.deleteMenuItem', $post->id) }}" data-id="{{$menu->id}}"
                           class="button red ripple-effect btn-sm delete-item"
                           title="{{___('Delete Menu')}}"
                           data-tippy-placement="top"><i class="icon-feather-trash-2 margin-left-0"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
 
@endif

 @push('scripts_vendor')
 <script>
     const LANG_ARE_YOU_SURE = @json(___('All data within this section will be deleted. Are you sure?')),
         DEFAULT_IMAGE_URL = @json(asset('storage/menu/default.png'));

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
 <script src="{{ asset('assets/global/js/jquery-ui.min.js') }}"></script>
 <script
     src="{{ asset('assets/global/js/jquery.ui.touch-punch.min.js') }}"></script>
 <script src="{{ asset($activeThemeAssets.'js/menu.js?var='.config('appinfo.version')) }}"></script>
@endpush
