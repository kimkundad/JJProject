@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')

@stop('stylesheet')
@section('content')


<section id="search_container" style="background:#4d536d url(assets/img/bg_login.png) no-repeat center top;">
<div id="search">

                <div class="tab-content">

                    <form name="search" method="GET" action="{{url('search')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="tab-pane active" id="tours">
                    <h3 style="color:#444444; float:left;">{{ trans('message.title_search') }}</h3>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">

                                    <input type="text" class="form-control" id="firstname_booking" name="search" placeholder="{{ trans('message.title_search') }}..." required="">
                                </div>
                            </div>

                        </div><!-- End row -->
                        <!-- End row -->

                        <button class="btn_1 green" type="submit"><i class="icon-search"></i>{{ trans('message.btn_search') }}</button>
                    </div><!-- End rab -->
                   </form>


                </div>


</div>
</section>


<!-- End hero -->

<main >



<div class="container margin_60">

  @if(trans('message.lang') == 'ไทย')
  <div class="main_title">
    <h2> <span>{{$text->title_text_t}} </span> </h2>
    <br>
    <p class="sub_title_main_p">{{$text->sub_title_text_t}}</p>
  </div>
  @elseif(trans('message.lang') == 'Eng')
  <div class="main_title">
    <h2> <span>{{$text->title_text_e}} </span> </h2>
    <br>
    <p class="sub_title_main_p" >{{$text->sub_title_text_e}}</p>
  </div>
  @else
  <div class="main_title">
    <h2> <span>{{$text->title_text_c}} </span> </h2>
    <br>
    <p class="sub_title_main_p" >{{$text->sub_title_text_c}}</p>
  </div>
  @endif



  <div class="row">


    @if($shop)
      @foreach($shop as $shops)

    <div class="col-md-3 col-xs-6 set_img_kim set_new_mar wow zoomIn" data-wow-delay="0.1s" style=" visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;  padding-right: 6px; padding-left: 6px;">

      @if($set_point<=3)
      <div class="ribbon_3 popular"><span>Recommend</span></div>
      @else
      <div class="ribbon_3"><span>Popular</span></div>
      @endif

      <div class="tour_container">
        <div class="img_container">
          <a href="{{url('shop/'.$shops->id)}}">
            <img src="{{url('assets/image/cusimage/'.$shops->image)}}" class="img-responsive" alt="Image">
            <div class="short_info">
              {{$shops->name}}
            </div>
          </a>

        </div>
        <div class="wishlist">
          <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

                      <input class="user_id form hide" type="text" name="id" value="{{$shops->id}}" />
                          <a class="tooltip_flip tooltip-effect-1" >
                              +<span class="tooltip-content-flip">
                              <span class="tooltip-back">Add to wishlist</span></span></a>
          </form>


        </div>


      </div>
      <!-- End box tour -->
    </div {{$set_point++}}>
    <!-- End col-md-4 -->
      @endforeach
    @endif

  </div>
  <!-- End row -->
  <br>
  <p class="text-center nopadding">
    <a href="{{url('all_shop')}}" class="btn_1 medium"> {{ trans('message.total_shop') }} ({{$shop_count}})  </a>
  </p>

  <br><hr>
  <br>
  <div class="main_title">
    <h2> <span style="font-size: 28px;"> สินค้าใหม่ <!--{{ trans('message.sub_title_home_pro') }} --></span> ไม่เหมือนใคร</h2>

    <br>
    <p style="font-size:20px;">สินค้าใหม่เปลี่ยนทุกวันจันทร์ สั่งซื้อได้ก่อนใคร สะดวกรวดเร็ว <!-- {{ trans('message.sub_title_home_2_pro') }}--></p>
  </div>

  <style>
  .thumbnail a>img, .thumbnail>img {
      border-radius: 5px 5px 0px 0px;
  }
  .thumbnail {
    border-radius: 5px;
    display: block;
    padding: 0px;
}
.thumbnail .caption {
    padding: 9px;
    color: #333;
}
.descript {
    /* height: 35px; */
    font-size: 15px;
    margin-left: 8px;
    margin-right: 8px;
    margin-top: 0px;
    margin-bottom: 5px;
    padding-bottom: 5px;
    line-height: 1.2em;
    /* margin-bottom: 12px !important; */
}
.descript a {
    color: #000;
    /* text-decoration: none; */
}
.descript-t {
    float: right;
    height: 40px;
}
.postMetaInline-authorLockup {
    display: table-cell;
    vertical-align: middle;
    font-size: 14px;
    line-height: 1.4;
    padding-left: 10px;
    text-rendering: auto;
}
.rating {
    margin: 1px 0 3px -3px;
    font-size: 15px;
}
.rating .voted {
    color: #F90;
}

