<?php

namespace App\Mail;

use http\Client\Curl\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\Types\Collection;
use phpDocumentor\Reflection\Types\Integer;

class DailyNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $keyResults;


    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($user, $keyResults)
    {
        $this->user = $user;
        $this->keyResults = $keyResults;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $keyResults = $this->keyResults;
        return $this->view('mail.DailyNotification',compact('keyResults'))
            ->subject('Update Notification for ' . $this->user->name);
    }
}
