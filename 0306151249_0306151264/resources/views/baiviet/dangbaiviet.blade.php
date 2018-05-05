

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/baiviet.css') }}">
@endsection
<div id="divbigformdangbaiviet" >
	<form action="dangbaiviet_submit" method="get" accept-charset="utf-8">
		<div id="divtrongformdangbaiviet" >
			<div>
			<img id="imgdangbaiviet" " src=" {{ asset('pictures/avt1.jpg') }}" alt="Mountain View">
       			 
       			 <textarea id="iptextdangbaiviet" rows="5" cols="50">

				</textarea>
       		</div>
		</div>
		<div>
		
		<button id="btndangbaiviet" >Đăng</button>
		</div>

	</form>
</div>