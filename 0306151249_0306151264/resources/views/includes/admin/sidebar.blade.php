


<div id="sidebar-bg"></div>

<div id="sidebar" role="navigation">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <i class="fa fa-th"></i><span> Danh mục quản lý</span>
        <b class="fa fa-plus-sign visible-xs pull-right"></b>
      </h3>
    </div>
    <ul id="menu" class="list-group">
      {{-- <li class="list-group-item">
        <a href="post.html">
          <i class="fa fa-edit"></i> <span>Tin tức</span>
        </a>
      </li> --}}
      {{-- <li class="list-group-item">
        <a href="product.html">
          <i class="fa fa-fire"></i><span>Sản phẩm</span>
        </a>
      </li> --}}
      {{-- <li class="list-group-item">
        <a href="type_product.html">
          <i class="fa fa-bars"></i> <span>Loại sản phẩm</span>
        </a>
      </li> --}}
      <li class="list-group-item">
        <a href="{{route('admin.phanhoi')}}">
          @php
            $a = 2000;
          @endphp
          <i class="fa fa-envelope-o"></i> <span>Phản hồi<span id="message-counter" class="badge pull-right" title="{{count($tatca_phanhoi)}}">{{count($tatca_phanhoi) > 1000 ? (count($tatca_phanhoi)/1000).' k' : count($tatca_phanhoi)}}</span></span>
        </a>
      </li>
      {{-- <li class="list-group-item">
        <a href="slider.html">
          <i class="fa fa-picture-o"></i> <span>Slider</span>
        </a>
      </li> --}}
      <li class="list-group-item">
        <a href="{{route('admin.taikhoan')}}">
          <i class="fa fa-user"></i> <span>Tài khoản</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="{{route('admin.gioitinh')}}">
          <i class="fa fa-transgender"></i> <span>Giới tính</span>
        </a>
      </li>
      <li class="list-group-item">
        <a href="{{route('admin.cauhinh')}}">
          <i class="fa fa-wrench"></i> <span>Cấu hình</span>
        </a>
      </li>
    </ul>
  </div>
</div>
