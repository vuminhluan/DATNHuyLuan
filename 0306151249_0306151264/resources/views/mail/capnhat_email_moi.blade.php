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
  <p>Chúng tôi gửi mail này để giúp bạn cập nhật lại email mới.</p>
  <p>Bấm vào <a href="{{url('/xacnhan/thaydoi/email/'.$user_id.'/'.md5($user_id.'xacnhan').'/'.$new_email.'/'.md5($new_email.'xacnhan'))}}">liên kết</a> để chấp nhận thay đổi email</p>
  <p>Hoặc bỏ qua mail này nếu đây không phải là bạn</p>
  <p>Cảm ơn !</p>
  <br>
  <small><i>Xin đừng trả lời mail này.</i></small>

</body>
</html> --}}


@component('mail::message')
# Introduction

The body of your message.
{{-- {{$new_email}} --}}

@component('mail::button', ['url' => url('/xacnhan/thaydoi/email/'.$user_id.'/'.md5($user_id.'xacnhan').'/'.$new_email.'/'.md5($new_email.'xacnhan'))])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent