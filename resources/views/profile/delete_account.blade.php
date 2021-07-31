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
                            <li><a href="#">ลบบัญชีของคุณ</a></li>

                            </ul>
                </div>
            </div>

            <div class="container margin_60">


            <div class=" margin_30 text-center">
                <h2 class="major"><span>ลบบัญชีของคุณ </span></h2>
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
                    <h3>เกี่ยวกับการลบบัญชีของคุณ </h3>
                    <hr>
                    <p>1.ข้อมูลและเนื้อหาทั้งหมดในบัญชีดังกล่าวจะหายไป เช่น อีเมล ข้อมูลการซื้อของสินค้า ใน TeeNeeJJ การใช้คะแนนสินค้า </p>
                    <p>2.คุณจะไม่สามารถใช้บริการต่างๆ ของ TeeNeeJJ ที่ลงชื่อเข้าใช้ด้วยบัญชีดังกล่าว จนกว่าคุณจะทำการสมัครใหม่</p>
                    <p>3.คุณจะเสียสิทธิ์เข้าถึงการข่าวสารของ TeeNeeJJ ที่ระบบได้ทำการอัพเดทข่าวสารออกไปทางอีเมลของผู้ใช้งาน</p>
                    <p>4.เมื่อลบบัญชีแล้ว คุณจะใช้การตรวจสอบความปลอดภัยเพื่อตรวจสอบกิจกรรมในบัญชีดังกล่าวไม่ได้อีกต่อไป</p>
                    <a class="btn_1" onclick="return confirm('ลบบัญชีของคุณจริงๆใช่ไหม?')" href="{{ url('api/delete_my_account/'.Auth::user()->id) }}">ลบบัญชีของคุณ</a>
                </div>
            </div>

  
    






        

</div>



@endsection

@section('scripts')



@stop('scripts')
