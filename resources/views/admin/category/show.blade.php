@extends('admin.layouts.template')

@section('admin.stylesheet')
<style>
.dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background: none;
    border: 0;
}
a:hover, a:focus {
    color: #2a6496;
    text-decoration: none;
}
</style>
@stop('admin.stylesheet')

@section('admin.content')


<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
 ?>



        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">
              <div class="row">
              <div class="col-xs-12">

            <section class="panel">



              <div class="panel-body">

                <div class="col-md-12 " style="padding-left: 1px;">

                  <a class="btn btn-primary " href="{{url('admin/quiz/create')}}" >
                      <i class="fa fa-plus"></i> เพิ่ม Quiz</a>
                </div>
                <br><br>




                <table class="table table-responsive-lg table-striped table-sm mb-0" id="datatable-default">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Quiz</th>
                      <th>หมวดหมู่</th>
                      <th>ผู้สร้าง</th>
                      <th>ปิด/เปิด</th>
                      <th>วันที่สร้าง</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
             @if($objs)
                @foreach($objs as $u)
                    <tr id="{{$u->id_q}}">
                      <td>{{$u->id_q}}</td>
                      <td>{{$u->name_quiz}}</td>
                      <td>{{$u->name_cat}}</td>
                      <td>{{$u->name}}</td>
                      <td>
                        <div class="switch switch-sm switch-success">
                          <input type="checkbox" name="switch" data-plugin-ios-switch
                          @if($u->quiz_status == 1)
                          checked="checked"
                          @endif
                           />
                        </div>
                      </td>
                      <td><?php echo DateThai($u->create); ?></td>
                      <td>

                        <div class="btn-group flex-wrap">
  												<button type="button" class="mb-1 mt-1 mr-1 btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">จัดการ <span class="caret"></span></button>
  												<div class="dropdown-menu" role="menu">
  													<a class="dropdown-item text-1" href="">ดูข้อมูล</a>
  													<a class="dropdown-item text-1" href="{{url('admin/quiz/'.$u->id_q.'/edit')}}">แก้ไข</a>
  													<a class="dropdown-item text-1 text-danger" href="">ลบ</a>

  												</div>
  											</div>

                      </td>
                    </tr>
                 @endforeach
              @endif

                  </tbody>
                </table>
              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
<script src="{{asset('/assets/vendor/ios7-switch/ios7-switch.js')}}"></script>

<script type="text/javascript">
$(document).ready(function(){
//  $("[name='switch']").bootstrapSwitch();
  $("input:checkbox").change(function() {


    var product_id = $(this).closest('tr').attr('id');



    $.ajax({
            type:'POST',
            url:'{{asset('api/quiz_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "product_id" : product_id },
            success: function(data){
              if(data.data.success){


                var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
                    var notice = new PNotify({
                          title: 'ทำรายการสำเร็จ',
                          text: 'คุณเปลี่ยนการแสดงผล สำเร็จเรียบร้อยแล้วค่ะ',
                          type: 'success',
                          addclass: 'stack-topright'
                        });



              }
            }
        });
    });
});

</script>

@if ($message = Session::get('add_success'))
<script type="text/javascript">
var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
    var notice = new PNotify({
          title: 'ทำรายการสำเร็จ',
          text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
          type: 'success',
          addclass: 'stack-topright'
        });
</script>
@endif


@if ($message = Session::get('delete'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif

@stop('scripts')
