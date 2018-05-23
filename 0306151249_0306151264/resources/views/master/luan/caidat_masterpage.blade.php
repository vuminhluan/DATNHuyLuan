@extends('master.masterpage')

@section('title')
	<title>Vuminhluan / Cài đặt</title>
@endsection

@section('css')
	<link rel="stylesheet" href="{{asset('css/luan/settings/settings_masterpage.css')}}">
	<link rel="stylesheet" href="{{asset('css/luan/confirm-modal.css')}}">
	@yield('settings_css')
@endsection

@section('main')
	<div class="contentmain main">

    <div class="profile-setting-sidebar sidebar">

			{{-- Profile card --}}
      <div class="profile-card">
        <a href="{{route('trangcanhan.index', Auth::user()->ten_tai_khoan)}}">
          <div class="profile-card-banner" style="background-image: url('{{asset('pictures/anh_bia/'.Auth::user()->nguoi_dung->anh_bia)}}');">
            <div class="profile-card-avatar">
              <img src="{{asset('pictures/anh_dai_dien/'.Auth::user()->nguoi_dung->anh_dai_dien)}}" alt="">

            </div>
          </div>
        </a>
        <div class="profile-name-and-id">
          <h3><a href="{{route('trangcanhan.index', Auth::user()->ten_tai_khoan)}}">{{Auth::user()->nguoi_dung->ho_ten_lot.' '. Auth::user()->nguoi_dung->ten}}</a></h3>
          <p><a href="{{route('trangcanhan.index', Auth::user()->ten_tai_khoan)}}">{{'@'.Auth::user()->ten_tai_khoan}}</a></p>
        </div>
      </div>

			{{-- End Profile card --}}

			{{-- Setting sidebar --}}
      <div class="setting-sidenav">
        <ul>
          <li><a href="{{route('caidat.index')}}" class="setting-active-link">Tài khoản <span><i class="fa fa-angle-right"></i></span></a></li>
          <li><a href="#/">Bảo mật và riêng tư <span><i class="fa fa-angle-right"></i></span></a></li>
          <li><a href="{{route('caidat.thaydoi_matkhau')}}">Mật khẩu <span><i class="fa fa-angle-right"></i></span></a></li>
          <li><a href="{{route('caidat.chan_taikhoan')}}">Người dùng bị chặn <span><i class="fa fa-angle-right"></i></span></a>
          <li><a href="setting-blocked-groups.html">Nhóm bị chặn <span><i class="fa fa-angle-right"></i></span></a></li>
          <li><a href="setting-blocked-groups.html">Cài đặt bảng tin <span><i class="fa fa-angle-right"></i></span></a></li>
        </ul>
      </div>

			{{-- End Setting sidebar --}}

    </div>
    <!--  -->

		<div class="content content-setting">
			@yield('noidung_trangcaidat')
		</div>


    <!-- <div class="rightnav sidebar">
    </div> -->

  </div>
@endsection


@section('javascript')
  <script type="text/javascript" src="{{ asset('js/globaljs/varglobal.js') }}" charset="utf-8"></script>
	<script src="{{asset('js/luan/utilities/open_close_modal.js')}}"></script>
	<script src="{{asset('js/jquery/jquery-validate.min.js')}}"></script>
	<script src="{{asset('js/luan/configpage.js')}}"></script>

	@yield('settings_javascript')
@endsection
