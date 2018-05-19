<div id="js-edit-profile-modal" class="confirm-modal modal">

	<!-- Modal content -->
	<div class="modal-content">
		<form action="{{route('post_taikhoan.thongtin_canhan.capnhat', Auth::user()->ten_tai_khoan)}}" method="POST">
			@csrf
			<div class="modal-header">
				<h2>Thông tin hiển thị trang cá nhân <span class="close modal-cancel-button" data-modalid="js-edit-profile-modal" >&times;</span></h2>
				{{-- onclick="closeModal('js-edit-profile-modal')" --}}
			</div>
			<div class="profile-edit modal-body">
				<div>
					<label for="profile-family-middle-name">Họ và tên đệm</label>
					<input type="text" class="profile-name" id="profile-family-middle-name" name="profile-family-middle-name"  value="{{ Auth::user()->nguoi_dung->ho_ten_lot }}" autocomplete='off'>
					 <span class="character-counter" id="profile-family-middle-name-counter" data-limit='35'>35</span>
				</div>
				<div>
					<label for="profile-first-name">Tên</label>
					<input type="text" class="profile-name" id="profile-first-name" name="profile-first-name" value="{{Auth::user()->nguoi_dung->ten}}" autocomplete='off'>
					<span class="character-counter" id="profile-first-name-counter" data-limit='15'>15</span>
				</div>
				<div>
					<label for="profile-bio">Giới thiệu</label>
					<textarea class="js-autoexpand" name="profile-bio" id="profile-bio" rows="2" autocomplete='off'>{{ Auth::user()->nguoi_dung->gioi_thieu }}</textarea>
					<span class="character-counter" id="profile-bio-counter" data-limit='10'>10</span>
				</div>
				<div>
					<label for="profile-location">Giới tính</label>
					<select style="width: 100%;" name="profile-gender" id="profile-gender">
						{{-- <option value="Nam">Nam</option> --}}
						@foreach ($tatca_gioitinh as $gt)
							<option {{$gt->ma_gioi_tinh == Auth::user()->nguoi_dung->ma_gioi_tinh ? 'selected' : ''}} value="{{$gt->ma_gioi_tinh}}">{{$gt->ten_gioi_tinh.' '.$gt->ma_gioi_tinh. ' '.Auth::user()->nguoi_dung->ma_gioi_tinh}}</option>
						@endforeach
					</select>
				</div>
				<div>
					<label>Sinh nhật</label>
					<input type="date" id="profile-birthday" name="profile-birthday" value="{{Auth::user()->nguoi_dung->ngay_sinh}}">
				</div>
			</div>
			<div class="modal-footer">
			<a href="#/" class="luan_link modal-cancel-button" data-modalid="js-edit-profile-modal">Hủy thao tác</a>
			{{-- onclick="closeModal('js-edit-profile-modal')" --}}
			<button href="#" class="luan_link update-profile-button except-change-setting-button">Lưu thay đổi</button>
		</div>
		</form>

	</div>
</div>
