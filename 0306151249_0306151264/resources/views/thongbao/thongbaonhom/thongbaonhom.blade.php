@for ($i = 0; $i <count($listthongbao) ; $i++)
	{{-- expr --}}
{{-- <script>
	console.log({{$listthongbao}});
</script> --}}
<div style="height: 77px; border:solid 1px #e4e6e8;margin-right: 7px;padding: 3px;margin-bottom: 1px" onclick="openbaivietduocthongbao('{{$listthongbao[$i]->noi_nhan_tac_dong}}','{{$listthongbao[$i]->noi_dung_tac_dong}}')" >
	<div style="width: 20%;float: left;padding-left: 15px;">
		<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
		src="{{ asset('pictures/anh_dai_dien/'.$listthongbao[$i]->anh_dai_dien)}} " alt="AVT">
	</div>
	{{-- <div style=""></div> --}}
	<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
		<div style="width: 100%; height: 47px">
			Thành viên 
			<span style="font-weight: bold;">{{$listthongbao[$i]->ho_ten_lot.' '.$listthongbao[$i]->ten}}</span> vừa có 
			<span style="font-weight: bold;color: #2aec2a;">{{$listthongbao[$i]->noi_dung_thong_bao}}</span> trong 
			<span style="color: blue;font-weight: bold;">{{$listthongbao[$i]->ten_nhom}}</span>
		</div>
		<div style="width: 100%; height: 30px">
			<span style="color: #b6c3d0">{{$listthongbao[$i]->ngay_sua_thong_bao}}</span>
		</div>	
	</div>
</div>

@endfor