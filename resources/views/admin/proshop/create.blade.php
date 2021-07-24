@extends('admin.layouts.template')


@section('admin.stylesheet')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
@stop('admin.stylesheet')


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

          											<h4 class="mb-xlg">เพิ่มสินค้าใหม่</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อสินค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name" value="{{ old('name') }}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">เลือกหมวดหมู่*</label>
          													<div class="col-md-8">
                                      <select name="cat_id" class="form-control mb-md" required>

        								                      <option value="">-- เลือกหมวดหมู่ --</option>
        								                      @foreach($category as $categorys)
        													  <option value="{{$categorys->id}}">
                                      {{$categorys->name}}</option>
        													  @endforeach
  								                    </select>
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคา*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="price" value="{{ old('price') }}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Code สินค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="code_pro" value="{{ old('code_pro') }}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Star สินค้า*</label>
          													<div class="col-md-8">
          														<input type="number" class="form-control" name="rating" placeholder="ใส่ตัวเลข 1-5" value="{{ old('rating') }}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จำนวน สินค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="stock" value="{{ old('stock') }}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคาจัดส่งต่อ 1 ชิ้น</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="shipping_price" value="{{ old('shipping_price') }}">
          														</div>
          												</div>

                                  <br>
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="exampleInputEmail1">รูปหลักสินค้า*</label>
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
          													<label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย*</label>
          													<div class="col-md-9">
                                      <textarea class="form-control" id="summernote" name="detail" rows="9">{{ old('detail') }}</textarea>
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
