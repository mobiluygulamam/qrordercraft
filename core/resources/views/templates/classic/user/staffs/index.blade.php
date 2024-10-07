@if(!$isUserSubscriber)
@extends($activeTheme.'layouts.app')
@section('title', ___('staffmanagement'))
@section('content')

 <div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-p-3 tw-mb-2 tw-flex tw-flex-col tw-items-start">
     <div class="tw-flex tw-justify-between tw-w-full">
       <div class="tw-text-lg tw-font-semibold tw-text-zinc-900"></div>
       
     
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-600">
      
       <span>{{___('purchase_plan')}}</span>
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-700">
    
       
     </div>
   </div>
    </div>
    @endsection
@push('scripts_at_bottom')

@endpush
@else 

@extends($activeTheme.'layouts.app')
@section('title', ___('staffmanagement'))

@if(!empty($menu_languages))
    @section('header_buttons')
   
    @endsection
@endif
@section('content')
<a href="{{ route('staffs_create') }}" class="button ripple-effect"><i
     class="icon-feather-plus"></i> {{ ___('Add Staff') }}</a>
     
 
    
     <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-6">
    @if(count($staffMembers))
        @foreach($staffMembers as $member)
            @include($activeTheme.'user.staffs.staffs-row')
        @endforeach
    @else
        <div class="tw-col-span-3 tw-text-center tw-bg-gray-100 tw-py-6 tw-rounded-lg">
            <p class="tw-text-lg tw-font-medium">{{ ___('No Data Found') }}</p>
        </div>
    @endif
</div>


    <div id="staff-view" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
      
    </div>
@endsection

@push('scripts_vendor')
    <script>
        const LANG_ARE_YOU_SURE = @json(___('Are you sure?'));
        const LANG_COMPLETED = @json(___('Completed'));
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
    
<script src="{{ asset($activeThemeAssets.'js/staffs.js?var='.config('appinfo.version')) }}"></script>

    @endpush
@endif