<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            <img src="{{ asset('admin-template') }}/images/faces/face10.jpg" alt="image">
            <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
          </div>
          <div class="profile-name">
            <p class="name">
              Ai đó ?
            </p>
            <p class="designation">
              Super Admin
            </p>
          </div>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="icon-rocket menu-icon"></i>
          <span class="menu-title">Bảng điều khiển</span>
        </a>
      </li>
      {{-- bách khoa nông nghiệp --}}
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('trang-chu-bach-khoa') }}">
          <i class="icon-rocket menu-icon"></i>
          <span class="menu-title">Bách khoa nông nghiệp</span>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('danh-sach-loai-san-pham-nuoi-trong') }}">
          <i class="icon-rocket menu-icon"></i>
          <span class="menu-title">Loại sản phẩm nuôi trồng</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- partial -->