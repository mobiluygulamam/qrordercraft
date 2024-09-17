@extends($activeTheme.'layouts.mainindex')

@section('content')
<style> .gradient-custom{
     /* Chrome 10-25, Safari 5.1-6 */
     /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(
        to top,
        rgba(66, 136, 244, 0.7),
        rgba(106, 148, 245, 0.7),
        rgba(134, 161, 245, 0.7),
        rgba(158, 174, 246, 0.7),
        rgba(66, 136, 244, 0.7)

        
    );

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(
        to top,
        rgba(66, 136, 244, 0.7),
        rgba(106, 148, 245, 0.7),
        rgba(134, 161, 245, 0.7),
        rgba(158, 174, 246, 0.7),
        rgba(66, 136, 244, 0.7)

       
    );
 }
 </style>
 <div class="relative ">
     <div class="signbutton absolute right-10 top-10">
          <a href="#sign-in-dialog" class="popup-with-zoom-anim button ripple-effect">Şimdi Katılın</a>
         </div>
<div class="hero-section  " style="height:20%;">
    
     <div class="container-fluid gradient-custom" style="height:20%;">
         
         <div class="row justify-content-center d-flex justify-content-center align-items-center h-50" style="min-height: 100vh;">
        
          <div class="col-md-12">
                 <div class="text-center hero-content position-relative ">
                    <div class="d-flex justify-content-center text-center position-fixed " style="background-color: rgba(0, 0, 0, 0.5); top: 0; left: 0; right: 0; bottom: 0;"></div>
                                         <h1 class="fw-bold text-white" style="font-size: 56px;">
                       

                         {{___('header_message')}}
                                         </h1>
<div class="m-24"></div>
                     <p class="text-white" style="font-size: 24px;">{{___('header_sub_message')}}</p>

                 </div>
             </div>
         </div>
     </div>
 </div></div>



 
 <div class="bg-[#F7F7F7] font-[sans-serif]">
     <div class="max-w-6xl mx-auto py-16 px-4">
       <h2 class="text-gray-800 text-4xl font-extrabold text-center mb-16">İşletmenizi Güçlendiren Özellikler</h2>

       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-md:max-w-md mx-auto">
         <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all">
           <div class="p-8 text-medium">
               <i class="fa-brands fa-jedi-order "></i>
             <h3 class="text-gray-800 text-xl font-semibold mb-3">Hızlı Sipariş İletimi</h3>
             <p class="text-gray-500 text-sm leading-relaxed">Müşteriler, garson beklemeden QR kodunu tarayarak doğrudan siparişlerini iletebilir, bu da servis süresini hızlandırır.</p>
           </div>
         </div>

         <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all">
           <div class="p-8">
            
               <i class="fa-solid fa-shield"></i>
             <h3 class="text-gray-800 text-xl font-semibold mb-3">Tam Kontrol</h3>
             <p class="text-gray-500 text-sm leading-relaxed">Siparişler anında mutfağa düşer, böylece işletme sahipleri ve personel tüm süreç üzerinde tam kontrol sahibi olur.</p>
           </div>
         </div>

         <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all">
           <div class="p-8">
               <i class="fa-regular fa-user"></i>
             <h3 class="text-gray-800 text-xl font-semibold mb-3">Kusursuz Müşteri Deneyimi</h3>
             <p class="text-gray-500 text-sm leading-relaxed">Müşteriler menüye kolayca erişir ve tercihlerini hızlıca seçerek beklemeden sipariş verebilirler, bu da daha keyifli bir deneyim sağlar.
          </p>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="bg-gray-100 justify-center items-center flex-1 p-5  text-center">
     <a href="{{ route('register') }}"  id="login-button" class="rounded rounded-lg animate-bounce delay-150 duration-300 button w-1/2 min-h-16  button-sliding-icon ripple-effect " type="submit"
     ><span class="text-xl">{{ ___('create_an_menu_in_1min') }}
          </span> <i class="icon-feather-arrow-right"></i></a>
       
