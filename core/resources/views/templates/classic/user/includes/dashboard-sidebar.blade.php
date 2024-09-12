<!-- Dashboard Sidebar
        ================================================== -->
<div class="dashboard-sidebar">
    <div class="dashboard-sidebar-inner" data-simplebar>
        <div class="dashboard-nav-container">
        @php
    $posts = request()->user()->posts;
@endphp   
            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
                <span class="trigger-title">{{ ___('Dashboard Navigation') }}</span>
            </a>
            <!-- Navigation -->
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="{{ ___('My Account') }}">
                        <li class="{{ request()->route()->getName() == 'dashboard' ? 'active' : '' }}"><a
                                href="{{ route('dashboard') }}"><i
                                    class="icon-feather-grid"></i> {{ ___('Dashboard') }}</a></li>

                        <li class="{{ request()->route()->getName() == 'subscription' ? 'active' : '' }}"><a
                                href="{{ route('subscription') }}"><i
                                    class="icon-feather-gift"></i> {{ ___('Membership') }}</a></li>
                    </ul>

                    <ul data-submenu-title="{{ ___('Organize and Manage') }}">
  
                        <li class="{{ request()->route()->getName() == 'restaurants.index' || request()->route()->getName() == 'restaurants.qrbuilder' ? 'active' : '' }}"><a
                                href="{{ route('restaurants.index') }}"><i
                                    class="far fa-utensils"></i> {{ ___('My Restaurants') }}</a></li>
                                
                                    
                                    <li class="{{ request()->route()->getName() == 'tables' ? 'active' : '' }} tablepage"><a
                                        href="javascript:void(0)"><i
                                            class="far fa-mug-hot"></i> {{ ___('My_tables') }}</a>
                                </li> 
                        
                                    <li class="{{ request()->route()->getName() == 'restaurants.orders' ? 'active' : '' }}"><a
                                href="{{ route('restaurants.orders') }}"><i
                                    class="icon-feather-package"></i> {{ ___('Orders') }}</a></li>
                                 
                                    <li class="{{ request()->route()->getName() == 'staffs' ? 'active' : '' }}"><a
                                        href="{{ route('staffs') }}"><i
                                            class="icon-feather-settings"></i> {{ ___('staffmanagement') }}</a>
                                </li>      
                                <li class="{{ request()->route()->getName() == 'feedbacks' ? 'active' : '' }}"><a
                                   href="{{ route('feedbacks') }}"><i
                                       class="far fa-comment"></i> {{ ___('feedbacks') }}</a>
                           </li>   
                    </ul>

                    
                    <ul data-submenu-title="{{ ___('Account') }}">
                        <li class="{{ request()->route()->getName() == 'transactions' ? 'active' : '' }}"><a
                                href="{{ route('transactions') }}"><i
                                    class="icon-feather-file-text"></i> {{ ___('Transactions') }}</a></li>
                        <li class="{{ request()->route()->getName() == 'settings' ? 'active' : '' }}"><a
                                href="{{ route('settings') }}"><i
                                    class="icon-feather-settings"></i> {{ ___('Account Setting') }}</a>
                        </li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="icon-feather-log-out"></i> {{ ___('Logout') }}</a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->
        </div>
    </div>
</div>

<div id="tablepage-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    

<!--Tabs -->
        <div class="sign-in-form">
            <ul class="popup-tabs-nav">
                <li><a>{{___('My Tables')}}</a></li>
            </ul>
           

            <div class="popup-tabs-container">




                <!-- Tab -->
                <div class="popup-tab-content">
                    <form action="#" method="post" id="selectPost">
                        @csrf
                        <div class="submit-field">
                
                         <label for="menu" class="with-border block text-sm font-medium text-gray-700">{{ ___('Name') }}</label>
                         <select id="menu" name="name" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">

                             @foreach ($posts as $post)
    <option data-item="{{ $post->id }}">{{$post->title}}</option>
@endforeach
                         </select> 
                    
                    </div>
                        <!-- Button -->
                        <button class=" margin-top-0 button button-sliding-icon ripple-effect"
                                type="submit">{{___('Select')}} <i class="icon-material-outline-arrow-right-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>


$('.tablepage').on('click', function (e) {
        e.preventDefault();
        
        $('#selectPost').trigger('reset');

        $.magnificPopup.open({
            items: {
                src: '#tablepage-dialog',
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

        $("#selectPost").on("submit",function(e){
e.preventDefault();


var selectedOption= $("#menu option:selected");
var postId= selectedOption.data("item");
if (postId) {
     var redirectUrl = "{{ route('restaurants.tablemanage', ':id') }}".replace(':id', postId);

// Tarayıcıyı yeni route'a yönlendir
window.location.href = redirectUrl;
}
          
        });
    });

</script>
<!-- Dashboard Sidebar / End -->
