<div id="view-order" class="lg:tw-col-span-1 tw-px-4">
  
     <!--Tabs -->
     <div class="sign-in-form">
         <ul class="popup-tabs-nav">
             <li><a class="menu_title">{{ ___('Order') }}</a></li>
         </ul>
         <div class="popup-tabs-container">
             <!-- Tab -->
             <div class="popup-tab-content">
                 <div class="your-order-content">
                     <div class="your-order-items"></div>
                     <div class="menu_detail order-total margin-bottom-20">
                         <h4 class="menu_post">
                             <span class="menu_title">{{ ___('Total') }}</span>
                             <span class="menu_price"><span id="your-order-price"></span></span>
                         </h4>
                     </div>
                     <form method="POST" action="{{ route('restaurant.sendOrderTable', $post->id) }}" id="send-order-form">
                         @csrf
                         <input type="hidden" name="table_number" value="{{ $table->id }}">
                         <!-- Müşteri İsmi -->
                         <div class="hide-on-table">
                             <input type="text" class="with-border" name="name" placeholder="{{ ___('Customer Name') }}">
                         </div>
                     
                         <!-- Genel Mesaj Alanı -->
                         <div class="hide-on-table">
                             <textarea class="with-border" name="message" placeholder="{{ ___('Message') }}" rows="1"></textarea>
                         </div>
                     
                         <!-- Sipariş Tipi Seçimi -->
                         <label for="ordering-type">{{ ___('Ordering Type') }}</label>
                         <select id="ordering-type" name="ordering-type" class="with-border">
                             <option value="on-table">{{ ___('On Table') }}</option>
                             <option value="takeaway">{{ ___('Takeaway') }}</option>
                             <option value="delivery">{{ ___('Delivery') }}</option>
                         </select>
                     
                         <!-- Diğer alanlar... -->
                     
                         <!-- Siparişi Gönder Butonu -->
                         <button type="submit" id="submit-order-button" class="button ripple-effect margin-top-0">
                             <i class="icon-feather-send"></i>
                             <span>{{ ___('Send Order') }}</span>
                         </button>
                     </form>
                     
                     
                 </div>
             </div>
             
         </div>
     </div>



</div>
