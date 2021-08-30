
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

				<div class="col-xs-3 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Payment</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="{{url('payment')}}" class="bs-wizard-dot"></a>
				</div>

                <div class="col-xs-3 bs-wizard-step complete">
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
								฿ 0
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
									฿{{ number_format($order->total, 2) }}
									</td>
								</tr>
							</tbody>
						</table>
					</div>



                    <div class="step">

                        <div class="row add_bottom_60 ">

                            <div class="col-md-12">
                                <h3>แจ้งการชำระเงินสำเร็จแล้ว </h3>
                                    <p>
                                    คุณได้ทำการแจ้งชำระเงินเสร็จแล้ว เราจะรีบทำการตรวจสอบให้ไวที่สุด
                                    </p>
                                <br />
                            </div>



                        </div>

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
								฿ 0
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
									฿{{ number_format($order->total, 2) }}
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
