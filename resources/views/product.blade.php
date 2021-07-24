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
.juicer-feed h1.referral{
  display: none !important;
}
#position {
    color: #666;
    background-color: #f9f9f9;
    padding: 10px 0;
    font-size: 11px;
}
#position ul li a {
    font-size: 14px;
    color: #333;
    opacity: 1;
}
</style>

<style>

.see-all-overlay {
    top: 3%;
    position: absolute;
    background: rgba(0,0,0,.5);
    color: #fff;
    width: 94%;
    height: 97%;
    text-align: center;
    display: table;
    background-color: rgba(0,0,0,.5);
    transition: all 250ms ease-in-out;
    -ms-transition: all 250ms ease-in-out;
    text-decoration: none;
    text-transform: uppercase;
}
.set_preview{
    max-height: 184px; overflow: hidden; position: relative;
}
@media screen and (max-width: 767px){

.set_preview{
    max-height: 220px; max-height: 300px; overflow: hidden; position: relative;
}

.thumbnail a>img, .thumbnail>img {
width: 100%;
margin-right: 0px;
margin-left: 0px;
}

.img-responsive{
    width: 100%;
}

.see-all-overlay {
top: 0%;
position: absolute;
background: rgba(0,0,0,.5);
color: #fff;
width: 94%;
height: 100%;
text-align: center;
display: table;
background-color: rgba(0,0,0,.5);
transition: all 250ms ease-in-out;
-ms-transition: all 250ms ease-in-out;
text-decoration: none;
text-transform: uppercase;
}

}
.see-all-overlay-text {
    font-size: 14px;
    display: table-cell;
    vertical-align: middle;
    letter-spacing: normal;
    font-weight: 800;
}
#position ul li:first-child:before {
    content: "\eaf4";
    font-style: normal;
    font-weight: 400;
    font-family: "fontello";
    position: absolute;
    left: 0;
    font-size: 14px;
    top: 0px;
    color: #555;
}
#position ul li:after {
    content: "\e9ee";
    font-style: normal;
    font-weight: 400;
    font-family: "fontello";
    position: absolute;
    right: 0;
    top: 0px;
    font-size: 14px;
}
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



            <div class="container margin_60">



    <div class="row add_bottom_45" style="margin-top:60px;">

      <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">{{$product->name_pro}}</a></li>

                            </ul>
                </div>
            </div>

      <div class="col-sm-10 col-md-8 col-lg-8 " style="padding-bottom:20px">


        <div class="white_bg">
        <div class="row magnific-gallery hidden-sm hidden-xs">

@if($home_image_count > 4)

<div class="col-md-6 col-sm-6" style="padding-right: 3px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt="" style="height: 279px;"></a>
</div>

<div class="col-md-6 col-sm-6" style="padding-left: 3px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt="" style="height: 279px;"></a>
</div>

<div class="col-md-4 col-sm-4" style="padding-right: 0px; padding-top:5px">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[2]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[2]->image)}}" alt=""></a>
</div>

<div class="col-md-4 col-sm-4" style="padding-left: 6px; padding-right:6px; padding-top:5px; ">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[3]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[3]->image)}}" alt=""></a>
</div>


<div class="col-md-4 col-sm-4" style="padding-left: 0px; padding-top:5px">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[4]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[4]->image)}}" alt="">
<div class="see-all-overlay"><span class="see-all-overlay-text">ดูทั้งหมด {{$home_image_count}} รูป</span></div></a>
</div>

@else

<div class="col-md-6 col-sm-6" style="padding-right: 3px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="padding-left: 3px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>

@endif

<div class="hidden">{{$i = 0}}</div>
@foreach ($home_image_all as $images)
<div class="hidden">{{$i++}}</div>
@if($i > 5)

<div class="col-md-4 col-sm-4 hidden " style="padding-left: 0px; padding-top:5px">
<a class="example-image-link" href="{{url('assets/image/product/'.$images->image)}}" >
</a>
</div>
@endif

