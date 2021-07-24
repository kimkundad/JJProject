@extends('admin.layouts.template')





@section('admin.content')






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

              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>

                </div>

                <h2 class="panel-title">ใบสั่งจองทั้งหมดของ {{$objs->name}}</h2>
              </header>

              <div class="panel-body">

                <div class="col-md-12 " style="padding-left: 1px;">


                </div>


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


                <table class="table table-responsive-lg table-striped table-sm mb-0" >
                  <thead>
                    <tr>
                      <th>#หมายเลขสั่งจอง</th>
                      <th>ลูกค้า</th>
                      <th>สาขา</th>
                      <th>เบอร์โทร</th>
                      <th>รถเช่า</th>

                      <th>วันที่จอง</th>
                      <th>สถานะ</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
             @if($order)
                @foreach($order as $u)
                    <tr id="{{$u->Oid}}">
                      <td>เลขสั่งจอง {{$u->Oid}}</td>
                      <td>{{$u->user_name}}</td>
                      <td>{{$u->name_branch}}</td>
                      <td>{{$u->phone_order}}</td>
                      <td>{{$u->name_car}}</td>

                      <td>{{DateThai($u->created_ats)}}</td>
                      <td>
                        <div class="switch switch-sm switch-success">
                          <input type="checkbox" name="switch" data-plugin-ios-switch
                          @if($u->status_1 == 1)
                          checked="checked"
                          @endif
                          />
                        </div>
                      </td>
                      <td>

                        <div class="btn-group flex-wrap">
  												<button type="button" class="mb-1 mt-1 mr-1 btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">จัดการ <span class="caret"></span></button>
  												<div class="dropdown-menu" role="menu">
                            <a class="dropdown-item text-1" href="{{url('admin/order/'.$u->Oid)}}">ดูข้อมูล</a>
  													<a class="dropdown-item text-1" href="{{url('admin/order/'.$u->Oid.'/edit')}}">แก้ไข</a>
                            <form  action="{{url('admin/order/'.$u->Oid)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                              <input type="hidden" name="_method" value="DELETE">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" title="ลบบทความ" class="dropdown-item text-1 text-danger"><i class="fa fa-times "></i> ลบ</button>
                            </form>


  												</div>
  											</div>

                      </td>
                    </tr>
                 @endforeach
              @endif

                  </tbody>
                </table>

                {{ $order->links() }}
              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{secure_url('api/post_status_order')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "user_id" : user_id },
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


@if ($message = Session::get('delete_order'))
<script type="text/javascript">


    var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
        var notice = new PNotify({
              title: 'ทำรายการสำเร็จ',
              text: 'ยินดีด้วย ได้ทำการลบข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
              type: 'success',
              addclass: 'stack-topright'
            });
</script>
@endif

@stop('scripts')
