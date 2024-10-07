@extends($activeTheme.'layouts.app')
@section('title', ___('New Order'))
@section('content')

<div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-4"> <!-- Ana kolon -->
    
     <!-- Birinci içerik (2 col büyük ekranlarda, mobilde tam genişlik) -->
     <div class="lg:tw-col-span-2 ">
         @foreach ($post->menu_categories as $category)
             <!-- Kategori Adı -->
             <h2 class=" tw-text-2xl tw-font-bold tw-my-8 tw-text-center lg:tw-text-left">{{$category->name}}</h2>
 
             <!-- Ürünleri grid içinde soldan sağa sıralamak -->
             <section class="tw-grid tw-grid-cols-4 sm:tw-grid-cols-2 md:tw-grid-cols-4 lg:tw-grid-cols-3 xl:tw-grid-cols-4 tw-gap-5">
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

 <div id="order-detail-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
     <!--Tabs -->
     <div class="sign-in-form">
         <ul class="popup-tabs-nav">
             <li><a>{{ ___('Order') }}</a></li>
         </ul>

         <div class="popup-tabs-container">
             <!-- Tab -->
             <div class="popup-tab-content">
                 <div class="order-print">
                     <div class="order-print-header text-center">
                         <h3>{{ $post->title }}</h3>
                         <p>{{$post->address}}</p>
                     </div>
                     <div class="order-print-divider"></div>
                     <div id="order-print-content">
                     </div>
                     <div class="order-print-divider"></div>
                     <p class="text-center">{{ ___('Thank you for visiting.') }}</p>
                     <div class="qrmenuappinfo">            

                         <p class="tw-text-sm tw-text-center">craftorder.menu</p>
                  
                     </div>
                    </div>
               
            </div>
                 <button class="button order-print-button"><i class="fa fa-print"></i> {{___('Print Receipt')}}
                 </button>
             </div>
         </div>
     </div>
 </div>


@endsection

@push('scripts_at_bottom')