@endforeach

</div>


<div class="row magnific-gallery visible-sm visible-xs">

@if($home_image_count > 4)

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>

<div class="col-md-4 col-sm-4" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[2]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[2]->image)}}" alt=""></a>
</div>

<div class="col-md-4 col-sm-4" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[3]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[3]->image)}}" alt=""></a>
</div>


<div class="col-md-4 col-sm-4" style="margin-bottom: 8px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[4]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[4]->image)}}" alt="">
<div class="see-all-overlay" style="width: 90%;"><span class="see-all-overlay-text">ดูทั้งหมด {{$home_image_count}} รูป</span></div></a>
</div>

@else

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>

@endif

<div class="hidden">{{$i = 0}}</div>
@foreach ($home_image_all as $images)
<div class="hidden">{{$i++}}</div>
@if($i > 5)

<div class="col-md-4 col-sm-4 hidden " >
<a class="example-image-link" href="{{url('assets/image/product/'.$images->image)}}" >
</a>
</div>
@endif

@endforeach

</div>




        <hr>

        <div class="row" style="padding:15px;">
          <div class="col-md-3">
              <h3 style="margin-top: 0px;">รายละเอียด</h3>
          </div>
          <div class="col-md-9">

              {!! $product->detailss !!}
              <br>

              <div class="text-right">


                <a class="btn btn-social-icon btn-dropbox" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-dropbox']);"><span class="fa fa-dropbox"></span></a>
                <a class="btn btn-social-icon btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-facebook']);"><span class="fa fa-facebook"></span></a>



                <a class="btn btn-social-icon btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-google']);"><span class="fa fa-google"></span></a>
                <a class="btn btn-social-icon btn-instagram" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-instagram']);"><span class="fa fa-instagram"></span></a>


                <a class="btn btn-social-icon btn-odnoklassniki" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-odnoklassniki']);"><span class="fa fa-odnoklassniki"></span></a>


                <a class="btn btn-social-icon btn-twitter" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-twitter']);"><span class="fa fa-twitter"></span></a>

              </div>

          </div>
        </div>

        </div>

      </div>
