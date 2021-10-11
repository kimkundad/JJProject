		<!-- Vendor -->
		<script src="{{asset('/assets/vendor/jquery/jquery.js')}}"></script>
		<script src="{{asset('/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{asset('/assets/vendor/jquery-cookie/jquery.cookie.js')}}"></script>
		<script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{asset('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
		<script src="{{asset('/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

		<!-- Specific Page Vendor -->
		<script src="{{asset('/assets/vendor/select2/select2.js')}}"></script>

		<script src="{{asset('/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>

		<script src="{{asset('/assets/vendor/isotope/jquery.isotope.js')}}"></script>
		<script src="{{asset('/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
		<script src="{{asset('/assets/vendor/pnotify/pnotify.custom.js')}}"></script>
		<script src="{{asset('/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
		<script src="{{asset('/assets/vendor/ios7-switch/ios7-switch.js')}}"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('/assets/javascripts/theme.js')}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset('/assets/javascripts/theme.custom.js')}}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{asset('/assets/javascripts/theme.init.js')}}"></script>


		<!-- Analytics to Track Preview Website -->

		<!-- Examples -->
		
		<script src="{{asset('/assets/javascripts/ui-elements/examples.modals.js')}}"></script>
		 <script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
		 <script src="{{asset('/assets/javascripts/pages/examples.mediagallery.js')}}"></script>
		 <script src="{{asset('/assets/javascripts/ui-elements/examples.loading.overlay.js')}}"></script>

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
