{{-- <script>
	console.log($listthongbao);
</script> --}}
{{-- @for ($i = 0; $i <count($listthongbao) ; $i++) --}}
	{{-- expr --}}
{{-- <script>
	// console.log();
	alert("")

</script> --}}
{{-- @for ($j = 0; $j <count($soluongthongbaodadoc) ; $j++) --}}
	

{{-- .thongbaodadocdiv .thongbaodiv --}}
{{-- <script>
	console.log($listthongbao);
</script> --}}


{{-- test --}}

@foreach ($listthongbaoLSTAR as $listthongbao)
	{{-- expr --}}

{{-- @if ($listthongbao->ma_loai_thong_bao=="LTBN02")
	<div class="thongbaodiv"  id="divtb-{{$listthongbao->ma_thong_bao}}" onclick="openbaivietduocthongbao('{{$listthongbao->noi_nhan_tac_dong}}','{{$listthongbao->noi_dung_tac_dong}}','{{$listthongbao->ma_thong_bao}}')" >
		<div style="width: 20%;float: left;padding-left: 15px;">
			<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
			src="{{ asset('pictures/anh_dai_dien/'.$listthongbao->anhdaidiennguoitaothongbao)}} " alt="AVT">
		</div>
		<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
			<div style="width: 100%; height: 47px">
				Thành viên 
				<span style="font-weight: bold;">{{$listthongbao->hovatennguoitaothongbao}}</span> vừa có 
				<span style="font-weight: bold;color: #2becff;">{{$listthongbao->noi_dung_thong_bao}}</span> trong nhóm  
				<span style="color: #9063d8;font-weight: bold;">{{$listthongbao->ten_nhom}}</span>
			</div>
			<div style="width: 100%; height: 30px">
				<span style="color: #b6c3d0">{{$listthongbao->ngay_sua_thong_bao}}</span>
			</div>	
		</div>
	</div>
@endif --}}

	


@if ($listthongbao->ma_loai_thong_bao=="LTBN02")
	<div class="thongbaodiv"  id="divtb-{{$listthongbao->ma_thong_bao}}" onclick="openbaivietduocthongbao('{{$listthongbao->noi_nhan_tac_dong}}','{{$listthongbao->noi_dung_tac_dong}}','{{$listthongbao->ma_thong_bao}}')" >
		<div style="width: 20%;float: left;padding-left: 15px;">
			<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
			src="{{ asset('pictures/anh_dai_dien/'.$listthongbao->anhdaidiennguoitaothongbao)}} " alt="AVT">
		</div>
		<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
			<div style="width: 100%; height: 47px">
				Thành viên 
				<span style="font-weight: bold;">{{$listthongbao->hovatennguoitaothongbao}}</span> vừa có 
				<span style="font-weight: bold;color: #2becff;">{{$listthongbao->noi_dung_thong_bao}}</span> trong nhóm  
				<span style="color: #9063d8;font-weight: bold;">{{$listthongbao->ten_nhom}}</span>
			</div>
			<div style="width: 100%; height: 30px">
				<span style="color: #b6c3d0">{{$listthongbao->ngay_sua_thong_bao}}</span>
			</div>	
		</div>
	</div>
@endif





{{-- @if ($listthongbao->ma_loai_thong_bao=="LTBN02"&&$soluongthongbaodadoc[$j]->ma_nguoi_doc!=Auth::user()->ma_tai_khoan)
	<div class="thongbaodiv"  id="divtb-{{$listthongbao->ma_thong_bao}}" onclick="openbaivietduocthongbao('{{$listthongbao->noi_nhan_tac_dong}}','{{$listthongbao->noi_dung_tac_dong}}','{{$listthongbao->ma_thong_bao}}')" >
		<div style="width: 20%;float: left;padding-left: 15px;">
			<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
			src="{{ asset('pictures/anh_dai_dien/'.$listthongbao->anhdaidiennguoitaothongbao)}} " alt="AVT">
		</div>
		<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
			<div style="width: 100%; height: 47px">
				Thành viên 
				<span style="font-weight: bold;">{{$listthongbao->hovatennguoitaothongbao}}</span> vừa có 
				<span style="font-weight: bold;color: #2becff;">{{$listthongbao->noi_dung_thong_bao}}</span> trong nhóm  
				<span style="color: #9063d8;font-weight: bold;">{{$listthongbao->ten_nhom}}</span>
			</div>
			<div style="width: 100%; height: 30px">
				<span style="color: #b6c3d0">{{$listthongbao->ngay_sua_thong_bao}}</span>
			</div>	
		</div>
	</div>
	@break
@endif --}}


@if ($listthongbao->ma_loai_thong_bao=="LTBN03")
	<div class="thongbaodiv"  id="divtb-{{$listthongbao->ma_thong_bao}}" onclick="openbinhluanbaivietduocthongbao('{{$listthongbao->noi_dung_tac_dong}}','{{$listthongbao->ma_thong_bao}}')" >
		<div style="width: 20%;float: left;padding-left: 15px;">
			<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
			src="{{ asset('pictures/anh_dai_dien/'.$listthongbao->anhdaidiennguoitaothongbao)}} " alt="AVT">
		</div>
		<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
			<div style="width: 100%; height: 47px">
				Thành viên 
				<span style="font-weight: bold;">{{$listthongbao->hovatennguoitaothongbao}}</span> vừa 
				<span style="font-weight: bold;color: #2aec2a;">{{$listthongbao->noi_dung_thong_bao}}</span> của 
				<span style="color: #777777;font-weight: bold;">{{$listthongbao->hovatenchubaiviet}}</span>
			</div>
			<div style="width: 100%; height: 30px">
				<span style="color: #b6c3d0">{{$listthongbao->ngay_sua_thong_bao}}</span>
			</div>	
		</div>
	</div>
@endif
@if ($listthongbao->ma_loai_thong_bao=="LTBN04")
				<div class="thongbaodiv" id="divtb-{{$listthongbao->ma_thong_bao}}" onclick="openrepbinhluanbaivietduocthongbao('{{$listthongbao->noi_nhan_tac_dong}}','{{$listthongbao->ma_thong_bao}}')" >

					<div style="width: 20%;float: left;padding-left: 15px;">
						<img style="width: 69px;height: 69px;border-radius: 50%;overflow: hidden;" 
						src="{{ asset('pictures/anh_dai_dien/'.$listthongbao->anhdaidiennguoitaothongbao)}} " alt="AVT">
					</div>
					<div style="width: 80%;height: 77px;margin-left: 20%;padding-right: 25px;">
						<div style="width: 100%; height: 47px">
							Thành viên 
							<span style="font-weight: bold;">{{$listthongbao->hovatennguoitaothongbao}}</span> vừa 
							<span style="font-weight: bold;color: orange;">{{$listthongbao->noi_dung_thong_bao}}</span> của
							<span style="color: #777777;font-weight: bold;">{{$listthongbao->hotenchubinhluan}}</span>
						</div>
						<div style="width: 100%; height: 30px">
							<span style="color: #b6c3d0">{{$listthongbao->ngay_sua_thong_bao}}</span>
						</div>	
					</div>
				</div>

@endif

@endforeach




{{-- @endfor --}}