<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<a class="navbar-brand" href="{{route('seller.dashboard')}}">Hello , {{Auth::guard('seller')->user()->name}} !</a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
	      <a class="nav-link" href="{!! route('seller.dashboard') !!}">
	        <i class="fa fa-fw fa-dashboard"></i>
	        <span class="nav-link-text">Tổng quan</span>
	      </a>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
	      <a class="nav-link" href="{!! route('getFeeshipConfig') !!}">
	        <i class="fa fa-money"></i>
	        <span class="nav-link-text">Cài đặt phí giao hàng</span>
	      </a>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
	        <i class="fa fa-newspaper-o"></i>
	        <span class="nav-link-text">Gói tin</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseComponents">
	        <li>
	          <a href="{!! route('getBuyPackage') !!}"><i class="fa fa-usd" aria-hidden="true"></i> Mua gói tin</a>
	        </li>
	        <li>
	          <a href="{!! route('getAddNews') !!}"><i class="fa fa-plus-square" aria-hidden="true"></i> Đăng tin</a>
	        </li>
	        <li>
	          <a href="{!! route('getListNews') !!}"><i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách bản tin</a>
	        </li>
	        <li>
	          <a href="{!! route('getListOrderNews') !!}"><i class="fa fa-history" aria-hidden="true"></i> Lịch sử giao dịch</a>
	        </li>
	      </ul>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right">
	      <a class="nav-link" href="{!! route('getListProduct') !!}">
	        <i class="fa fa-product-hunt"></i>
	        <span class="nav-link-text">Danh sách sản phẩm</span>
	      </a>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
	        <i class="fa fa-shopping-bag"></i>
	        <span class="nav-link-text">Đơn hàng</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseMulti">
	        <li>
	          <a href="{!! route('getListOrder') !!}"><i class="fa fa-list-alt" aria-hidden="true"></i> Quản lý đơn hàng</a>
	        </li>
	        <li>
	          <a href="{!! route('getStatistics') !!}"><i class="fa fa-pie-chart" aria-hidden="true"></i> Thống kê</a>
	        </li>
	      </ul>
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