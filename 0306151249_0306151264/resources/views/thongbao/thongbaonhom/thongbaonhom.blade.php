@for ($i = 0; $i <count($listthongbao) ; $i++)
	{{-- expr --}}
{{-- <script>
	console.log({{$listthongbao}});
</script> --}}
@if ($listthongbao[$i]->ma_loai_thong_bao=="LTBN02")
	<div style="height: 77px; border:solid 1px #e4e6e8;margin-right: 7px;padding: 3px;margin-bottom: 1px;cursor: pointer;" onclick="openbaivietduocthongbao('{{$listthongbao[$i]->noi_nhan_tac_dong}}','{{$listthongbao[$i]->noi_dung_tac_dong}}')" >
		<div style="width: 20%;float: left;padding-left: 15px;">
			<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
			src="{{ asset('pictures/anh_dai_dien/'.$listthongbao[$i]->anhdaidiennguoitaothongbao)}} " alt="AVT">
		</div>
		<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
			<div style="width: 100%; height: 47px">
				Thành viên 
				<span style="font-weight: bold;">{{$listthongbao[$i]->hovatennguoitaothongbao}}</span> vừa có 
				<span style="font-weight: bold;color: #2becff;">{{$listthongbao[$i]->noi_dung_thong_bao}}</span> trong nhóm  
				<span style="color: #9063d8;font-weight: bold;">{{$listthongbao[$i]->ten_nhom}}</span>
			</div>
			<div style="width: 100%; height: 30px">
				<span style="color: #b6c3d0">{{$listthongbao[$i]->ngay_sua_thong_bao}}</span>
			</div>	
		</div>
	</div>
@endif
@if ($listthongbao[$i]->ma_loai_thong_bao=="LTBN03")
	<div style="height: 77px; border:solid 1px #e4e6e8;margin-right: 7px;padding: 3px;margin-bottom: 1px;cursor: pointer;" onclick="openbinhluanbaivietduocthongbao('{{$listthongbao[$i]->noi_dung_tac_dong}}')" >
		<div style="width: 20%;float: left;padding-left: 15px;">
			<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
			src="{{ asset('pictures/anh_dai_dien/'.$listthongbao[$i]->anhdaidiennguoitaothongbao)}} " alt="AVT">
		</div>
		<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
			<div style="width: 100%; height: 47px">
				Thành viên 
				<span style="font-weight: bold;">{{$listthongbao[$i]->hovatennguoitaothongbao}}</span> vừa 
				<span style="font-weight: bold;color: #2aec2a;">{{$listthongbao[$i]->noi_dung_thong_bao}}</span> của 
				<span style="color: #777777;font-weight: bold;">{{$listthongbao[$i]->hovatenchubaiviet}}</span>
			</div>
			<div style="width: 100%; height: 30px">
				<span style="color: #b6c3d0">{{$listthongbao[$i]->ngay_sua_thong_bao}}</span>
			</div>	
		</div>
	</div>
@endif
@if ($listthongbao[$i]->ma_loai_thong_bao=="LTBN04")
	<div style="height: 77px; border:solid 1px #e4e6e8;margin-right: 7px;padding: 3px;margin-bottom: 1px;cursor: pointer;" onclick="openrepbinhluanbaivietduocthongbao('{{$listthongbao[$i]->noi_nhan_tac_dong}}')" >
		<div style="width: 20%;float: left;padding-left: 15px;">
			<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
			src="{{ asset('pictures/anh_dai_dien/'.$listthongbao[$i]->anhdaidiennguoitaothongbao)}} " alt="AVT">
		</div>
		<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
			<div style="width: 100%; height: 47px">
				Thành viên 
				<span style="font-weight: bold;">{{$listthongbao[$i]->hovatennguoitaothongbao}}</span> vừa 
				<span style="font-weight: bold;color: orange;">{{$listthongbao[$i]->noi_dung_thong_bao}}</span> của
				<span style="color: #777777;font-weight: bold;">{{$listthongbao[$i]->hotenchubinhluan}}</span>
			</div>
			<div style="width: 100%; height: 30px">
				<span style="color: #b6c3d0">{{$listthongbao[$i]->ngay_sua_thong_bao}}</span>
			</div>	
		</div>
	</div>
@endif

@endfor