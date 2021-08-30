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



           
          <div class="form_title">
			  
						<h3><strong>1</strong>แจ้งชำระเงินโอน </h3>
						<p>
						สามารถชำระเงินได้โดยผ่านทางธนาคาร จากนั้นกรุณาแจ้งการชำระเงินผ่านทาง Website ในหน้า account ของท่าน
						</p>
					</div>

        <div class="step">
		  
          
		  
        <div class="row add_bottom_60 ">

<div class="col-md-12">
         <br>

          <form class="form-horizontal" action="{{url('post_payment_notify')}}" method="post" enctype="multipart/form-data">

                                  {{ csrf_field() }}

            <div class="form-group">
              <label class="col-md-3 control-label" for="profileFirstName">เลขคำสั่งซื้อ*</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="order_id" value="{{ $id }}" >
                @if ($errors->has('order_id'))
                <p class="text-danger" style="margin-top:10px;">
                  คุณต้องกรอก เลขคำสั่งซื้อ ด้วยค่ะ
                </p>
                @endif
                  <br />
              </div>
            </div>





            <label class="col-md-3 control-label" for="profileFirstName">โอนเงินเข้าธนาคารไหน?*</label>

            <label class="col-md-9 control-label" for="profileFirstName">
              @if ($errors->has('bank'))
              <p class="text-danger text-right" style="margin-top:10px;">
                คุณต้องเลือก โอนเงินเข้าธนาคาร ด้วยค่ะ
              </p>
              @endif
              .</label>

              <br />
            @if($bank)
                                        @foreach($bank as $u)
            <div class="form-group">
                <label class="col-md-3 control-label" for="profileFirstName"></label>

                <label class="image-radio col-md-8"  id="radio_get" style="font-size:12px;">
                  <input type="radio" name="bank" value="{{$u->id}}" />
                  <i class="icon-check-1 hidden"></i>
                  <img src="{{url('bank/'.$u->image)}}"
                    class="img-responsive" style="height:25px; float:left; margin-right:6px;"> {{$u->bank_name}} {{$u->bank_owner}} {{$u->bank_number}}
                </label >

            </div>
            @endforeach
                                          @endif




                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileFirstName">จำนวนเงิน*</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" name="money" value="{{ number_format($order->total, 2) }}" readonly>
                                              @if ($errors->has('money'))
                                              <p class="text-danger" style="margin-top:10px;">
                                                คุณต้องกรอก จำนวนเงิน ด้วยค่ะ
                                              </p>
                                              @endif
                                                <br />
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileFirstName">วันที่-เวลาโอนเงิน*</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control date-pick" name="filter_date" id="filter-date" value="<?php echo date('d/m/Y')?>"/>
                                              @if ($errors->has('filter_date'))
                                              <p class="text-danger" style="margin-top:10px;">
                                                คุณต้องกรอก วันที่-เวลาโอนเงิน ด้วยค่ะ
                                              </p>
                                              @endif
                                                <br />
                                            </div>
                                            <label class="col-md-1 control-label" for="profileFirstName">ชั่วโมง</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control date" name="time2_tran"  value="<?php echo date('H')?>"/>

                                            </div>
                                            <label class="col-md-1 control-label" for="profileFirstName">นาที</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control date" name="time3_tran"  value="<?php echo date('i')?>"/>

                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileFirstName">สลิปการโอนเงิน*</label>
                                            <div class="col-md-8">
                                              <input type="file" name="image">
                                              @if ($errors->has('filter_date'))
                                              <p class="text-danger" style="margin-top:10px;">
                                                คุณต้องแนบ สลิปการโอนเงิน ด้วยค่ะ
                                              </p>
                                              @endif
                                                <br />
                                            </div>
                                          </div>
                                          <hr />



          <div class="col-md-12 text-center" >

          <button type="submit" class="btn btn-next">บันทึกข้อมูล</button>
          <a href="{{url('payment/')}}" class="btn btn-default">ยกเลิก</a>
        </div>
          </form>


</div></div>
		  

	
        

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
