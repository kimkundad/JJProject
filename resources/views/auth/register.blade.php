@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')


<style>
.ui.button {
  width: 100%;
  text-decoration: none;
    cursor: pointer;
    display: inline-block;
    min-height: 1em;
    outline: 0;
    border: none;
    background: #e0e1e2;
    color: #fff;
    margin: 0 .25em 0 0;
    padding: .78571429em 1.5em;
    text-shadow: none;
    font-weight: 700;
    line-height: 1em;
    font-style: normal;
    text-align: center;
    border-radius: .28571429rem;
    user-select: none;
    -webkit-transition: opacity .1s ease,background-color .1s ease,color .1s ease,box-shadow .1s ease,background .1s ease;
    transition: opacity .1s ease,background-color .1s ease,color .1s ease,box-shadow .1s ease,background .1s ease;
    will-change: '';
}
.ui.facebook.button {
    background-color: #3b5998;
    text-shadow: none;
}
.ui.facebook.button:hover {
    background-color: #334d84;
    text-shadow: none;
}
.ui.facebook.button, .ui.google.plus.button, .ui.instagram.button, .ui.pinterest.button, .ui.twitter.button, .ui.vk.button, .ui.youtube.button {
    background-image: none;
    box-shadow: 0 0 0 0 rgba(34,36,38,.15) inset;
    color: #fff;
}
.panel-default>.panel-heading {
    background-image: url({{url('assets/image/login_bg.png')}});

}
.panel-heading {
    padding: 5px 5px;
}
.login_box {

    margin: 56px auto;
    padding: 15px 15px 0;
}
.t_mid {
    text-align: center;
}
.g_right {
  margin-top: -5px;
    float: right;
}
.logo-login{
      margin: 0 auto 20px auto;
}
.t_gray {

    color: #9e9e9e;
}
.login_box .sign_up_btn, .login_box .login_btn {
    background-color: #fff;
    color: #424242;
    padding: 10px 25px;
}
.panel-default {
    border-color: #ddd !important;
}
.panel {
    background: transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: #ddd !important;
}
.panel-body {
    background: #ffffff;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    border-radius: 5px;
}
</style>




<div class="container add_bottom_45" style="margin-top:120px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 ">
            <div class="panel panel-default login_box">

              <div class="panel-body">

                <div class="col-md-12">
                  <img src="assets/img/logo_sticky.png" class="logo-login center-block" height="55" title="logo">
                </div>

                <div class="form-group">

                <div style="margin-bottom: 16px;">
                <a href="redirect" class=" ui facebook fluid button"><i class="fa fa-facebook icon-fa " style=""></i> สมัครด้วย Facebook</a>
              </div>


            </div>


              <div><p class="t_mid">หรือ</p></div>


                  <form class="form-horizontal" role="form" method="POST" action="{{url('register')}}">
                      {{ csrf_field() }}


                      <div class="form-group">
                        <div class="col-md-12 ">
                          <label for="name" class=" control-label">ชื่อเข้าใช้งาน</label>


                              <input id="name" type="text" class="form-control" name="name" value="">
                              @error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
								@enderror

                                                              </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 ">
                          <label for="email" class=" control-label">E-Mail Address</label>


                              <input id="email" type="email" class="form-control" name="email" value="">
                              @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
								@enderror
                                                              </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 ">
                          <label for="password" class=" control-label">Password</label>


                              <input id="password" type="password" class="form-control" name="password">
                              @error('password')
                                <span class="text-danger">
                                <strong>รหัสผ่านควรมีอย่างน้อย 8 ตัวขึ้นไป และ password กับ ยืนยัน password ต้องตรงกัน</strong>
                                </span>
								@enderror
                                                              </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 ">
                          <label for="password-confirm" class=" control-label">ยืนยัน Password</label>


                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                              </div>
                      </div>
<br>
                      <div class="form-group">
                          <div class="col-md-12 ">
                              <button type="submit" class="btn btn-primary btn-block">
                                  <i class="fa fa-btn "></i> สมัครใช้งาน
                              </button>
                          </div>
                      </div>
                      <hr>




                  </form>
              </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')


<script>
$(document).ready(function(){
  var element = document.getElementById("set-head");
element.classList.add("sticky");
var $window = $(window);
$window.scroll(function() {
  var element = document.getElementById("set-head");
element.classList.add("sticky");
  });
  });
</script>
@stop('scripts')
