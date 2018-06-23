<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
  public function luuChatVaoSession(Request $req)
  {
  	$msg = $req->message;
  	if (!$req->session()->has('admin-chat')) {
	    session(['admin-chat'=> [

	    	[
					'name'    => $req->sender_name,
					'message' => $msg,
					'time'    => $req->time
	    	]

	    ]

	  ]);
		} else {
			// session(['admin-chatt'=> [$data]]);
			$req->session()->push('admin-chat', ['name' => $req->sender_name,
	    		'message' => $msg, 'time' => $req->time]);
		}
  
  	$list_chat = $req->session()->get('admin-chat');
  	return $list_chat;

  }

  public function xoaKhungChat(Request $req)
  {	
  	// $req->session()->flush();
  	$req->session()->forget('admin-chat');
  	// return $req->session()->all();
  }

}
