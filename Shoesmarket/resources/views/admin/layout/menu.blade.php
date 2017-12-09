<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<a class="navbar-brand" href="{{url('admin/')}}">Hello , {{Auth::guard('admin')->user()->name}}!</a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	  	<!--Dashboard-->
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
	      <a class="nav-link" href="{!! url('admin/')!!}">
	        <i class="fa fa-fw fa-dashboard"></i>
	        <span class="nav-link-text">Bảng điều khiển</span>
	      </a>
	    </li>   
	    <!--product-->
	    {{-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nhóm sản phẩm">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProduct" data-parent="#exampleAccordion">
	        <i class="fa fa-fw  fa-product-hunt"></i>
	        <span class="nav-link-text">Nhóm sản phẩm</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseProduct">
	        <li>
	          <a href="{{url('admin/seller/list')}}">Danh sách sản phẩm</a>
	        </li>
	        <li>
	          <a href="{{url('admin/seller/list')}}">Cards</a>
	        </li>
	      </ul>
	    </li> --}}
		<!--Seller-->
	   	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nhóm người bán">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSeller" data-parent="#exampleAccordion">
	        <i class="fa fa-fw  fa-institution"></i>
	        <span class="nav-link-text">Nhóm người bán</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseSeller">
	        <li>
	          <a href="{{url('admin/seller/list')}}">Danh sách </a>
	        </li>
{{-- 	        <li>
	          <a href="{{url('admin/seller/sellpackage')}}">Nạp gói tin</a>
	        </li> --}}
	      </ul>
	    </li>
	    <!--User-->
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nhóm người dùng">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUser" data-parent="#exampleAccordion">
	        <i class="fa fa-fw fa-users"></i>
	        <span class="nav-link-text">Nhóm khách hàng</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseUser">
	        <li>
	          <a href="{{url('admin/user/list')}}">Danh sách</a>
	        </li>
	       {{--  <li>
	          <a href="{{url('admin/user/list')}}">Cards</a>
	        </li> --}}
	      </ul>
	    </li>

	    <!--setting-->
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cài đặt">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
	        <i class="fa fa-fw fa-cogs"></i>
	        <span class="nav-link-text">Cấu hình</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseMulti">
	        <li>
	          <a href="{{url('admin/type/list')}}">Thể loại giày</a>
	        </li>
{{-- 	        <li>
	          <a href="{{url('admin/producttype/list')}}">Loại giày</a>
	        </li> --}}
	         <li>
	          <a href="{{url('admin/package/list')}}">Gói tin</a>
	        </li>
	      </ul>
	    </li>

		<!--Employee-->
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nhóm nhân viên">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEmloyee" data-parent="#exampleAccordion">
	        <i class="fa fa-fw  fa-user-secret"></i>
	        <span class="nav-link-text">Nhóm nhân viên</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="collapseEmloyee">
	        <li>
	          <a href="{{url('admin/employee/list')}}">Danh sách nhân viên</a>
	        </li>
	        <li>
	          <a href="{{url('admin/employee/create')}}">Thêm nhân viên</a>
	        </li>
	      </ul>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Doanh thu">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#revenue" data-parent="#exampleAccordion">
	        <i class="fa fa-fw  fa-money"></i>
	        <span class="nav-link-text">Doanh thu</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="revenue">
	        <li>
	          <a href="{{url('admin/revenue/interval')}}">Theo khoảng thời gian</a>
	        </li>
	      </ul>
	    </li>
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gửi mail">
	      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#mailseller" >
	        <i class="fa fa-fw  fa-envelope"></i>
	        <span class="nav-link-text">Mail</span>
	      </a>
	      <ul class="sidenav-second-level collapse" id="mailseller">
	        <li>
	          <a href="{{url('admin/mail/list')}}">Danh sách mail gửi</a>
	        </li>
	        <li>
	          <a href="{{url('admin/mail/mailtemplate')}}">Danh sách mail mẫu</a>
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

	  @include('admin.layout.header')

	</div>
</nav>