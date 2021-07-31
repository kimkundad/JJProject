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
                            <li><a href="#">{{ trans('message.category') }}</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

            <div class=" margin_30 text-center">
                <h2 class="major"><span>บัญชีของฉัน </span></h2>
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
                    <h3>บัญชีของฉัน </h3>
                    <br />
                    <form class="form-horizontal" action="{{url('post_edit_profile')}}" method="post" enctype="multipart/form-data">

											{{ csrf_field() }}

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">ชื่อผู้ใช้งาน</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="name" value="{{ $objs->name }}" >
                          <input type="hidden" class="form-control" name="user_id" value="{{ $objs->id }}" >
                            <br />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileCompany">อีเมล</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="email" value="{{ $objs->email }}"  readonly>
                          <br />
                          @if ($message = Session::get('error'))
                          <p class="text-danger">
                            <b>Email ที่ท่านต้องการเปลี่ยน นี้มีผู้ใช้แล้ว</b>
                          </p>
                          @endif

                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileCompany">เบอร์โทรศัพท์มือถือ</label>
                        <div class="col-md-8">
                          <input type="number" class="form-control" name="phone" value="{{ $objs->phone }}"  >
                          <br />
                        </div>
                      </div>


               
                      

                    <div class="col-md-12 text-center" >

                    <button type="submit" class="btn btn-submit">อัพเดทข้อมูล</button>
                    <a href="{{url('my_account')}}" class="btn btn-default">ยกเลิก</a>
                  </div>
                    </form>
                </div>
            </div>

  
    






        

</div>



@endsection

@section('scripts')





@stop('scripts')
