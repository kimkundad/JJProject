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








                        <div class="col-md-10 col-md-offset-1">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">แก้ไขสินค้า</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อสินค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name" value="{{$objs->name_pro}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">เลือกหมวดหมู่*</label>
          													<div class="col-md-8">
                                      <select name="cat_id" class="form-control mb-md" required>

								                      <option value="">-- เลือกหมวดหมู่ --</option>
								                      @foreach($category as $categorys)
													  <option value="{{$categorys->id}}"
                              @if( $objs->cat_id == $categorys->id)
                              selected='selected'
                              @endif
                              >{{$categorys->name}}</option>
													  @endforeach
								                    </select>
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคา*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="price" value="{{$objs->price}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Code สินค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="code_pro" value="{{$objs->code_pro}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Star สินค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="rating" value="{{$objs->rating}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จำนวน สินค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="stock" value="{{$objs->stock}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">น้ำหนักสินค้า / กรัม*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="shipping_price" value="{{$objs->shipping_price}}">
          														</div>
          												</div>

                                  <div class="form-group">
					             <label class="col-md-3 control-label">รูปหลักสินค้า</label>
												<div class="col-md-8">
													<img src="{{url('assets/image/product/'.$objs->image_pro)}}" class="img-responsive img-thumbnail">
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
                                      <textarea class="form-control" id="summernote" name="detail" rows="9">{{$objs->detail_pro}}</textarea>
          													</div>
          												</div>








          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
          														<button type="reset" class="btn btn-default">ยกเลิก</button>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>


            <style>
            .btn-file{
              width: 130px;
            }
            </style>

                      <div class="col-md-10 col-md-offset-1">
                            <section class="panel">
                              <div class="panel-body">
                                <h4>จัดการรูปประกอบสินค้า</h4>
          											<form  method="POST" action="{{url('add_gallery_shop_product')}}" enctype="multipart/form-data">

          		                                          {{ csrf_field() }}

          		                                          <div class="row">
          		                                              <div class="col-md-12" style="padding-right: 15px;">


          		                            <div class="form-group">


          		                <label for="exampleInputFile">เพิ่มรูปภาพประกอบ อย่างน้อย 4 รูปขึ้นไป</label>


          		                <input id="file-0a" class="file " type="file" name="product_image[]" accept="image/*" multiple>
          		                <input type="hidden" name="pro_id" class="form-control" value="{{ $objs->id_q }}" required>



          		                </div>

          		                <div class="">
          		                    <button type="submit" class="btn btn-info btn-fill btn-wd">อัพโหลดรูปภาพ</button>
          		                </div>



          		                </div>
          		                </div>

          		              </form>
                            </div>
                          </section>
                          <br><br>

                          </div>





                          <div class="col-md-10 col-md-offset-1">






                            <!-- start: page -->
                            <section class=" content-with-menu-has-toolbar media-gallery">
                            <div class="content-with-menu-container">

                              <form  action="{{url('property_image_del_product')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                <input type="hidden" name="_method" value="POST">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
          											 <input type="hidden" name="pro_id" class="form-control" value="{{ $objs->id_q }}" required>

                            <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">

                            @if($img_all)
                            @foreach($img_all as $img_u)
                              <div class="isotope-item  col-sm-6 col-md-4 col-lg-3" style="min-height: 200px;">
                                <div class="thumbnail">
                                  <div class="">
                                    <a class="thumb-image" >
                                      <img src="{{url('assets/image/product/'.$img_u->image)}}" class="img-responsive" >
                                    </a>
                                    <br>
                                    <div class="mg-thumb-options">
                                      <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" name="product_image[]" value="{{$img_u->id}}"  >
                                        <label>เลือกรูปภาพประกอบ</label>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="mg-description">

                                    <small class="pull-right text-muted"></small>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                            @endif




                            </div>
                            <button type="submit" class="btn btn-danger pull-right" style="margin-top:15px;">ลบรูปภาพที่เลือกไว้</button>
                            </form>



                            </div>
                            </section>
                            <!-- end: page -->

          									<br><br><br>
                        </div>

                        <br>









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

    @if ($message = Session::get('add_success_img'))
	<script type="text/javascript">

		var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
				var notice = new PNotify({
							title: 'ทำรายการสำเร็จ',
							text: 'ยินดีด้วย ได้ทำการเพิ่มรูปประกอบ สำเร็จเรียบร้อยแล้วค่ะ',
							type: 'success',
							addclass: 'stack-topright'
						});
	</script>
	@endif

	@if ($message = Session::get('del_success_img'))
	<script type="text/javascript">

		var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
				var notice = new PNotify({
							title: 'ทำรายการสำเร็จ',
							text: 'ยินดีด้วย ได้ทำการลบรูปประกอบ สำเร็จเรียบร้อยแล้วค่ะ',
							type: 'success',
							addclass: 'stack-topright'
						});
	</script>
	@endif

@stop('scripts')
