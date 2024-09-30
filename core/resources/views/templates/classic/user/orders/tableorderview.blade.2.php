<div id="view-order" class="">
  
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
                             <span class="menu_price"><span class="your-order-price"></span></span>
                         </h4>
                     </div>
                     <form method="POST" action="{{route('restaurant.sendOrderTable', $post->id)}}" id="send-order-form">
                         @csrf
                         <input type="text" class="with-border" name="name" placeholder="{{ ___('Customer Name') }}" >
                         <input type="hidden" name="table_number" value="{{ $table->id }}">

                         <input id="phone-number-field" type="number" name="phone-number" class="with-border" placeholder="{{ ___('Phone Number') }}">
                         <textarea id="address-field" class="with-border" name="address" placeholder="{{ ___('Address') }}" rows="1"></textarea>
                         <textarea class="with-border" name="message" placeholder="{{ ___('Message') }}" rows="1"></textarea>
                         <small class="form-error"></small>
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
