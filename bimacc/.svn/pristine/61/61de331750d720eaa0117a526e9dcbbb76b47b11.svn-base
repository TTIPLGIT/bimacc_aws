<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ArbitratorConfiguration;
use App\User;

class SendToArbitrator extends Mailable
{
    use Queueable, SerializesModels;

    protected  $arbitratorconfiguration;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ArbitratorConfiguration $arbitratorconfiguration)
    {
        $this->arbitratorconfiguration = $arbitratorconfiguration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendToArbitrator');
    }
}
