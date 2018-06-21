<div class="myloader">
	{{-- <img src="{{ asset('pictures/luan/ajax-loader2.gif') }}" alt=""> --}}
	<img src="" alt="">
</div>

<div class="slidedown-alert {{session('slidemessage') ? 'slidedown-alert-animation' : '' }}">
	<div class="--content">
		<p class="baomoi">Thông báo: {{session('slidemessage')}}</p>
	</div>
</div>