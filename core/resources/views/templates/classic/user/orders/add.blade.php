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
                     <form method="POST" action="{{route('restaurant.sendOrder', $post->id)}}" id="send-order-form">
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
        $('#submit-order-button').on('click', function(e) {
            e.preventDefault();

            let orderData = JSON.parse(localStorage.getItem('orderItems')) || {};

            // Eğer sipariş verileri boşsa kullanıcıyı bilgilendirin
            if (!Object.keys(orderData).length) {
                alert("Sipariş vermeden önce ürün ekleyin.");
                return;
            }
alert(localStorage.getItem('orderItems'));
            $.ajax({
                type: 'POST',
                url: "#", // Gerçek bir route ekledik
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token ekle
                    orders: orderData
                },
                success: function(response) {
                    console.log('Sipariş başarıyla gönderildi', response);
                    localStorage.removeItem('orderItems'); // Sipariş sonrası LocalStorage'ı temizle
                },
                error: function(error) {
                    console.log('Sipariş gönderme hatası', error);
                    localStorage.removeItem('orderItems'); // Sipariş sonrası LocalStorage'ı temizle

                    $('.form-error').text('Sipariş gönderilirken bir hata oluştu.'); // Hata mesajı göster
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
            let menuItem = $(this).closest('.tw-w-44');
            let productId = menuItem.attr('data-product-id'); // Ürünün ID'sini al
            let quantityInput = menuItem.find('.menu_quantity');
            quantityInput.val(parseInt(quantityInput.val()) + 1);  // Miktarı arttır
            updatePrice(menuItem); // Fiyatı güncelle
        });

        $('.qr-input-number__decrease').on('click', function () {
            let menuItem = $(this).closest('.tw-w-44');
            let productId = menuItem.attr('data-product-id'); // Ürünün ID'sini al
            let quantityInput = menuItem.find('.menu_quantity');
            if (parseInt(quantityInput.val()) > 0) {  // Miktar 0'ın altına düşmesin
                quantityInput.val(parseInt(quantityInput.val()) - 1);  // Miktarı azalt
                updatePrice(menuItem); // Fiyatı güncelle
            }
        });

        // Fiyatı güncelleme ve LocalStorage'a kaydetme fonksiyonu
        function updatePrice(menuItem) {
            let itemId = menuItem.attr('data-product-id'); // Ürünün data-id'sini al
            let price = parseFloat(menuItem.find('.item_price').data('price')); // Ürün fiyatını al
            let quantity = parseInt(menuItem.find('.menu_quantity').val()); // Ürün miktarını al
            let totalPrice = price * quantity;  // Toplam fiyatı hesapla

            // DOM'da anlık olarak fiyatı güncelle
            menuItem.find('.item_price').text(totalPrice.toFixed(2));

            // Ürün bilgilerini LocalStorage'a kaydet
            let itemName = menuItem.find('.tw-text-lg.tw-font-bold').text(); // Ürün adını al

            // Sadece ilgili ürünü güncelle
            orderItems[itemId] = {
                id: itemId,
                name: itemName,
                price: price,
                quantity: quantity,
                total: totalPrice
            };

            // Güncellenmiş veriyi LocalStorage'a kaydet
            localStorage.setItem('orderItems', JSON.stringify(orderItems));
        }

        // Sipariş ekleme butonu (ürün başına)
        $('.add-order-button').on('click', function () {
            let menuItem = $(this).closest('.tw-w-44');  // Ürün container'ı
            let itemId = menuItem.attr('data-product-id');
            let quantity = parseInt(menuItem.find('.menu_quantity').val());

            if (quantity > 0 && orderItems[itemId]) {
                alert('Ürün eklendi: ' + orderItems[itemId].name);
            } else {
                alert('Ürün bulunamadı.');
            }
        });
    });
</script>
@endpush
