<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class MailDatLaiMatKhau extends Mailable
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
		$this->data_array = $dataArray;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->to($this->data_array['email'])
			->from('datn.ckc15@gmail.com')
			->view('mail.datlai_matkhau')
			->with(['data' => $this->data_array]);
	}
}
