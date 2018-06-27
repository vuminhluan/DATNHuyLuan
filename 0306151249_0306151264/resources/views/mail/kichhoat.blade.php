{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  </style>
</head>
<body>

  <h1>DATN</h1>
  <br>
  <p>Xin chào {{Auth::user()->ho_ten_lot." ". Auth::user()->ten }},</p>
  <p>Chúng tôi gửi mail này để giúp bạn kích hoạt tài khoản sau khi đăng kí tài khoản trên website chúng tôi.</p>
  <p>Bấm vào <a href="{{url('/kichhoat/taikhoan/'.Auth::user()->ten_tai_khoan.'/'.md5(Auth::user()->ten_tai_khoan.'kichhoat'))}}">liên kết</a> để kích hoạt tài khoản</p>
  <p>Hoặc bỏ qua mail này nếu đây không phải là bạn</p>
  <p>Cảm ơn !</p>
  <br>
  <small><i>Xin đừng trả lời mail này.</i></small>

</body>
</html>
 --}}



@component('mail::message')
# Kích hoạt tài khoản

Xin chào {{Auth::user()->ho_ten_lot." ". Auth::user()->ten }}, <br>
Chúng tôi gửi mail này để giúp bạn kích hoạt tài khoản sau khi đăng kí tài khoản trên website chúng tôi. Để kích hoạt, bạn cần bấm vào nút bên dưới. Hoặc bỏ qua email này nếu có điều gì đó nghi ngờ. <br>
<small><i>Xin đừng trả lời mail này.</i></small>

@component('mail::button', ['url' => url('/kichhoat/taikhoan/'.Auth::user()->ten_tai_khoan.'/'.md5(Auth::user()->ten_tai_khoan.'kichhoat')), 'color' => 'main'])
Kích hoạt tài khoản
@endcomponent

Cảm ơn,<br>
{{-- {{ config('app.name') }} --}}
LL
@endcomponent