</div>

   <section class="bg-gray-100 py-16">
     <div class="container mx-auto">
       <h2 class="text-center text-3xl font-bold text-gray-800 mb-12">
         3 Adımda Basit Kullanım
       </h2>
       
       <div class="grid grid-cols-1 md:grid-cols-3 gap-10 ">
         
         <!-- Adım 1 -->
         <div class="bg-white rounded-lg shadow-lg text-center h-100 ">
          <div class="rounded-lg">
            <img class="rounded-lg" src="{{ asset($activeThemeAssets.'images/qrmenu.png') }}" alt="">
          </div>
        
   
        
     <div class="m-8"><h3 class="text-xl font-bold text-gray-800">QR ile Menünüzü Paylaşın</h3>
          <p class="text-gray-600">Menünüzü QR ile paylaşın, müşterilerinizle bağ kurun.</p></div>
        </div>
        
   
         <!-- Adım 2 -->
         <div class="bg-white rounded-lg shadow-lg text-center h-100 ">
          <div class="rounded-lg">
            <img class="rounded-lg" src="{{ asset($activeThemeAssets.'images/selectmenu.png') }}" alt="">
          </div>
        
   
        
     <div class="m-8"><h3 class="text-xl font-bold text-gray-800">Müşteriler Menüleri Seçsin</h3>
          <p class="text-gray-600">Müşterileriniz, istedikleri menüleri kolayca seçsin.</p></div>
        </div>
   
         <!-- Adım 3 -->

   
         <div class="bg-white rounded-lg shadow-lg text-center h-100 ">
          <div class="rounded-lg">
            <img class="rounded-lg" src="{{ asset($activeThemeAssets.'images/kitchen.png') }}" alt="">
          </div>
        
   
        
     <div class="m-8"><h3 class="text-xl font-bold text-gray-800">Siparişler Mutfağa Ulaşsın</h3>
          <p class="text-gray-600">Siparişler hızlıca mutfağa ulaşsın, her şey kusursuz işlesin.</p></div>
        </div>
       </div>
     </div>
   </section>


<div class="bg-gray-50 pt-24 pb-24">

     <div class="max-w-6xl mx-auto font-[sans-serif] ">
          <div class="text-center max-w-2xl mx-auto bg-gray-50">
            <h2 class="text-gray-800 text-3xl font-extrabold text-center mb-6">Ayrıcalıklı Özellikler</h2>
            <p class="text-gray-600 text-md">Eşsiz özelliklerimizle işletmenizi yeni bir seviyeye taşıyın. CraftOrder'ın sunduğu çözümlerle süreçlerinizi hızlandırın, müşteri memnuniyetini artırın ve daha fazlasını başarma gücünü kazanın.

            </p>
          </div>
     
          <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
            <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
              <div>
                <h3 class="text-gray-800 text-2xl font-bold mb-4">QR Menü Paylaşımı</h3>
                <p class="text-gray-600 text-sm"></p>
     
                <ul class="space-y-4 mt-8">
                  <li class="flex items-center gap-3 text-md text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    QR kod ile temassız menü sunun
                  </li>
                  <li class="flex items-center gap-3 text-md text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    Menünüzü hızla paylaşın
                  </li>
                  <li class="flex items-center gap-3 text-md text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    QR kod ile dijitalleşin
                  </li>
               
                </ul>
              </div>

              <img src="{{ asset($activeThemeAssets.'images/qrmenu-21.png') }}" class="w-full object-contain rounded-md" />
            </div>

          </div>

          <div class="h-36"></div>
          <!--- Data ---->

          <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
               <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
                    <img src="{{ asset($activeThemeAssets.'images/siparis-yonetimi-1.png') }}" class="w-full object-contain rounded-md" />

                 <div>
                   <h3 class="text-gray-800 text-2xl font-bold mb-4">Anlık Sipariş Yönetimi
               </h3>
        
                   <ul class="space-y-4 mt-8">
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Müşteriler QR ile menüye ulaşsın
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Siparişler anında verilsin
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Siparişler hızlıca mutfağa ulaşsın
                     </li>
                  
                   </ul>
                 </div>
               </div>
   
             </div>
             <div class="h-36"></div>

          <!--- Data ---->
          
          <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
               <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
                 <div>
                   <h3 class="text-gray-800 text-2xl font-bold mb-4">Personel Yönetimi</h3>
        
                   <ul class="space-y-4 mt-8">
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Personel performansını anında takip edin
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Verimliliği artırmak için değerlendirin
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       İş akışını kolayca yönetin
                     </li>
                 
                   </ul>
                 </div>
                 <img src="{{ asset($activeThemeAssets.'images/personel-yonetimi.png') }}" class="w-full object-contain rounded-md" />
               </div>
   
             </div>

             <div class="h-36"></div>

              <!--- Data ---->
              <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
               <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
                    <img src="{{ asset($activeThemeAssets.'images/feedback.png') }}" class="w-full object-contain rounded-md" />

                 <div>
                   <h3 class="text-gray-800 text-2xl font-bold mb-4">Geri Bildirim Sistemi</h3>
                   <p class="text-gray-600 text-md">Müşterilerinizin geri bildirimleriyle hizmet kalitenizi sürekli geliştirin; sipariş sonrası yorumları toplayarak memnuniyet seviyesini ölçebilir ve işinizi daha ileriye taşıyabilirsiniz.</p>
        
                   <ul class="space-y-4 mt-8">
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Müşteri yorumlarını toplayın
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Hizmet kalitesini artırın
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Memnuniyet düzeyini ölçün
                     </li>
                 
                   </ul>
                 </div>
               </div>
   
             </div>
               <!--- Data ---->

               <div class="h-36"></div>

           
              <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
               <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
                 <div>
                   <h3 class="text-gray-800 text-2xl font-bold mb-4">Hazır Menü Görselleri ve Kategoriler</h3>
                   <p class="text-gray-600 text-md">Ürün görselleriyle menünüzü zenginleştirin.</p>
        
                   <ul class="space-y-4 mt-8">
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Kategorilerle müşterilerinizi yönlendirin.
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Kategorilerle müşterilerinizi yönlendirin.
                     </li>
                     <li class="flex items-center gap-3 text-md text-gray-600">
                       <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                         <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                       </svg>
                       Görsellerle tercihleri kolaylaştırın.
                     </li>
                 
                   </ul>
                 </div>
                 <img src="{{ asset($activeThemeAssets.'images/product-image.png') }}" class="w-full object-contain rounded-md" />
               </div>
   
             </div>
               <!--- Data ---->
        </div>

        
