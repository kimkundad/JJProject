
@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')


<section class="parallax-window" style="min-height: 270px;" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">บัญชีของฉัน</a></li>

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

                <style>

.card-body {
    background: #fff;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    border-radius: 5px;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}

                </style>
                <div class="col-md-9">
                    <h3>รายละเอียดการซื้อ <span class="text-primary">#{{$get_order->lastname_order}}</span></h3>
                    <br />

                    <div class="card-body">
                    
                    <h4>ข้อมูลผู้สั่งซื้อ
                    @if( $get_order->order_status == 0 )
                    <a  class="btn_1">รอการชำระเงิน</a>
                    @elseif($get_order->order_status == 1)
                    <a  class="btn_1">รอการตรวจสอบ</a>
                    @else
                    <a  class="btn_1">อยุ่ระหว่างการจัดส่ง</a>
                    @endif

                    </h4>
                    <table class="table ">
                      <tbody>
                        <tr>
                            <td>ชื่อผู้สั่งซื้อ</td><td>{{$get_order->name_order}}</td>
                        </tr>
                        <tr>
                            <td>อีเมล</td><td>{{$get_order->email_order}}</td>
                        </tr>
                        <tr>
                            <td>เบอร์โทรศัพท์มือถือ</td><td>{{$get_order->telephone_order}}</td>
                        </tr>

                    </table>
                
                    <h4>ที่อยุ่ในการจัดส่ง</h4>
                    <table class="table ">
                      <tbody>
                        <tr>
                            <td>ที่อยู่ผู้รับ</td><td>{{$get_order->street_order}}</td>
                        </tr>
                        <tr>
                            <td>จังหวัด</td><td>{{$get_order->country_order}}</td>
                        </tr>
                        <tr>
                            <td>รหัสไปรษนีย์</td><td>{{$get_order->postal_code_order}}</td>
                        </tr>

                    </table>
                    <h4>รายละเอียดสินค้า</h4>
                    <table class="table table-responsive-md invoice-items">
									<thead>
										<tr class="text-dark">
											<th id="cell-id"     class="font-weight-semibold">#</th>
											<th id="cell-item"   class="font-weight-semibold">Item</th>
											<th id="cell-price"  class="text-center font-weight-semibold">Price</th>
											<th id="cell-qty"    class="text-center font-weight-semibold">Quantity</th>
											<th id="cell-total"  class="text-center font-weight-semibold">Total</th>
										</tr>
									</thead>
									<tbody {{ $s=1 }}>
                                        @if(isset($order_de))
                                        @foreach($order_de as $u)
										<tr>
											<td>{{ $s }}</td>
											<td class="font-weight-semibold text-dark">{{ $u->product_name }}</td>
											<td class="text-center">฿{{ $u->product_price }}</td>
											<td class="text-center">{{ $u->product_total }}</td>
											<td class="text-center">฿{{ $u->product_price*$u->product_total }}</td>
										</tr {{ $s++ }}>
                                        @endforeach
                                        @endif
										
                                        
									</tbody>
								</table>

                                <div class="invoice-summary ">
									<div class="row ">
										<div class="col-sm-4 col-md-offset-8">
											<table class="table h6 text-dark">
												<tbody>
													<tr class="b-top-0">
														<td colspan="2">Subtotal</td>
														<td class="text-left">฿{{ $get_order->total-$get_order->shipping_price }}</td>
													</tr>
													<tr>
														<td colspan="2">Shipping</td>
														<td class="text-left">฿{{ $get_order->shipping_price }}</td>
													</tr>
													<tr>
														<td colspan="2">Discount</td>
														<td class="text-left">฿{{ $get_order->discount }}</td>
													</tr>
													<tr class="h4">
														<td colspan="2">Grand Total</td>
														<td class="text-left">฿{{ $get_order->total-$get_order->discount }}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

                                </div>
                    <br />
                 
                    
                </div>
            </div>

  
    






        

</div>



@endsection

@section('scripts')


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
