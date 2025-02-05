<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomVerifyEmail extends Mailable
{
    use SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @param $user
     */
    public function __construct($user)
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
        // Generate the verification URL
        $verificationUrl = route('email.verify', ['id' => $this->user->id, 'token' => $this->user->remember_token]);

        return $this->subject('Email Verification')
            ->view('emails.verify')
            ->with([
                'verificationUrl' => $verificationUrl,
            ]);
    }
}