</div>
<div class="bg-gray-50 justify-center items-center flex-1 p-5  text-center">
     <a  href="{{ route('register') }}" id="login-button" class="rounded rounded-lg animate-bounce delay-150 duration-300 button w-1/2 min-h-16  button-sliding-icon ripple-effect " type="submit"
     name="submit"><span class="text-xl">{{ ___('create_an_menu_in_1min') }}
          </span> <i class="icon-feather-arrow-right"></i></a>
        
</div>
<div class="my-5 font-[sans-serif] divide-y rounded-lg max-w-7xl mx-auto px-4">
     <div class="mb-8">
       <h2 class="text-2xl font-bold text-gray-800">Sık sorulan sorular</h2>
     </div>
   
     <!-- Accordion Item 1 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">CraftOrder’ı denemek için ücret ödemem gerekiyor mu?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Hayır, CraftOrder’ı 7 gün boyunca ücretsiz olarak deneyebilirsiniz. Ücretsiz deneme süresi boyunca tüm özellikleri keşfedebilirsiniz.</p>
       </div>
     </div>
   
     <!-- Accordion Item 2 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">7 günlük ücretsiz deneme süresi dolduğunda ne olacak?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Ücretsiz deneme süreniz sona erdiğinde, size uygun bir abonelik planı seçerek kullanıma devam edebilirsiniz. Planlar arasında aylık, 6 aylık ve yıllık seçenekler mevcuttur.</p>
       </div>
     </div>
   
     <!-- Accordion Item 3 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">CraftOrder hangi işletmeler için uygundur?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">CraftOrder, restoranlar, cafeler, oteller ve benzeri işletmeler için tasarlanmıştır. Müşterilerin QR kodu ile kolayca menüye ulaşmasını ve sipariş vermesini sağlar.</p>
       </div>
     </div>
   
     <!-- Accordion Item 4 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Siparişler nasıl iletiliyor?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Müşteriler QR kodu tarayarak menüye ulaşır ve siparişlerini verir. Siparişler anında mutfağa iletilir ve gerçek zamanlı olarak takip edilebilir.</p>
       </div>
     </div>
   
     <!-- Accordion Item 5 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Farklı paket seçenekleriniz neler?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">CraftOrder üç farklı paket sunar: Aylık (Pro), 6 Aylık (Infinity Plan), ve Yıllık (Prime). Her paket, tüm özelliklere erişim sağlar ve işletmenizin ihtiyaçlarına uygun çözümler sunar.</p>
       </div>
     </div>
   
     <!-- Accordion Item 6 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Müşteri geri bildirimlerini nasıl alabilirim?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">CraftOrder, müşterilerinizin sipariş sonrası geri bildirim bırakmasına olanak tanır. Bu geri bildirimlerle hizmet kalitenizi geliştirebilirsiniz.</p>
       </div>
     </div>
   
     <!-- Accordion Item 7 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Hangi teknolojilerle entegre çalışıyor?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">CraftOrder, herhangi bir cihazla uyumlu şekilde çalışır. Müşteriler, akıllı telefonlarından QR kodu tarayarak hızlıca sipariş verebilir.</p>
       </div>
     </div>
   
     <!-- Accordion Item 8 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Birden fazla şubem varsa kullanabilir miyim?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Evet, CraftOrder çoklu şube desteği sunar. Birden fazla lokasyon için kolayca yönetim sağlayabilirsiniz.</p>
       </div>
     </div>
   
     <!-- Accordion Item 9 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Sipariş ve masa yönetimi gerçek zamanlı mı?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Evet, tüm siparişler ve masa yönetimi gerçek zamanlı olarak takip edilir. Mutfak, servis ekibi ve yönetici anlık olarak siparişleri görebilir.</p>
       </div>
     </div>
   
     <!-- Accordion Item 10 -->
     <div class="accordion-item">
       <button type="button" class="accordion-button w-full text-base text-left font-semibold py-6 text-gray-800 flex items-center">
         <span class="mr-4">Abonelik planımı değiştirebilir miyim?</span>
         <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current ml-auto shrink-0" viewBox="0 0 124 124">
           <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" />
         </svg>
       </button>
       <div class="accordion-content hidden py-4">
         <p class="text-sm text-gray-800">Evet, mevcut planınızı yükseltmek veya düşürmek istediğinizde, planınızı kolayca değiştirebilirsiniz.</p>
       </div>
     </div>
   
   </div>
   
   <script>
     // Tüm accordion butonlarını seç
     const accordionButtons = document.querySelectorAll('.accordion-button');
   
     // Her bir butona tıklandığında içerik açma/kapama işlemini yap
     accordionButtons.forEach(button => {
       button.addEventListener('click', () => {
         // Butona tıklandığında yanındaki içerik bölümünü seç
         const content = button.nextElementSibling;
   
         // İçerik zaten açıksa kapat
         if (content.classList.contains('hidden')) {
           // Diğer açık olanları kapat
           document.querySelectorAll('.accordion-content').forEach(otherContent => {
             otherContent.classList.add('hidden');
           });
   
           // Tıklanan accordion'u aç
           content.classList.remove('hidden');
         } else {
           // Eğer zaten açık ise kapat
           content.classList.add('hidden');
         }
       });
     });
   </script>
   


   
