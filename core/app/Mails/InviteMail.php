<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inviteUrl;

    /**
     * Create a new message instance.
     *
     * @param string $inviteUrl
     */
    public function __construct($inviteUrl)
    {
        $this->inviteUrl = $inviteUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(___('welcome_subject', ['app_name' => config('app.name')]))
                    ->view('emails.subscriber_invite')
                    ->with([
                        'inviteUrl' => $this->inviteUrl
                    ]);
    }
}
