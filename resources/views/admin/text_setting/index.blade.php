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
          							<div class="col-md-2 col-lg-2">




          							</div>







                        <div class="col-md-8 col-lg-8">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">แก้ไข ข้อความหน้าแรก</h4>

          											<fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หัวข้อภาษาไทย*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="title_text_t" value="{{$objs->title_text_t}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หัวข้อย่อยภาษาไทย*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="sub_title_text_t" value="{{$objs->sub_title_text_t}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หัวข้อภาษา En*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="title_text_e" value="{{$objs->title_text_e}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หัวข้อย่อยภาษา En*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="sub_title_text_e" value="{{$objs->sub_title_text_e}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หัวข้อภาษา Cn*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="title_text_c" value="{{$objs->title_text_c}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หัวข้อย่อยภาษา Cn*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="sub_title_text_c" value="{{$objs->sub_title_text_c}}">
          														</div>
          												</div>

          											</fieldset>


          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          														<button type="reset" class="btn btn-default">ยกเลิก</button>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>









          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>


@if ($message = Session::get('edit_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif




@stop('scripts')
