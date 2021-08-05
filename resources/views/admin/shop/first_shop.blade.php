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



              <div class="panel-body">



                <div class="col-md-12 " style="padding-left: 1px;">

                  <a class="btn btn-primary " href="{{url('admin/shop/create')}}" >
                      <i class="fa fa-plus"></i> เพิ่มร้านค้าใหม่</a>
                </div>

                <br><br>



                <table class="table table-responsive-lg table-striped table-sm mb-0" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ชื่อร้านค้า</th>
                      <th>Star</th>
                      <th>ชื่อหมวดหมู่</th>
                      <th>Popular</th>
                      <th>
                        ลำดับ
                      </th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
             @if($objs)
                @foreach($objs as $u)
                    <tr id="{{$u->id_q}}">
                      <td>{{$s}}</td>
                      <td>{{$u->name_q}}</td>
                      <td>{{$u->rating}}</td>
                      <td>{{$u->name}}</td>
                      <td>
                        <div class="switch switch-sm switch-success">
                          <input type="checkbox" name="switch" data-plugin-ios-switch
                          @if($u->first == 1)
                          checked="checked"
                          @endif
                          />
                        </div>
                      </td>
                      <td>
                        <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">
                          <input type="text" class="form-control" name="input_sort" style="width:60px;" value="{{$u->priority}}" id="input_sort">
                          <input type="hidden" class="ids" name="id" value="{{$u->id_q}}">
                        </form>
                      </td>

                      <td>

                        <div class="btn-group flex-wrap">
  												<button type="button" class="mb-1 mt-1 mr-1 btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">จัดการ <span class="caret"></span></button>
  												<div class="dropdown-menu" role="menu">

  												<a class="dropdown-item text-1" href="{{url('admin/shop/'.$u->id_q.'/edit')}}">แก้ไข</a>
  												<a class="dropdown-item text-1 text-danger" onclick="return confirm('Are you sure?')" href="{{ url('api/del_shop_id/'.$u->id_q) }}">ลบ</a>

  												</div>
  											</div>

                      </td>
                    </tr {{$s++}}>
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
<script src="{{asset('/assets/vendor/fuelux/js/spinner.js')}}"></script>
<!-- secure_url -->

<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/post_status_order')}}',
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




    $('form input').change(function() {
    console.log('Textarea Change');





        var $form = $(this).closest("form#cutproduct");
        var formData =  $form.serializeArray();
        var input_sort =  $form.find("#input_sort").val();
        var ids =  $form.find(".ids").val();

        console.log(ids);



          if(ids){
            $.ajax({
              type: "POST",
              url: "{{url('add_sort_shop')}}",
              headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              data: {
                input_sort : input_sort,
                ids : ids
              },
              dataType: "json",
           success: function(json){
               if(json.status == 1001) {

                 var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
                     var notice = new PNotify({
                           title: 'ทำรายการสำเร็จ',
                           text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
                           type: 'success',
                           addclass: 'stack-topright'
                         });

                } else {

                }
              },
              failure: function(errMsg) {
                alert(errMsg.Msg);
              }
            });
          }else{


          }


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
