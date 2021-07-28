<footer class="revealed" >
        <div class="container">

          <div class="row">
              <div class="col-md-4 col-sm-3">
                  <h3>Need help?</h3>
                  <a href="tel://086 551 7336" id="phone">086 551 7336</a>
                  <a href="#" id="email_footer">teeneejj@gmail.com</a>
              </div>
              <div class="col-md-2 col-sm-3">
                  <h3>About</h3>
                  <ul>
                      <li><a href="{{url('/presentation')}}">{{ trans('message.category') }}</a></li>

                      @if (Auth::guest())

                      <li><a href="{{url('/login')}}">{{ trans('message.signin') }}</a></li>


                      @else

                      <li>{{ substr(Auth::user()->name,0,15) }}</li>

                      @endif


                     

                      <li><a href="{{url('/confirm_payment')}}">{{ trans('message.payment') }}</a></li>
                       <li><a href="{{url('/contact_us')}}">{{ trans('message.contact_us') }}</a></li>
                  </ul>
              </div>
              <div class="col-md-2 col-sm-3">
                  <h3>Discover</h3>
                  <ul>
                      <li><a href="{{url('/privacy')}}">นโยบายความเป็นส่วนตัว</a></li>
                      <li><a href="{{url('/terms')}}">ข้อกำหนดของบริการ</a></li> 
                      <li><a href="{{url('/delete_account')}}">การลบข้อมูลผู้ใช้</a></li> 

                  </ul>
                <h3>Languages</h3>
                <select class="form-control" name="lang" id="lang">
                            <option value="{{ URL::to('change/th') }}"
                            @if(trans('message.lang') == 'ไทย')
                            selected=""
                            @endif
                            >ภาษาไทย</option>
                            <option value="{{ URL::to('change/en') }}" @if(trans('message.lang') == 'Eng')
                            selected=""
                            @endif>English</option>
                            <option value="{{ URL::to('change/ch') }}" @if(trans('message.lang') == 'China')
                            selected=""
                            @endif>Chaina</option>
                        </select>
              </div>
              <div class="col-md-4 col-sm-3">
                  <h3>Fanpage</h3>
                 <div class="fb-page" data-href="https://www.facebook.com/teeneejj/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
                   <blockquote cite="https://www.facebook.com/teeneejj/" class="fb-xfbml-parse-ignore">
                     <a href="https://www.facebook.com/teeneejj/">Teeneejj Thailand Digital Market-ที่นี่ตลาดนัดจตุจักรออนไลน์</a>
                   </blockquote></div>
              </div>
          </div><!-- End row -->


            <div class="row">
                <div class="col-md-12">
                  <div id="social_footer">
                      <ul>
                          <li><a href="https://www.facebook.com/teeneejj"><i class="icon-facebook"></i></a></li>
                          <li><a href=""><i class="icon-twitter"></i></a></li>
                          <li><a href=""><i class="icon-google"></i></a></li>
                          <li><a href="https://instagram.com/teeneejj/"><i class="icon-instagram"></i></a></li>

                      </ul>
                      <p>© Teeneejj 2015</p>
                  </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->

	<div id="toTop" style="display: none;"></div><!-- Back to top button -->
