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
                            <li><a href="#">เก็บโค้ดส่วนลดจาก TeeNeeJJ</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

    <div class="main_title">
        <h2>เก็บโค้ดส่วนลดจาก <span> TeeNeeJJ </span></h2>
        <br>
        <p> เงื่อนไข ของโค้ดส่วนลดที่ลูกค้าได้รับนั้น เป็นไปตามเงื่อนไขที่ทางบริษัทกำหนด อาจมีการเปลี่ยนแปลงได้ตลอดเวลา</p>
    </div>
    <br>
    <img src="{{ url('img/code_teeneejj.jpg') }}">




        <div class="row">
            <div class="col-md-12">
                
            
            </div>
        </div>
    






        <hr>

</div>



@endsection

@section('scripts')



@stop('scripts')
