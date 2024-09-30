@if(count($menus))
    @foreach($menus as $menu)
        <div class=" tw-grid tw-grid-cols-3 sm:tw-grid-cols-8 lg:tw-grid-cols-8 " data-reorder-route="{{route('restaurants.reorderMenuItem', $post->id)}}">

        @php
        $mImg = "";
        if (str_contains($menu->image, "unsplash") !== false) {
            $mImg = $menu->image;
        } else {
            $mImg = asset('storage/menu/' . $menu->image);
        }
        @endphp
       
        <div data-product-id="{{$menu->id}}" class="tw-w-44 tw-bg-white tw-shadow-md tw-rounded-xl tw-duration-500 hover:tw-scale-105 hover:tw-shadow-xl product-item">
                <img src="{{!isset($mImg) ? asset('storage/menu/default.png') : $mImg}}"
                    alt="Product" class="tw-h-36 tw-w-44 tw-object-cover tw-rounded-t-xl" />
                <div class="tw-px-4">
                    <p class="tw-text-lg tw-font-bold tw-text-black tw-truncate tw-block tw-capitalize">{{$menu->name}}</p>
                    <div class="tw-flex tw-items-center">
                        <!-- Ürün Fiyatı -->
                        <p class="item_price tw-text-lg tw-font-semibold tw-text-black tw-cursor-auto tw-my-3" data-price="{{$menu->price}}">
                            {{ $menu->price }}
                        </p>
                    </div>
                    <div class="menu-data">
                         <div class="d-flex">
                             <!-- Miktar Arttır/Azalt -->
                             <div class="qr-input-number">
                                 <span role="button" class="qr-input-number__decrease ripple-effect ripple-effect-dark ">-</span>
                                 <div class="qr-input tw-mx-4 ">
                                     <input type="text" class="qr-input__inner with-border menu_quantity " value="0" readonly>
                                 </div>
                                 <span role="button" class="qr-input-number__increase ripple-effect ripple-effect-dark tw-w-4">+</span>
                             </div>
                          
                             <!-- Sipariş Ekle Butonu -->
                         </div>
                         <button class="add-order-button button ripple-effect">{{ ___('Add') }}</button>

                     </div>
                </div>
          
        </div> 
     
       
     </div>
     <div class="tw-w-12"></div>
    @endforeach
@endif

@push('scripts_vendor')
 
@endpush
