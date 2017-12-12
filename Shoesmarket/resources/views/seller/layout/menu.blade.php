<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<a class="navbar-brand" href="index.html">Hello , {{Auth::guard('seller')->user()->name}} !</a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
	      <a class="nav-link" href="index.html">
	        <i class="fa fa-fw fa-dashboard"></i>
	        <span class="{{url('sellercenter/dashboard')}}">Dashboard</span>
	      </a>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
	      <a class="nav-link" href="charts.html">
	        <i class="fa fa-fw fa-area-chart"></i>
	        <span class="nav-link-text">Charts</span>
	      </a>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
	      <a class="nav-link" href="{!! route('getFeeshipConfig') !!}">
	        <i class="fa fa-fw fa-table"></i>
	        <span class="nav-link-text">Cài đặt phí giao hàng</span>
	      </a>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
	        <i class="fa fa-fw fa-wrench"></i>
	        <span class="nav-link-text">Gói tin</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseComponents">
	        <li>
	          <a href="{!! route('getBuyPackage') !!}">Mua gói tin</a>
	        </li>
	        <li>
	          <a href="{!! route('getAddNews') !!}">Đăng tin</a>
	        </li>
	        <li>
	          <a href="{!! route('getListOrderNews') !!}">Lịch sử giao dịch</a>
	        </li>
	      </ul>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
	        <i class="fa fa-fw fa-file"></i>
	        <span class="nav-link-text">Quản lý sản phẩm</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseExamplePages">
	        <li>
	          <a href="">Danh sách sản phẩm</a>
	        </li>
	        <li>
	          <a href="{!! route('getListProduct') !!}">Bảng sản phẩm</a>
	        </li>
	        <li>
	          <a href="{!! route('getEditNews') !!}">Sửa sản phẩm</a>
	        </li>
	        <li>
	          <a href="blank.html">Blank Page</a>
	        </li>
	      </ul>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
	        <i class="fa fa-fw fa-sitemap"></i>
	        <span class="nav-link-text">Đơn hàng</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseMulti">
	        <li>
	          <a href="{!! route('getListOrder') !!}">Quản lý đơn hàng</a>
	        </li>
	        <li>
	          <a href="#">Thống kê</a>
	        </li>
	        <li>
	          <a href="#">Second Level Item</a>
	        </li>
	        <li>
	          <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
	          <ul class="sidenav-third-level collapse" id="collapseMulti2">
	            <li>
	              <a href="#">Third Level Item</a>
	            </li>
	            <li>
	              <a href="#">Third Level Item</a>
	            </li>
	            <li>
	              <a href="#">Third Level Item</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
	      <a class="nav-link" href="#">
	        <i class="fa fa-fw fa-link"></i>
	        <span class="nav-link-text">Link</span>
	      </a>
	    </li>
	  </ul>
	  
	  <ul class="navbar-nav sidenav-toggler">
	    <li class="nav-item">
	      <a class="nav-link text-center" id="sidenavToggler">
	        <i class="fa fa-fw fa-angle-left"></i>
	      </a>
	    </li>
	  </ul>

	  @include('Seller.layout.header')

	</div>
</nav>