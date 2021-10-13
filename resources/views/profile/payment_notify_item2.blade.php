
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
                    <table class="table ">
                      <tbody>


                        <tr>
                          <td>ชื่อผู้ใช้งาน</td><td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                          <td>อีเมล</td><td>{{Auth::user()->email}}</td>
                          </tr>

                          <tr>
                          <td>เบอร์โทรศัพท์มือถือ</td><td>{{Auth::user()->phone}}</td>
                          </tr>

                          <tr>





                      </tbody>
                    </table>
                    <br />
                  <a href="{{url('my_account/'.Auth::user()->id.'/edit')}}" class="btn btn-submit">แก้ไขบัญชีของฉัน</a>
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
