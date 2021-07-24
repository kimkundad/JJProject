@extends('admin.layouts.template')



<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
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

          											<h4 class="mb-xlg">แก้ไขร้านค้า</h4>

          											<fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ ร้านค้า*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_q" value="{{$objs->name_q}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">เลือกหมวดหมู่*</label>
          													<div class="col-md-8">
                                      <select name="cat_id" class="form-control mb-md" required>

        								                      <option value="">-- เลือกหมวดหมู่รถ --</option>
        								                      @foreach($category as $categorys)
        													  <option value="{{$categorys->id}}"
                                      @if( $objs->category_id == $categorys->id)
                                      selected='selected'
                                      @endif
                                      >{{$categorys->name}}</option>
        													  @endforeach
  								                    </select>
          													</div>
          												</div>

<!-- ///////////////////////////////////////////  -->
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">phone number*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="phone" value="{{$objs->phone}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">facebook*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="facebook" value="{{$objs->facebook}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">instagram*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="instagram" value="{{$objs->instagram}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">line_id*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="line_id" value="{{$objs->line_id}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">email*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="email" value="{{$objs->email}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">youtube*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="youtube" value="{{$objs->youtube}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">website*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="website" value="{{$objs->website}}">
          														</div>
          												</div>
<!-- ///////////////////////////////////////////  -->

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ราคาเริ่มต้น*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="startprice" value="{{$objs->startprice}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ถึงราคา*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="endprice" value="{{$objs->endprice}}">
          														</div>
          												</div>


<!-- ///////////////////////////////////////////  -->

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จำนวนดาว ร้านค้า*</label>
          													<div class="col-md-8">
          														<input type="number" class="form-control" name="rating" value="{{$objs->rating}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ที่ตั้งของร้าน*</label>
          													<div class="col-md-9">
                                      <textarea class="form-control" name="keyword" rows="3">{{$objs->address}}</textarea>
          													</div>
          												</div>
<!-- ///////////////////////////////////////////  -->

                                  <div class="form-group">
                                  <label class="col-md-3 control-label">รูปหลักร้านค้า</label>
                                  <div class="col-md-8">
                                  <img src="{{url('assets/image/cusimage/'.$objs->image_shop)}}" class="img-responsive img-thumbnail">
                                  </div>
                                  </div>


                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">รูปหลักร้านค้า*</label>
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




<!-- ///////////////////////////////////////////  -->

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">คำอธิบายไทย*</label>
          													<div class="col-md-9">
                                      <textarea class="form-control" name="details_th" rows="9">{{$objs->details_th}}</textarea>
          													</div>
          												</div>




                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย Eng*</label>
          													<div class="col-md-9">
                                      <textarea class="form-control" name="details_en" rows="9">{{$objs->details_en}}</textarea>
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย จีน*</label>
          													<div class="col-md-9">
                                      <textarea class="form-control" name="details_cn" rows="9">{{$objs->details_cn}}</textarea>
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Keyword*</label>
          													<div class="col-md-9">
                                      <p class="text-danger">*ใส่เครื่องหมาย (,) เพื่อแบ่งคำค้นหา เช่น รองเท้า, เสื้อผ้า</p>
                                      <textarea class="form-control" name="keyword2" rows="4">{{$objs->keyword}}</textarea>
          													</div>
          												</div>

                                  <br>
                            
                                  







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




                      <br><br>




                      <style>
						.btn-file{
							width: 130px;
						}
						</style>


            <div class="col-md-10 col-md-offset-1">
                  <section class="panel">
                    <div class="panel-body">
                      <h4>จัดการรูปประกอบร้านค้า</h4>
											<form  method="POST" action="{{url('add_gallery_shop')}}" enctype="multipart/form-data">

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

                    <form  action="{{url('property_image_del')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
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
                            <img src="{{url('assets/image/cusimage/'.$img_u->image)}}" class="img-responsive" >
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



              <div class="col-md-10 col-md-offset-1">
                    <section class="panel">
                      <div class="panel-body">
                        <h4>จัดการสินค้าใหม่</h4>
  											<form  method="POST" action="{{url('add_gallery_shop_2')}}" enctype="multipart/form-data">

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

                      <form  action="{{url('property_image_del_2')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                        <input type="hidden" name="_method" value="POST">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <input type="hidden" name="pro_id" class="form-control" value="{{ $objs->id_q }}" required>

                    <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">

                    @if($img_all_1)
                    @foreach($img_all_1 as $img_u)
                      <div class="isotope-item  col-sm-6 col-md-4 col-lg-3" style="min-height: 200px;">
                        <div class="thumbnail">
                          <div class="">
                            <a class="thumb-image" >
                              <img src="{{url('assets/image/cusimage/'.$img_u->image)}}" class="img-responsive" >
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
<script src="{{URL::asset('assets/upload_image/js/fileinput.js')}}"></script>
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

@if ($message = Session::get('add_success_img'))
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

@if ($message = Session::get('del_success_img'))
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
