<?php
namespace App\Listeners;
use App\Mail\WelcomeEmail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;


class SendWelcomeEmailAfterVerified
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Verified  $event
     * @return void
     */
    public function handle(Verified $event)
    {
        $user = $event->user;
        Mail::to($user->email)->send(new WelcomeEmail($user));
    }
}
