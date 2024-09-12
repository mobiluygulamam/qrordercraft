@extends($activeTheme.'layouts.app')
@section('title', ___('New Order'))
@section('content')

@foreach ($post->menu_categories as $category)
    <!-- Kategori Adı -->
    <h2 class="tw-text-2xl tw-font-bold tw-mb-4 tw-text-center lg:tw-text-left">{{$category->name}}</h2>

    <!-- Ürünleri grid içinde soldan sağa sıralamak -->
    <section class="tw-grid tw-grid-cols-2 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-4 xl:tw-grid-cols-5 tw-gap-4">
        <!-- Her kategoriye ait ürünlerin gösterimi -->
        @include($activeTheme.'user.orders.item', ['menus' => $category->menus])
    </section>
@endforeach

<!-- Sipariş Ver Butonu -->
<button id="submit-order-button" class="button ripple-effect">{{ ___('Submit Order') }}</button>

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
                     <form type="post" action="{{route('restaurant.sendOrder', $post->id)}}" id="send-order-form">
                         @csrf
                         <input type="text" class="with-border" name="name" placeholder="{{ ___('Your Name') }}" required>
                         <input id="table-number-field" type="number" class="with-border" name="table" placeholder="{{ ___('Table Number') }}">
                         <input id="phone-number-field" type="number" name="phone-number" class="with-border" placeholder="{{ ___('Phone Number') }}">
                         <textarea id="address-field" class="with-border" name="address" placeholder="{{ ___('Address') }}" rows="1"></textarea>
                         <textarea class="with-border" name="message" placeholder="{{ ___('Message') }}" rows="1"></textarea>
                         <small class="form-error"></small>
                         <button type="submit" id="submit-order-button-final" class="button ripple-effect margin-top-0">
                             <i class="icon-feather-send"></i>
                             <span>{{ ___('Send Order') }}</span>
                         </button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

@endsection

@push('scripts_at_bottom')
<script>
    $(document).ready(function () {
        // Sipariş Ver butonuna tıklandığında LocalStorage'deki verileri gönder
        $('#submit-order-button').off('click').on('click', function(e) {
            e.preventDefault();
            let orderData = JSON.parse(localStorage.getItem('orderItems')) || {};
       
            $.ajax({
                type: 'POST',
                url:"#",
              
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token ekle
                    orders: orderData
                },
                success: function(response) {
                    console.log('Sipariş başarıyla gönderildi', response);
                  
                    // localStorage.removeItem('orderItems'); // Sipariş sonrası LocalStorage'ı temizle
                },
                error: function(error) {
                    console.log('Sipariş gönderme hatası', error);
                }
            });
        });
    });
</script>
<script src="{{ asset('assets/global/js/jquery-ui.min.js') }}"></script>
 <script src="{{ asset('assets/global/js/jquery.ui.touch-punch.min.js') }}"></script>

 <script>
    $(document).ready(function () {
        let orderItems = JSON.parse(localStorage.getItem('orderItems')) || {}; // LocalStorage'daki ürünleri yükle

        // Miktar arttırma ve azaltma işlemleri
        $('.qr-input-number__increase').on('click', function () {
            let quantityInput = $(this).siblings('.qr-input').find('.menu_quantity');
            let currentVal = parseInt(quantityInput.val());
            quantityInput.val(currentVal + 1);  // Miktarı arttır
            updatePrice($(this)); // Fiyatı güncelle
        });

        $('.qr-input-number__decrease').on('click', function () {
            let quantityInput = $(this).siblings('.qr-input').find('.menu_quantity');
            let currentVal = parseInt(quantityInput.val());
            if (currentVal > 1) {
                quantityInput.val(currentVal - 1);  // Miktarı azalt
                updatePrice($(this)); // Fiyatı güncelle
            }
        });

        // Fiyatı güncelleme ve LocalStorage'a kaydetme fonksiyonu
        function updatePrice(element) {
            let menuItem = element.closest('.tw-w-44');  // Ürün container'ı
            let price = parseFloat(menuItem.find('.item_price').data('price')); // Ürün fiyatı
            let quantity = parseInt(menuItem.find('.menu_quantity').val()); // Ürün miktarı
            let totalPrice = price * quantity;  // Toplam fiyat

            // Fiyatı anlık güncelle
            menuItem.find('.item_price').text(totalPrice.toFixed(2));

            // Ürünü LocalStorage'a kaydet
            let itemId = menuItem.data('id');
            let itemName = menuItem.find('.tw-text-lg.tw-font-bold').text();

            orderItems[itemId] = {
                id: itemId,
                name: itemName,
                price: price,
                quantity: quantity,
                total: totalPrice
            };

            localStorage.setItem('orderItems', JSON.stringify(orderItems)); // LocalStorage'ı güncelle
        }

        // Sipariş ekleme butonu (ürün başına)
        $('.add-order-button').on('click', function () {
            let menuItem = $(this).closest('.tw-w-44');  // Ürün container'ı
            let itemId = menuItem.data('id');
            let quantity = parseInt(menuItem.find('.menu_quantity').val());

            if (quantity > 0) {
                alert('Ürün eklendi: ' + orderItems[itemId].name);
            }
        });
    });
 </script>
@endpush
