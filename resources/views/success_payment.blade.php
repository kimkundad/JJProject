@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')


<section class="parallax-window" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            <div class="parallax-content-1">
              <div class="animated fadeInDown">
                <h1>แจ้งชำระเงิน</h1>

              </div>
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">แจ้งชำระเงิน</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

    <div class="main_title">
        <h2><span>แจ้งชำระเงิน สำเร็จ!</span></h2>
        <br>
        <p>เราจะทำการตรวจสอบข้อมูลที่ท่านส่งมา จากนั้นจะเร่งทำการส่งสินค้าให้แก่ท่านโดยไวที่สุด ขอบคุณทุกท่านที่เข้าใช้บริการของ TeeneeJJ <br>หากเกิดความล่าช้าหรือไม่พอใจแก่ลูกค้า เราจะทำการปรับปรุงบริการของเราให้ดีขึ้น เพื่อความพึงพอใจของลูกค้าให้มากที่สุด</p>
        <br>
        <div class="text-center">
        <img src="{{url('assets/image/payment.png')}}"  >
      </div>

    </div>

    <div class="row add_bottom_45">







    </div>


        <hr>

</div>



@endsection

@section('scripts')



@stop('scripts')
