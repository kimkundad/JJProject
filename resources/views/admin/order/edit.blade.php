@extends('admin.layouts.template')





@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>ยอดสั่งซื้อเลขที่ ( {{ $objs->lastname_order }} )</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>แก้ไขยอดสั่งซื้อ</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



        <div class="row">
            <div class="row">
               <div class="col-xs-12">


               <section class="card">
						<div class="card-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-3">
											<h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">INVOICE</h2>
											<h4 class="h4 m-0 text-dark font-weight-bold">#{{ $objs->lastname_order }}</h4>
										</div>
										<div class="col-sm-6 text-right mt-3 mb-3">
											<address class="ib mr-5">
												TeeNeeJJ
												<br/>
												คัดสรรร้านค้าและสินค้าในจตุจักรที่ดีที่สุด
												<br/>
												Phone: +6686 551 7336
												<br/>
												Teeneejj@gmail.com
											</address>
											<div class="ib">
												<img src="{{ url('assets/img/new_logo_sticky.png') }}" alt="OKLER Themes" style="height:75px" />
											</div>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-1 text-dark font-weight-semibold">ที่อยุ่จัดส่ง:</p>
												<address>
                                                    {{ $objs->name_order }}
													<br/>
													{{ $objs->street_order }} {{ $objs->country_order }} {{ $objs->postal_code_order }}
													<br/>
													Phone: {{ $objs->telephone_order }}
													<br/>
													{{ $objs->email_order }}
												</address>
											</div>
										</div>
										<div class="col-md-6">
											<div class="bill-data text-right">
												<p class="mb-0">
													<span class="text-dark">วันที่สั่งซื้อสินค้า:</span>
													<span class="value">{{ formatDateThat($objs->created_at) }}</span>
												</p>
												
											</div>
										</div>
									</div>
								</div>
							

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
                                        @if(isset($obj))
                                        @foreach($obj as $u)
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
														<td class="text-left">฿{{ $objs->total-$objs->shipping_price }}</td>
													</tr>
													<tr>
														<td colspan="2">Shipping</td>
														<td class="text-left">฿{{ $objs->shipping_price }}</td>
													</tr>
													<tr>
														<td colspan="2">Discount</td>
														<td class="text-left">฿{{ $objs->discount }}</td>
													</tr>
													<tr class="h4">
														<td colspan="2">Grand Total</td>
														<td class="text-left">฿{{ $objs->total-$objs->discount }}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>

							
                            
						</div>
					</section>

                    @if(isset($pay))

                    <section class="card mt-4">
						<div class="card-body">
                            <h4 class="mb-xlg">การแจ้งชำระเงิน</h4>
                            <fieldset>
                                <div class="form-group">
          							<label class="col-md-3 control-label" for="profileFirstName">ชื่อผู้โอนเงิน</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="note" value="{{$pay->name_pay}}">
          							</div>
                                </div>
                                <div class="form-group">
          							<label class="col-md-3 control-label" for="profileFirstName">เบอร์ติดต่อ</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="note" value="{{$pay->phone_pay}}">
          							</div>
                                </div>
                                <div class="form-group">
          							<label class="col-md-3 control-label" for="profileFirstName">อีเมล</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="note" value="{{$pay->email_pay}}">
          							</div>
                                </div>
                                <div class="form-group">
          							<label class="col-md-3 control-label" for="profileFirstName">จำนวนเงิน</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="note" value="{{$pay->money_pay}}">
          							</div>
                                </div>
                                <div class="form-group">
          							<label class="col-md-3 control-label" for="profileFirstName">วันที่โอน</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="note" value="{{$pay->day_pay}} {{$pay->time_pay}}">
          							</div>
                                </div>
                                <div class="form-group">
          							<label class="col-md-3 control-label" for="profileFirstName">ข้อความ</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="note" value="{{$pay->message_pay}} ">
          							</div>
                                </div>
                                <div class="form-group">
          							<label class="col-md-3 control-label" for="profileFirstName">หลักฐานการโอน</label>
                                    <div class="col-md-8">
                                        @if(isset($pay->files_pay))
                                        <img class="img-responsive" src="{{ url('assets/image/payment/'.$pay->files_pay) }}">
                                        @endif
          							</div>
                                </div>
                            </fieldset>

                        </div>
					</section>
                    
                    @endif


                    <section class="card mt-4">
						<div class="card-body">
                            <h4 class="mb-xlg">แก้ไขรายละเอียดการสั่งซื้อ</h4>
                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                {{ method_field($method) }}
                                {{ csrf_field() }}

                                <fieldset>
                                    <div class="form-group">
          									<label class="col-md-3 control-label" for="profileFirstName">สถานะการสั่งซื้อ</label>
          									<div class="col-md-8">
                                              <select name="status" class="form-control mb-md" required>
                                                <option value="0" 
                                                @if( $objs->order_status == 0)
                                                selected='selected'
                                                @endif
                                                >รอการชำระเงิน</option>
                                                <option value="1"
                                                @if( $objs->order_status == 1)
                                                selected='selected'
                                                @endif
                                                >รอการตรวจสอบ</option>
                                                <option value="2" @if( $objs->order_status == 2)
                                                selected='selected'
                                                @endif
                                                >อยุ่ระหว่างการจัดส่ง</option>
                                              </select>
          									</div>
          							</div>

                                      <div class="form-group">
          									<label class="col-md-3 control-label" for="profileFirstName">หมายเลขการจัดส่งสินค้า</label>
          									<div class="col-md-8">
                                              <input type="text" class="form-control" name="note" value="{{$objs->note}}">
          									</div>
          							</div>
                                </fieldset>
                                <br><br>
                                <div class="panel-footer">
          							<div class="row">
          								<div class="col-md-9 col-md-offset-4">
          									<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          									<button type="reset" class="btn btn-default">ยกเลิก</button>
          								</div>
          							</div>
          						</div>

          					</form>
                        </div>
					</section>

           

               </div>
            </div>
        </div>
</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>

<!-- secure_url -->

<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/post_status_order')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "user_id" : user_id },
            success: function(data){
              if(data.data.success){


                var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
                      var notice = new PNotify({
                            title: 'ทำรายการสำเร็จ',
                            text: 'คุณเปลี่ยนการแสดงผล สำเร็จเรียบร้อยแล้วค่ะ',
                            type: 'success',
                            addclass: 'stack-topright'
                          });



              }
            }
        });
    });
});
</script>



@stop('scripts')
