<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class MailNhacNhoViPham extends Mailable
{
	use Queueable, SerializesModels;


	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	private $data_array;
	public function __construct($dataArray)
	{
		$this->data_array = $dataArray[0];
	}

	/**
 	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->to($this->data_array->target_email)
			->from('datn.ckc15@gmail.com')
			->markdown('mail.nhacnho_vipham')
			->with(['data' => $this->data_array]);

		// return $this->from('datn.ckc15@gmail.com')->markdown('mail.kichhoat')->to(Auth::user()->email);
	}
}
