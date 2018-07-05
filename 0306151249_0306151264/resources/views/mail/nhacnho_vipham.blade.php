

@component('mail::message')
# Nhắc nhỏ vi phạm

Xin chào {{$data->target_fullname}}, <br>
Chúng tôi gửi mail này vì đã có người báo cáo bạn đã .... <br>
<small><i>Xin đừng trả lời mail này.</i></small>

{{-- @component('mail::button', ['url' => url('/kichhoat/taikhoan/'.Auth::user()->ten_tai_khoan.'/'.md5(Auth::user()->ten_tai_khoan.'kichhoat')), 'color' => 'main'])
Kích hoạt tài khoản
@endcomponent --}}

Cảm ơn,<br>
{{-- {{ config('app.name') }} --}}
LL
@endcomponent