<style>
.info__header__real-price{
      color: #d0011b;
      font-size: 2.4rem;
    font-weight: 700;

    text-transform: capitalize;
}
.info__header__real-price span{
      color: #999;
      font-size: 2rem;
    font-weight: 700;

    text-transform: capitalize;
}
.info_header_badges{
  float: right;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    text-align: center;
}
.badge-promotion{
  background-color: rgba(255,212,36,.9);
  width: 40px;
    height: 45px;
    display: inline-block;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    position: relative;
    padding: 4px 2px 3px;
    color: #d0011b;
}
span {

}
</style>
      <div class="col-sm-10 col-md-4 col-lg-4 white_bg" style="border: 1px solid #f4f4f4; font-size: 12px; padding: 1.5em 1.7em 1.8em 1.7em;">

        <div style="border-bottom: 1px dashed rgba(0,0,0,.09); padding-bottom:10px;">
        <div class="info_header_badges">
          <div class="badge-promotion">สินค้า พิเศษ</div>
        </div>

        <h3 style="margin-bottom: 5px; margin-top: 5px;"><span>{{$product->name_pro}}</span></h3>
        <p>หมวดหมู่ : {{$product->name}}</p>
        <div class="info__header__real-price"><span>ราคา</span> ฿{{number_format($product->price)}}</div>
        </div>


        <div style="border-bottom: 1px dashed rgba(0,0,0,.09); padding-bottom:20px; padding-top:20px;">
          <span class="rating">

            <?php
            for($i=1;$i <= $product->rating;$i++){
            ?>

                            <i class="icon-star voted"></i>
            <?php
            }
            ?>

            <?php
            $total = 5;
            $total -= $product->rating;

            for($i=1;$i <= $total;$i++){
            ?>

                           <i class="icon-star-empty"></i>
            <?php
            }
            ?>
              </span>

              คะแนนจากผู้ซื้อ {{$product->rating}}.0 เต็ม 5
        </div>


        <div style="border-bottom: 1px dashed rgba(0,0,0,.09); padding-bottom:20px; padding-top:20px;">
          <p style="    margin: 0 0 0px;"><i class="icon-truck"></i> สินค้านี้มีค่าจัดส่ง : ฿{{$product->shipping_price}}</p>
        </div>
        <div style="border-bottom: 1px dashed rgba(0,0,0,.09); padding-bottom:20px; padding-top:20px;">
          <p style="    margin: 0 0 0px;"><i class=" icon-thumbs-up-alt"></i> ขายแล้ว : {{$product->total}} ชิ้น</p>
        </div>




        <form  method="POST"  action="{{url('add_session_value')}}">
                  {{ csrf_field() }}
        <input type="hidden" name="product_id"  value="{{$product->idp}}"/>
        <div style="border-bottom: 1px dashed rgba(0,0,0,.09); padding-bottom:20px; padding-top:20px;">

          <div class="col-md-2" style="padding-left: 0px; padding-right: 0px;"><p style="margin: 10px 0 0px;">จำนวน : </p></div>
          <div class="col-md-4">
            <div class="numbers-row">
  										 <input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
  									<div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
          </div>

          <div class="col-md-6">
            <p style="margin: 10px 0 0px;">สินค้าทั้งหมด {{$product->stock}} ชิ้น</p>
          </div>

          <br>
          <br>
        </div>


        <div style="border-bottom: 1px dashed rgba(0,0,0,.09); padding-bottom:20px; padding-top:20px;">
          <button type="submit" class="btn btn-danger" style="width: 100%; margin-bottom:10px;">
                    <i class="icon-basket" ></i>	เพิ่มไปยังรถเข็น
                      </button>

        </div>

        </form>


        <div style="border-bottom: 1px dashed rgba(0,0,0,.09); padding-bottom:20px; padding-top:20px;">

          <form  method="POST" id="buy_item"  action="{{url('buy_item')}}">
            {{ csrf_field() }}
            <input type="hidden" name="product_id"  value="{{$product->idp}}"/>
            <input type="hidden" name="quantity"  value="1"/>
          <a href="javascript:{}" onclick="document.getElementById('buy_item').submit();" class=" btn_1 white" style="width: 100%; text-align: center; font-size: 14px; border: 1px solid #e04f67; margin-bottom:10px;"><i class="icon-check-2" ></i> กดสั่งซื้อสินค้า</a>

          <a href="#" class="btn btn-success" style="width: 100%;">
                                <i class="fa fa-commenting" ></i>	จองผ่าน Line
                              </a>

        </form>
        </div>










        <div style="border-bottom: 1px dashed rgba(0,0,0,.09); padding-bottom:20px; padding-top:20px;">
          <p style="margin: 0 0 0px;"><span><i class="icon-briefcase" style="color: #e04f67;"></i></span> ของแท้ 100%</p>
        </div>
        <div style=" padding-bottom:10px; padding-top:10px;">
          <p style="margin: 0 0 0px;"><span><i class="icon-right-hand" style="color: #e04f67;"></i></span> คืนเงิน/สินค้า ภายใน 15 วัน</p>
        </div>


        <div class="box_style_2">
    			<i class="icon_set_1_icon-57"></i>
    			<h4>{{ trans('message.want') }} <span>{{ trans('message.help') }}</span></h4>
    			<a href="tel://004542344599" class="phone">086 551 7336</a>
    			<small>{{ trans('message.con_t') }}</small>
    		</div>

      </div>


    </div>




</div>



@endsection

@section('scripts')


<script>
$(document).ready(function(){
  var element = document.getElementById("set-head");
element.classList.add("sticky");
var $window = $(window);
$window.scroll(function() {
  var element = document.getElementById("set-head");
element.classList.add("sticky");
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
