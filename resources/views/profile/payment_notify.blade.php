@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')


<section class="parallax-window" style="min-height: 270px;" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">แจ้งชำระเงินโอน</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

            <div class=" margin_30 text-center">
                <h2 class="major"><span>แจ้งชำระเงินโอน </span></h2>
            </div>


            <div class="row">
                <aside class="col-md-3">
                    <div class="box_style_cat">
                    <ul id="cat_nav">
                                        <li><a href="{{url('my_account')}}"><i class="icon_set_1_icon-29"></i> บัญชีของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_purchase') }}"><i class="icon_set_1_icon-50"></i> การซื้อของฉัน</a>
                                        </li>
                                        <li><a href="{{ url('user_coupon') }}"><i class="im im-icon-Gift-Box" style="margin-right:10px; "></i> คูปองส่วนลด </a>
                                        </li>
                                        <li><a href="{{ url('payment_notify') }}"><i class="im im-icon-Coin" style="margin-right:10px; "></i> แจ้งชำระเงินโอน </a>
                                        </li>
                                        <li><a href="{{ url('delete_my_account') }}"><i class="icon_set_1_icon-94" ></i> ลบบัญชีของคุณ</a></li>
                                        <li><a href="{{ url('logout') }}"><i class="icon-lock" ></i> ออกจากระบบ </a>
                                        </li>

                                    </ul>
                    </div>
                </aside>
                <div class="col-md-9">
                    <h3>แจ้งชำระเงินโอน ( {{ $get_order_count}} ) </h3>
                    <br />
                    <table class="table ">
                        <thead>
                            <tr>
                            <th scope="col">#order</th>
                            <th scope="col">จำนวนเงิน</th>
                            <th scope="col">ธนาคาร</th>
                            <th scope="col">วันที่ / เวลา โอน</th>
                            <th scope="col">วันที่แจ้ง</th>
                            <th scope="col">สลิปโอน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($objs))
                            @foreach($objs as $u)
                            <tr>
                                <td><a href="{{ url('my_order/'. $u->no_pay) }}">{{ $u->no_pay }}</a></td>
                                <td>{{ $u->money_pay }}</td>
                                <td>{{ $u->bank }}</td>
                                <td>{{ $u->day_pay }} / {{ $u->time_pay }}</td>
                                <td>{{ $u->created_at }}</td>
                                <td><a href="#" data-toggle="modal" data-target="#myModal{{$u->id}}" class="btn btn-submit">ดูสลิปโอน</a></td>
                            </tr>
                            <div class="modal fade" id="myModal{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 100000;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">สลิปโอนเงิน #{{ $u->no_pay }}</h4>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row text-center p_20">
                                        
                                        @if($u->files_pay != null)
                                        <img class="img-responsive center-block" src="{{ url('assets/image/payment/'.$u->files_pay) }}">
                                        @endif
                                        
                                        </div>


                                    </div>

                                    </div>
                                </div>
                                </div>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    
                </div>
            </div>

  
    






        

</div>



@endsection

@section('scripts')


@if ($message = Session::get('edit_success'))
<script type="text/javascript">


 
 

</script>
@endif

@stop('scripts')
