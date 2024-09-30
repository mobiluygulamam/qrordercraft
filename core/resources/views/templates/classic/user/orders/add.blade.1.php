@extends($activeTheme.'layouts.app')
@section('title', ___('New Order'))
@section('content')

<div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-4"> <!-- Ana kolon -->
    
     <!-- Birinci içerik (2 col büyük ekranlarda, mobilde tam genişlik) -->
     <div class="lg:tw-col-span-2">
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
     </div>
 
     <!-- İkinci içerik (1 col büyük ekranlarda, mobilde tam genişlik) -->
     <div>
         @include($activeTheme.'user.orders.tableorderview')
     </div>
     
 </div>


@endsection

@push('scripts_at_bottom')

<script>
     let orderItems = [];
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
                url: "{{route('restaurant.sendOrderTable', $post->id)}}", // Gerçek bir route ekledik
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token ekle
                    items: orderData,
                    
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
<script src="{{ asset($activeThemeAssets.'js/tableorders.js?var='.config('appinfo.version')) }}"></script>

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
               
         

            } else {
                alert('Ürün bulunamadı.');
            }
        });
    });
   


  
</script>
@endpush
