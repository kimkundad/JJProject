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

.thumb_cart img {
    padding: 1px;
    width: auto;
    height: 58px; 
}
/* secure_url */
</style>


<section id="hero_2">
		<div class="intro_title animated fadeInDown">
			<h1>ทำการสั่งซื้อ</h1>
			<div class="bs-wizard">

				<div class="col-xs-4 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">รถเข็น</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="{{url('cart')}}" class="bs-wizard-dot"></a>
				</div>

				<div class="col-xs-4 bs-wizard-step disabled">
					<div class="text-center bs-wizard-stepnum">รายละเอียดการสั่งซื้อ</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="{{url('payment')}}" class="bs-wizard-dot"></a>
				</div>

				<div class="col-xs-4 bs-wizard-step disabled">
					<div class="text-center bs-wizard-stepnum">สำเร็จ!</div>
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
					<li>รถเข็น
					</li>

				</ul>
			</div>
		</div>



    <div class="container margin_60">

      <div class="row">

        <div class="col-md-8">
          <table class="table table-striped cart-list add_bottom_30">
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
              <?php
              $total = 0;
              $shipping_price = 0;
              $sum = 0;
               ?>
              @if(Session::get('cart') != null)
              <?php
              $cart = session()->get('cart');

               ?>


               @foreach ($cart as $product_item)
               <form  method="POST" id="my_form{{$product_item['id']}}" action="{{url('updateCart')}}">
                 {{ csrf_field() }}
               <input type="hidden" name="id"  value="{{$product_item['id']}}"/>
							<tr>
								<td>
									<div class="thumb_cart">
										<img src="{{url('assets/image/product/'.$product_item['image'])}}">
									</div>
									<span class="item_cart">{{$product_item['name_product']}}</span>
								</td>
								<td>
									<div class="numbers-row">
										<input type="text" value="{{$product_item['qty']}}" class="qty2 form-control" name="quantity">
									<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
								</td>
								<td>
									0%
								</td>
								<td>
									<strong>฿{{number_format($product_item['price']*$product_item['qty'])}}</strong>
								</td>
								<td class="options">
									<a href="{{url('/deleteCart/'.$product_item['id'])}}" ><i class=" icon-trash"></i></a>
                  <a href="javascript:{}" onclick="document.getElementById('my_form{{$product_item['id']}}').submit();"><i class="icon-ccw-2"></i></a>
								</td>
							</tr>



              <?php
                $sum += $product_item['qty'];
                $total += ($product_item['qty'] * $product_item['price']);
                $shipping_price += ($product_item['qty'] * $product_item['shipping_price']);
               ?>
               </form>
              @endforeach


              @endif


						</tbody>
					</table>
        </div>
        <aside class="col-md-4">

          <div class="box_style_1">
						<h3 class="inner">- ผลรวมทั้งหมด -</h3>
						<table class="table table_summary">
							<tbody>

                <?php
                  $price_s = 0;
                /*  if($shipping_price < 20){
                    $price_s = 20;
                  }elseif($shipping_price > 20 && $shipping_price < 100){
                    $price_s = 25;
                  }elseif($shipping_price > 100 && $shipping_price < 250){
                    $price_s = 30.00;
                  }elseif($shipping_price > 250 && $shipping_price < 500){
                    $price_s = 40.00;
                  }elseif($shipping_price > 500 && $shipping_price < 1000){
                    $price_s = 55.00;
                  }elseif($shipping_price > 1000 && $shipping_price < 1500){
                    $price_s = 70.00;
                  }elseif($shipping_price > 1500 && $shipping_price < 2000){
                    $price_s = 85.00;
                  }elseif($shipping_price > 2000 && $shipping_price < 2500){
                    $price_s = 100.00;
                  }elseif($shipping_price > 2500 && $shipping_price < 3000){
                    $price_s = 115.00;
                  }elseif($shipping_price > 3000 && $shipping_price < 3500){
                    $price_s = 135.00;
                  }elseif($shipping_price > 3500 && $shipping_price < 4000){
                    $price_s = 155;
                  }elseif($shipping_price > 4000 && $shipping_price < 4500){
                    $price_s = 175;
                  }elseif($shipping_price > 4500 && $shipping_price < 5000){
                    $price_s = 200;
                  }elseif($shipping_price > 5000 && $shipping_price < 5500){
                    $price_s = 220;
                  }elseif($shipping_price > 5500 && $shipping_price < 6000){
                    $price_s = 245;
                  }elseif($shipping_price > 6000 && $shipping_price < 6500){
                    $price_s = 270;
                  }elseif($shipping_price > 6500 && $shipping_price < 7000){
                    $price_s = 295;
                  }elseif($shipping_price > 7000 && $shipping_price < 7500){
                    $price_s = 320;
                  }elseif($shipping_price > 7500 && $shipping_price < 8000){
                    $price_s = 345;
                  }elseif($shipping_price > 8000 && $shipping_price < 8500){
                    $price_s = 375;
                  }elseif($shipping_price > 8500 && $shipping_price < 9000){
                    $price_s = 405;
                  }elseif($shipping_price > 9000 && $shipping_price < 9500){
                    $price_s = 435;
                  }elseif($shipping_price > 9500 && $shipping_price < 10000){
                    $price_s = 465;
                  }else{
                    $price_s = 500;
                  } */
                 ?>

                

								<tr>
									<td>
                                    จำนวนสินค้า
									</td>
									<td class="text-right">
										{{$sum}}
									</td>
								</tr>
								<tr>
									<td>
										ค่าจัดส่ง
									</td>
									<td class="text-right">
										฿{{$shipping_price}}
									</td>
								</tr>

								<tr class="total">
									<td>
										ราคารวม
									</td>
									<td class="text-right">
										฿{{$total+$shipping_price}}
									</td>
								</tr>
							</tbody>
						</table>
						<a class="btn_full" style="font-size:15px" href="{{url('payment')}}">สั่งสินค้า</a>
						<a class="btn_full_outline" style="font-size:15px" href="{{url('/')}}"><i class="icon-right"></i> กลับไปเลือกสินค้า</a>
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