<script>
     let orderItems = [];
    $(document).ready(function () {

     $('#ordering-type').on('change', function () {
        let orderingType = $(this).val();

        // Varsayılan olarak tüm alanları gizle
        $('#phone-number-field, #address-field').hide();

        if (orderingType === 'on-table') {
            // On-table için sadece masa numarası formda kalır
            $('#phone-number-field').hide();
            $('.hide-on-table').hide();
            $('#address-field').hide();
        } else if (orderingType === 'takeaway') {
            // Takeaway için telefon numarası alanı gösterilir, adres gizlenir
            $('#phone-number-field').show();
            $('#address-field').hide();
            $('.hide-on-table').show();
        } else if (orderingType === 'delivery') {
            // Delivery için hem telefon numarası hem adres gösterilir
            $('#phone-number-field').show();
            $('.hide-on-table').show();
            $('#address-field').show();
        }
    });

    // Sayfa yüklendiğinde varsayılan sipariş türüne göre alanları göster
    $('#ordering-type').trigger('change');

        // Sipariş Ver butonuna tıklandığında LocalStorage'deki verileri gönder
        $('#submit-order-button').on('click', function(e) {
            e.preventDefault();

            let orderData = JSON.parse(localStorage.getItem('orderItems')) || {};

            // Eğer sipariş verileri boşsa kullanıcıyı bilgilendirin
            if (!Object.keys(orderData).length) {
                alert("Sipariş vermeden önce ürün ekleyin.");
                return;
            }
            let formData = $('#send-order-form').serializeArray();  // Formdaki tüm inputları diziye çevirir

// Sipariş verilerini de formData'ya ekle
formData.push({name: 'items', value: JSON.stringify(orderData)});
formData.push({name: '_token', value: '{{ csrf_token() }}'});  // CSRF token ekle




            $.ajax({
                type: 'POST',
                url: "{{route('restaurant.sendOrderTable', $post->id)}}", // Gerçek bir route ekledik
               data:formData,
                success: function(response) {
                  
                    console.log('Sipariş başarıyla gönderildi', response);
                  
         
                    printOrder(JSON.parse(response.order), response.created_at, response.orderItems).then(() => {
                         // alert(JSON.stringify(response));
                         $.magnificPopup.open({
                items: {
                    src: '#order-detail-dialog',
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
            localStorage.removeItem('orderItems'); // Sipariş sonrası LocalStorage'ı temizle

                    }).catch((err) => {
                         console.error('Hata oluştu: ', err);
                    });

              
               
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
     let allTotal=0;
     document.getElementById('your-order-price').innerText = allTotal  + " ₺" ;
        let orderItems = JSON.parse(localStorage.getItem('orderItems')) || {}; // LocalStorage'daki ürünleri yükle

        // Miktar arttırma ve azaltma işlemleri
        $('.qr-input-number__increase').on('click', function () {
            let menuItem = $(this).closest('.tw-w-44');
            let productId = menuItem.attr('data-product-id'); // Ürünün ID'sini al
            let quantityInput = menuItem.find('.menu_quantity');
            quantityInput.val(parseInt(quantityInput.val()) + 1);  // Miktarı arttır
            updatePrice(menuItem,true); // Fiyatı güncelle
        });

        $('.qr-input-number__decrease').on('click', function () {
            let menuItem = $(this).closest('.tw-w-44');
            let productId = menuItem.attr('data-product-id'); // Ürünün ID'sini al
            let quantityInput = menuItem.find('.menu_quantity');
            if (parseInt(quantityInput.val()) > 0) {  // Miktar 0'ın altına düşmesin
                quantityInput.val(parseInt(quantityInput.val()) - 1);  // Miktarı azalt
                updatePrice(menuItem, false); // Fiyatı güncelle
            }
        });

        // Fiyatı güncelleme ve LocalStorage'a kaydetme fonksiyonu
        function updatePrice(menuItem, status) {
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
     
      if(status)
            allTotal+=totalPrice;
else 
allTotal-=totalPrice;
       document.getElementById('your-order-price').innerText = allTotal + " ₺" ;

       localStorage.setItem("allTotal", allTotal);
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
    function printOrder(order,created_at, orderItems){
     return new Promise((resolve, reject) => {
          
          try {
               const orderContainer = document.getElementById('order-print-content');

// HTML içeriğini string olarak tanımla
let orderHTML = `
    <div class="order-print-tpl-${order.id}">
        <table>
            <tr>
                <td>{{___('clock')}}</td>
                <td>${created_at}</td>
            </tr>
            <tr>
                <td>{{___('customer_name')}}</td>
                <td>${order.customer_name ?? "{{___('customer')}}"}</td>
            </tr>
            <tr>`;
            
if (order.type === 'on-table') {
    orderHTML += `
                <td>{{___('table')}}</td>
                <td>${order.table_number}</td>`;
} else if (order.type === 'takeaway') {
    orderHTML += `
                <td>{{___('type')}}</td>
                <td>{{___('Takeaway')}}</td>`;
} else if (order.type === 'delivery') {
    orderHTML += `
                 <td>{{___('type')}}</td>
                <td>{{___('Delivery')}}</td>`;
}

orderHTML += `
            </tr>`;

if (order.phone_number) {
    orderHTML += `
            <tr>
                <td>Phone</td>
                <td>${order.phone_number}</td>
            </tr>`;
}

if (order.address) {
    orderHTML += `
            <tr>
                <td>Address</td>
                <td>${order.address}</td>
            </tr>`;
}

if (order.message) {
    orderHTML += `
            <tr>
                <td>Message</td>
                <td>${order.message}</td>
            </tr>`;
}

if (order.is_paid) {
    orderHTML += `
            <tr>
                <td>Payment</td>
                <td>Paid</td>
            </tr>`;
}

orderHTML += `
        </table>
        <div class='order-print-divider'></div>
        <table class='order-print-menu'>
            <thead>
                <tr>
                    <th>{{___('menu')}}</th>
                    <th>{{___('price')}}</th>
                </tr>
            </thead>
            <tbody id='order-print-menu'>`;

if (orderItems) {
     var allTotal2 =localStorage.getItem('allTotal');

     orderItems.forEach(function(item) {
   
      if(item.quantity>0){
          orderHTML += `
            <tr>
                <td>${item.menu.name}`;

        if (item.variant_title) {
            orderHTML += `<small>${item.variant_title}</small>`;
        }

        orderHTML += ` × ${item.quantity}</td>
                <td>${item.menu.price * item.quantity} ₺ </td>
            </tr>`;

        if (item.itemExtras) {
            item.itemExtras.forEach(function(itemExtra) {
                orderHTML += `
                <tr class="order-menu-extra">
                    <td><span class="margin-left-5">${itemExtra.extra.title}</span></td>
                    <td>${itemExtra.extra.price * item.quantity} ₺ </td>
                </tr>`;
            });
        } else {
         
        }
      }
    });
}



orderHTML += `
            </tbody>
            <tfoot>
                <tr>
                    <th>{{___('total')}}</th>
                    <td>${allTotal2} ₺</td>
                </tr>
            </tfoot>
        </table>
         <div class="order-code-container">
        <hr>
        <div class="order-code-content">
            <p class="order-code-title">Sipariş Kodu:</p>
            <p class="order-code-value">${order.unique_code}</p>
        </div>
    </div>
    </div>
    `;

// Yeni HTML içeriğini sayfaya ekle
orderContainer.innerHTML = orderHTML;

               resolve();
          }
          catch (error) {
               reject(error);
          }
     });
}
</script>
@endpush
