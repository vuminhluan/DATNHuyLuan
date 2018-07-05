<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\NguoiDung;

class ChatController extends Controller
{
  // public function luuChatVaoSession(Request $req)
  // {
  // // 	$msg = $req->message;
  // // 	if (!$req->session()->has('admin-chat')) {
	 // //    session(['admin-chat'=> [

	 // //    	[
		// // 			'name'    => $req->sender_name,
		// // 			'message' => $msg,
		// // 			'time'    => $req->time
	 // //    	]

	 // //    ]

	 // //  ]);
		// // } else {
		// // 	// session(['admin-chatt'=> [$data]]);
		// // 	$req->session()->push('admin-chat', ['name' => $req->sender_name,
	 // //    		'message' => $msg, 'time' => $req->time]);
		// // }
  
  // // 	$list_chat = $req->session()->get('admin-chat');
  // // 	return $list_chat;

  // 	return "Da luu chat vao session";
  // }

  // public function xoaKhungChat(Request $req)
  // {	
  // 	// $req->session()->flush();
  // 	// $req->session()->forget('admin-chat');
  // 	// return $req->session()->all();

  // 	return "Da xoa khung chat";
  // }



	public function xoaKhungChat(Request $req)
	{
		// // 1530782527758
		// $seconds = 1530782527758/1000;
		// // 1530782700
		// return date('d/m/Y', $seconds);

		// $date = date_create('1530782527758');
		// return date_format($date, 'd/m/Y H:i:s');
		// return time();

		// $req->session()->forget('user_chat.user'.$req->toID.'.chat_list');
		$req->session()->forget('user_chat.user'.$req->toID);
		$user_chat = $req->session()->get('user_chat.user'.$req->toID);
		return $user_chat;
	}


	public function luuChatVaoSession(Request $req)
	{
		$data_message = [
			'name'    => $req->name,
			'id'      => $req->id,
			'message' => $req->message,
			'time'    => date('d/m/Y H:i:s', strtotime($req->time))
		];

		// return $data_message;

		// Nếu có session rồi (session gốc và session cho từng người) => push nội dung chat vào luôn (vào mảng chat_list)
		if($req->session()->has('user_chat') && $req->session()->has('user_chat.user'.$req->toID)) {
			$req->session()->push('user_chat.user'.$req->toID.'.chat_list', $data_message);
  	} else {
  		$to = NguoiDung::where('ma_tai_khoan', $req->toID)->first();
  		if (!$req->session()->has('user_chat')) {
				// Nếu chưa chat với ai bao giờ => Tạo session user_chat:
				session(['user_chat'=>
					[
						'user'.$req->toID => [
							// 'info' => [ 'from_id' => Auth::user()->ma_tai_khoan, 'from_name' => Auth::user()->ho_ten_lot.' '.Auth::user()->ten,
							// 					 'to_id'=>$to->ma_tai_khoan, 'to_name' => $to->ho_ten_lot.' '.$to->ten ]
						]
					]
				]);
				$req->session()->push('user_chat.user'.$req->toID.'.info', [
					'from_id' => Auth::user()->ma_tai_khoan, 'from_name' => Auth::user()->ho_ten_lot.' '.Auth::user()->ten,
					'to_id'=>$to->ma_tai_khoan, 'to_name' => $to->ho_ten_lot.' '.$to->ten, 'beginning_time' => date('d/m/Y H:i:s')
	    	]);

			} else if(!$req->session()->has('user_chat.user'.$req->toID)) {
				// Nếu đã có session user_chat nhưng chưa chat với người hiện tại bao giờ => tạo array lưu chat với người hiện tại => push vào session user_chat
				$req->session()->push('user_chat.user'.$req->toID.'.info', [
					//date("H:i:s")
					'from_id' => Auth::user()->ma_tai_khoan, 'from_name' => Auth::user()->ho_ten_lot.' '.Auth::user()->ten,
					'to_id'=>$to->ma_tai_khoan, 'to_name' => $to->ho_ten_lot.' '.$to->ten, 'beginning_time' => date('d/m/Y H:i:s')
	    	]);
			}

  	}

  	// $recent_chat = $req->session()->get('user_chat.user'.$req->toID.'.chat_list');
		// $user_chat = $req->session()->get('user_chat');
		return $data_message;
  	// return $data_message;
		
	}

  public function getTinNhanGiuaHaiNguoi(Request $req)
  {
		// -------------------------------------------------------------------------------

  	$info = "";
  	if($req->session()->has('user_chat') && $req->session()->has('user_chat.user'.$req->toID)) {

  		$user_chat = $req->session()->get('user_chat.user'.$req->toID);
  		// $user_chat = $req->session()->get('user_chat');
  		return $user_chat;
  	} else {
  		$to = NguoiDung::where('ma_tai_khoan', $req->toID)->first();
  	}

		if (!$req->session()->has('user_chat')) {
			// Nếu chưa chat với ai bao giờ => Tạo session user_chat:
			session(['user_chat'=>
				[
					'user'.$req->toID => [
						// 'info' => [ 'from_id' => Auth::user()->ma_tai_khoan, 'from_name' => Auth::user()->ho_ten_lot.' '.Auth::user()->ten,
						// 					 'to_id'=>$to->ma_tai_khoan, 'to_name' => $to->ho_ten_lot.' '.$to->ten ]
					]
				]
			]);
			$req->session()->push('user_chat.user'.$req->toID.'.info', [
				'from_id' => Auth::user()->ma_tai_khoan, 'from_name' => Auth::user()->ho_ten_lot.' '.Auth::user()->ten,
				'to_id'=>$to->ma_tai_khoan, 'to_name' => $to->ho_ten_lot.' '.$to->ten, 'beginning_time' => date('d/m/Y H:i:s')
    	]);

		} else if(!$req->session()->has('user_chat.user'.$req->toID)) {
			// Nếu đã có session user_chat nhưng chưa chat với người hiện tại bao giờ => tạo array lưu chat với người hiện tại => push vào session user_chat
			$req->session()->push('user_chat.user'.$req->toID.'.info', [
				//date("H:i:s")
				'from_id' => Auth::user()->ma_tai_khoan, 'from_name' => Auth::user()->ho_ten_lot.' '.Auth::user()->ten,
				'to_id'=>$to->ma_tai_khoan, 'to_name' => $to->ho_ten_lot.' '.$to->ten, 'beginning_time' => date('d/m/Y H:i:s')
    	]);
		}

		$user_chat = $req->session()->get('user_chat.user'.$req->toID);
		// $user_chat = $req->session()->get('user_chat');
  	return $user_chat;
  }

}
