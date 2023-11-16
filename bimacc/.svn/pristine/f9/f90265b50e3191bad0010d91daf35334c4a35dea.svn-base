<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\RespondentAccess;

class RespondantAccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $RespondentAccess;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$RespondentAccess)
    {
        $this->user = $user; 
        $this->RespondentAccess = $RespondentAccess;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.RespondentAccess');
    }
}
