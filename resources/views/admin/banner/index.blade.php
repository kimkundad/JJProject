@extends('admin.layouts.template')





@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>จัดการแบนเนอร์</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>จัดการแบนเนอร์</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">


<div class="col-md-12 " style="padding-left: 1px;">

                  <a class="btn btn-primary " href="{{url('admin/banner/create')}}" >
                      <i class="fa fa-plus"></i> เพิ่มแบนเนอร์</a>
                </div>

                <br><br>


              <div class="row">
              <div class="col-xs-12">

            <section class="panel">



              <div class="panel-body">


              




                <table class="table table-responsive-lg table-striped table-sm mb-0" id="datatable-default">
                  <thead>
                    <tr>
                    <th>ลำดับ</th>
                      <th>รูปภาพ</th>
                     

                      <th>ใช้งาน</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
             @if($objs)
                @foreach($objs as $u)
                    <tr access_id="{{$u->id}}">
                      <td>{{$u->sort}}</td>
                      <td><img src="{{ url('assets/banner/'.$u->image) }}" style="height:250px; width:auto;"></td>
                      <td>
                        <div class="switch switch-sm switch-success">
                          <input type="checkbox" name="switch" data-plugin-ios-switch
                          @if($u->status == 1)
                          checked="checked"
                          @endif
                          />
                        </div>
                      </td>


                      <td>

                        <div class="btn-group flex-wrap">
  												<button type="button" class="mb-1 mt-1 mr-1 btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">จัดการ <span class="caret"></span></button>
  												<div class="dropdown-menu" role="menu">

  													<a class="dropdown-item text-1" href="{{url('admin/banner/'.$u->id.'/edit')}}">แก้ไข</a>
  													<a class="dropdown-item text-1 text-danger" href="{{ url('api/del_banner/'.$u->id) }}" onclick="return confirm('Are you sure?')">ลบ</a> 

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


<script>

$(document).ready(function(){
  $("input:checkbox").change(function() {

	var course_id = $(this).closest('tr').attr('access_id');

	console.log('fea : '+course_id);
	$.ajax({
					type:'POST',
					url:'{{url('api/post_status_banner')}}',
					headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
					data: { "user_id" : course_id },
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