<div class="bg-gray-50 pt-24 pb-24">

     <div class="max-w-6xl mx-auto font-[sans-serif] ">
          <div class="text-center max-w-2xl mx-auto bg-gray-50">
            <h2 class="text-gray-800 text-3xl font-extrabold text-center mb-6">Fiyatlandırma</h2>
            <p class="text-gray-600 text-md">İşletmenize özel uygun fiyat seçeneklerimizle, CraftOrder'ın tüm avantajlarından yararlanarak bütçenize uygun çözümler sunuyoruz; böylece hem maliyetlerinizi düşürebilir hem de verimliliğinizi artırabilirsiniz.

            </p>
          </div>
     
          <div class="mt-12 bg-gray-50 lg:p-10 p-6 rounded-md">
            <div class="grid md:grid-cols-2 items-center gap-16 md:min-h-[340px]">
              <div>
                
     
                <ul class="space-y-4 mt-8">
                  <li class="flex items-center gap-3 text-2xl text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    Anlık Masa ve Sipariş Takibi <span class="ml-12  text-md line-through text-gray-400 bg-transparent">2500 ₺</span>
                  </li>
                  <li class="flex items-center gap-3 text-2xl text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    Sınırsız İşletme <span class="ml-12  text-md line-through text-gray-400 bg-transparent">5000 ₺</span>
                  </li>
                  <li class="flex items-center gap-3 text-2xl text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    Müşteri Geri Bildirimi <span class="ml-12  text-md line-through text-gray-400 bg-transparent">2000 ₺</span>
                  </li>
               
                  <li class="flex items-center gap-3 text-2xl text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" class="bg-blue-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
                      <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
                    </svg>
                    Personel Yönetimi <span class="ml-12  text-md line-through text-gray-400 bg-transparent">1500 ₺</span>
                  </li>
                </ul>
              </div>

              <img src="{{ asset($activeThemeAssets.'images/logo-1.png') }}" class="w-full object-contain rounded-md" />
            </div>

            <div class="h-24"></div>
            <div class=" gap-3 text-2xl text-gray-600 align-content-center text-center">
           
               <span class="text-6xl">Yıllık Tek Fiyat</span>
              <div class="h-10"></div>
               <span class="text-5xl">2.999 ₺</span>
              <div class="h-2"></div>

               <span class="text-sm">* KDV dahil değildir</span>

            </div>
          </div>


          <div class="h-12"></div>
          <div class="bg-gray-50 justify-center items-center flex-1 p-5  text-center">
               <button id="login-button" class="rounded rounded-lg animate-bounce delay-150 duration-300 button w-1/2 min-h-16  button-sliding-icon ripple-effect " type="submit"
               name="submit"><span class="text-xl">Sınırsız kullanım için Satın Al
                    </span> <i class="icon-feather-arrow-right"></i></button>
                 
          </div>
          <div class="h-36"></div>
              
             
        </div>
 



  
    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs popup-dialog">
     <ul class="popup-tabs-nav">
         <li><a href="#login">{{ ___('Login') }}</a></li>
     </ul>
     <div class="popup-tabs-container">
         <div class="popup-tab-content" id="login">
             <div class="welcome-text">
                 <h3>{{ ___('Welcome Back!') }}</h3>
                 <span>{{ ___("Don't have an account?") }} <a
                         href="{{ route('register') }}">{{ ___('Sign Up Now!') }}</a></span>
             </div>
             @if(@$settings->facebook_login == "1" || @$settings->google_login == "1")
                 <div class="social-login-buttons">
                     @if(@$settings->facebook_login == "1")
                         <button class="facebook-login ripple-effect"
                                 onclick="location.href = '{{ route('social.login','facebook') }}'"><img
                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CjxyZWN0IHg9IjIiIHk9IjIiIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMC4xMjU4IiBmaWxsPSJ1cmwoI3BhdHRlcm4wKSIvPgo8ZGVmcz4KPHBhdHRlcm4gaWQ9InBhdHRlcm4wIiBwYXR0ZXJuQ29udGVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgd2lkdGg9IjEiIGhlaWdodD0iMSI+Cjx1c2UgeGxpbms6aHJlZj0iI2ltYWdlMF8xMDAxNF8zNjIwMiIgdHJhbnNmb3JtPSJzY2FsZSgwLjAwNjI4OTMxIDAuMDA2MjUpIi8+CjwvcGF0dGVybj4KPGltYWdlIGlkPSJpbWFnZTBfMTAwMTRfMzYyMDIiIHdpZHRoPSIxNTkiIGhlaWdodD0iMTYwIiB4bGluazpocmVmPSJkYXRhOmltYWdlL3BuZztiYXNlNjQsaVZCT1J3MEtHZ29BQUFBTlNVaEVVZ0FBQUo4QUFBQ2dDQVlBQUFBU043NllBQUFBQ1hCSVdYTUFBQmNSQUFBWEVRSEtKdk0vQUFBSzdVbEVRVlI0bk8yZFg0aGNWeDNIei82SjdpYk1idElHNjFocXB3VkJNWmlWMHBlK1pQTW1GTW1HNGtPbGtBMkliK0lLTFF3K2JSQnhYc1FwUGdoUzZDN29ndy9pNUVGQm55YWdCVkZ4STJvZjFHYlh0TDAyYnByTVRzd203ZTZNSFAwTmU1bHo3cDM3NS95OTUvdUJZWko3Nyt6ZW1mM003L3o3blhPbWhzTWhBOEFHMC9qVWdTMGdIN0FHNUFQV2dIekFHclA0Nkkrb04vdExqTEdUakxGbGVsNmlrdzNHMkpQQ0M5SzVSbWUzNDQrb1ZldW12aW9nZ20zdGttakxKQmgvbkJVdTBzY09ZMnlMSHQxUWhReEd2bnF6ejZQWENnbkhINHZDUlhiaGtaSkwySWxhdFMzSDdrMExsWmFQb3RzcXlXWXlzcFdseHlVa0VUc2UzWGN1S2lkZkxNS3RGYWludWNoSXhIYlZJbUpsNUtzMyt5c1U1UzRJSjZzRHJ5dTJHV01iVWF0MjEvZDM1YlY4OVdiL0pFVzU5WXBFdWF5TW91RjYxS3B0KzNITElsN0tSOUt0MGNPMWhvTnBObjJWMER2NTZzMytPcVNUNHAyRTNzaFhiL1pYQXl4ZWkzQ0ZHaWZPMXdtZGw0KzZTM2dsKzV4d0VpVEI2NFJyVWF1MmtYRGVDWnlWaitwMVBOSjlYVGdKc3NJN3JsZGRMWXFkVEN5b04vdkxOUFFFOGNyQlM0c2JWRTkyRHVjaVg3M1piME02TFRnWEJaMlJqK3AyRzU0TmcvbUdVM1ZCSjRwZGFzbDJJWjUyZVBmVTYvVm0zd241ckVjK0ZMUFd1TTRUTG14MnlWaVRqMXF6R3hVZmkzV2RIZ2xvSldIQlNyRkw0blVobm5WNE1keWxwQXpqR0plUEdoYmJxTjg1QXhmd1oxVHZOb3BSK1VpOExzWmxuZVIxMHdJYWt3L2llWUZSQVkzSUIvRzh3cGlBMnVXRGVGNWlSRUN0WFMwMG4ySUw0bm5MWloyaklkcmtpM1dub0ZYck4rZDF6U3ZXV2V4Q3ZHclFvYXFUY3JUSVIyT0hFSzhhTEpLQUoxVy9HK1h5VVVYMWtuQUMrTXlUTkZ0T0tVcnJmQlNlL3lpY0NKalBmbUthTFQwK3MvK1ordlN0YzUrYW5aMlpaZ2VQbnBoYVdKaWJPalgrcVh4NHlQYmZ2anU0TmZyLzczY09aL2NlREEvZTJ4c3UvT0dmaDZkNkQ0YnNMKzhPYkg2WVY2SldUVmxpcWpMNUtDeHZoVDdCWjJGK2luM3h6T3oraTg4ZTIvM2M0ek9uajgyd2VlR2lrdHg3T0x6OTczdkRlMXpPdjkwYUhQOSs5d05CWkkwb2E0Q29sSzhUY3FMQWMwL1BzRzkrNGFNM24vbmt6QlBDU2MzVW0zMlR2NDVud2pSVXBHSXBXWitQc2lLQ0ZJOUw5KzBMYys5OStySHB4eGhqeHNXendDS2x3cFhPaENrZCthaTQzUTZ0SS9tSlU5T3MvYVc1M2VlZW5qa3RuRFNNNGNnMzRtTFpGYlJVdEhZM1FoUHYrVE96OTMvejhvbDlGOFN6eUViWjdwZFM4b1ZZM0g3M2hibmQxMTZhUDY2akllRVppelNadnpDRjVTUHJTLzF5MzNqdHBmbjN2L3pzc1pDajNUaVhhSTUxSWNwRXZxb3N2cGdKTHQ3eloyWWY4ZUJXVFZNNEFCV1NqN0pWMW9RVEZZVVh0UkF2a2JORjA2K0tScjcxVUJvWnZIR0JvbllpN1NLTmo5enlVZFFMWXV5V2Q2Zjg0TVg1S2VFRUdHZXhTRWxZSlBJNXVlaU1EbmcvSGxxMW1WbkxHLzF5eVJkUzFPTWpGNEgzNCtVbGQvVExHL21DaVhwOHlFdzRDQ2FoUno0S3FjRkVQUnFyQmZsWXpOUHl6UlA1Z3VsYTRka3B3a0dRbGN5ZTVKSFArSElLTnVENWVEYlNvaXJFMmF5akhwbmtvekhjSUVZemVDS29jQkRrSlZPZ3locjVnb2g2SEo2QkxCd0VlYm1VcGR0bG9uejBRNExKWE9HcDc4SkJVSVNKeWFaWk1wbXRyTjFtQXo3WngxYW44dDZENFoxZi92WGcvbTl2SEQ1eTQvYmdmL2Znd0lTaE1xeFFybWNpa0M4R24yWEdtRm41M3UwTmQ3LzJrLzNUYjd4MXlDY0JtWndJcEpzTHZOUk1tK3VSV3V5R1Z1VHk2WTNDUVkzOC9NOEg3ei96blh0Y1BOTnYxUlNwZ1N0VnZwQ2lIb2ZQcXhVT2FvS0w5NVVmN1ZjOVRTdlZuMG55RmM1UzlSRStvZHZFYmZmMmg3MEF4R09UU2sxRXZoanp4NmJtaElNYStOWXZIbjdFempzMFQxcUhjNko4dFBSRlVMUFNQcjR3cFgwOGx5K0o4ZVBmZlJoU21sWisrZEplQklyenAzY09RK3ZFVHZRSThobG02KzFEYnp2dUNwSzRUM0thZkZvV0JBeWRONlBCeDBMN0NKTHFmVkw1cUg4UDI4bHJZRFI2RVJqU1FDYVZMK2xpQUFyU2tMMHNTVDVwbUFTZ0lOSmdsaVNmOHZWM1FkQklHeDFKOGtsTkJhQW9zdnkrSlBta1pUUUFKUkFDV3BKOGFPa0M3UWp5eWNJakFBb1FHckdDZkxMd0NJQU9aUElCb0FPaFJJVjh3QlJDaVNxVFQ3Z0lBQjNJNUJQQ0l3Q201QVBBQ0pBUFdNUFliQzFkdlBIS2laMm5IcDMycGxQOHAxODlMaHdyaTZVZGlFcUR5T2M1ZkU2SXIrOEE4bmxPZkg5ZTM1REpsN2k4QVhBUHZ1ZHVsZVRiRW80QVorR2JQZnY2MTVISkJ6eUNiMy92eWQwS1FRM3llYzdOTzJwMmlqZUFVSjJUeVNjWUN0emw1aDEvcHdFTDhxV3Rwd2JjNHNidHdZNUhmNUx1K0FGQlBzS25OeFVzYiswT2t2NStYcEIwODl2Q0VlQWNmNzgxOEdtMUs2RTZseVNmY0NGd2oxKzllZUROTGtteTZseVNmTUtGd0QzNGd1R2VjRTEybTBueUNaVkQ0QjRlclZRdkxVbVQ1Sk5lRE56aFgzdERuM2JGbExZaHBQSlIrWXdXcjhPOGMzZndnVWUzS3cxbVV2blNYZ0Rjd0tkRkpxTldUVnFOUzVOUCtnTGdCci8reDZFdkNiVFN4Z2FEZlA2eXQrOU5TemZSbzBUNW9sYU5GN3M5NFFSd0FvOTJMY292SDlFUmpqakd3d05tWk84TWw3aHpmK2pOcEkyaytoN0xNSUdJdi9DU2NOUWh6bi92UDhwNithTldUVGltbWhkK2VGOUYxTkovbzJxNG12WlR2STk4d0dsUy9VbVZqL3I3VXUwRklJWGk4aEdwUHdDQUJLN0trZ2tnSHpEQlJHOG15b2VpRnhTa3ZIeEU2bDc1QUl5eG1XVTZSaWI1b2xhdGcwUURrSU5Nd1NyUEhBQkVQNUNGNjJrZHkzSHl5TmNXamdBZ2t0bVR6UEpSR2I0cG5BRGdpSjJvVmN0Y1F1YWRlcmN1SEFIZ2lGeFZzMXp5UmEzYU5xSWZTS0NYdDJwV1pOSXhvaCtRMGM2NzJrVnUrUkQ5Z0lTZElnM1Nvc3N0ckNQUkZNUllMN0xHVHlINUtQcWg2d1V3NnRjcjFBZGNacUdaTmtZOUFHTnNyZWlIVUZnK0NyT3J3Z2tRRXB0WlJ6TmtsRnBpaTM0eE1sN0NwRmNtNmpGRnkrS3VvdkVSSkt0bEZ4SXRMUitLM3lDNVNwbE9wVkN5c2lYZENQcit3cUNuS3Rpb1hGWjFEYTNmSUZoUnRXNjNNdm5vaGxhRUU2QktYQ25UdWgxSDZZTFN0TVRHWmVFRXFBTFhvbFpONmJpKzh0WE1xYmNiOWI5cWNWMUhxYVpsS2Yyb1ZWdE5XeG9MZUVWUFJiZUtESjM3T0t6UU53YjR6UXBWcDVTalRUNzZwaXlqQTlwckxxdHNZSXlqZFFjYkNPZzFsNHRtcTJSRisvWkpGTElob0Y5b0Y0K1oydklVQW5xRkVmR1l5ZjEySWFBWEdCT1BtZDdzT1NZZ2h1SGN3Nmg0ek1aTzR5VGdFcnBobklHWFJCZE5pOGRzYlhNZmF3VWpFZFV1WEx4bEZlbFJSYkMyV1RBWE1HclZlRWYwcThKSllBSmU4alIwZFNCbndmcE8xVkdyeGxPeExxSWhZcFJYbzFadFNjZVFXUjZjMkNhZHdqN3FnZm9aMWU5S3piMVFoVE43OVBPNXdQemJ5SFBHaEpOQUJUelJZOGxXL1U2R00vS05vSnl4OCtpT1VRYVBkdCtJV3JWbG11enZETTdKeDQ2bVpDSUtsbWNVN1p4Y1hjSkorZGhSYTVoSHdjOGpOekEzUGVvMGRpN2F4WEZXdmhHOEs0Qi9pTlFpUmxHY1RvOUtpNGFOVHVPOFROcjR6eG1vb3R5cE4vdHJ0RXJXb2kvM2JvaE5XaTNLMlVnM2p2T1JieHlxdnpUb0c0Nit3ZjlMOXhTZnV1Q1RlTXlueUJlSE9rZDU5RnV2Ti91cjlHOWZ0bjFYUVkvV1AyNzdKbHdjTCtXTFEzV2JqWHF6djB3VDF5OElGMVdINjdRMFhjZjI2SVFLdkpkdkJIWFBkT3ZOZm9NbUwvR0llRmE0MEQ5NnRJOVoyK1k0ckE0cUk5K0kyS3FwN1hxenYwUWlybmdtNGtpNGprc2pFcXFwbkh4eEtGSnNVZDJ3UVdsY0svVHNXbXVaOTJWMlNiaEtSYmdrS2kxZkhJcUlHNk9OU2lncXhoL25oQmZwZy9kWGpyNFlYWjNURTExbWFqZ2NodmkrazJqUVk1bk9qNTRiT1Z2VFBSS0wwZlBkMkhPUW9zbUFmTUFhM25VeWcrb0ErWUExSUIrd0J1UURkbUNNL1JjenBaTDVrNUxrcFFBQUFBQkpSVTVFcmtKZ2dnPT0iLz4KPC9kZWZzPgo8L3N2Zz4K"> {{ ___('Log In via Facebook') }}
                         </button>
                     @endif
                     @if(@$settings->google_login == "1")
                         <button class="google-login ripple-effect"
                                 onclick="location.href = '{{ route('social.login','google') }}'"><img
                                 src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0yMC42NCAxMi4yMDQ3QzIwLjY0IDExLjU2NjUgMjAuNTgyNyAxMC45NTI5IDIwLjQ3NjQgMTAuMzYzOEgxMlYxMy44NDUxSDE2Ljg0MzZDMTYuNjM1IDE0Ljk3MDEgMTYuMDAwOSAxNS45MjMzIDE1LjA0NzcgMTYuNTYxNVYxOC44MTk3SDE3Ljk1NjRDMTkuNjU4MiAxNy4yNTI5IDIwLjY0IDE0Ljk0NTYgMjAuNjQgMTIuMjA0N1oiIGZpbGw9IiM0Mjg1RjQiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMS45OTk4IDIxLjAwMDFDMTQuNDI5OCAyMS4wMDAxIDE2LjQ2NyAyMC4xOTQyIDE3Ljk1NjEgMTguODE5NkwxNS4wNDc1IDE2LjU2MTRDMTQuMjQxNiAxNy4xMDE0IDEzLjIxMDcgMTcuNDIwNSAxMS45OTk4IDE3LjQyMDVDOS42NTU2NyAxNy40MjA1IDcuNjcxNTggMTUuODM3NCA2Ljk2Mzg1IDEzLjcxMDFIMy45NTcwM1YxNi4wNDE5QzUuNDM3OTQgMTguOTgzMyA4LjQ4MTU4IDIxLjAwMDEgMTEuOTk5OCAyMS4wMDAxWiIgZmlsbD0iIzM0QTg1MyIvPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTYuOTY0MDkgMTMuNzA5OEM2Ljc4NDA5IDEzLjE2OTggNi42ODE4MiAxMi41OTMgNi42ODE4MiAxMS45OTk4QzYuNjgxODIgMTEuNDA2NiA2Ljc4NDA5IDEwLjgyOTggNi45NjQwOSAxMC4yODk4VjcuOTU4MDFIMy45NTcyN0MzLjM0NzczIDkuMTczMDEgMyAxMC41NDc2IDMgMTEuOTk5OEMzIDEzLjQ1MjEgMy4zNDc3MyAxNC44MjY2IDMuOTU3MjcgMTYuMDQxNkw2Ljk2NDA5IDEzLjcwOThaIiBmaWxsPSIjRkJCQzA1Ii8+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTEuOTk5OCA2LjU3OTU1QzEzLjMyMTEgNi41Nzk1NSAxNC41MDc1IDcuMDMzNjQgMTUuNDQwMiA3LjkyNTQ1TDE4LjAyMTYgNS4zNDQwOUMxNi40NjI5IDMuODkxODIgMTQuNDI1NyAzIDExLjk5OTggM0M4LjQ4MTU4IDMgNS40Mzc5NCA1LjAxNjgyIDMuOTU3MDMgNy45NTgxOEw2Ljk2Mzg1IDEwLjI5QzcuNjcxNTggOC4xNjI3MyA5LjY1NTY3IDYuNTc5NTUgMTEuOTk5OCA2LjU3OTU1WiIgZmlsbD0iI0VBNDMzNSIvPgo8L3N2Zz4K"> {{ ___('Log In via Google') }}
                         </button>
                     @endif
                 </div>
                 <div class="social-login-separator"><span>{{ ___('or') }}</span></div>
             @endif

             <form id="login-form" method="post"
                   action="{{ route('login') }}">
                 @csrf
                 <div id="login-status" class="notification error" style="display:none"></div>
                 <div class="input-with-icon-left">
                     <i class="la la-user"></i>
                     <input type="text" class="input-text with-border" name="username"
                            placeholder="{{ ___('Username') }}" required/>
                 </div>

                 <div class="input-with-icon-left">
                     <i class="la la-unlock"></i>
                     <input type="password" class="input-text with-border" name="password"
                            placeholder="{{ ___('Password') }}" required/>
                 </div>
                 <div class="d-flex justify-content-between">
                     <div class="checkbox">
                         <input type="checkbox" id="remember" name="remember" value="1" checked>
                         <label for="remember"><span class="checkbox-icon"></span> {{ ___('Remember Me') }}</label>
                     </div>
                     <a href="{{ route('password.request') }}">{{ ___('Forgot Password?') }}</a>
                 </div>
                 <button id="login-button" class="button full-width button-sliding-icon ripple-effect" type="submit"
                         name="submit">{{ ___('Login') }} <i class="icon-feather-arrow-right"></i></button>
             </form>
             @if(demo_mode())
                 <table class="margin-top-30 text-center" width="100%" border="1" style="border:1px solid #dee2e6">
                     <tr>
                         <th></th>
                         <th>{{ ___('Username') }}</th>
                         <th>{{ ___('Password') }}</th>
                     </tr>
                     <tr>
                         <th>Admin</th>
                         <td>admin</td>
                         <td>123456</td>
                     </tr>
                     <tr>
                         <th>User</th>
                         <td>demo</td>
                         <td>123456</td>
                     </tr>
                 </table>
             @endif
         </div>
     </div>
 </div>

@endsection
