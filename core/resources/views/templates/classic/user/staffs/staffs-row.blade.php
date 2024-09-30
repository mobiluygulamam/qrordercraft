<div data-memberid="{{ $member->id }}" class="tw-bg-white tw-shadow-md tw-rounded-lg tw-p-6 tw-flex tw-flex-col tw-justify-between tw-h-full">
    <!-- Personel Bilgileri -->
    <div>
        <h3 class="tw-text-xl tw-font-semibold tw-mb-2">{{ $member->name }} {{ $member->surname }}</h3>
        <p class="tw-text-gray-500 tw-mb-4">{{ ___('staff_id') }}: {{ $member->id }}</p>
        @php
            $post = App\Models\Post::where('id', $member->restaurant_id)->first();
        @endphp
        <p class="tw-text-gray-700 tw-mb-4">{{ $post ? $post->title : __('No Restaurant Found') }}</p>
        <p class="tw-text-gray-600">{{ __('Position') }}: {{ $member->position }}</p>
    </div>

    <!-- Butonlar -->
    <div class="tw-mt-4 tw-flex tw-justify-between">
        <button class="tw-bg-red-500 tw-text-white tw-px-3 tw-py-2 tw-rounded-lg tw-shadow qr-delete-order"
            data-route="{{ route('restaurants.deleteOrder', $member->id) }}"
            title="{{ ___('Delete') }}">
            <i class="icon-feather-trash-2"></i>
        </button>
        <button class="tw-bg-green-500 tw-text-white tw-px-3 tw-py-2 tw-rounded-lg tw-shadow qr-view-order"
            data-id="{{ $member->id }}"
            title="{{ ___('View Order') }}">
            <i class="icon-feather-eye"></i>
        </button>
    </div>
</div>