.set_new_mar{
  padding-right: 15px;
    padding-left: 15px;
}
.feature_home2{
  padding: 25px;
  background: #fff;
  -webkit-box-shadow: 0 0 5px 0 rgb(0 0 0 / 10%);
    -moz-box-shadow: 0 0 5px 0 rgba(0,0,0,0.1);
    box-shadow: 0 0 5px 0 rgb(0 0 0 / 10%);
}
.my-p-30{
  padding:30px
}
@media screen and (max-width: 767px){
  .set_new_mar{
    padding-right: 5px;
    padding-left: 5px;
}
.my-p-30{
  padding:0px;
  margin-bottom:30px;
}
}

.c_price_pro{
  margin:8px 0px 0px 0px;
  font-size: 20px;
}
.name_pro_index{
  font-size: 16px;
}
[class^="icon-"]:before, [class*=" icon-"]:before {
    font-family: "fontello";
    font-style: normal;
    font-weight: 400;
    speak: none;
    display: inline-block;
    text-decoration: inherit;
    width: 1em;
    margin-right: 0em;
    text-align: center;
    font-variant: normal;
    text-transform: none;
    line-height: 1em;
    margin-left: 0em;
}
.rating {
  margin: 1px 0 3px -3px;
    font-size: 13px;
}
  </style>


  <div class="row">


  


    <!-- สคริปก่อนหน้านี้ ลบ ไปแล้ว -->

    @if(isset($product))
    @foreach($product as $u)
    <div class="col-md-3 col-xs-6 set_new_mar">
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
                              <span class="f_s_title_kim" style="color: #e03753; font-weight: 600;">฿ {{number_format($u->price)}} </span>
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
    
    
  



  </div>



</div>
<!-- End container -->



<hr id="sent_myproduct">




