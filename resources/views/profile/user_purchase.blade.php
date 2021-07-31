@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')
<link href="{{url('assets/css/admin.css')}}" rel="stylesheet">
<style>

.strip_booking h3.hotel_booking:before {
    content: '\52';
}
.strip_booking h3 span {
    margin-top: 5px;
    color: #26aa99;
    display: block;
    font-size: 16px !important;
}
</style>
@stop('stylesheet')
@section('content')


<section class="parallax-window" style="min-height: 270px;" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">การซื้อของฉัน</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

            <div class=" margin_30 text-center">
                <h2 class="major"><span>การซื้อของฉัน </span></h2>
            </div>


            <div class="row">
                <aside class="col-md-3">
                    <div class="box_style_cat">
                    <ul id="cat_nav">
                                        <li><a href="{{url('my_account')}}"><i class="icon_set_1_icon-29"></i> บัญชีของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_purchase') }}"><i class="icon_set_1_icon-50"></i> การซื้อของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_coupon') }}"><i class="im im-icon-Gift-Box" style="margin-right:10px; "></i> คูปองส่วนลด </a>
                                        </li>
                                        <li><a href="{{ url('payment_notify') }}"><i class="im im-icon-Coin" style="margin-right:10px; "></i> แจ้งชำระเงินโอน </a>
                                        </li>
                                        <li><a href="{{ url('delete_my_account') }}"><i class="icon_set_1_icon-94" ></i> ลบบัญชีของคุณ</a></li>
                                        <li><a href="{{ url('logout') }}"><i class="icon-lock" ></i> ออกจากระบบ </a>
                                        </li>

                                    </ul>
                    </div>
                </aside>
                <div class="col-md-9">
                    <h3>การซื้อของฉัน </h3>
                    <br />
                    
                    <div id="tabs" class="tabs">

                    <nav>
                        <ul>
                            <li class="tab-current"><a href="#section-1"><span>ทั้งหมด</span></a>
                            </li>
                            <li class=""><a href="#section-2"><span>ที่ต้องชำระ</span></a>
                            </li>
                            <li class=""><a href="#section-3"><span>ที่ต้องได้รับ</span></a>
                            </li>
                        </ul>
				    </nav>

                    <div class="content">

                    <section id="section-1" class="">

                        @if(isset($get_order))
                        @foreach($get_order as $u)
						<div class="strip_booking">
							<div class="row">
								<div class="col-lg-2 col-md-2">
									<div class="date">
										<span class="month">{{date_format(date_create($u->created_at),"M")}}</span>
										<span class="day"><strong>{{date_format(date_create($u->created_at),"d")}}</strong>{{date_format(date_create($u->created_at),"Y")}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-5">
									<h3 class="hotel_booking">{{ $u->name_pro }}
                                        @if($u->order_status == 0)
                                        <span>สินค้ารอการชำระเงิน</span>
                                        @else
                                        <span>สินค้ากำลังส่งถึงคุณ</span>
                                        @endif
                                        
                                    </h3>
								</div>
								<div class="col-lg-2 col-md-3">
									<ul class="info_booking">
										<li><strong style="font-size: 14px;">ยอดชำระ</strong><br>
                                        <span class="text-danger" style="font-size: 16px;">{{number_format($u->total+$u->shipping_price, 2)}}</span>
                                        <strong style="font-size: 14px;">บาท</strong>
                                    </li>
										
									</ul>
								</div>
								<div class="col-lg-2 col-md-2">
									<div class="booking_buttons">
                                        <a href="{{url('payment_notify_item2/'.$u->id)}}" class="btn_2">ดูรายละเอียด</a>
                                        @if($u->order_status == 0)
                                        
                                        <a href="{{url('confirm_payment?id='.$u->id)}}" style="margin-top:10px" class="mb-1 mt-1 mr-1 btn btn-xs btn-warning btn-block">แจ้งชำระเงิน</a>
                                        @endif
									</div>
								</div>
							</div>
							<!-- End row -->
						</div>
						<!-- End strip booking -->
                        @endforeach
                        @endif

					</section>


                    <section id="section-2" class="">

                    @if(isset($get_order1))
                        @foreach($get_order1 as $u)
						<div class="strip_booking">
							<div class="row">
								<div class="col-lg-2 col-md-2">
									<div class="date">
										<span class="month">{{date_format(date_create($u->created_at),"M")}}</span>
										<span class="day"><strong>{{date_format(date_create($u->created_at),"d")}}</strong>{{date_format(date_create($u->created_at),"Y")}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-5">
									<h3 class="hotel_booking">{{ $u->name_pro }}
                                        @if($u->order_status == 0)
                                        <span>สินค้ารอการชำระเงิน</span>
                                        @else
                                        <span>สินค้ากำลังส่งถึงคุณ</span>
                                        @endif
                                        
                                    </h3>
								</div>
								<div class="col-lg-2 col-md-3">
									<ul class="info_booking">
										<li><strong style="font-size: 14px;">ยอดชำระ</strong><br>
                                        <span class="text-danger" style="font-size: 16px;">{{number_format($u->total+$u->shipping_price, 2)}}</span>
                                        <strong style="font-size: 14px;">บาท</strong>
                                    </li>
										
									</ul>
								</div>
								<div class="col-lg-2 col-md-2">
									<div class="booking_buttons">
                                        <a href="{{url('payment_notify_item2/'.$u->id)}}" class="btn_2">ดูรายละเอียด</a>
                                        @if($u->order_status == 0)
                                        
                                        <a href="{{url('confirm_payment?id='.$u->id)}}" style="margin-top:10px" class="mb-1 mt-1 mr-1 btn btn-xs btn-warning btn-block">แจ้งชำระเงิน</a>
                                        @endif
									</div>
								</div>
							</div>
							<!-- End row -->
						</div>
						<!-- End strip booking -->
                        @endforeach
                        @endif

					</section>


                    <section id="section-3" class="">

                    @if(isset($get_order2))
                        @foreach($get_order2 as $u)
						<div class="strip_booking">
							<div class="row">
								<div class="col-lg-2 col-md-2">
									<div class="date">
										<span class="month">{{date_format(date_create($u->created_at),"M")}}</span>
										<span class="day"><strong>{{date_format(date_create($u->created_at),"d")}}</strong>{{date_format(date_create($u->created_at),"Y")}}</span>
									</div>
								</div>
								<div class="col-lg-6 col-md-5">
									<h3 class="hotel_booking">{{ $u->name_pro }}
                                        @if($u->order_status == 0)
                                        <span>สินค้ารอการชำระเงิน</span>
                                        @else
                                        <span>สินค้ากำลังส่งถึงคุณ</span>
                                        @endif
                                        
                                    </h3>
								</div>
								<div class="col-lg-2 col-md-3">
									<ul class="info_booking">
										<li><strong style="font-size: 14px;">ยอดชำระ</strong><br>
                                        <span class="text-danger" style="font-size: 16px;">{{number_format($u->total+$u->shipping_price, 2)}}</span>
                                        <strong style="font-size: 14px;">บาท</strong>
                                    </li>
										
									</ul>
								</div>
								<div class="col-lg-2 col-md-2">
									<div class="booking_buttons">
                                        <a href="{{url('payment_notify_item2/'.$u->id)}}" class="btn_2">ดูรายละเอียด</a>
                                        @if($u->order_status == 0)
                                        
                                        <a href="{{url('confirm_payment?id='.$u->id)}}" style="margin-top:10px" class="mb-1 mt-1 mr-1 btn btn-xs btn-warning btn-block">แจ้งชำระเงิน</a>
                                        @endif
									</div>
								</div>
							</div>
							<!-- End row -->
						</div>
						<!-- End strip booking -->
                        @endforeach
                        @endif

					</section>



                    </div>

                    </div>
                    

                   
                    
                </div>
            </div>

  
    






        

</div>



@endsection

@section('scripts')
<script src="{{ url('assets/js/tabs.js') }}"></script>
<script>
		new CBPFWTabs(document.getElementById('tabs'));
</script>

@if ($message = Session::get('edit_success'))
<script type="text/javascript">


    $(function(){
      // bind change event to select

      $.notify({
          // options
          icon: 'icon_set_1_icon-76',
          title: "<h4>อัพเดทข้อมุลสำเร็จ</h4> ",
          message: "",
        },{
          // settings
          type: 'info',
          delay: 5000,
          timer: 3000,
          z_index: 9999,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          animate: {
            enter: 'animated bounceInUp',
            exit: 'animated bounceOutDown'
          },
        });


    });

</script>
@endif

@stop('scripts')
