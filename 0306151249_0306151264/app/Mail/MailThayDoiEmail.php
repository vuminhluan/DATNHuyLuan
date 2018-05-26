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
	private $new_email;
	private $user_id;
	public function __construct($email, $userid)
	{
		$this->new_email = $email;
		$this->user_id = $userid;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->to($this->new_email)
			->from('datn.ckc15@gmail.com')
			->markdown('mail.capnhat_email_moi')
			->with(['new_email' => $this->new_email, 'user_id' => $this->user_id]);
	}
}
