<?php

namespace App\Mails;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPlanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-plan')
                    ->subject(__('email.subject'))  // Konuyu da dil dosyasından alabilirsiniz
                    ->with([
                        'userName' => $this->user->name,
                        'planName' => $this->user->group_id,  // Plan ID'yi plan adıyla değiştirebilirsiniz
                    ]);
    }
}
