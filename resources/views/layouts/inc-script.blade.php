<!-- Common scripts -->
<script src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('assets/js/common_scripts_min.js')}}"></script>
<script src="{{url('assets/js/functions.js')}}"></script>

 <!-- Specific scripts -->
<script src="{{url('assets/js/icheck.js')}}"></script>
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>
 <script src="{{url('assets/js/bootstrap-datepicker.js')}}"></script>
 <script src="{{url('assets/js/bootstrap-timepicker.js')}}"></script>
 <script src="{{url('assets/js/jquery.magnific-popup.js')}}"></script>
 <script>
  $('input.date-pick').datepicker('setDate', 'today');
  $('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
})
  </script>
  <script src="{{url('assets/js/jquery.ddslick.js')}}"></script>
   <script>
   $("select.ddslick").each(function(){
            $(this).ddslick({
                showSelectedHTML: true
            });
        });



        </script>


        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0&appId=203219603796007&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>



        <script src="{{url('js/bootstrap-notify.js?v2')}}"></script>



        <script type="text/javascript">


            $('.tooltip_flip.tooltip-effect-1').click(function(e){
                  e.preventDefault();
                //  var username = $('form#cutproduct input[name=id]').val();


                var $form = $(this).closest("form#cutproduct");
                var formData =  $form.serializeArray();
                var userId =  $form.find(".user_id").val();

                  if(userId){
                    $.ajax({
                      type: "POST",
                      url: "{{url('add_wishlist')}}",
                      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                      data: "id="+userId,
                      dataType: "json",
                   success: function(json){
                       if(json.status == 1001) {


                         $.notify({
                         	// options
                         	icon: 'icon_set_1_icon-82',
                         	title: "<h4>เพิ่มรายการที่ชอบ สำเร็จ</h4> ",
                         	message: "ท่านสามารถเข้า wishlist เพื่อดูรายการทั้งหมดของท่าน . "
                         },{
                         	// settings
                         	type: 'danger',
                         	delay: 5000,
                         	timer: 3000,
                         	z_index: 9999,
                         	showProgressbar: false,
                         	placement: {
                         		from: "bottom",
                         		align: "right"
                         	},
                         	animate: {
                         		enter: 'animated bounceInUp',
                         		exit: 'animated bounceOutDown'
                         	},
                         });




                        } else {


                          $.notify({
                          	// options
                          	icon: '',
                          	title: "<h4>เพิ่มรายการที่ชอบ ไม่สำเร็จ</h4> ",
                          	message: "ท่านต้องทำการ Login เพื่อเข้าสู่ระบบก่อนเพิ่มรายการที่ชอบ . "
                          },{
                          	// settings
                          	type: 'danger',
                          	delay: 5000,
                          	timer: 3000,
                          	z_index: 9999,
                          	showProgressbar: false,
                          	placement: {
                          		from: "bottom",
                          		align: "right"
                          	},
                          	animate: {
                          		enter: 'animated bounceInUp',
                          		exit: 'animated bounceOutDown'
                          	},
                          });




                        }
                      },
                      failure: function(errMsg) {
                        alert(errMsg.Msg);
                      }
                    });
                  }else{




                    $.notify({
                      // options
                      icon: '',
                      title: "<h4>เพิ่มรายการที่ชอบ ไม่สำเร็จ</h4> ",
                      message: "ท่านต้องทำการ Login เพื่อเข้าสู่ระบบก่อนเพิ่มรายการที่ชอบ . "
                    },{
                      // settings
                      type: 'danger',
                      delay: 5000,
                      timer: 3000,
                      z_index: 9999,
                      showProgressbar: false,
                      placement: {
                        from: "bottom",
                        align: "right"
                      },
                      animate: {
                        enter: 'animated bounceInUp',
                        exit: 'animated bounceOutDown'
                      },
                    });





                  }
                });






        </script>

        <script>
    $(function(){
      // bind change event to select
      $('#lang').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>
