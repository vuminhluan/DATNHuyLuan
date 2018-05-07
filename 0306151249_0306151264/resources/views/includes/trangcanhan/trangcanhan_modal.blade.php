<div id="js-edit-profile-modal" class="confirm-modal modal">

	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-header">
			<h2>Thông tin hiển thị trang cá nhân <span class="close modal-cancel-button" data-modalid="js-edit-profile-modal" >&times;</span></h2>
			{{-- onclick="closeModal('js-edit-profile-modal')" --}}
		</div>
		<div class="profile-edit modal-body">
			<div>
				<label for="profile-family-middle-name">Họ và tên đệm</label>
				<input type="text" class="profile-name" id="profile-family-middle-name"  value="Người Dùng" autocomplete='off'>
				 <span class="character-counter" id="profile-family-middle-name-counter" data-limit='35'>35</span>
			</div>
			<div>
				<label for="profile-first-name">Tên</label>
				<input type="text" class="profile-name" id="profile-first-name" value="A" autocomplete='off'>
				<span class="character-counter" id="profile-first-name-counter" data-limit='15'>15</span>
			</div>
			<div>
				<label for="profile-bio">Giới thiệu</label>
				<textarea class="js-autoexpand" name="" id="profile-bio" rows="2" autocomplete='off'></textarea>
				<span class="character-counter" id="profile-bio-counter" data-limit='10'>10</span>
			</div>
			<div>
				<label for="profile-location">Vị trí</label>
				<input type="text" id="profile-location">
			</div>
			<div>
				<label>Sinh nhật</label>
				<select name="" id="profile-birtday-day">
					<option value="">Ngày</option>
					<option value="">01</option>
					<option value="">02</option>
					<option value="">03</option>
					<option value="">04</option>
				</select>
				<select name="" id="profile-birtday-month">
					<option value="">Tháng</option>
					<option value="">Tháng Một</option>
					<option value="">Tháng Hai</option>
					<option value="">Tháng Ba</option>
					<option value="">Tháng Bốn</option>
				</select>
				<select name="" id="profile-birtday-year">
					<option value="">Năm</option>
					<option value="">2018</option>
					<option value="">2017</option>
					<option value="">2016</option>
					<option value="">2015</option>
				</select>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#/" class="luan_link modal-cancel-button" data-modalid="js-edit-profile-modal">Hủy thao tác</a>
			{{-- onclick="closeModal('js-edit-profile-modal')" --}}
			<a href="#" class="luan_link except-change-setting-button">Lưu thay đổi</a>
		</div>
	</div>
</div>
