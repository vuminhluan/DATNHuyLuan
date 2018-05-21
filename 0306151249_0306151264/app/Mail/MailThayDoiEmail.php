<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class MailThayDoiEmail extends Mailable
{
	use Queueable, SerializesModels;


	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	
	public function __construct()
	{
		
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from('datn.ckc15@gmail.com')->view('mail.capnhat_email_moi');
	}
}
