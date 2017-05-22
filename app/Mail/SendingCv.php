<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class SendingCv extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $msg;
    public function __construct($msg)
    {
        //
        $this->msg=$msg;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from=Auth::user()->email;
        $cvpath=Auth::user()->seeker->cv;
        return $this->view('mail.email')
                    ->from($from)
                    ->attach(public_path().'/storage/'.$cvpath);

    }
}
