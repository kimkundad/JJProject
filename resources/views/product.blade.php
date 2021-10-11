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
.descript-t {
    float: right;
    height: 40px;
}
.rating {
  margin: 1px 0 3px -3px;
    font-size: 13px;
}
.rounded-circle {
    border-radius: 50%!important;
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

@elseif($home_image_count == 3)

<div class="col-md-12 col-sm-12" >
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="padding-right: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="padding-left: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[2]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[2]->image)}}" alt=""></a>
</div>

@elseif($home_image_count == 2)



<div class="col-md-6 col-sm-6" style="padding-right: 3px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="padding-left: 3px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>


@elseif($home_image_count == 4)


<div class="col-md-12 col-sm-12" >
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-4" style="padding-right: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>

<div class="col-md-4" style="padding-left: 3px; padding-right: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[2]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[2]->image)}}" alt=""></a>
</div>

<div class="col-md-4" style="padding-left: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[3]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[3]->image)}}" alt=""></a>
</div>

@elseif($home_image_count == 1)

<div class="col-md-12 col-sm-12" >
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

@else

<div class="col-md-12 col-sm-12" >
<a class="example-image-link" href="{{url('assets/image/product/'.$product->image_pro)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$product->image_pro)}}" alt=""></a>
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


<div class="row magnific-gallery visible-sm visible-xs" id="{{ $home_image_count }}">

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


@elseif($home_image_count == 3)


<div class="col-md-12 " >
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-xs-6" style="padding-right: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-xs-6" style="padding-left: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[2]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[2]->image)}}" alt=""></a>
</div>

@elseif($home_image_count == 4)


<div class="col-md-12 " >
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-xs-4" style="padding-right: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-xs-4" style="padding-left: 3px; padding-right: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[2]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[2]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-xs-4" style="padding-left: 3px; padding-top: 5px;">
<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[3]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[3]->image)}}" alt=""></a>
</div>

@elseif($home_image_count == 2)

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

<div class="col-md-6 col-sm-6" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[1]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[1]->image)}}" alt=""></a>
</div>

@elseif($home_image_count == 1)

<div class="col-md-12" style="margin-bottom: 8px;">

<a class="example-image-link" href="{{url('assets/image/product/'.$home_image[0]->image)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$home_image[0]->image)}}" alt=""></a>
</div>

@else



