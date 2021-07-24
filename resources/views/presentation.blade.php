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
                <h1>{{ trans('message.category') }}</h1>
                <p>{{ trans('message.website_shop_sup') }}</p>
              </div>
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">{{ trans('message.category') }}</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

    <div class="main_title">
        <h2>{{ trans('message.category') }}<span> {{ trans('message.website_shop') }} </span></h2>
        <br>
        <p>{{ trans('message.presentation_sub') }}</p>
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






        <hr>

</div>



@endsection

@section('scripts')



@stop('scripts')