<div class="white_bg" style="background: #f9f9f9;">
      <div class="container margin_60">

      <div class="main_title">
      <h2> <span>{{ trans('message.website_shop') }}</span> </h2>
      <br>
      <p style="font-size:24px; line-height: 28px;">
        {{ trans('message.website_shop_sup') }}
      </p>
    </div>


    @if(trans('message.lang') == 'ไทย')

    <div class="row add_bottom_45">
      <div class="col-md-4 other_tours">
        <ul>
          @if($category1)
            @foreach($category1 as $category1_1)
          <li><a href="{{url('category/'.$category1_1->id)}}"><i class="{{$category1_1->icon}}"></i>{{$category1_1->name}}<span class="other_tours_price">{{$category1_1->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category2)
            @foreach($category2 as $category2_2)
          <li><a href="{{url('category/'.$category2_2->id)}}"><i class="{{$category2_2->icon}}"></i>{{$category2_2->name}}<span class="other_tours_price">{{$category2_2->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category3)
            @foreach($category3 as $category3_3)
          <li><a href="{{url('category/'.$category3_3->id)}}"><i class="{{$category3_3->icon}}"></i>{{$category3_3->name}}<span class="other_tours_price">{{$category3_3->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>

    @elseif(trans('message.lang') == 'Eng')

    <div class="row add_bottom_45">
      <div class="col-md-4 other_tours">
        <ul>
          @if($category1)
            @foreach($category1 as $category1_1)
          <li><a href="{{url('category/'.$category1_1->id)}}"><i class="{{$category1_1->icon}}"></i>{{$category1_1->name_en}}<span class="other_tours_price">{{$category1_1->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category2)
            @foreach($category2 as $category2_2)
          <li><a href="{{url('category/'.$category2_2->id)}}"><i class="{{$category2_2->icon}}"></i>{{$category2_2->name_en}}<span class="other_tours_price">{{$category2_2->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category3)
            @foreach($category3 as $category3_3)
          <li><a href="{{url('category/'.$category3_3->id)}}"><i class="{{$category3_3->icon}}"></i>{{$category3_3->name_en}}<span class="other_tours_price">{{$category3_3->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>

    @else

    <div class="row add_bottom_45">
      <div class="col-md-4 other_tours">
        <ul>
          @if($category1)
            @foreach($category1 as $category1_1)
          <li><a href="{{url('category/'.$category1_1->id)}}"><i class="{{$category1_1->icon}}"></i>{{$category1_1->name_cn}}<span class="other_tours_price">{{$category1_1->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category2)
            @foreach($category2 as $category2_2)
          <li><a href="{{url('category/'.$category2_2->id)}}"><i class="{{$category2_2->icon}}"></i>{{$category2_2->name_cn}}<span class="other_tours_price">{{$category2_2->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category3)
            @foreach($category3 as $category3_3)
          <li><a href="{{url('category/'.$category3_3->id)}}"><i class="{{$category3_3->icon}}"></i>{{$category3_3->name_cn}}<span class="other_tours_price">{{$category3_3->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>

    @endif
        <br><br>
        <div class="feature_home2" style="margin-bottom: 0px;">
        <div class="row">

          <div class="col-md-6">

                <div class="text-center my-p-30" >
                        <br><br><br>
                        <p style="    font-size: 22px;
    line-height: 30px;">
                         สำหรับผู้ต้องการสินค้าจำนวนมาก <br> เรามีสินค้ากว่า 300,000 ชนิด <br> เตรียมไว้ให้คุณในราคาที่เหมาะสม
                         <h3 style="margin-bottom: 0px; margin-top: 10px;"><span>แล้วเราจะรีบติดต่อกลับ</span><h3>
                       </p>
                       <br>

                       <style>
                       .input-group a {
                            background-color: #333;
                            color: #fff;
                            border-color: #333;
                        }
                        .input-group a:hover {
                             background-color: #e04f67;
                             color: #fff;
                             border-color: #e04f67;
                         }
                       </style>

                      



                        </div>

          </div>


          <div class="col-md-6">

            <div class=""  style="margin-bottom: 0px;">


                         <h2 style="font-weight: 700; font-size: 21px; margin-top: 0px; "><span>อยากจะได้สินค้าอะไร บอกเรา เราหาให้!!!</span></h2>

                       <br>

                       <form  id="contactForm">

                         <div class="input-group input-group-icon" >
                            <span class="input-group-addon">
                              <span class="icon"><i class="icon-cart "></i></span>
                            </span>
                            <input type="text" class="form-control" id="product" name="product" value="{{ old('product') }}" placeholder="สินค้าที่ต้องการ" required>
                          </div>


                          <div class="input-group input-group-icon" style="margin-top: 17px;">
                            <span class="input-group-addon">
                              <span class="icon"><i class="icon-mail-7"></i></span>
                            </span>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="อีเมล์ติดต่อกลับ" required>
                          </div>

                          <div class="input-group input-group-icon" style="margin-top: 17px;">
                            <span class="input-group-addon">
                              <span class="icon"><i class="icon-phone-3"></i></span>
                            </span>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="เบอร์โทรติดต่อกลับ" required>
                          </div>
                          <br>
                            <div class="input-group input-group-icon">
                                <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                            </div>
                            <br>
                          <button id="btnSendData" class="btn_1 add_message_btn">ส่งข้อมูล</button>
                        </form>


                  </div>


          </div>
          </div>



        </div>
        <div class="row">                  
        <div class="col-md-12">
            
            @if(isset($ban))
              @foreach($ban as $u)
              <a target="_blank" href="{{ $u->image_url }}"><img src="{{url('assets/banner/'.$u->image)}}" class="img-responsive margin-top-20" /></a>
              @endforeach
            @endif

          </div>
          </div>
      </div>
    </div>




<!-- End container -->
</main>
<!-- End main -->







@endsection

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<script>
    
$(document).on('click','#btnSendData',function (event) {
  event.preventDefault();
  
  var form = $('#contactForm')[0];
  var formData = new FormData(form);

  var product = document.getElementById("product").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;


    console.log(formData)

if(product == '' || email == '' || phone == ''){

  swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

}else{

  $.LoadingOverlay("show", {
    background  : "rgba(255, 255, 255, 0.4)",
    image       : "",
    fontawesome : "fa fa-cog fa-spin"
  });


  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
    }
});

  $.ajax({
      url: "{{url('/api/add_my_product_home')}}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: formData,
      processData: false,
      contentType: false,
      cache:false,
      type: 'POST',
      success: function (data) {

      //  console.log(data.data.status)
          if(data.data.status == 200){


            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 0);

            swal("สำเร็จ!", "ข้อความถูกส่งไปหาเจ้าหน้าที่เรียบร้อยแล้ว", "success");

            $("#product").val('');
            $("#email").val('');
            $("#phone").val('');


          setTimeout(function(){
            //    window.location.replace("{{url('clients/success_payment/')}}/"+data.data.value);
          }, 3000);

          }else{

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 500);

            swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

          }
      },
      error: function () {

      }
  });

}


});
</script>


@if ($message = Session::get('sent_myproduct_is_null'))
<script type="text/javascript">


    $(function(){
      // bind change event to select

      $.notify({
          // options
          icon: 'icon_set_1_icon-77',
          title: "<h4>กรอกข้อมูลไม่ครบค่ะ</h4> ",
          message: "กรอกข้อมูลให้ครบทุกช่องด้วยนะค่ะ เพื่อความสะดวกในการติดต่อกลับ. "
        },{
          // settings
          type: 'danger',
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


@if ($message = Session::get('add_success_product'))
<script type="text/javascript">


    $(function(){
      // bind change event to select

      $.notify({
          // options
          icon: 'icon_set_1_icon-57',
          title: "<h4>ข้อความถูกส่งเรียบร้อยแล้ว</h4> ",
          message: "เจ้าหน้าที่จะรีบทำการติดต่อกลับไปหาท่านโดยไวที่สุด เมื่อเราพบสินค้าที่ท่านต้องการแล้ว. "
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



<script type="text/javascript">

 $('.add_subscribe_btn').click(function(e){
       e.preventDefault();
     //  var username = $('form#cutproduct input[name=id]').val();


     var $form = $(this).closest("form#add_subscribe");
     var formData =  $form.serializeArray();


     var email =  $form.find("#subscribe_email").val();

     //Checkemail(email);

     var emailFilter=/^.+@.+\..{2,3}$/;






     if (!(emailFilter.test(email))) {

      console.log(email);

            $.notify({
          // options
          icon: 'icon_set_1_icon-77',
          title: "<h4>รูปแบบ Email ของท่านไม่ถูกต้องค่ะ</h4> ",
          message: "กรุณาทำการตรวจสอบ Email ของท่านด้วย. "
        },{
          // settings
          type: 'danger',
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

           return false;
     }


       if(email){
         $.ajax({
           type: "POST",
           url: "{{url('add_subscribe')}}",
           headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
           data: "email="+email,
        success: function(data){

          console.log(data.data.status);

            if(data.data.status == 1001) {


               $("#subscribe_email").val('');


            $.notify({
          // options
          icon: 'icon_set_1_icon-57',
          title: "<h4>ข้อความถูกส่งเรียบร้อยแล้ว</h4> ",
          message: "เจ้าหน้าที่จะรีบทำการติดต่อกลับไปหาท่านโดยไวที่สุด เมื่อเราพบสินค้าที่ท่านต้องการแล้ว. "
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




             } else {




 $.notify({
          // options
          icon: 'icon_set_1_icon-77',
          title: "<h4>อีเมลของท่านอยู่ในระบบอยู่แล้ว</h4> ",
          message: "email ของท่านอยุ่ในระบบอยู่แล้ว กรุณาติดต่อเราในช่องทางอื่น. "
        },{
          // settings
          type: 'danger',
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



             }
           },

           failure: function(errMsg) {
             alert(errMsg.Msg);
           }
         });
       }else{

         $.notify({
          // options
          icon: 'icon_set_1_icon-77',
          title: "<h4>กรอกข้อมูลไม่ครบค่ะ</h4> ",
          message: "กรอกข้อมูลให้ครบทุกช่องด้วยนะค่ะ เพื่อความสะดวกในการติดต่อกลับ. "
        },{
          // settings
          type: 'danger',
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


       }

     });






 </script>

@stop('scripts')