<div class="col-md-12 col-sm-12" >
<a class="example-image-link" href="{{url('assets/image/product/'.$product->image_pro)}}" >
<img class="img-responsive example-image" src="{{url('assets/image/product/'.$product->image_pro)}}" alt=""></a>
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

              
              

          </div>
        </div>


                            <div class="row" style="padding:15px;">
                                      <div class="col-md-4" style="margin-top:-12px; ">
                                  <h4>Social share</h4>
                              </div>
                                      <div class="col-md-8" >
                                        <div class="fb-like" data-href="https://www.teeneejj.com/product/{{$product->idp}}" data-layout="button_count" data-action="recommend" data-size="small" data-show-faces="true" data-share="true"></div>
                                      </div>


                                       </div>

        </div>
        <hr class="hidden-sm hidden-xs">
        <div class="row hidden-sm hidden-xs">
          <div class="col-md-12">
          <h4>สินค้าที่คล้ายกัน</h4>
          </div>
          @if(isset($product_ran))
    @foreach($product_ran as $u)
    <div class="col-md-4 col-xs-6 set_new_mar">
        <div class="thumbnail a_sd_move">
              <div style=" overflow: hidden; position: relative; min-height: 153px; max-height: 173px;">
                  <a href="{{url('product/'.$u->id)}}">
                      <img src="{{url('assets/image/product/'.$u->image_pro)}}">
                  </a>
                </div>
                <div class="caption" style="padding: 3px;">
                            <div class="descript bold" style="border-bottom: 1px dashed #dff0d8; height: 38px;overflow: hidden; ">
                                <a href="{{url('product/'.$u->id)}}">{{$u->name_pro}}</a>
                            </div>

                            <div class="descript" style="height: 20px;">
                              <span style="color: #e03753; font-size: 18px; font-weight: 600;">฿ {{number_format($u->price)}} </span>
                              <div class="descript-t">
                              <div class="postMetaInline-authorLockup">

                             

                                <div class="rating">

            <?php
            for($i=1;$i <= $u->rating;$i++){
            ?>

                            <i class="icon-star voted"></i>
            <?php
            }
            ?>

            <?php
            $total = 5;
            $total -= $u->rating;

            for($i=1;$i <= $total;$i++){
            ?>

                           <i class="icon-star-empty"></i>
            <?php
            }
            ?>
              </div>

                              </div>
                              </div>
                            </div>

                          </div>
        </div>
    </div>
    @endforeach
    @endif

    <hr>

          

        </div>
        <hr>
        <div class="row">
          <div class="col-lg-3">
							<h3>คะแนนของสินค้า </h3>
							<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">รีวิวสินค้า</a>
					</div>
          <div class="col-lg-9">
              <div id="general_rating">{{ $count_star }} รีวิว
								<div class="rating">
                <?php
            for($i=1;$i <= $max;$i++){
            ?>

                            <i class="icon-star voted"></i>
            <?php
            }
            ?>

            <?php
            $total = 5;
            $total -= $max;

            for($i=1;$i <= $total;$i++){
            ?>

                           <i class="icon-star-empty"></i>
            <?php
            }
            ?>
								</div>
							</div>
              <hr>

              @if(isset($review))
              @foreach($review as $u)
              <div class="review_strip_single">
								<img src="{{ url('assets/images/avatar/'.$u->avatar) }}" alt="Image" class="rounded-circle" style="max-width:75px; max-height:75px;">
								<small> - {{ formatDateThat($u->created_at) }} -</small>
								<h4>{{ $u->name }}</h4>
								<p>
									"{{ $u->comment }}"
								</p>
								<div class="rating">
                <?php
            for($i=1;$i <= $u->star;$i++){
            ?>

                            <i class="icon-star voted"></i>
            <?php
            }
            ?>

            <?php
            $total = 5;
            $total -= $u->star;

            for($i=1;$i <= $total;$i++){
            ?>

                           <i class="icon-star-empty"></i>
            <?php
            }
            ?>
								</div>
							</div>
              @endforeach
              @endif

              {{ $review->links() }}
              
          </div>

          <div class="modal fade" id="myReview" tabindex="-1" aria-labelledby="myReviewLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myReviewLabel">เขียนรีวิวสินค้านี้</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                 
                  <form method="post" action="{{ url('post_review_product') }}" name="review_tour" >
                  {{ csrf_field() }}
                    <input name="pro_id" id="tour_name" type="hidden" value="{{ $product->idp }}">

                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input name="name_review"  type="text" placeholder="ชื่อผู้ใช้งาน" class="form-control">
                      </div>
                    </div>
                  </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>ให้คะแนนสินค้า</label>
                          <select class="form-control" name="star" id="position_review">
                            <option value="">เลือกดาวให้กับสินค้า</option>
                            <option value="1">1 ดาว แย่มาก </option>
                            <option value="2">2 ดาว ราคาเหมาะสม</option>
                            <option value="3">3 ดาว เฉยๆกับสินค้านี้</option>
                            <option value="4">4 ดาว รู้สึกดี</option>
                            <option value="5">5 ดาว ยอดเยี่ยมมาก</option>
                          </select>
                        </div>
                      </div>
                  
                    </div>
                    
                    
                    <!-- End row -->
                    <div class="form-group">
                      <textarea name="comment" id="review_text" class="form-control" style="height:100px" placeholder="แสดงความเห็นเกี่ยวกับสินค้านี้"></textarea>
                    </div>
                    <div class="form-group">
                    <div class="row" style="padding-left:18px;">
                        <div class="col-md-12">
                            <div >
                                <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                                <br>
                            </div>
                        </div>
                    </div>
                    </div>
                    <input type="submit" value="บันทึกข้อมูล" class="btn_1" id="submit-review">
                  </form>
                </div>
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
            for($i=1;$i <= $max;$i++){
            ?>

                            <i class="icon-star voted"></i>
            <?php
            }
            ?>

            <?php
            $total = 5;
            $total -= $max;

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
<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0&appId=605342047539353&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


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



@if ($message = Session::get('add_error'))
<script type="text/javascript">

$(document).ready(function(){


  swal("กรุณากรอกข้อมูล รีวิว ให้ครบ");
  
  
  
    });
</script>
@endif


@if ($message = Session::get('add_success'))
<script type="text/javascript">

$(document).ready(function(){


  swal("เพิ่มข้อมูลสำเร็จ!", "กรุณารอสักครู่ เพื่อการตรวจสอบของระบบ", "success");
  

  
    });
</script>
@endif




@stop('scripts')
