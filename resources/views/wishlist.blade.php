@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')



<style>
.juicer-feed h1.referral{
  display: none !important;
}
</style>

<section class="parallax-window" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            <div class="parallax-content-1">
              <div class="animated fadeInDown">
                <h1>wishlist</h1>

              </div>
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">wishlist</a></li>

                            </ul>
                </div>
            </div>




            <div class="container margin_60">



    <div class="row add_bottom_45" >

      <div class="col-lg-9 col-md-9 col-md-offset-2">

        <div id="tools">
             <div class="row">
              <div class="col-md-12">
                <p style="margin: 8px 0 5px 5px;"> {{ trans('message.sum_pro') }} (<span id="get_count_wish"></span>)</p>
              </div>


            </div>
        </div>



        <div class="infinite-scroll">
              @if($options)
              @foreach($options as $option)

              <div class="strip_all_tour_list wow fadeIn  animated" id="{{$option->idw}}">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="wishlist">
                                    <form id="cutproduct3" class="typePay2 " novalidate="novalidate" action="" method="post" role="form">
                                            <input class="user_id form hide" type="text" name="id" value="{{$option->idw}}">
                                            <a class="tooltip_flip tooltip-effect-2">
                                                -<span class="tooltip-content-flip">
                                                    <span class="tooltip-back">Remove to wishlist</span>
                                                </span>
                                            </a>
                                    </form>
                                </div>
                                <div class="img_list">
                                    <a href="{{url('shop/'.$option->id)}}">
                                        <img src="{{url('assets/image/cusimage/'.$option->image)}}" alt="a.m.p clothing">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                        </div>

                        <div class="clearfix visible-xs-block"></div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="tour_list_desc">

                                    <div id="score">Superb<span>{{$option->rating}}.0</span></div>
                                    <div class="rating">

                                    <?php
                                    for($i=1;$i <= $option->rating;$i++){
                                    ?>

                                                                <i class="icon-star voted"></i>
                                        <?php
                                        }
                                        ?>

                                    <?php
                                    $total = 5;
                                    $total -= $option->rating;

                                    for($i=1;$i <= $total;$i++){
                                    ?>

                                                            <i class="icon-star-empty"></i>
                                        <?php
                                        }
                                        ?>

                                    </div>

                                    <h3><strong>{{$option->name}}</strong></h3>
                                    <p>{!!mb_substr(strip_tags($option->detail),0,150,'UTF-8')!!}...</p>
                                    <ul class="add_info">
                                        <li>
                                            <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="" data-original-title="{{$option->phone}}"><i class="fa icon-phone"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="" data-original-title="{{$option->facebook}}"><i class="fa icon-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="" data-original-title="ID Line : {{$option->line_id}}"><i class="fa icon-comment-empty"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="" data-original-title="{{$option->email}}"><i class="fa icon-mail-2"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="" data-original-title="{{$option->website}}"><i class="fa icon-desktop"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="price_list">
                                        <div>{{number_format($option->view)}}<span class="normal_price_list"></span><small>*ยอดเข้าชม</small>
                                            <p><a href="{{url('shop/'.$option->id)}}" class="btn_1">ดูรายละเอียด</a></p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        @endforeach
                        @endif



                        {{ $options->links() }}

          </div>

        <hr>
      </div>


    </div>




</div>



@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="{{secure_url('assets/img/loader.gif')}}" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>


    <script type="text/javascript">

   var get_count_wi = {{$wishlist_count}};

   var div = document.getElementById('get_count_wish');

    div.innerHTML += get_count_wi;

    $('.tooltip_flip.tooltip-effect-2').click(function(e){
          e.preventDefault();
        //  var username = $('form#cutproduct input[name=id]').val();


        var $form = $(this).closest("form#cutproduct3");
        var formData =  $form.serializeArray();
        var userId =  $form.find(".user_id").val();

          if(userId){
                $.ajax({
                  type: "POST",
                  async: true,
                  url: "{{url('del_wishlist')}}",
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                  data: "id="+userId,
                  dataType: "json",
               success: function(json){
                 if(json.status == 1001) {


                   $.notify({
                    // options
                    icon: '',
                    title: "<h4>ลบรายการที่ชอบ สำเร็จ</h4> ",
                    message: "ท่านสามารถเข้า wishlist เพื่อดูรายการทั้งหมดของท่าน . "
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

                   document.getElementById(userId).remove();
                   
                   get_count_wi -= 1
                   div.innerHTML = get_count_wi;


                  } else {


                    $.notify({
                      // options
                      icon: '',
                      title: "<h4>เพิ่มรายการที่ชอบ ไม่สำเร็จ</h4> ",
                      message: "ท่านต้องทำการ Login เพื่อเข้าสู่ระบบก่อนเพิ่มรายการที่ชอบ . "
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
                  icon: '',
                  title: "<h4>เพิ่มรายการที่ชอบ ไม่สำเร็จ</h4> ",
                  message: "ท่านต้องทำการ Login เพื่อเข้าสู่ระบบก่อนเพิ่มรายการที่ชอบ . "
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
