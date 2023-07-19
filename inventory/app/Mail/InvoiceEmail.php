<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $filePath;

    /**
     * Create a new message instance.
     *
     * @param  Transaction  $transaction
     * @param  string  $filePath
     * @return void
     */
    public function __construct(Transaction $transaction, $filePath)
    {
        $this->transaction = $transaction;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Invoice')
                    ->markdown('emails.invoice')
                    ->attach($this->filePath, [
                        'as' => 'invoice.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
