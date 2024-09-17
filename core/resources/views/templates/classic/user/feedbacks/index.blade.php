@extends($activeTheme.'layouts.app')
@section('title', ___('feedbacks'))

@if(!empty($menu_languages))
    @section('header_buttons')
   
    @endsection
@endif
@section('content')

     

 <div class="tw-container tw-mx-auto tw-px-2 tw-py-2">
  <div class="tw-grid tw-grid-cols-1 tw-gap-6">
     @if (count($feedbacks))
@foreach($feedbacks as $feedback)
    <!-- Birinci Kart Örneği -->
    <div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-p-3 tw-mb-2 tw-flex tw-flex-col tw-items-start">
     <div class="tw-flex tw-justify-between tw-w-full">
       <div class="tw-text-lg tw-font-semibold tw-text-zinc-900">Restoran Adı: <span class="tw-text-blue-600">{{$feedback["restoranname"]}}</span></div>
       
     
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-600">
       <span class="tw-font-semibold">Rating: </span>
       <span class="tw-bg-green-100 tw-text-green-600 tw-px-2 tw-py-1 tw-rounded-lg">{{$feedback["rating"]}}/5</span>
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-700">
       <span class="tw-font-semibold">Yorum: </span>
       {{$feedback["comment"]}}
     </div>
   </div>
   @endforeach
@else 
<div class="tw-bg-white tw-rounded-lg tw-shadow-lg tw-p-3 tw-mb-2 tw-flex tw-flex-col tw-items-start">
     <div class="tw-flex tw-justify-between tw-w-full">
       <div class="tw-text-lg tw-font-semibold tw-text-zinc-900"></div>
       
     
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-600">
      
       <span>Kayıtlı Geri bildirim bulunamadı.</span>
     </div>
     <div class="tw-mt-2 tw-text-sm tw-text-zinc-700">
    
       
     </div>
   </div>
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
    

    @endpush
