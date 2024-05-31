<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{asset('dashboard/images/faces-clipart/pic-1.png')}}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          @php 
            $user=Auth::user();
          @endphp
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{$user->fullname}}</span>
            <span class="text-secondary text-small">
              @if($user->user_catalogue_id == 1)
              Quản trị viên
              @else($user->user_catalogue_id == 2)
              Nhân viên
              @endif
            </span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.index')}}">
          <span class="menu-title">Báo cáo doanh thu</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Quản lí thành viên</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}">QL thành viên</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">QL nhóm thành viên</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Quản lí sản phẩm</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('book.index') }}">Danh sách sản phẩm</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('book.create') }}">Thêm mới 1 sản phẩm</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('invoice.index')}}">
          <span class="menu-title">Danh sách đơn hàng</span>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Quản lí banner</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('banner.index') }}">Danh sách banner</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Thêm mới 1 banner</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Quản lí thể loại và bộ sách</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">Thể loại</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('setofbook.index')}}">Bộ sách</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>