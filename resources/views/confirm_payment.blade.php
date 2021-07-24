@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')

<style>
.icheckbox_square-grey, .iradio_square-grey{
  width: 24px;
    height: 23px;
}
</style>

<section class="parallax-window" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            <div class="parallax-content-1">
              <div class="animated fadeInDown">
                <h1>{{ trans('message.payment') }}</h1>

              </div>
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">{{ trans('message.payment') }}</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">



    <div class="row add_bottom_45">

      <div class="col-md-10 col-md-offset-1">
          

        <div class="form_title">
                <h3><strong><i class="icon-pencil"></i></strong>{{ trans('message.payment') }}</h3>
                <p>
                    แจ้งยอดการชำระเงิน เพื่อทำการจัดส่งสินค้าให้แก่ท่านโดยไวที่สุด
                </p>
            </div>


            <div class="step">

                <div id="message-contact"></div>
                <form method="post" id="contactform" action="{{url('add_confirm_payment')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>{{ trans('message.con_name') }}</label>
                                <input type="text" class="form-control" id="name_pay" name="name_pay" placeholder="คุณแพรวา">
                                @if ($errors->has('name_pay'))
                                <div id="message-contact" style=""><div class="error_message">You must enter your Name.</div></div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>{{ trans('message.con_phone') }}</label>
                                <input type="text" id="phone_pay" name="phone_pay" class="form-control" placeholder="08-115-55-7854">
                                @if ($errors->has('name_pay'))
                                <div id="message-contact" style=""><div class="error_message">You must enter your Phone Number.</div></div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- End row -->
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                          <div class="form-group">
                              <label>หมายเลขรายการสั่งซื้อ</label>
                              <input type="text" id="no_pay" name="no_pay" class="form-control" >
                              @if ($errors->has('name_pay'))
                                <div id="message-contact" style=""><div class="error_message">You must enter your Order Number.</div></div>
                                @endif
                          </div>
                      </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>อีเมล</label>
                                <input type="text" id="email_pay" name="email_pay" class="form-control" >
                                @if ($errors->has('name_pay'))
                                <div id="message-contact" style=""><div class="error_message">You must enter your Email.</div></div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ยอดโอน</label>
                                <input type="text" id="money_pay" name="money_pay" class="form-control" >
                                @if ($errors->has('name_pay'))
                                <div id="message-contact" style=""><div class="error_message">You must enter your Amount.</div></div>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>ธนาคารที่โอน</label>
                            <br>
                            <br>

                            @if($bank)
                              @foreach($bank as $banks)
                              <div class="col-md-12 col-sm-12">
                            <label class="" style="font-size:14px;">
                											<div class="iradio_square-grey" style="position: relative;">
                                        <input type="radio" name="bank" value="{{$banks->bank_name}}" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper" ></ins>
                                      </div>
                                      {{$banks->bank_name}} {{$banks->bank_owner}} {{$banks->bank_number}}
										        </label>
                            <br>
                            <br>
                            </div>
                              @endforeach
                            @endif

                            @if ($errors->has('name_pay'))
                                        <div id="message-contact" style=""><div class="error_message">You must choose your Bank.</div></div>
                                        @endif

                        </div>
                      </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6 col-sm-6">
      								<div class="form-group">
      									<label><i class="icon-calendar-7"></i> วันที่โอน</label>
      									<input class="date-pick form-control" name="day_pay" data-date-format="M d, D" type="text">
                                          @if ($errors->has('name_pay'))
                                        <div id="message-contact" style=""><div class="error_message">You must enter your Date Transfer.</div></div>
                                        @endif
      								</div>
      							</div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label><i class=" icon-clock"></i> เวลา</label>
                        <input class="time-pick form-control" name="time_pay" value="12:00 AM" type="text">
                      </div>
                    </div>

                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-12" style="border-bottom: 1px solid #f9f9f9;">
                  <h4>หลักฐานการโอน (ถ้ามี)</h4>

                  <div class="form-inline upload_1">
      							<div class="form-group">
      								<input type="file" name="files" id="js-upload-files" multiple="">
      							</div>

      						</div>

                    </div>
                  </div>




                    <div class="row">

                        <div class="col-md-12">
                          <br>
                          <hr>
                            <div class="form-group">
                                <label>หมายเหตุ</label>
                                <textarea rows="5" id="message_contact" name="message_pay" class="form-control" placeholder="หมายเหตุการ โอนเงิน" style="height:200px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">

    <div class="col-md-6">


    </div>
</div>
                    <div class="row">
                        <div class="col-md-6">

                            <button class="btn_1" type="submit">แจ้งชำระเงิน</button>

                        </div>
                    </div>

                </form>
            </div>


      </div>





    </div>


        <hr>

</div>



@endsection

@section('scripts')



@stop('scripts')
