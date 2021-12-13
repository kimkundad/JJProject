@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')
<link rel="stylesheet" href="{{url('css/bootstrap-social.css')}}" />
<link rel="stylesheet" href="{{url('css/font-awesome.css')}}" />
@stop('stylesheet')
@section('content')



<style>

.alert-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
.close{
    color: #fff;
    text-decoration: none;
    cursor: pointer;
    filter: alpha(opacity=50);
    opacity: .9;
}
/* secure_url */
</style>


<section id="hero_2">
		<div class="intro_title animated fadeInDown">
			<h1>ทำการสั่งซื้อ</h1>
			<div class="bs-wizard">

			<div class="col-xs-3 bs-wizard-step complete ">
					<div class="text-center bs-wizard-stepnum">Cart</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="{{url('cart')}}" class="bs-wizard-dot"></a>
				</div>

				<div class="col-xs-3 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Shipping</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="{{url('shipping/')}}" class="bs-wizard-dot"></a>
				</div>

				<div class="col-xs-3 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">Payment</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="{{url('payment')}}" class="bs-wizard-dot"></a>
				</div>

                <div class="col-xs-3 bs-wizard-step disabled">
					<div class="text-center bs-wizard-stepnum">Complete</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="{{url('confirmation')}}" class="bs-wizard-dot"></a>
				</div>

			</div>
			<!-- End bs-wizard -->
		</div>
		<!-- End intro-title -->
	</section>

  <div id="position">
			<div class="container">
				<ul>
					<li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
					<li>รายละเอียดการสั่งซื้อ
					</li>

				</ul>
			</div>
		</div>



    <div class="container margin_60">

      <div class="row">

        <div class="col-md-8 add_bottom_15">



          <table class="table table-striped cart-list add_bottom_30 hidden">
						<thead>
                        <tr>
								<th>
                                สินค้า
								</th>
								<th>
                                จำนวน
								</th>
								<th>
                                ส่วนลด
								</th>
								<th>
                                ราคารวม
								</th>
								<th>
                                แอคชั่น
								</th>
							</tr>
						</thead>
						<tbody>
              
         


						</tbody>
					</table>


                    <!-- visible-sm visible-xs -->
                <div class="box_style_1 visible-sm visible-xs">
						<h3 class="inner">- ยอดเงินที่ต้องชำระ -</h3>
						<table class="table table_summary" style="margin-bottom: 0px;">
							<tbody>
							<tr>
								<td>
								คำสั่งซื้อ
								</td>
								<td class="text-right">
								# {{ $order->lastname_order }}
								</td>
							</tr>
							<tr>
								<td>
								Discount
								</td>
								<td class="text-right">
								฿ {{ $order->discount }}
								</td>
							</tr>
								<tr>
									<td>
                                    จำนวนสินค้า
									</td>
									<td class="text-right">
										{{$sum_item}}
									</td>
								</tr>
								<tr>
									<td>
                                    ค่าจัดส่ง
									</td>
									<td class="text-right">
										฿{{ number_format($order->shipping_price, 2) }}
									</td>
								</tr>

								<tr class="total">
									<td>
                                    ราคารวม
									</td>
									<td class="text-right">
									฿{{ number_format(($order->total-$order->discount), 2) }}
									</td>
								</tr>
							</tbody>
						</table>
					</div>



           
          <div class="form_title">
			  
						<h3><strong>1</strong>โอนเงินผ่านธนาคาร </h3>
						<p>
						สามารถชำระเงินได้โดยผ่านทางธนาคาร จากนั้นกรุณาแจ้งการชำระเงินผ่านทาง Website ในหน้า account ของท่าน
						</p>
					</div>

          <div class="step">
		  <h4>คำสั่งซื้อ <a>#{{$order->lastname_order}}</a></h4>
		  <br>
		  <p class="text-success" style="font-size:14px;">
            <i class="im im-icon-Money-Smiley" style="font-size:32px;"></i> หากลูกค้าเลือกที่จะ ชำระหรือโอนเงินผ่านธนาคาร ลูกค้าสามารถกด <span class="text-danger"><b>"กลับสู่หน้าแรก"</b></span> เพื่อทำรายการภายหลัง หรือ กด
            <span class="text-danger"><b>"แจ้งชำระเงิน"</b></span> ในขั้นตอนนี้ได้เลยค่ะ
          </p>
						
		  <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
				  <th>ธนาคาร</th>
                  <th>ชื่อบัญชี</th>
                  <th>เลขที่บัญชี</th>
                  

                </tr>
              </thead>
              <tbody>

                @if($bank)
                @foreach($bank as $b)
                <tr>
                  <td>
                    <img src="{{url('bank/'.$b->image)}}" height="35">
                  </td>
                  <td class="p_top">
                    {{$b->bank_name}}
                  </td>
                  <td class="p_top">
                    {{$b->bank_owner}}
                  </td>
                  <td class="p_top">
                    {{$b->bank_number}}
                  </td>
                </tr>
                @endforeach
                @endif


              </tbody>
            </table>
          </div>

	
          <br />
          <a href="{{url('/')}}" style="padding: 6px 12px; font-size:15px;" class="btn btn-next">กลับสู่หน้าแรก</a>
          <a href="{{url('pay_order_detail/'.$order->lastname_order)}}" style="padding: 6px 12px; font-size:15px;" class="btn btn-next">แจ้งชำระเงิน</a>

					</div>

          <!--End step -->

          	<div class="form_title">
				<h3><strong>2</strong>ชำระผ่านบัตรเครดิต, Mobile banking</h3>
            	<p>ทุกธุรกรรมผ่านบัตรเครดิตและบัตรเดบิตได้รับการรับรองความปลอดภัย ด้วยเทคโนโลยี 2c2p Payment gateway api</p>
			</div>

			<div class="hidden">
				<?php
					function twelvedigits($a){
						$a = number_format($a, 2, '', '');
						printf("%012s\n", $a);
					}
					$money_var = ($order->total-$order->discount)+$order->shipping_price;
					$amount = twelvedigits($money_var);
					$s_number = '';

					$s_number = sprintf('%012s',number_format($money_var, 2, '', ''));
				?>
				
			</div>

			<?php

				//Merchant's account information
				$merchant_id = env('merchant_id');
											//Get MerchantID when opening account with 2C2P
				$secret_key = env('secret_key');	//Get SecretKey from 2C2P PGW Dashboard
				$ram = rand(10,20);
				//Transaction information
				$payment_description  = $order->user_id.'-'.$order->id.'-'.$order->lastname_order;
				$new_oreder_id = str_pad($order->id,$ram,"0",STR_PAD_LEFT);

				$order_id  = $new_oreder_id;
				$currency = "764";

				//Request information
				$version = "8.5";
				//$payment_url = " https://t.2c2p.com/RedirectV3/payment";
				$payment_url = "https://t.2c2p.com/RedirectV3/payment";
				$result_url_1 = url('/api/result_payment');

				//Construct signature string
				$params = $version.$merchant_id.$payment_description.$order_id.$currency.$s_number.$result_url_1;
				$hash_value = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value

			?>

          <div class="step">
		  <img src="{{ url('img/logo-2c2p.png') }}" style="width:80px;">
		  <form id="myform" class="w3-container w3-display-middle w3-card-4 " method="post" action="{{$payment_url}}">
      		<input type="hidden" name="version"  value="{{$version}}"/>
      		<input type="hidden" name="merchant_id" value="{{$merchant_id}}"/>
      		<input type="hidden" name="currency" value="{{$currency}}"/>
      		<input type="hidden" name="result_url_1" value="{{$result_url_1}}"/>
      		<input type="hidden" name="hash_value" value="{{$hash_value}}"/>

          <div class="form-group hidden">
            <label>PRODUCT INFO</label>
          <input type="hidden" name="payment_description" class="form-control" value="{{$payment_description}}"  readonly/>
          </div>

          <div class="form-group">
            <label>ORDER NO</label>
          <input type="text"  class="form-control" value="{{$order->lastname_order}}"  readonly/>
          <input type="hidden" name="order_id" class="form-control" value="{{$order_id}}"  readonly/>
          </div>

          <div class="form-group hidden">
            <label>AMOUNT</label>
          <input type="text" name="amount" class="form-control" value="{{twelvedigits($money_var)}}" readonly/>
          </div>

          <div class="form-group">
            <label>AMOUNT</label>
          <input type="text" name="" class="form-control" value="{{number_format($order->total, 2)}}" readonly/>
          </div>

          <button type="submit" class="btn btn-next" >ชำระผ่านบัตรเครดิต, Mobile banking</button>
      	</form>
						
						
		</div>

          <!--End step -->

         
		


        </div>
        <br><br>
        <aside class="col-md-4">
                <!-- visible-sm visible-xs -->
                <div class="box_style_1 hidden-sm hidden-xs">
						<h3 class="inner">- ยอดเงินที่ต้องชำระ -</h3>
						<table class="table table_summary" style="margin-bottom: 0px;">
							<tbody>
							<tr>
								<td>
								คำสั่งซื้อ
								</td>
								<td class="text-right">
								# {{ $order->lastname_order }}
								</td>
							</tr>
							<tr>
								<td>
								Discount
								</td>
								<td class="text-right">
								฿ {{$order->discount}}
								</td>
							</tr>
								<tr>
									<td>
                                    จำนวนสินค้า
									</td>
									<td class="text-right">
										{{$sum_item}}
									</td>
								</tr>
								<tr>
									<td>
                                    ค่าจัดส่ง
									</td>
									<td class="text-right">
										฿{{ number_format($order->shipping_price, 2) }}
									</td>
								</tr>

								<tr class="total">
									<td>
                                    ราคารวม
									</td>
									<td class="text-right">
									฿{{ number_format(($order->total-$order->discount), 2) }}
									</td>
								</tr>
							</tbody>
						</table>
					</div>

          <div class="box_style_2">
      			<i class="icon_set_1_icon-57"></i>
      			<h4>{{ trans('message.want') }} <span>{{ trans('message.help') }}</span></h4>
      			<a href="tel://004542344599" class="phone">086 551 7336</a>
      			<small>{{ trans('message.con_t') }}</small>
      		</div>

        </aside>

      </div>






</div>



@endsection

@section('scripts')





@if ($message = Session::get('add_success'))
<script type="text/javascript">

$(document).ready(function(){
  $.notify({
   // options
   icon: '',
   title: "<h4>เพิ่มสินค้า สำเร็จ</h4> ",
   message: "ท่านสามารถเข้า เลือกซื้อสินค้าต่อได้ตามใจชอบ . "
  },{
   // settings
   type: 'success',
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
