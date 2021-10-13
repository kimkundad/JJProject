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
    <img src="{{ url('img/code_teeneejj.jpg') }}" class="img-responsive">

    <br>
<style>
    #filters_col2 {
    padding: 15px 10px 15px 15px;
    border: 1px dashed #ddd;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    margin-bottom: 15px;
    
}
.tour_list_desc2 {
    padding: 10px 20px 0 20px;
    border-left: 1px solid #ededed;
    height: 220px;
    line-height: 17px;
}
.set_pad{
    padding-right: 2px;
    padding-left: 2px;
}
.set_pad2{
    padding-right: 10px;
    padding-left: 10px;
}
.tour_list_desc2 span{
    margin-top:10px;
    display: block;
}
@media only screen and (max-width:768px){
.set_pad h3{
    font-size:10px;
    margin-top: 10px;
    margin-bottom: 10px;
}
.tour_list_desc2 {
    padding: 0px 10px;
    border-left: 1px solid #ededed;
    height: 120px;
    line-height: 17px;
}
.tour_list_desc2 h2{
    font-size:12px;
    margin-top: 0px;
    margin-bottom: 5px;
}
.tour_list_desc2 p{
    margin: 0 0 10px;
}
.tour_list_desc2 span{
    margin-top:5px;
    display: block;
    font-size:10px;
}
}
</style>

        <div class="row" style="padding-right: 10px;
    padding-left: 10px;">

            @if($objs)
            @foreach($objs as $u)
            <div class="col-md-6 col-sm-6 col-xs-6 set_pad">
                <div id="filters_col2">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center set_pad">
                            <div class="set_pad2">
                                <img src="{{ url('assets/banner/'.$u->image) }}" alt="Image" class="img-circle img-responsive center-block" >
                            </div>
                            <h3>{{$u->name}}</h3>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 set_pad">
                            <div class="tour_list_desc2">
                                <h2>ส่วนลด {{$u->detail}}%</h2>
                                <p class="text-muted"><strong class="hidden-sm hidden-xs text-danger">CODE : </strong> {{$u->code}}</p>
                                <a data-id="{{$u->id}}" class="btn_1 add_vouchers">เก็บโค้ด</a>
                                <span>ใช้ได้ถึง {{ formatDateThat($u->end) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
          <!--  <div class="col-md-6 col-sm-6 col-xs-6 set_pad">
                <div id="filters_col2">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center set_pad">
                            <div class="set_pad2">
                                <img src="{{ url('assets/banner/1633973388.jpg') }}" alt="Image" class="img-circle img-responsive center-block" >
                            </div>
                            <h3>adidas Official Store</h3>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 set_pad">
                            <div class="tour_list_desc2">
                                <h2>ส่วนลด 15%</h2>
                                <p class="text-muted"><strong class="hidden-sm hidden-xs text-danger">CODE : </strong> HFHFGAEC</p>
                                <a data-id="2" class="btn_1 add_vouchers">เก็บโค้ด</a>
                                <span>ใช้ได้ถึง 12 สิงหาคม 64</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    






        <hr>

</div>



@endsection

@section('scripts')

<script type="text/javascript">

$('.add_vouchers').click(function(e){
    e.preventDefault();
    
    var get_id = $(this).data("id")
    console.log('------> ',get_id)


                $.ajax({
                  type: "POST",
                  async: true,
                  url: "{{url('add_vouchers')}}",
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                  data: "id="+get_id,
                  dataType: "json",
               success: function(json){
                 if(json.data.status == 200) {


                   $.notify({
                    // options
                    icon: 'icon_set_1_icon-76',
                    title: "<h4>เก็บโค้ดส่วนลด สำเร็จ</h4> ",
                    message: "ท่านสามารถใช้ โค้ดส่วนลดนี้ร่วมกับรายการสินค้าได้ "
                   },{
                    // settings
                    type: 'info',
                    delay: 5000,
                    timer: 33000,
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
                      icon: 'icon_set_1_icon-77',
                      title: "<h4>เก็บโค้ดส่วนลด ไม่สำเร็จ</h4> ",
                      message: " "+json.data.msg
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
           


});

</script>

@stop('scripts')
