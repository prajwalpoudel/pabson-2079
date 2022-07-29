<?php

namespace App\Listeners;

use App\Events\AccountVerified;
use App\Notifications\EmailTemplateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAccountVerifiedEmailNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AccountVerified  $event
     * @return void
     */
    public function handle(AccountVerified $event)
    {
        if($event->verificationStatus) {
            $slug = 'account_verified';
            $data = [
                'variables' => [
                    'user_name'    => $event->user->username,
                ]
            ];
            $event->user->notify(new EmailTemplateNotification($slug, $data));
        }
    }
}
