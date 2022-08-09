<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">Trang chủ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Quản lý danh mục
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a></li>
                  <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">Danh sách danh mục</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Quản lý sản phẩm
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('sanpham.create')}}">Thêm sản phẩm</a></li>
                  <li><a class="dropdown-item" href="{{route('sanpham.index')}}">Danh sách sản phẩm</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Quản lý đơn hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Quản lý khách hàng</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</div>