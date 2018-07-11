

@component('mail::message')
# Nhắc nhỏ vi phạm

Xin chào {{$data->target_fullname}}, <br>
Chúng tôi gửi mail tới bạn này vì vào lúc <i>{{date_format(date_create($data->created_at), 'd/m/Y H:i:s')}}</i> đã có người báo cáo bạn với nội dung sau: <br>
<p><i>{{$data->report_content}}</i></p>
Sau khi xem xét, chúng tôi đã gửi mail này để nhắc nhở bạn tuân thủ nội quy. Nếu không chúng tôi buộc phải đánh dấu vi phạm tài khoản của bạn. <br>
Mọi thắc mắc xin liên hệ với chúng tôi qua đây:
@component('mail::button', ['url' => url('/lienhe'), 'color' => 'main'])
Liên hệ
@endcomponent
<small><i>Xin đừng trả lời mail này.</i></small>

{{-- @component('mail::button', ['url' => url('/kichhoat/taikhoan/'.Auth::user()->ten_tai_khoan.'/'.md5(Auth::user()->ten_tai_khoan.'kichhoat')), 'color' => 'main'])
Kích hoạt tài khoản
@endcomponent --}}

Cảm ơn,<br>
{{-- {{ config('app.name') }} --}}
LL
@endcomponent