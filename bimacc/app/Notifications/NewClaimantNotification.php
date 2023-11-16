<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\models\ClaimantRegister;
use Auth;

class NewClaimantNotification extends Notification
{
    use Queueable;

    public $newclaimant;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newclaimant)
    {
        $this->newclaimant = $newclaimant;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }
  

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        
        return [
            'body' => $this->newclaimant['body'],
            'actionURL' => $this->newclaimant['actionURL']
        ];
    }
}
