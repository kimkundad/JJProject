@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')

<style>
#map {
  width: 100%;
  height: 450px;
}
.candidate-info{
  padding-top: 10px;
  text-align: center;
}



</style>
<section id="search_container" style="background:#4d536d url(assets/img/bg_login.png) no-repeat center top;">
<div id="search">


                <div class="tab-content">

                    <form name="search" method="GET" action="{{url('search')}}">
                      {{ csrf_field() }}
                    <div class="tab-pane active" id="tours">
                    <h3 style="color:#444444; float:left;">ค้นหาสิ่งที่ต้องการ ใน ตลาดนัดสวนจตุจักร</h3>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">

                                    <input type="text" class="form-control" id="firstname_booking" value="{{$search}}" name="search" placeholder="ค้นหาสิ่งที่ต้องการในจตุจักร..." required="">
                                </div>
                            </div>

                        </div><!-- End row -->
                        <!-- End row -->

                        <button class="btn_1 green" type="submit"><i class="icon-search"></i>Search now</button>
                    </div><!-- End rab -->
                   </form>


                </div>
</div>
</section>



    <div class="container margin_60">
      <div class="row">

        <div class="col-lg-9 col-md-9 col-md-offset-2">
         

          <div id="tools">
               <div class="row">
               	<div class="col-md-12">
                  <p style="margin: 8px 0 5px 5px;"> จำนวนการค้นหาทั้งหมด ({{$shop_count}})</p>
                </div>


            	</div>
          </div>



    <div class="infinite-scroll">
          @if($options)
          @foreach($options as $option)

          <div class="strip_all_tour_list wow fadeIn  animated" >
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="wishlist">
                    <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post" role="form">
                        <input class="user_id form hide" type="text" name="id" value="30">
                        <a class="tooltip_flip tooltip-effect-1">
                        +<span class="tooltip-content-flip">
                        <span class="tooltip-back">Add to wishlist</span></span>
                        </a>
                    </form>
                  </div>
                            <div class="img_list"><a href="{{url('shop/'.$option->id)}}">
                            <img src="{{url('assets/image/cusimage/'.$option->image)}}" alt="a.m.p clothing">
                            <!--<div class="ribbon top_rated"></div>-->
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



@stop('scripts')
