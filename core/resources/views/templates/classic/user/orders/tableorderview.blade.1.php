<div id="view-order" class="">
  
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
                 </div>
                 <button class="button order-print-button"><i class="fa fa-print"></i> {{___('Print Receipt')}}
                 </button>
             </div>
         </div>
     </div>
 </div>
 