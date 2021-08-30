<style>

ul.nav-main > li.nav-expanded > a {
  box-shadow: 2px 0 0 #ee413c inset;
}
html.no-overflowscrolling .nano > .nano-pane > .nano-slider {
    background: #ee413c;
}
.page-header h2 {
    border-bottom-color: #ee413c;
}
</style>
<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar" ></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">




                  <li {{ (Request::is('admin/user*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/user/')}}"  >
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>รายชื่อลูกค้า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/category/')}}"  >
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>จัดการหมวดหมู่</span>
										</a>
									</li>



                  <li {{ (Request::is('admin/shop*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/shop/')}}"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>ร้านค้า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/first_shop*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/first_shop/')}}"  >
											<i class="fa fa-life-ring" aria-hidden="true"></i>
											<span>ร้านค้า หน้าแรก</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/order*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/order/')}}"  >
											<i class="fa fa-external-link" aria-hidden="true"></i>
											<span>การสั่งซื้อ</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/proshop*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/proshop/')}}"  >
											<i class="fa fa-bell-o" aria-hidden="true"></i>
											<span>จัดการ สินค้า</span>
										</a>
									</li>


									<li {{ (Request::is('admin/banner*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/banner/')}}"  >
											<i class="fa fa-image" aria-hidden="true"></i>
											<span>จัดการ Banner</span>
										</a>
									</li>


                  					<li {{ (Request::is('admin/set_text*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/set_text/')}}"  >
											<i class="fa fa-anchor" aria-hidden="true"></i>
											<span>จัดการข้อความ</span>
										</a>
									</li>


									<li {{ (Request::is('admin/review_shop*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/review_shop/')}}"  >
											<i class="fa fa-comment" aria-hidden="true"></i>
											<span>รีวิวร้านค้า</span>
										</a>
									</li>

									<li {{ (Request::is('admin/review_product*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/review_product/')}}"  >
											<i class="fa fa-comment-o" aria-hidden="true"></i>
											<span>รีวิวสินค้า</span>
										</a>
									</li>

									<li {{ (Request::is('admin/free_shipping*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/free_shipping/')}}"  >
											<i class="fa fa-gift" aria-hidden="true"></i>
											<span>ส่วนลดสินค้า</span>
										</a>
									</li>






								</ul>



							</nav>



							<hr class="separator" />


						</div>

					</div>

				</aside>
				<!-- end: sidebar -->
