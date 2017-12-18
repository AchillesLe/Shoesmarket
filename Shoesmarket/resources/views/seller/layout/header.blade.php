<ul class="navbar-nav ml-auto">
	<!--<li class="nav-item">
	  <form class="form-inline my-2 my-lg-0 mr-lg-2">
	    <div class="input-group">
	      <input class="form-control" type="text" placeholder="Search for...">
	      <span class="input-group-btn">
	        <button class="btn btn-primary" type="button">
	          <i class="fa fa-search"></i>
	        </button>
	      </span>
	    </div>
	  </form>
	</li>-->
	<!--<li class="nav-item">
	  <a class="nav-link" href="{!! route('getChangePassword') !!}">
	    <i class="fa fa-lock" aria-hidden="true"></i> Đổi mật khẩu</a>
	</li>

	<li class="nav-item">
	  <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
	    <i class="fa fa-fw fa-sign-out"></i>Đăng xuất</a>
	</li>-->

	<li class="nav-item" >
	    <div class="btn-group" role="group" style="margin-right: 20px;">
		    <button id="btngroupinfo" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" >
		      <i class="fa fa-fw fa-address-card-o "></i> Thông tin
		    </button>
		    <div class="dropdown-menu" aria-labelledby="btngroupinfo" >
		      <a class="dropdown-item" href="{!! route('getChangePassword') !!}"><i class="fa fa-fw fa-edit"></i>Đổi mật khẩu</a>
		      <a class="dropdown-item" href="{!! route('seller.logout') !!}"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
		    </div>
  		</div>
	</li>
</ul>