<?php

namespace App\Mails;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Build the mail.
	 *
	 * @return $this
	 */
	public function build()
	{
        return $this->markdown('mails.invoice', [
				'mailType' => 'Mailable'
			])
            ->subject('Invoice Paid');
	}
}