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

				<div class="col-xs-3 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">Shipping</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="{{url('shipping/')}}" class="bs-wizard-dot"></a>
				</div>

				<div class="col-xs-3 bs-wizard-step disabled">
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
									<a href="{{url('/deleteCart/'.$product_item['id'])}}"><i class=" icon-trash"></i></a>
                  <a ><i class="icon-ccw-2"></i></a>
								</td>
							</tr>



              <?php
                $sum += $product_item['qty'];
                $total += ($product_item['qty'] * $product_item['price']);
                $shipping_price += ($product_item['qty'] * $product_item['shipping_price']);
               ?>

              @endforeach


              @endif


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

                }*/

                $total_price = $total+$shipping_price
               ?>


						</tbody>
					</table>


                    <!-- visible-sm visible-xs -->
                <div class="box_style_1 visible-sm visible-xs">
						<h3 class="inner">- ผลรวมทั้งหมด -</h3>
						<table class="table table_summary">
							<tbody>



               
                            

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
										฿{{$total_price}}
									</td>
								</tr>
							</tbody>
						</table>
						<a class="btn_full_outline" href="{{url('/cart')}}"><i class="icon-right"></i> กลับไปรถเข็น</a>
					</div>



            <form  method="POST" id="contactform" class="validate-form" action="{{url('add_my_address')}}">
              {{ csrf_field() }}
              <input type="hidden" class="form-control"  name="user_id" value="{{$user_id}}" required>


                    <div class="form_title">
						<h3><strong>1</strong>รายละเอียดผู้รับสินค้า </h3>
						<p>
							กรุณากรอกรายละเอียด ที่ถูกต้องเพื่อป้องกันการส่งที่ผิดพลาด.
						</p>
					</div>

                    @if($add == null)

                    <div class="step">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>ชื่อผู้รับสินค้า</label>
									<input type="text" class="form-control" id="name_order" name="name_order" value="{{ old('name_order') }}" required>
                                        @if ($errors->has('name_order'))
                                                <span class="error_message">
                                                    <strong>กรุณากรอก ชื่อ ของท่านด้วย</strong>
                                                </span>
                                        @endif
								</div>
							</div>
							
						</div>
						<div class="row">
							
                            <div class="col-md-12">
								<div class="form-group">
									<label>เบอร์ติดต่อ</label>
									<input type="text" id="telephone_order" name="telephone_order" class="form-control" value="{{ old('telephone_order') }}" required>
                                        @if ($errors->has('telephone_order'))
                                                <span class="error_message">
                                                    <strong>กรุณากรอก เบอร์ติดต่อ ของท่านด้วย</strong>
                                                </span>
                                        @endif
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<label>email (จำเป็น ต้องส่งหมายเลขคำสั่งซื้อไปยังอีเมลท่าน ) </label>
									<input type="text" id="telephone_order" name="email" class="form-control" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                                <span class="error_message">
                                                    <strong>กรุณากรอก อีเมล ระบบต้องส่งหมายเลขคำสั่งซื้อไปยังอีเมลท่าน ของท่านด้วย</strong>
                                                </span>
                                        @endif
								</div>
							</div>
						</div>

					</div>

                    @else


                    <div class="step">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>ชื่อผู้รับสินค้า</label>
									<input type="text" class="form-control" id="name_order" name="name_order" value="{{ $add->name }}" required>
                                        @if ($errors->has('name_order'))
                                                <span class="error_message">
                                                    <strong>กรุณากรอก ชื่อ ของท่านด้วย</strong>
                                                </span>
                                        @endif
								</div>
							</div>
							
						</div>
						<div class="row">
							
                            <div class="col-md-12">
								<div class="form-group">
									<label>เบอร์ติดต่อ</label>
									<input type="text" id="telephone_order" name="telephone_order" class="form-control" value="{{ $add->phone }}" required>
                                        @if ($errors->has('telephone_order'))
                                                <span class="error_message">
                                                    <strong>กรุณากรอก เบอร์ติดต่อ ของท่านด้วย</strong>
                                                </span>
                                        @endif
								</div>
							</div>

                            <div class="col-md-12">
								<div class="form-group">
									<label>email (จำเป็น ต้องส่งหมายเลขคำสั่งซื้อไปยังอีเมลท่าน ) </label>
									<input type="text" id="telephone_order" name="email" class="form-control" value="{{ $add->email }}" required>
                                        @if ($errors->has('email'))
                                                <span class="error_message">
                                                    <strong>กรุณากรอก อีเมล ระบบต้องส่งหมายเลขคำสั่งซื้อไปยังอีเมลท่าน ของท่านด้วย</strong>
                                                </span>
                                        @endif
								</div>
							</div>
						</div>

					</div>

                    @endif

          <!--End step -->

                    <div class="form_title">
						<h3><strong>2</strong>กรอกที่อยู่ในการจัดส่ง</h3>
                        <p>
							กรุณากรอกรายละเอียด ที่ถูกต้องเพื่อป้องกันการส่งที่ผิดพลาด.
						</p>
					</div>

                    @if($add != null)

                    <div class="step">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>จังหวัด</label>
									<select class="form-control" name="country_order" id="country"  required>
										<option value="" selected="">--เลือกจังหวัดที่ท่านอยู่--</option>

                                        @foreach($provinces as $province)
										<option value="{{$province->name_in_thai}}" 
                                            @if( $add->province == $province->id)
                                            selected='selected'
                                            @endif 
                                            >{{$province->name_in_thai}}</option>
										@endforeach
									</select>
                                    @if ($errors->has('country_order'))
                                            <span class="error_message">
                                                <strong>กรุณาเลือก จังหวัด ของท่านด้วย</strong>
                                            </span>
                                    @endif
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label>รหัสไปรษนีย์</label>
									<input type="text" id="postal_code" name="postal_code_order" class="form-control" value="{{ $add->postal_code }}" required>
                                        @if ($errors->has('postal_code_order'))
                                                <span class="error_message">
                                                    <strong>กรุณากรอก รหัสไปรษนีย์ ของท่านด้วย</strong>
                                                </span>
                                        @endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label>ที่อยู่ในการจัดส่ง</label>

                                    <textarea name="street_order" class="form-control" placeholder="355/5 Bangkok 10310.." style="height:150px;" required>{{ $add->address }}</textarea>
                                    @if ($errors->has('street_order'))
                                            <span class="error_message">
                                                <strong>กรุณากรอก ที่อยู่ในการจัดส่ง ของท่านด้วย</strong>
                                            </span>
                                    @endif
								</div>
							</div>
						</div>
					</div>

                    @else



                    <div class="step">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>จังหวัด</label>
									<select class="form-control" name="country_order" id="country" value="{{ old('country_order') }}" required>
										<option value="" selected="">--เลือกจังหวัดที่ท่านอยู่--</option>

                                        @foreach($provinces as $province)
										<option value="{{$province->name_in_thai}}">{{$province->name_in_thai}}</option>
										@endforeach
									</select>
                                    @if ($errors->has('country_order'))
                                            <span class="error_message">
                                                <strong>กรุณาเลือก จังหวัด ของท่านด้วย</strong>
                                            </span>
                                    @endif
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label>รหัสไปรษนีย์</label>
									<input type="text" id="postal_code" name="postal_code_order" class="form-control" value="{{ old('postal_code_order') }}" required>
                                        @if ($errors->has('postal_code_order'))
                                                <span class="error_message">
                                                    <strong>กรุณากรอก รหัสไปรษนีย์ ของท่านด้วย</strong>
                                                </span>
                                        @endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<label>ที่อยู่ในการจัดส่ง</label>

                                    <textarea name="street_order" class="form-control" placeholder="355/5 Bangkok 10310.." style="height:150px;" required>{{ old('street_order') }}</textarea>
                                    @if ($errors->has('street_order'))
                                            <span class="error_message">
                                                <strong>กรุณากรอก ที่อยู่ในการจัดส่ง ของท่านด้วย</strong>
                                            </span>
                                    @endif
								</div>
							</div>
						</div>
					</div>

                    @endif

          <!--End step -->

                    <div id="policy">
                        <input type="hidden" class="form-control"  name="total" value="{{$total_price}}" required>
                        <input type="hidden" class="form-control"  name="shipping_price" value="{{$shipping_price}}" required>
                        <input type="hidden" class="form-control"  name="policy_terms" value="1" required>

						@if(Session::get('vouchers_id') != null)
						<input type="hidden" class="form-control"  name="gift_id" value="{{Session::get('vouchers_id')}}" required>
						<input type="hidden" class="form-control"  name="u_gift_id" value="{{Session::get('vouchers_id_sub')}}" required>
						@endif

						<a href="javascript:{}" onclick="document.getElementById('contactform').submit();" id="submit-contact" class="btn_1 green medium">ไปยังขั้นตอนต่อไป</a>
					</div>


          </form>

        </div>
        <br><br>
        <aside class="col-md-4">
                <!-- visible-sm visible-xs -->
                <div class="box_style_1 hidden-sm hidden-xs">
						<h3 class="inner">- ผลรวมทั้งหมด -</h3>
						<table class="table table_summary">
							<tbody>

							<tr>
                <td colspan="2">
                  @if(count($objs)> 0)
                <div class="form-group" >
									<select class="form-control" id="my_code" name="country_order" id="country" >
										<option value="" selected="">--เลือกโค้ดส่วนลด--</option>
                    @if(isset($objs))
                      @foreach($objs as $u)
                      <option value="{{ $u->idp }}" >{{ $u->name }} ลด {{ $u->detail }}%</option>
                      @endforeach
                    @endif
									</select>
                                    
								</div>
                @else
                <div class="form-group" >
									<select class="form-control" name="country_order" id="country"  disabled>
										<option value="" selected="">--เลือกโค้ดส่วนลด--</option>

									</select>
                                    
								</div>
                @endif
                </td>
              </tr>

                <?php
                  $price_s = 0;
                ?>

                @if(Session::get('vouchers_value') != null)
                <tr>
									<td>
                    ใช้โค้ดส่วนลด
									</td>
									<td class="text-right">
										{{ Session::get('vouchers_name') }} <br> ( ส่วนลด {{ Session::get('vouchers_value') }}% )
									</td>
								</tr> 
                @endif

                

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

								
                @if(Session::get('vouchers_value') != null)
                <tr class="text-info">
									<td>
                   ส่วนลดรวม
									</td>
									<td class="text-right">
                    
										-{{ ceil(((($total+$shipping_price)*Session::get('vouchers_value'))/100)) }}

                    <?php 
                     $Sum = ceil(((($total+$shipping_price)*Session::get('vouchers_value'))/100));
                    ?>

									</td>
								</tr>
                <tr class="total">
									<td>
										ราคารวม
									</td>
									<td class="text-right">
                    
										฿{{$total+$shipping_price-$Sum}}

									</td>
								</tr>
                @else
                <tr class="total">
									<td>
                   ราคารวม
									</td>
									<td class="text-right">
                    
										฿{{$total+$shipping_price}}

									</td>
								</tr>
                @endif
							</tbody>
						</table>
						<a class="btn_full_outline" href="{{url('/cart')}}"><i class="icon-right"></i> กลับไปรถเข็น</a>
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

<script type="text/javascript">

$(document).ready(function(){

document.getElementById('my_code').addEventListener('change', function() {

console.log('You selected: ', this.value);

              $.ajax({
                  type: "POST",
                  async: true,
                  url: "{{url('add_vouchers_cart')}}",
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                  data: "id="+this.value,
                  dataType: "json",
               success: function(json){
                 if(json.data.status == 200) {


                  location.reload();
                  


                  }
                  },
                  failure: function(errMsg) {
                    alert(errMsg.Msg);
                  }
                  
                });


});
});

</script>



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
