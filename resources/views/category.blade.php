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


<section class="parallax-window" style="    min-height: 390px; height: 390px;" data-parallax="scroll" data-image-src="{{url('assets/image/cusimage/1452760504-56.jpg')}}" data-natural-width="1400" data-natural-height="370">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
        <h1>{{$cat->name}}</h1>

        </div>
    </div>
</section>


<div id="position">
    	<div class="container">
                	<ul>
                    <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                    <li><a href="#">{{ trans('message.category') }} </a></li>
                    <li>{{$cat->name}}</li>
                    </ul>
        </div>
    </div>

  
    



        <div class="container margin_60">
          <div class="row">
            <aside class="col-lg-3 col-md-3">
            
            

		<div id="filters_col">
			<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters <i class="icon-plus-1 pull-right"></i></a>
			<div class="collapse in" id="collapseFilters">

                	<div class="filter_type">
					<h5>{{ trans('message.search_by') }}  Star</h5>
					<ul style="margin-left:15px;">

						<li><label> <a href="{{url('category/'.$cat->id.'/5')}}"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i>
          </span>({{$rate5}})</a></label></li>
						<li><label><a href="{{url('category/'.$cat->id.'/4')}}"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i>
          </span>({{$rate4}})</a></label></li>
						<li><label><a href="{{url('category/'.$cat->id.'/3')}}"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
          </span>({{$rate3}})</a></label></li>
						<li><label><a href="{{url('category/'.$cat->id.'/2')}}"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
          </span>({{$rate2}})</a></label></li>
						<li><label><a href="{{url('category/'.$cat->id.'/1')}}"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
						</span>({{$rate1}})</a></label></li>
					</ul>
				</div>


<hr>

<div class="filter_type">
      <h5 >{{ trans('message.search_by_m') }}</h5>

         <ul style="padding-left:10px;">

            <li><label> <a href="{{url('category_price/'.$cat->id.'/2')}}" style="color: #888;font-size: 14px;">{{ trans('message.price') }} 100 - 200({{$price1}})</a></label></li>

            <li><label> <a href="{{url('category_price/'.$cat->id.'/3')}}" style="color: #888;font-size: 14px;">{{ trans('message.price') }} 200 - 500 ({{$price2}})</a></label></li>

            <li><label> <a href="{{url('category_price/'.$cat->id.'/4')}}" style="color: #888;font-size: 14px;">{{ trans('message.price') }} 500 - 1000 ({{$price3}})</a></label></li>

            <li><label> <a href="{{url('category_price/'.$cat->id.'/5')}}" style="color: #888;font-size: 14px;">{{ trans('message.price') }} 1,000 - 2,500 ({{$price4}})</a></label></li>

            <li><label> <a href="{{url('category_price/'.$cat->id.'/6')}}" style="color: #888;font-size: 14px;">{{ trans('message.price_o') }} 2,500 ({{$price5}})</a></label></li>
          </ul>

</div>


			</div><!--End collapse -->
		</div><!--End filters col-->
		<div class="box_style_2">
			<i class="icon_set_1_icon-57"></i>
			<h4>{{ trans('message.want') }} <span>{{ trans('message.help') }}</span></h4>
			<a href="tel://004542344599" class="phone">086 551 7336</a>
			<small>{{ trans('message.con_t') }}</small>
		</div>
		</aside>






    <div class="col-lg-9 col-md-9">

      <div id="tools">
           <div class="row">
           	<div class="col-md-3 col-sm-3 col-xs-6">
              <p style="margin: 8px 0 5px 5px;"> {{ trans('message.sum_pro') }} ({{$shop_count}})</p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">

            </div>

            <div class="col-md-6 col-sm-6 hidden-xs text-right">
            	<a href="#" class="bt_filters"><i class="icon-th"></i></a>
              <a href="#" class="bt_filters"><i class=" icon-list"></i></a>
            </div>
        	</div>
      </div>



