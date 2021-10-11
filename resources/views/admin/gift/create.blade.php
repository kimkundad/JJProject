@extends('admin.layouts.template')

@section('admin.stylesheet')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
@stop('admin.stylesheet')


@section('admin.content')

        <section role="main" class="content-body">

          <header class="page-header">
            <h2>เพิ่มส่วนลดใหม่</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>เพิ่มส่วนลดใหม่</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>

          <!-- start: page -->

          <div class="row">
          							
                        <div class="col-md-8 col-lg-8">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">เพิ่มส่วนลดใหม่</h4>

          											<fieldset>
                                 

                                                        <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อส่วนลด*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name">
          													</div>
          												</div>

                                                        <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคาส่วนลด (เป็น %)*</label>
          													<div class="col-md-8">
          														<input type="number" class="form-control" name="detail"  >
          													</div>
          												</div>





                                                        <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Code ส่วนลด* <a id="random_code" class="btn btn-default">สุ่มชื่อ</a></label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="code" id="my_code" >
          													</div>
          												</div>

                                                          <div class="form-group ">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">เริ่มวันที่*</label>
                                                            <div class="col-lg-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                    <input type="text" data-plugin-datepicker class="form-control" name="start">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group ">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">สิ้นสุดวันที่*</label>
                                                            <div class="col-lg-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                    <input type="text" data-plugin-datepicker class="form-control" name="end">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="form-group">
                                                        <label class="col-md-3 control-label" for="exampleInputEmail1">รูปภาพ*</label>
                                                            <div class="col-md-8">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="input-append">
                                                                        <div class="uneditable-input">
                                                                            <i class="fa fa-file fileupload-exists"></i>
                                                                            <span class="fileupload-preview"></span>
                                                                        </div>
                                                                        <span class="btn btn-default btn-file">
                                                                            <span class="fileupload-exists">Change</span>
                                                                            <span class="fileupload-new">Select file</span>
                                                                            <input type="file" name="image">
                                                                        </span>
                                                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จำนวนที่ใช้ได้*</label>
          													<div class="col-md-8">
          														<input type="number" class="form-control" name="total"  >
          													</div>
          												</div>

                                                        
                                                        


          											</fieldset>


          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
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
<script src="{{URL::asset('assets/upload_image/js/fileinput.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
$('#summernote, #summernote2').summernote({
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']]
    ],
    placeholder: 'Hello bootstrap 4',
    tabsize: 2,
    height: 350
  });



  $(document).on('click','#random_code',function (event) {
  event.preventDefault();

  var result = '';
  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = 8;
  for ( var i = 0; i < charactersLength; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   document.getElementById('my_code').value = result;
   console.log('-->',result)

  });

  
  </script>

@if ($message = Session::get('success'))
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
