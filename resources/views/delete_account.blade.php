@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')


<section class="parallax-window" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            <div class="parallax-content-1">
              
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">วิธีการลบบัญชีของคุณ</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

    <div class="main_title">
        <h2>วิธีการลบบัญชีของคุณ </span></h2>
        <br>
        <p> การลบบัญชีของคุณแบบถาวร พอลบบัญชีแล้วข้อมูลผู้ใช้งานของคุณทั้งหมดจะถูกลบถาวรทั้งหมด อีเมล ชื่อผู้ใช้งาน รายงานที่คุณชื่นชอบ รายการสั่งซื้อสินค้า</p>
    </div>




        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4>1.เปิดเว็บไซต์ TeeNeeJJ.com แล้วทำการเข้าสู่ระบบใช้งาน ที่มุมบนขวาจะมีชื่อผู้ใช้งานของคุณ ของขอบบนของจอคุณ ให้ทำการกดคลิก 1 ที เพื่อให้มี dropdown menu ลงมาแสดงให้เห็น </h4>
                <h4>2.จากนั้นเลือกที่เมนู "  ลบบัญชีของคุณ "</h4>
                <br>
                <img src="{{ url('assets/image/delete_account2.jpg') }}" class="img-responsive">
                    <br>
                <h4>3.จากนั้นระบบจะพาคุณไปยังหน้าของ ลบบัญชีของคุณ จากนั้นให้ทำการอ่านรายละเอียด เงื่อนไขการลบข้อมูลที่เราระบุไว้ เพื่อความแน่ใจอีกครั้ง ว่าท่านจะทำการลบบัญชีอย่างถาวร จริงๆใช่หรือไม่</h4>
                <h4>4.หากท่านได้ทำการพิจารณา ให้ท่านกดยืนยันการลบบัญชีที่ปุ่มสีฟ้า จากนั้นระบบจะทำการขอยืนยันอีกรอบว่า "ท่านต้องการลบบัญชีของท่านจริงๆใช่ไหม" ให้ทำการกดเพื่อลบบัญชีผู้ใช้งาน</h4>
                <img src="{{ url('assets/image/delete_account_confirm.jpg') }}" class="img-responsive">
                <h4>5.หลังจากกดปุ่ม ลบบัญชีของคุณ แล้วระบบจะทำการออกจากระบบให้ท่านแล้วกลับมาสู่หน้าแรกของเราอีกครั้ง</h4>
            </div>
        </div>
    






        <hr>

</div>



@endsection

@section('scripts')



@stop('scripts')