<div class="infinite-scroll">
      @if($options)
      @foreach($options as $option)




      @if(trans('message.lang') == 'ไทย')

      <div class="strip_all_tour_list wow fadeIn  animated" >
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="wishlist">
                <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">
                            <input class="user_id form hide" type="text" name="id" value="{{$option->id}}" />
                                <a class="tooltip_flip tooltip-effect-1" >
                                    +<span class="tooltip-content-flip">
                                <span class="tooltip-back">เพิ่มรายการโปรด</span></span></a>
                </form>
              </div>
                    <div class="img_list"><a href="{{url('shop/'.$option->id)}}">
                        <img src="{{url('assets/image/cusimage/'.$option->image)}}" alt="{{$option->name}}">
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
                      <?php for($i=1;$i <= $option->rating;$i++){ ?>
                        <i class="icon-star voted"></i>
                        <?php } ?>
                        <?php
                        $total = 5;
                        $total -= $option->rating;
                        for($i=1;$i <= $total;$i++){
                        ?>
                        <i class="icon-star-empty"></i>
                        <?php } ?>
                    </div>
                    <br>
                          <h3><strong>{{$option->name}}</strong></h3>
                          <p>{!!mb_substr(strip_tags($option->detail),0,170,'UTF-8')!!}...</p>
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

      @elseif(trans('message.lang') == 'Eng')


      <div class="strip_all_tour_list wow fadeIn  animated" >
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="wishlist">
                <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">
                            <input class="user_id form hide" type="text" name="id" value="{{$option->id}}" />
                                <a class="tooltip_flip tooltip-effect-1" >
                                    +<span class="tooltip-content-flip">
                                <span class="tooltip-back">Add to wishlist</span></span></a>
                </form>
              </div>
                    <div class="img_list"><a href="{{url('shop/'.$option->id)}}">
                        <img src="{{url('assets/image/cusimage/'.$option->image)}}" alt="{{$option->name}}">
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
                      <?php for($i=1;$i <= $option->rating;$i++){ ?>
                        <i class="icon-star voted"></i>
                        <?php } ?>
                        <?php
                        $total = 5;
                        $total -= $option->rating;
                        for($i=1;$i <= $total;$i++){
                        ?>
                        <i class="icon-star-empty"></i>
                        <?php } ?>
                    </div>
                    <br>
                          <h3><strong>{{$option->name}}</strong></h3>
                          <p>{!!mb_substr(strip_tags($option->detail_en),0,170,'UTF-8')!!}...</p>
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
                        <div>{{number_format($option->view)}}<span class="normal_price_list"></span><small>*view</small>
                        <p><a href="{{url('shop/'.$option->id)}}" class="btn_1">Detail</a></p>
                        </div>
                      </div>
                  </div>
                    </div>
                </div>


      @else


      <div class="strip_all_tour_list wow fadeIn  animated" >
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="wishlist">
                <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">
                            <input class="user_id form hide" type="text" name="id" value="{{$option->id}}" />
                                <a class="tooltip_flip tooltip-effect-1" >
                                    +<span class="tooltip-content-flip">
                                <span class="tooltip-back">Add to wishlist</span></span></a>
                </form>
              </div>
                    <div class="img_list"><a href="{{url('shop/'.$option->id)}}">
                        <img src="{{url('assets/image/cusimage/'.$option->image)}}" alt="{{$option->name}}">
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
                      <?php for($i=1;$i <= $option->rating;$i++){ ?>
                        <i class="icon-star voted"></i>
                        <?php } ?>
                        <?php
                        $total = 5;
                        $total -= $option->rating;
                        for($i=1;$i <= $total;$i++){
                        ?>
                        <i class="icon-star-empty"></i>
                        <?php } ?>
                        <br>
                    </div>
                          <h3><strong>{{$option->name}}</strong></h3>
                          <p>{!!mb_substr(strip_tags($option->detail_cn),0,170,'UTF-8')!!}...</p>
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
                        <div>{{number_format($option->view)}}<span class="normal_price_list"></span><small>*俯視圖</small>
                        <p><a href="{{url('shop/'.$option->id)}}" class="btn_1">查看資料</a></p>
                        </div>
                      </div>
                  </div>
                    </div>
                </div>


      @endif



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





  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0&appId=164123417449680&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
@stop('scripts')
