<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuenMatKhauMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nguoiChoi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nguoiChoi)
    {
        $this->nguoiChoi=$nguoiChoi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.quen_mat_khau')
        ->text('email.quen_mat_khau');
    }
}
