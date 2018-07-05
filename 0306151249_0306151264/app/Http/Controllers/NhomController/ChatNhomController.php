<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\RdlEvent;

class ChatNhomController extends Controller
{
    public function postMessagenl(Request $rql)
    {
    	$messenges = "lala";
    	event(
    		$e = new RdlEvent($messenges)
    	);
    	// return redirect()->back();
    	 return $rql;
    }
}
