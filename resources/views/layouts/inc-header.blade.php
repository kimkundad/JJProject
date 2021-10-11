<div id="preloader" style="display: none;">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->

<div class="layer"></div>
<!-- Mobile menu overlay mask -->


 <!-- Header================================================== -->
<header class="" id="set-head">
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong>086-551-7336</strong></div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                    <ul id="top_links">
                        <li>
                          @if (Auth::guest())
                          <div class="dropdown dropdown-access">
                              <a href="{{url('login')}}" class="dropdown-toggle" id="access_link">{{ trans('message.signin') }}</a>

                          </div><!-- End Dropdown access -->
                          @else
                          <div class="dropdown dropdown-mini">
                            @if(Auth::user()->is_admin == 1)
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link">{{ substr(Auth::user()->name,0,15) }} <i class="icon-down-open-mini"></i></a>
                                <div class="dropdown-menu" style="min-width: 160px;">
                                    <ul id="lang_menu">
                                        
                                            <li>
                                                <a href="{{url('admin/user')}}"><i class="icon_set_1_icon-65"></i> แอดมินหลังบ้าน</a>
                                            </li>
                                        <li><a href="{{url('my_account')}}"><i class="icon_set_1_icon-29"></i> บัญชีของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_purchase') }}"><i class="icon_set_1_icon-50"></i> การซื้อของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_coupon') }}"><i class="im im-icon-Gift-Box" style="margin-right:5px; margin-left:5px;"></i> คูปองส่วนลด </a>
                                        </li>
                                        <li><a href="{{ url('payment_notify') }}"><i class="im im-icon-Coin" style="margin-right:5px; margin-left:5px;"></i> แจ้งชำระเงินโอน </a>
                                        </li>
                                        <li><a href="{{ url('delete_my_account') }}"><i class="icon_set_1_icon-94" ></i> ลบบัญชีของคุณ</a></li>
                                        <li><a href="{{ url('logout') }}"><i class="icon-lock" style="margin-right:5px; margin-left:5px;"></i> ออกจากระบบ </a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link">{{ substr(Auth::user()->name,0,15) }} <i class="icon-down-open-mini"></i></a>
                                    <div class="dropdown-menu" style="min-width: 160px;">
                                        <ul id="lang_menu">
                                        <li><a href="{{url('my_account')}}"><i class="icon_set_1_icon-29"></i> บัญชีของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_purchase') }}"><i class="icon_set_1_icon-50"></i> การซื้อของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_coupon') }}"><i class="im im-icon-Gift-Box" style="margin-right:5px; margin-left:5px;"></i> คูปองส่วนลด </a>
                                        </li>
                                        <li><a href="{{ url('payment_notify') }}"><i class="im im-icon-Coin" style="margin-right:5px; margin-left:5px;"></i> แจ้งชำระเงินโอน </a>
                                        </li>
                                        <li><a href="{{ url('delete_my_account') }}"><i class="icon_set_1_icon-94" ></i> ลบบัญชีของคุณ</a></li>
                                        <li><a href="{{ url('logout') }}"><i class="icon-lock" style="margin-right:5px; margin-left:5px;"></i> ออกจากระบบ </a>
                                        </li>
                                        </ul>
                                    </div>
                            @endif

                          </div><!-- End Dropdown access -->
                          @endif

                        </li>
                        <li><a href="{{url('wishlist')}}" id="wishlist_link">{{ trans('message.wishlist') }}</a></li>
                        <li><a href="{{url('confirm_payment')}}" id="icon-dollar"><i class="icon-dollar"></i>{{ trans('message.payment') }}</a></li>
                        <li>Language : {{ trans('message.lang') }}</li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->

    <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3">
              <div id="logo">
                  <a href="{{url('/')}}"><img src="{{url('assets/img/new_logo_sticky.png')}}" height="54" alt="TEENEEJJ" data-retina="true" class="logo_normal"></a>
                  <a href="{{url('/')}}"><img src="{{url('assets/img/new_logo_sticky.png')}}" height="54" alt="TEENEEJJ" data-retina="true" class="logo_sticky"></a>
              </div>
          </div>
            <nav class="col-md-9 col-sm-9 col-xs-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{url('assets/img/logo_sticky.png')}}" height="54" alt="City tours" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                      <li>
                          <a style="font-size: 15px;" href="{{url('/')}}">{{ trans('message.index') }} </a>

                      </li>

                      <li>
                         <a style="font-size: 15px;" href="{{url('/presentation')}}">{{ trans('message.category') }} </a>

                     </li>

                  <li>
                     <a style="font-size: 15px;" href="{{url('/contact_us')}}">{{ trans('message.contact_us') }}  </a>
                 </li>
                 <li>
                     <a style="font-size: 15px;" href="{{url('/all_vouchers')}}">แจกโค้ดส่วนลด  </a>
                 </li>
                 @if (Auth::guest())
                 @else
                 <li class="submenu visible-sm visible-xs">
                                <a href="javascript:void(0);" class="show-submenu">บัญชีของ {{ substr(Auth::user()->name,0,15) }} <i class="icon-down-open-mini"></i></a>
                                <ul>
                                        @if(Auth::user()->is_admin == 1)
                                            <li>
                                                <a href="{{url('admin/user')}}"> แอดมินหลังบ้าน</a>
                                            </li>
                                        @endif
                                        <li><a href="{{url('my_account')}}"> บัญชีของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_purchase') }}"> การซื้อของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_coupon') }}"> คูปองส่วนลด </a>
                                        </li>
                                        <li><a href="{{ url('payment_notify') }}"> แจ้งชำระเงินโอน </a>
                                        </li>
                                        <li><a href="{{ url('logout') }}"> ออกจากระบบ </a>
                                        </li>

                                </ul>
                 </li>

                 @endif
                 <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Choose language <i class="icon-down-open-mini"></i></a>
                                <ul>

                                    <li><a href="{{ URL::to('change/th') }}">Thai language</a></li>
                                    <li><a href="{{ URL::to('change/en') }}">Englist language</a></li>
                                    <li><a href="{{ URL::to('change/ch') }}">Chaina language</a></li>

                                </ul>
                 </li>



                    </ul>
                  
                    <div id="google_translate_elementTWO"></div>
                </div><!-- End main-menu -->



                <ul id="top_tools">

                        <li>
                            <div class="dropdown dropdown-cart">
                            @if(Session::get('cart') != null)
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-basket-1"></i>Cart ({{count(array(Session::get('cart')))}}) </a>
                            @else
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-basket-1"></i>Cart (0) </a>
                            @endif

                                @if(Session::get('cart') != null)

                                <?php
                                $cart = session()->get('cart');
                                $total = 0;
                                 ?>
                                <ul class="dropdown-menu" id="cart_items" >
                                  @foreach ($cart as $product_item)
                                    <li>
                                        <div class="image"><img src="{{url('assets/image/product/'.$product_item['image'])}}" ></div>
                                        <strong>
										<a href="#">{{$product_item['name_product']}}</a>{{$product_item['qty']}}x ฿{{number_format($product_item['price'])}} </strong>
                                        <a href="{{url('/deleteCart/'.$product_item['id'])}}" class="action"><i class="icon-trash"></i></a>
                                        <?php
                                          $total += ($product_item['qty'] * $product_item['price']);
                                         ?>
                                    </li>
                                  @endforeach

                                    <li>
                                        <div>Total: <span>฿{{number_format($total)}}.00</span></div>
                                        <a href="{{url('cart')}}" class="button_drop">รถเข็น</a>
                                        <a href="{{url('shipping/')}}" class="button_drop outline">สั่งสินค้า</a>
                                    </li>
                                </ul>
                                @endif

                            </div><!-- End dropdown-cart-->
                        </li>
                    </ul>


            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->
