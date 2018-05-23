<!DOCTYPE html>
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
  <p>Xin chào {{$data["fullname"]}},</p>
  <p>Chúng tôi gửi mail này để giúp bạn đặt lại mật khẩu.</p>
  <p>Bấm vào <a href="{{url('/matkhau/datlai/'.$data["username"].'/'.md5($data["id"]).'/'.md5($data["today"].'datlaimatkhau'))}}">liên kết</a> để đặt lại mật khẩu</p>
  <p>Hoặc bỏ qua mail này nếu đây không phải là bạn</p>
  <p>Lưu ý: liên kết chỉ có hiệu lực đến 23:59:59 ngày {{date("d-m-Y")}}</p>
  <p>Cảm ơn !</p>
  <br>
  <small><i>Xin đừng trả lời mail này.</i></small>

</body>
</html>
