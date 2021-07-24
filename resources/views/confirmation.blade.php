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
			<h1>Place your order</h1>
			<div class="bs-wizard">

        <div class="col-xs-4 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Your cart</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="cart.html" class="bs-wizard-dot"></a>
				</div>

        <div class="col-xs-4 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Your details</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="payment.html" class="bs-wizard-dot"></a>
				</div>

        <div class="col-xs-4 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Finish!</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="#" class="bs-wizard-dot"></a>
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
					<li>Finish!
					</li>

				</ul>
			</div>
		</div>



    <div class="container margin_60">

      <div class="row">

        <div class="col-md-8 add_bottom_15">


          <div class="form_title">
						<h3><strong><i class="icon-ok"></i></strong>ขอบคุณที่ใช้บริการ!</h3>
						<p>
							สินค้าใหม่เปลี่ยนทุกวันจันทร์ สั่งซื้อได้ก่อนใคร สะดวกรวดเร็ว
						</p>
					</div>

          <div class="step">
						<p>
              เราจะเร่งดำเนินงาน การจัดส่งสินค้า ให้แก่ลูกค้าโดยไวที่สุด
							ตลาดนัดสวนจตุจักรมีเนื้อที่กว้างขวาง การเดินซื้อของ หรือเที่ยวชมตลาดนัดทั้งหมดภายในวันเดียวนั้น แทบจะเป็นไปไม่ได้เลย ตลาดแห่งนี้ประกอบด้วยร้านค้ามากกว่า 10,000 ร้าน แต่เราคัดสรรร้านค้าและสินค้าที่ดีที่สุดมาให้ถึงมือ
						</p>
					</div>

          <div class="form_title">
						<h3><strong><i class="icon-tag-1"></i></strong>รายละเอียดของการสั่งสินค้า</h3>

					</div>

          <div class="step">



						<table class="table confirm">
							<thead>
								<tr>
									<th colspan="2">
										<h4>หมายเลขการสั่งซื้อ #{{$order->id}}</h4>
									</th>
								</tr>
							</thead>

              @if($order_detai1)
              @foreach($order_detai1 as $order_details)

							<tbody>
								<tr>
									<td>
										<strong>{{$order_details->product_name}}</strong>
									</td>
									<td>
										{{$order_details->product_total}} ชิ้น
									</td>
								</tr>
                <tr>
									<td>
										<strong>ราคา / ชิ้น </strong>
									</td>
									<td>
										{{$order_details->product_price}} ชิ้น
									</td>
								</tr>
								<tr>
									<td>
										<strong>ทำรายการวันที่ </strong>
									</td>
									<td>
										{{$order_details->created_at}}
									</td>
								</tr>

							</tbody>


              @endforeach
              @endif
						</table>




            <table class="table confirm">
							<thead>
								<tr>
									<th colspan="2">
										รายละเอียดการส่งสินค้า
									</th>
								</tr>
							</thead>
							<tbody>
                <tr>
									<td>
										<strong>ชื่อผู้รับสินค้า</strong>
									</td>
									<td>
										คุณ {{$order->name_order}} {{$order->lastname_order}}
									</td>
								</tr>
                <tr>
									<td>
										<strong>เบอร์ติดต่อ</strong>
									</td>
									<td>
										{{$order->telephone_order}}
									</td>
								</tr>
                <tr>
									<td>
										<strong>Email</strong>
									</td>
									<td>
										{{$order->email_order}}
									</td>
								</tr>
								<tr>
									<td>
										<strong>ที่อยุ่การจัดส่ง</strong>
									</td>
									<td>
										{{$order->street_order}}
									</td>
								</tr>
								<tr>
									<td>
										<strong>จังหวัด</strong>
									</td>
									<td>
										{{$order->country_order}} {{$order->postal_code_order}}
									</td>
								</tr>
								<tr>
									<td>
										<strong>ราคาที่ต้องชำระ</strong>
									</td>
									<td>
										{{$order->total}} รวมราคา ค่าจัดส่งแล้ว
									</td>
								</tr>

							</tbody>
						</table>


					</div>


          <div class="form_title">
						<h3><strong><i class="icon-tag-1"></i></strong>ช่องทางการชำระเงิน</h3>

					</div>

          <div class="step">


            <table class="table ">
							<thead>
								<tr>
									<th>
										ธนาคาร
									</th>
                  <th>
										ชื่อเจ้าของ
									</th>
                  <th style="width: 25%">
										หมายเลขบัญชี
									</th>
								</tr>
							</thead>
							<tbody>

                @if($bank)
                @foreach($bank as $banks)
                <tr>
									<td class="col-md-4">
										<strong>{{$banks->bank_name}}</strong>
									</td>
                  <td class="col-md-4">
										<strong>{{$banks->bank_owner}}</strong>
									</td>
									<td class="col-md-4">
										{{$banks->bank_number}}
									</td>
								</tr>
                @endforeach
                @endif

							</tbody>
						</table>

            </div>










        </div>
        <aside class="col-md-4">

          <div class="box_style_1">
						<h3 class="inner">ขอบคุณที่ใช้บริการ!</h3>
						<p>
							เราได้ทำการส่ง email การสั่งซื้อไปยังท่านแล้ว ท่านสามารถทำการตรวจสอบและทำการชำระเงิน ตามหมายเลขบัญชีที่ระบุไว้ จากนั้นทำการแจ้งชำระเงินจากปุ่มด้านล่างนี้
						</p>
						<hr>
						<a class="btn_full_outline" href="{{url('confirm_payment')}}" target="_blank">แจ้งการชำระเงิน</a>
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
